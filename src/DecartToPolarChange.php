<?php

namespace DecartToPolarChange;

function makePoint($x, $y)
{
    // конвертация
    return [
        'angle' => round(atan2($y, $x), 2),
        'radius' => round(sqrt($x ** 2 + $y ** 2), 2)
    ];

}
$point = makePoint(5, 8);
print_r($point);

function getX($point)
{
    return round($point['radius'] * cos($point['angle']));
}
print_r(getX($point));

function getY($point)
{
    return round($point['radius'] * sin($point['angle']));
}
print_r(getY($point));
