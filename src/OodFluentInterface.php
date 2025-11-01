<?php

namespace App;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Illuminate\Support\Collection;

$raw = [
    [
        'name' => 'istambul',
        'country' => 'turkey'
    ],
    [
        'name' => 'Moscow ',
        'country' => ' Russia'
    ],
    [
        'name' => 'iStambul',
        'country' => 'tUrkey'
    ],
    [
        'name' => '  antalia',
        'country' => 'turkeY '
    ],
    [
        'name' => 'samarA',
        'country' => '  ruSsiA'
    ],
];

function normalize($raw)
{
    return collect($raw)
    ->map(fn($name) => [
            'name' => trim(strtolower($name['name'])),
            'country' => trim(strtolower($name['country']))
        ])
    ->groupBy('country')
    ->map(fn($cities) => $cities->pluck('name')->unique()->sort()->values())
    ->sortKeys()
    ->toArray();

}
print_r(normalize($raw));