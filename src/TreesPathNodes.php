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

function array_flatten(array $multiDimArray): array {
    $flatten = [];

    $singleArray = array_map(function($arr) use (&$flatten) {
        $flatten = array_merge($flatten, $arr);
    }, $multiDimArray);

    return $flatten;
}


function findEmptyDirsPaths($tree, $currentPath = '')
{
    $name = getName($tree);
    $fullPath = $currentPath !== '' && $currentPath !== '/' ? $currentPath . '/' . $name : $name;
    $children = getChildren($tree);
    // print_r($children);

    // if (count($children === 0)) {
    //     return [$name];
    // }
 
        if (empty($children)) {
               return [$fullPath];
           }


    $allDirs = array_filter($children, fn($child) => !isFile($child));
    // print_r($allDirs);
    $emptyDirs = array_map(fn($dir) => findEmptyDirsPaths($dir, $fullPath), $allDirs);
    // print_r(array_flatten($emptyDirs));
    return array_flatten($emptyDirs);
}
$emptyDirsPaths = findEmptyDirsPaths($tree);
print_r($emptyDirsPaths);

//AI's
// function findEmptyDirsPaths($tree, $currentPath = '') 
// {
//     // Get the current directory's name and build the full path
//     $name = getName($tree);
//     $fullPath = $currentPath !== '' ? $currentPath . '/' . $name : $name;
//     $children = getChildren($tree);

//     // Check if the current directory is empty
//     if (empty($children)) {
//         return [$fullPath]; // Return the full path of the empty directory
//     }

//     // Get only the directories from the children
//     $allDirs = array_filter($children, fn($child) => isDirectory($child));
    
//     $emptyDirs = [];
//     foreach ($allDirs as $dir) {
//         // Recursively check for empty directories
//         $emptyDirs = array_merge($emptyDirs, findEmptyDirsPaths($dir, $fullPath));
//     }

//     return $emptyDirs;
// }

// // Call the function and print the results
// $emptyDirsPaths = findEmptyDirsPaths($tree);
// print_r($emptyDirsPaths);