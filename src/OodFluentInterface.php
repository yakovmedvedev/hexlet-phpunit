<?php

namespace App\Ood\Fluent\Interface;

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
// print_r(normalize($raw));

//tutor's
// function normalize($raw)
// {
//     return collect($raw)
//         ->map(fn($value) =>
//             array_map(fn($item) =>
//                 mb_strtolower($item), $value))
//         ->map(fn($value) =>
//             array_map(fn($item) =>
//                 trim($item), $value))
//         ->mapToGroups(fn($item) =>
//             [$item['country'] => $item['name']])
//         ->map(fn($cities) =>
//             $cities->unique()->sort()->values())
//         ->sortKeys()
//         ->toArray();
// }

// Дисклеймер — эту задачу можно решить огромным числом способов. Почти наверняка ваш способ будет не такой как решение учителя.

// Для отработки fluent interface в задаче используется библиотека Collect. Мы не даем никаких подсказок насчет того, какие функции нужно использовать. Как минимум вы знаете главную тройку map, filter и reduce. Их вполне достаточно, но можно и лучше если внимательно поизучать функции в документации Collect.

// src/Normalizer.php
// Реализуйте функцию normalize() которая принимает на вход список городов, производит внутри некоторые преобразования и возвращает структуру определенного формата.

// Входные данные
// <?php

// $raw = [
//     [
//         'name' => 'istambul',
//         'country' => 'turkey'
//     ],
//     [
//         'name' => 'Moscow ',
//         'country' => ' Russia'
//     ],
//     [
//         'name' => 'iStambul',
//         'country' => 'tUrkey'
//     ],
//     [
//         'name' => 'antalia',
//         'country' => 'turkeY '
//     ],
//     [
//         'name' => 'samarA',
//         'country' => '  ruSsiA'
//     ],
// ];
// Входная структура представляет из себя список городов, где каждый город это ассоциативный массив с ключами name и country. Значения в этих ключах не нормализованы. Они могут быть в любом регистре и содержать начальные и концевые пробелы. Сами города могут дублироваться в рамках одной страны.

// Результат
// <?php

// $actual = normalize($raw);
// // $expected = [
// //     'russia' => [
// //         'moscow', 'samara'
// //     ],
// //     'turkey' => [
// //         'antalia', 'istambul'
// //     ]
// // ];
// Конечная структура — ассоциативный массив, в котором ключ это страна, а значение — список имен городов отсортированный по именам. Сама структура отсортирована по странам. Дублей городов в выходной структуре быть не должно, а сами страны и города должны быть записаны в нижнем регистре без ведущих и концевых пробелов.

// Подсказки
// Сигналы