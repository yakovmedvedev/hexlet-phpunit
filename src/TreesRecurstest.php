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

function findFilesByName($tree, $searchString)
{
    // Helper function to traverse the tree using reduce
    $traverse = function ($node, $currentPath = '') use ($searchString, &$traverse) {
        $name = getName($node);
        // Avoid double slash by handling root case specially
        $path = $currentPath === '' ? $name : "$currentPath/$name";
        // If root is '/', ensure no leading double slash
        if ($currentPath === '' && $name === '/') {
            $path = !$name;
        }
        
        if (isFile($node)) {
            // If it's a file and name contains search string, return array with path
            return stripos($name, $searchString) !== false ? [$path] : [];
        }
        
        // If it's a directory, reduce over children and collect results
        $children = getChildren($node);
        return array_reduce(
            $children,
            function ($acc, $child) use ($traverse, $path) {
                // Recursively traverse each child and merge results
                return array_merge($acc, $traverse($child, $path));
            },
            []
        );
    };
    
    return $traverse($tree);
}

// Test data
$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),
        mkdir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),
        ]),
        mkdir('consul', [
            mkfile('config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);

// Test the function
$result = findFilesByName($tree, 'o');
print_r($result);

// function array_flatten(array $multiDimArray): array {
//     $flatten = [];

//     $singleArray = array_map(function($arr) use (&$flatten) {
//         $flatten = array_merge($flatten, $arr);
//     }, $multiDimArray);

//     return $flatten;
// }

// function myReduce($children, callable $findFilesByName, $init = null)
// {
//     $acc = $init;
//     foreach ($children as $child) {
//         $acc = $findFilesByName($acc, $child); // Заменяем старый аккумулятор новым
//     }
//     return $acc;
// }

// function findFilesByName($tree)
// {
//     $children = getChildren($tree);
//     $name = getName($tree);
//     $files = [];


//         if (!isset($children)) {
//          return [$name];
//         }


//     print_r($files);
// //     // return $files;
// $children = getChildren($tree);
// $name = getName($tree);
//     $fileNames = array_filter($children, fn($child) => !isDirectory($child));
//     print_r($fileNames);
//     // Ищем пустые директории внутри текущей
//     $matched = array_map(fn($file) => findFilesByName($file), $fileNames);

// // $files = array_reduce($children, function($acc, $child) {
// //   strpos($name, $substr) !== false ? $name : $acc;
// //   return $acc;
// // }, []);

// // $file = array_map(fn($child) => findFilesByName($child), $children);
//   // $allFiles = array_filter($children, fn($child) => findFilesByName($child));
//   // print_r($allFiles);
//   return flatten($matched);
// }  
//   // $matchFiles = array_map(fn($file) => findFilesByName($file, $matches), $allFiles);
//   // // print_r($matchFiles);
//   // return array_flatten($matchFiles);
// print_r(findFilesByName($tree));