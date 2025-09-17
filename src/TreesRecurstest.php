<?php

namespace Trees\Recurstest;

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

function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}

// function array_flatten(array $multiDimArray): array {
//     $flatten = [];

//     $singleArray = array_map(function($arr) use (&$flatten) {
//         $flatten = array_merge($flatten, $arr);
//     }, $multiDimArray);

//     return $flatten;
// }

function myReduce($children, callable $findFilesByName, $init = null)
{
    $acc = $init;
    foreach ($children as $child) {
        $acc = $findFilesByName($acc, $child); // Заменяем старый аккумулятор новым
    }
    return $acc;
}

function findFilesByName($tree, $substr)
{
    $children = getChildren($tree);
    $name = getName($tree);
    $files = [];

    // // Loop through the children of the directory
    // foreach ($children as $child) {
    //     // If it's a file, accumulate the size
        if (isFile($tree) && strpos($name, $substr) !== false) {
          return $name;
        }
        // $files[] = $name;
    //     // If it's a directory, recursively call this function
    //     // elseif (isDirectory($node)) {
    //     //     $totalSize += getDirectoryFileSize($node);
    //     // }
    // }
//     print_r($files);
//     // return $files;
// $children = getChildren($tree);
// $matched = array_reduce($children, function($acc, $child) {
//   strpos($name, $substr) !== false ? $name : $acc;
//   return $acc;
// }, []);

// $file = array_map(fn($child) => findFilesByName($child), $children);
  // $allFiles = array_filter($children, fn($child) => findFilesByName($child));
  // print_r($allFiles);
  return flatten($matched);
}  
  // $matchFiles = array_map(fn($file) => findFilesByName($file, $matches), $allFiles);
  // // print_r($matchFiles);
  // return array_flatten($matchFiles);
print_r(findFilesByName($tree, 'on'));