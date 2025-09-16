<?php

namespace Trees\Path\Nodes;

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
  mkdir('etc', [
    mkdir('apache'),
    mkdir('nginx', [
      mkfile('nginx.conf'),
    ]),
    mkdir('consul', [
      mkfile('config.json'),
      mkdir('data'),
    ]),
  ]),
  mkdir('logs'),
  mkfile('hosts'),
]);
// print_r($tree);




//Реализуйте функцию findFilesByName(), которая принимает на вход файловое дерево и подстроку, а возвращает список файлов, имена которых содержат эту подстроку.

//Примеры
//<?php

// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;
// use function App\findFilesByName\findFilesByName;

// $tree = mkdir('/', [
//     mkdir('etc', [
//         mkdir('apache'),
//         mkdir('nginx', [
//             mkfile('nginx.conf', ['size' => 800]),
//         ]),
//         mkdir('consul', [
//             mkfile('config.json', ['size' => 1200]),
//             mkfile('data', ['size' => 8200]),
//             mkfile('raft', ['size' => 80]),
//         ]),
//     ]),
//     mkfile('hosts', ['size' => 3500]),
//     mkfile('resolve', ['size' => 1000]),
// ]);

// findFilesByName($tree, 'co');
// // ['/etc/nginx/nginx.conf', '/etc/consul/config.json']
// Примечания
// Обратите внимание на то, что возвращается не просто имя файла, а полный путь до файла, начиная от корня.
// Readme
// Terminal 1
// Terminal 2
// Repl
// findFilesByName.php
// Реализуйте функцию findFilesByName(), которая принимает на вход файловое дерево и подстроку, а возвращает список файлов, имена которых содержат эту подстроку.

// Примеры
// <?php

// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;
// use function App\findFilesByName\findFilesByName;

// $tree = mkdir('/', [
//     mkdir('etc', [
//         mkdir('apache'),
//         mkdir('nginx', [
//             mkfile('nginx.conf', ['size' => 800]),
//         ]),
//         mkdir('consul', [
//             mkfile('config.json', ['size' => 1200]),
//             mkfile('data', ['size' => 8200]),
//             mkfile('raft', ['size' => 80]),
//         ]),
//     ]),
//     mkfile('hosts', ['size' => 3500]),
//     mkfile('resolve', ['size' => 1000]),
// ]);

// findFilesByName($tree, 'co');
// // ['/etc/nginx/nginx.conf', '/etc/consul/config.json']
// Примечания
// Обратите внимание на то, что возвращается не просто имя файла, а полный путь до файла, начиная от корня.