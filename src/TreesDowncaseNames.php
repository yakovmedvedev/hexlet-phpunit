<?php

namespace Trees\Downcase\Names;

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
    mkdir('eTc', [
        mkdir('NgiNx'),
        mkdir('CONSUL', [
            mkfile('Config.json'),
        ]),
    ]),
    mkfile('hOsts'),
]);

function changeCase($tree)
{
    $name = getName($tree);
    $fileName = strtolower($name);

    if (isFile($tree)) {
        return (mkfile($fileName));
    }
}

// function downcaseFileNames($tree, $name)
// {
//     $name = getName($tree);
//     $fileName = strtolower($name);
    

//     if (isFile($tree)) {
//         return (mkfile($fileName));
//     }
// }
    $name = getName($tree);
    $meta = getMeta($tree);
    $children = getChildren($tree);
    // print_r($children);
    $newChildren = array_map(fn($child) => changeCase($child), $children);

    // array_map(fn($child) => downcaseFileNames($child, $fileName), $children);

    print_r($newChildren);

print_r($newTree = mkdir($name, $newChildren, $meta));
return $newTree;

//     $children = getChildren($tree);
//     // print_r($children);
//     $newChildren = array_map(function ($child) use ($fileName) {
//         return downcaseFileNames($child, $fileName);
//     }, $children);

//     // array_map(fn($child) => downcaseFileNames($child, $fileName), $children);

//     print_r($newChildren);

// $newTree = mkdir($name, $newChildren, $meta);
// return $newTree;
// // print_r($newTree);


// downcaseFileNames($tree);

// function compressImages($tree)
// {
// $children = getChildren($tree);

// $jpgChildren = array_filter($children, fn($child) => isFile($child) && str_ends_with(getName($child), '.jpg') === true);

// $optJpgChildren = array_map(function ($child) {
//     $name = getName($child);
//     foreach ($child as $value) {
//         $meta = getMeta($child);
//         $meta['size'] = (int) $meta['size'] * 0.5;
//     }
//     return mkfile($name, $meta);   
// }, $jpgChildren);

// $allChildren = array_replace($children, $optJpgChildren);
// return mkdir(getName($tree), $allChildren, getMeta($tree));

        
// }
// compressImages($tree);