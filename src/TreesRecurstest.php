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
    mkdir('cogsul', [
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

function findFilesByName($tree)
{
  
  // print_r($children);
  // $substr = '';
  $children = getChildren($tree);
 

foreach ($children as $child) {
  $matches = [];
  $name = getName($tree);
  if (isFile($child)) {
$matches[] = $child[$name];
  }
  
  print_r($matches);
}



  // $fullPath = $currentPath !== '' ? $currentPath . '/' . $name : $name;
  
  // // print_r($children);
  
  // if (isFile($tree) && strpos($name, $substr) !== false) {
  //   $matches[] = $fullPath;
  // }


  // // if (isDirectory($tree)) {
  // //       $children = getChildren($tree);
  // //       if (is_array($children)) {
  // //         foreach ($children as $child) {
  // //       $matches = array_merge($matches, findFilesByName($child, $substr, $fullPath));
  // //   }
  // // }

  // // }

    return $matches;

  
  // $allFiles = array_filter($children, fn($child) => isFile($child));
  // print_r($allFiles);
  // $matchFiles = array_map(fn($file) => findFilesByName($file, $matches), $allFiles);
  // // print_r($matchFiles);
  // return array_flatten($matchFiles);
}
findFilesByName($tree);