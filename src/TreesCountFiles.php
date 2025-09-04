<?php

namespace Trees\Count\Files;

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
  ]),
  mkdir('consul', [
    mkfile('config.json'),
    mkfile('file.tmp'),
    mkdir('data'),
  ]),
  mkfile('hosts'),
  mkfile('resolve'),
]);
// print_r($tree);

function getFilesCount($tree)
{
    if (isFile($tree)) {
        return 1;
    }

    $children = getChildren($tree);
    $descendantsCount = array_map(fn($child) => getFilesCount($child), $children);

    return array_sum($descendantsCount);
}
print_r(getFilesCount($tree));
function getSubdirectoriesInfo($tree)
{
    $children = getChildren($tree);
    // Нас интересуют только директории
    $filtered = array_filter($children, fn($child) => isDirectory($child));
    // Запускаем подсчет для каждой директории
    // При таком подходе некоторые узлы будут обходиться много раз
    $result = array_map(fn($child) => [getName($child), getFilesCount($child)], $filtered);
    print_r($result);
    return $result;
}
getSubdirectoriesInfo($tree);