<?php

namespace Trees\Paths\Nodes;

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

function array_flatten(array $multiDimArray): array {
    $flatten = [];

    $singleArray = array_map(function($arr) use (&$flatten) {
        $flatten = array_merge($flatten, $arr);
    }, $multiDimArray);

    return $flatten;
}


function findEmptyDirsPaths($tree)
{
    $name = getName($tree);
    $children = getChildren($tree);
    // print_r($children);

    // if (count($children === 0)) {
    //     return [$name];
    // }

    if (empty($children)) {
               return [$name];
           }

    $allDirs = array_filter($children, fn($child) => !isFile($child));
    // print_r($allDirs);
    $emptyDirs = array_map(fn($dir) => findEmptyDirsPaths($dir), $allDirs);
    print_r(array_flatten($emptyDirs));
    return array_flatten($emptyDirs);
    
}
findEmptyDirsPaths($tree);