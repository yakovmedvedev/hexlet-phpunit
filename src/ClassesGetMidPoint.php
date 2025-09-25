<?php

namespace App\Classes\Get\Mid\Point; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Point;

// class Point
// {
//     public $x;
//     public $y;
// }

$point1 = new Point();
$point1->x = 2;
$point1->y = 6;
$point2 = new Point();
$point2->x = 6;
$point2->y = 2;

function getMidPoint($point1, $point2)
{
    // $mid = new Point();
    $x = ($point1->x + $point2->x) / 2;
    $y = ($point1->y + $point2->y) / 2;
    $point = new Point();
    $point->x = $x;
    $point->y = $y;
    return $point;
}

$midpoint = getMidPoint($point1, $point2);
$midpoint->x;
$midpoint->y;
print_r($midpoint->x . "\n");
print_r($midpoint->y . "\n");

//файл класса лежит в src
//файл называется также как класс
//в composer.json в autoload прописывается "autoload": {
//    "psr-4": {
//      "App\\": "src/"
//    },
//в файле класса namespace App;  
//в файле функции use App\Class;
//в PHPUnit-тесте namespace App;


//Реализуйте класс Point с публичными свойствами $x и $y.
//
//src\PointFunctions.php
//Реализуйте функцию getMidpoint, которая принимает на вход две точки (объекты) и возвращает точку (объект)
//лежащую между ними (поиск середины отрезка).

//<?php
//
//$point1 = new Point();
//$point1->x = 1;
//$point1->y = 10;
//$point2 = new Point();
//$point2->x = 10;
//$point2->y = 1;
//
//$midpoint = getMidpoint($point1, $point2);
//$midpoint->x; // 5.5
//$midpoint->y; // 5.5

//tutor's'
//function getMidpoint($point1, $point2)
//{
//    $x = ($point1->x + $point2->x) / 2;
//    $y = ($point1->y + $point2->y) / 2;
//
//    
//}
