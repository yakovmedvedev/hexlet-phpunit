<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;

$tree = mkdir(
    'my documents', [
        mkfile('avatar.jpg', ['size' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['size' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations')
    ]
);
// print_r($tree);
print_r(getMeta($tree['children'][1]));
print_r($tree['children'][1]['meta']);
print_r(getMeta($tree['children'][2]));
// print_r($tree['children']);

function compressImages()
{
    $children = getChildren($tree);
    $newChildren = array_map(function ($child) {
        $meta = getMeta($child);
        if (isFile($child)) {
                return getMeta($child)/2;
        }
        return $child;
    }, $children);
    return $newChildren;
}

// $tree = mkdir('/', [
//     mkfile('oNe'),
//     mkfile('Two'),
//     mkdir('THREE'),
// ]);
// print_r($tree);

// $children = getChildren($tree);
// $newChildren = array_map(function ($child) {
//     $name = getName($child);
//     if (isDirectory($child)) {
//         return mkdir(strtolower($name), getChildren($child), getMeta($child));
//     }
//     return mkfile(strtolower($name), getMeta($child));
// }, $children);

// $tree2 = mkdir(getName($tree), $newChildren, getMeta($tree));
// print_r($tree2);

// Реализуйте функцию compressImages(), которая принимает на вход директорию, находит внутри нее картинки и "сжимает" их. Под сжиманием понимается уменьшение свойства size в метаданных в два раза. Функция должна вернуть обновленную директорию со сжатыми картинками и всеми остальными данными, которые были внутри этой директории.
// Картинками считаются все файлы заканчивающиеся на .jpg.