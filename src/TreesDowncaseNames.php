<?php

namespace Trees\Downcase\Names;

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

$tree = mkdir('/', [
    mkdir('eTc', [
        mkdir('NgiNx'),
        mkdir('CONSUL', [
            mkfile('Config.json'),
        ]),
    ]),
    mkfile('hOsts'),
]);

        // $tree = mkdir('/', [
        //   mkdir('eTc', [
        //     mkdir('NgiNx', [], ['size' => 4000]),
        //     mkdir('CONSUL', [
        //       mkfile('config.JSON', ['uid' => 0]),
        //     ]),
        //   ]),
        //   mkfile('hOsts'),
        // ]);


function  downcaseFileNames($tree)
{
    $origin = $tree;
    $name = getName($origin);
    $newName = strtolower($name);
    $meta = getMeta($origin);

    if (isFile($origin)) {
        return (mkfile($newName, $meta));
    }

    $name = getName($origin);
    $children = getChildren($origin);
    $newChildren = array_map(fn($child) => downcaseFileNames($child), $children);
    $newTree = mkdir(getName($origin), $newChildren, getMeta($origin));
    return $newTree;
}
print_r(downcaseFileNames($tree));

// tutor's
// function downcaseFileNames($node)
// {
//     $name = getName($node);
//     $meta = getMeta($node);

//     if (isFile($node)) {
//         $newName = strtolower($name);
//         return mkfile($newName, $meta);
//     }

//     $updatedChildren = array_map(fn($child) => downcaseFileNames($child), getChildren($node));

//     return mkdir($name, $updatedChildren, $meta);
// }
// Реализуйте функцию downcaseFileNames(), которая принимает на вход директорию (объект-дерево) и приводит имена всех файлов в этой и во всех вложенных директориях к нижнему регистру. Результат в виде обработанной директории возвращается наружу. Исходное дерево не изменяется.

// Примеры
// <?php

// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;
// use function App\downcaseFileNames\downcaseFileNames;

// $tree = mkdir('/', [
//     mkdir('eTc', [
//         mkdir('NgiNx'),
//         mkdir('CONSUL', [
//             mkfile('config.json'),
//         ]),
//     ]),
//     mkfile('hOsts'),
// ]);

// downcaseFileNames($tree);
// [
//      'name' => '/',
//      'type' => 'directory',
//      'meta' => [],
//      'children' => [
//           [
//                'name' => 'eTc',
//                'type' => 'directory',
//                'meta' => [],
//                'children' => [
//                     [
//                          'name' => 'NgiNx',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [],
//                      ],
//                      [
//                          'name' => 'CONSUL',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [
//                               [
//                                    'name' => 'config.json',
//                                    'type' => 'file',
//                                    'meta' => [],
//                               ]
//                          ],
//                      ],
//                 ],
//           ],
//           [
//                'name' => 'hosts',
//                'type' => 'file',
//                'meta' => [],
//           ],
//      ],
// ]
// Подсказки
// Для проверки, является ли узел файлом, используйте функцию isFile(). Эта функция принимает узел и возвращает результат проверки (true или false):

// <?php

// use function Php\Immutable\Fs\Trees\trees\isFile;

// echo isFile(file);
// // => true

// echo isFile(directory);
// // => false