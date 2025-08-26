<?php

//https://habr.com/ru/articles/145946/

namespace Trees\Immutable\Trees;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\map;

// mkdir вторым параметром принимает список детей
// которые могут быть либо директориями созданными mkdir
// либо файлами созданными mkfile
$tree = mkdir('etc', [
  mkfile('bashrc'),
  mkdir('consul', [
    mkfile('config.json'),
  ]),
], ['key' => 'value']);

$tree2 = mkdir('etc', ['key' => 'value']);
$tree3 = mkfile('bashrc');

//print_r($tree);
print_r($tree2);
print_r($tree3);