<?php

namespace Classes\Get\Mid\Point;

Class Point
{
    public $x;
    public $y;
}

$point1 = new Point();
$point1->x = 2;
$point1->y = 6;
$point2 = new Point();
$point2->x = 6;
$point2->y = 2;

function getMidPoint(Point $point1, $point2)
{
    $mid = new Point();
    $mid->x = ($point1->x + $point2->x) / 2;
    $mid->y = ($point1->y + $point2->y) / 2;
    return $mid;
}

$midpoint = getMidPoint($point1, $point2);
$midpoint->x;
$midpoint->y;


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
//    $point = new Point();
//    $point->x = $x;
//    $point->y = $y;
//    return $point;
//}
