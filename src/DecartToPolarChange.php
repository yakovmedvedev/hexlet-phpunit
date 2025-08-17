<?php

namespace DecartToPolarChange;

function makePoint($x, $y)
{
    // конвертация
    return [
// <<<<<<< HEAD
//         'angle' => atan2($y, $x),
//         'radius' => sqrt($x ** 2 + $y ** 2)
// =======
        'angle' => round(atan2($y, $x), 2),
        'radius' => round(sqrt($x ** 2 + $y ** 2), 2)
// >>>>>>> 321f0d172b3425d74684b5f7fbf5cb4789f30f45
    ];

}
$point = makePoint(5, 8);
print_r($point);

function getX($point)
{
// <<<<<<< HEAD
//     return $point['radius'] * cos($point['angle']);
// =======
    return round($point['radius'] * cos($point['angle']));
// >>>>>>> 321f0d172b3425d74684b5f7fbf5cb4789f30f45
}
print_r(getX($point));

function getY($point)
{
// <<<<<<< HEAD
//     return $point['radius'] * sin($point['angle']);
// =======
    return round($point['radius'] * sin($point['angle']));
// >>>>>>> 321f0d172b3425d74684b5f7fbf5cb4789f30f45
}
print_r(getY($point));
