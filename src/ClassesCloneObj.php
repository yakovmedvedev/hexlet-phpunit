<?php

namespace App\Classes\Clone\Obj; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Point;

$point = new Point();
$point->x = 2;
$point->y = 6;

function dup($point)
{
    $point2 = new Point;
    $point2->x = &$point->x;
    $point2->y = &$point->y;
    return $point2;
}
var_dump(dup($point));




// print_r(dup($point));

// Реализуйте функцию dup, которая клонирует переданную точку. Под клонированием подразумевается процесс создания нового объекта, с такими же данными, как и у старого.
//tutor's
// function dup($point)
// {
//     $clonedPoint = new Point();
//     $clonedPoint->x = $point->x;
//     $clonedPoint->y = $point->y;

//     return $clonedPoint;
// }

