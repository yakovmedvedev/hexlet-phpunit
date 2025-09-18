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

// Function to find files by name with full path
function findFilesByName($tree, $substring) {
    // Initialize empty array to store matching file paths
    $result = [];
    
    // Helper function to traverse the tree recursively
    $walk = function ($node, $currentPath = '') use ($substring, &$result, &$walk) {
        // Get node's name
        $name = getName($node);
        // Build current path
        $path = $currentPath === '' ? $name : "$currentPath/$name";
            if ($currentPath === '' && $name === '/') {
            $path = '';
        }
        
        if (isFile($node)) {
            // If it's a file and name contains search string, add to results
            if (stripos($name, $substring) !== false) {
                $result[] = $path;
            }
        } 
        // else {
        //     // If it's a directory, recurse through children
        //     $children = getChildren($node);
        //     foreach ($children as $child) {
        //         $walk($child, $path);
        //     }
        // }
    };
    
    // Start traversal from root
    $walk($tree);
    return $result;
}
print_r(findFilesByName($tree, 'on'));


// function findFilesByName($tree, $substr, $currentPath = '')
// {
//     $matches = [];
//     $name = getName($tree);
//     $fullPath = $currentPath !== '' ? $currentPath . '/' . $name : $name;
    
//     if (isFile($tree) && strpos($name, $substr) !== false) {
//         $matches[] = $fullPath;
//     }

//     $children = getChildren($tree);

//     foreach ($children as $child) {
//         $matches = array_merge($matches, findFilesByName($child, $substr, $fullPath));
//     }

//     return $matches;
// }