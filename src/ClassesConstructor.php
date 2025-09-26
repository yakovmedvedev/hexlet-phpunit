<?php

namespace App\Classes\Constructor; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Segment;
use App\Point;

$segment = new Segment(new Point(1, 1), new Point(10, 11));

function reverse($segment)
{
    return new Segment(new Point($segment->endPoint->x, $segment->endPoint->y), new Point($segment->beginPoint->x, $segment->beginPoint->y));
}
$reversedSegment = reverse($segment);
print_r($reversedSegment);
//print_r($segment);

//Реализуйте класс App\Segment с двумя публичными свойствами beginPoint и endPoint. Определите в классе конструктор.
//
//Примеры
//<?php
//
//$segment = new Segment(new Point(1, 1), new Point(10, 11));
//src/SegmentFunctions.php
//Реализуйте функцию reverse, которая принимает на вход отрезок и возвращает новый отрезок с точками,
//добавленными в обратном порядке (begin меняется местами с end).
//
//Примечания
//Точки в результирующем отрезке должны быть копиями (по значению) соответствующих точек исходного отрезка.
//То есть они не должны быть ссылкой на один и тот же объект, так как это разные объекты (пускай и с одинаковыми координатами).
//Примеры
//<?php
//
//use function App\SegmentFunctions\reverse;
//use App\Point;
//use App\Segment;
//
//$segment = new Segment(new Point(1, 10), new Point(11, -3));
//$reversedSegment = reverse($segment);
//
//$reversedSegment->beginPoint; // (11, -3)
//$reversedSegment->endPoint; // (1, 10)

//tutor's
// function reverse($segment)
// {

//     $beginPoint = $segment->beginPoint;
//     $endPoint = $segment->endPoint;
//     $newEndPoint = new Point($beginPoint->x, $beginPoint->y);
//     $newBeginPoint = new Point($endPoint->x, $endPoint->y);

//     return new Segment($newBeginPoint, $newEndPoint);
// }
