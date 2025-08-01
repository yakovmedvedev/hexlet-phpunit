<?php

namespace DecartToPolarChange;

function makePoint($x, $y)
{
    // конвертация
    return [
        'angle' => atan2($y, $x),
        'radius' => sqrt($x ** 2 + $y ** 2)
    ];

}
$point = makePoint(5, 8);
print_r($point);

function getX($point)
{
    return $point['radius'] * cos($point['angle']);
}
print_r(getX($point));

function getY($point)
{
    return $point['radius'] * sin($point['angle']);
}
print_r(getY($point));
