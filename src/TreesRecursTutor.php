<?php

namespace Trees\Recurs\Tutor;

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
use function Php\Immutable\Fs\Trees\trees\array_flatten;


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

// BEGIN
function iter($node, $subStr, $ancestry, $acc)
{
    $name = getName($node);
    $newAncestry = ($name === '/') ? '' : "$ancestry/$name";
    if (isFile($node)) {
        if (str_contains($name, $subStr)) {
            $acc[] = $newAncestry;
        }
        return $acc;
    }
    dump($acc);

    return array_reduce(
        getChildren($node),
        function ($newAcc, $child) use ($subStr, $newAncestry) {
            return iter($child, $subStr, $newAncestry, $newAcc);
        },
        $acc
    );
    dump($acc);
}


function findFilesByName($root, $subStr)
{
    return iter($root, $subStr, '', []);
}
print_r(findFilesByName($tree, 'co'));
// END

// BEGIN (write your solution here)
// function findFilesByName($tree, $string)
// {
//     $name = getName($tree);
//     $currentPath = ($name === '/') ? null : $name;

//     if (isFile($tree)) {
//         if (str_contains($currentPath, $string)) {
//             return [$currentPath];
//         }
//         return [];
//     }
//     $children = getChildren($tree);
//     if (count($children) === 0) {
//         return [];
//     }
//     $searchedFiles = array_reduce($children, function ($acc, $child) use ($string) {
//         return array_merge($acc, findFilesByName($child, $string));
//     }, []);

//     return array_map(fn($pathToFile) => "{$currentPath}/{$pathToFile}", $searchedFiles);
// }
// END