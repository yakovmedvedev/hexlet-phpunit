<?php

namespace Trees\Calc\Totalsize\Dirs;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
   require_once $autoloadPath1;
} else {
   require_once $autoloadPath2;
}

// Реализуйте функцию du(), которая принимает на вход директорию. Функция возвращает список узлов (директорий и файлов),
// вложенных в указанную директорию на один уровень, и место, которое они занимают. Размер файла задается в метаданных.
// Размер директории складывается из сумм всех размеров файлов, находящихся внутри во всех поддиректориях. Сами папки размера не имеют.
// Пример

// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;
// use function App\du\du;


//print_r($tree);
// du($tree);
// [
//     ['etc', 10280],
//     ['hosts', 3500],
//     ['resolve', 1000],
// ]
// Примечания
// Обратите внимание на структуру результирующего массива. Каждый элемент — массив с двумя значениями: именем директории и размером файлов внутри.
// Результат отсортирован по размеру в обратном порядке. То есть сверху самые тяжёлые, внизу самые лёгкие.
// Подсказки
// usort
// Вам может пригодиться функция reduce()

use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\reduce;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;

$tree = mkdir('/', [
    mkdir('etc', [
    mkdir('apache'),
    mkdir('nginx', [
        mkfile('.nginx.conf', ['size' => 800]),
    ]),
    mkdir('.consul', [
        mkfile('.config.json', ['size' => 1200]),
        mkfile('data', ['size' => 8200]),
        mkfile('raft', ['size' => 80]),
    ]),
    ]),
    mkfile('.hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);

function getDirectoryFileSize($tree): int
{
    $children = getChildren($tree);
    $totalSize = 0;

    // Loop through the children of the directory
    foreach ($children as $node) {
        // If it's a file, accumulate the size
        if ($node['type'] === 'file' && isset($node['meta']['size'])) {
            $totalSize += $node['meta']['size'];
        }
        // If it's a directory, recursively call this function
        elseif (isDirectory($node)) {
            $totalSize += getDirectoryFileSize($node);
        }
    }

    return $totalSize;
}

function walk($children, &$result)
{
    foreach ($children as $node) {
        if (isset($node['meta']['size'])) {
            $result[] = [getName($node), $node['meta']['size']];

        }


//            foreach ($children as $node) {
        // Only consider directories
        if (isset($node['children']) && is_array($node['children'])) {
            // Calculate the size of this directory
            $totalSize = getDirectoryFileSize($node);
//                    $result[] = [$node['name'], $totalSize];
//                    walk($node['children'], $result);
//            if ($totalSize > 0) {
//                        // Store the directory name and its size in the result
                $result[] = [getName($node), $totalSize];
//                        walk($node['children'], $result);
//                        break; // Stop after finding the first directory with files
//            }
        }
//                return ($result);
//            }


//            if (isset($node['children']) && is_array($node['children'])) {
//                walk($node['children'], $result);
//            }
    }
}

function du($tree)
{
    $children = getChildren($tree);
    $result = [];
    walk($children, $result);
    usort($result, function ($a, $b) {
        return $b[1] <=> $a[1]; // The spaceship operator returns -1, 0, or 1
    });
    return $result;
}
//print_r($tree['children'][2]);
du(getChildren($tree)[0]);

