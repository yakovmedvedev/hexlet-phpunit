<?php

namespace App\Arrays\Mirror\Arrays; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

//$array = [
//    [11, 12, 13, 14, 15, 16],
//    [21, 22, 23, 24, 25, 26],
//    [31, 32, 33, 34, 35, 36],
//    [41, 42, 43, 44, 45, 46],
//    [51, 52, 53, 54, 55, 56],
//    [61, 62, 63, 64, 65, 66],
//];
$array = [
    ['he', 'xl', 'et', 'io', 'io'],
    ['in', 'my', 'hea', 'rt', 'io'],
    ['fo', 're', 've', 'r', 'io'],
    ['an', 'd', 'ev', 'er', 'io'],
];

function getMirrorMatrix($array)
{
    $newArray = [];
    foreach ($array as $child) {

            $child = array_slice($child, 0, count($array));
            $length = count($child) * 0.5;
            $slicedChild = array_slice($child, 0, $length);
            $mirrorChild = array_reverse($slicedChild);
            $newChild = (array_merge($slicedChild, $mirrorChild));
            $newArray[] = $newChild;

    }
    return $newArray;
}
//getMirrorMatrix($array);
print_r(getMirrorMatrix($array));
print_r(count($array));