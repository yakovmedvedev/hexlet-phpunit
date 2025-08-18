<?php


function makeDecartPoint($x, $y)
{
    return ['x' => $x, 'y' => $y];
}

function makeRectangle($topLeft, $width, $height)
{
    return ['topLeft' => $topLeft, 'width' => $width, 'height' => $height];
}

function getStartPoint($rectangle)
{
    return $rectangle['topLeft'];
}

function getWidth($rectangle)
{
    return $rectangle['width'];
}

function getHeight($rectangle)
{
    return $rectangle['height'];
}

function containsOrigin($rectangle)
{
    $topLeft = $rectangle['topLeft'];
    $bottomRight = ['x' => $topLeft['x'] + $rectangle['width'], 'y' => $topLeft['y'] - $rectangle['height']];
    return ($topLeft['x'] < 0 && $bottomRight['x'] > 0) && ($topLeft['y'] > 0 && $bottomRight['y'] < 0 );
}
$width = 4;
$height = 5;
$topLeft = makeDecartPoint(-1, 1);
print_r($topLeft);
print_r($bottomRight = ['x' => $topLeft['x'] + $width, 'y' => $topLeft['y'] + $height]);
$rectangle = makeRectangle($topLeft, 4, 5);
print_r($rectangle);
print_r(getStartPoint($rectangle));
print_r(getWidth($rectangle));
print_r(getHeight($rectangle));
print_r(containsOrigin($rectangle));

//tutor's
//namespace App\Rectangle;
//
//use function App\Points\makeDecartPoint;
//use function App\Points\getX;
//use function App\Points\getY;
//use function App\Points\getQuadrant;
//
//// BEGIN
//function makeRectangle($point, $width, $height)
//{
//    return [
//        'point' => $point,
//        'width' => $width,
//        'height' => $height
//    ];
//}
//
//function getStartPoint($rectangle)
//{
//    return $rectangle['point'];
//}
//
//function getWidth($rectangle)
//{
//    return $rectangle['width'];
//}
//
//function getHeight($rectangle)
//{
//    return $rectangle['height'];
//}
//
//function containsOrigin($rectangle)
//{
//    $point1 = getStartPoint($rectangle);
//    $point2 = makeDecartPoint(getX($point1) + getWidth($rectangle), getY($point1) - getHeight($rectangle));
//    return getQuadrant($point1) === 2 && getQuadrant($point2) === 4;