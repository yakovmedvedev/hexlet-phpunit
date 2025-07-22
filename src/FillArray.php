<?php

namespace FillArray;

$coll =  [1, 2, 3, 4];
$value = '*';

function fill(array &$coll, $value, $start = 0, $end = null)
{
    if ($start > $end || $start > count($coll)) {
        return $coll;
    }
        if ($start === null) {
        $start = 0;
    }
    if ($end > count($coll)) {
    $end = count($coll);
    }
    $realEnd = $end ?? count($coll);
    for ($i = $start; $i < $realEnd; $i++) {

        $coll[$i] = $value;
    }
    print_r($coll);
    return $coll;
}
fill($coll, $value);
print_r($coll);
fill($coll, $value = '#', $start = 2, $end = 20);
print_r($coll);
fill($coll, $value, $start = 20);
print_r($coll);