<?php

namespace FillArray;

$coll =  [1, 2, 3, 4];
$value = '*';

function fill(array &$coll, $value, $start = 0, $end = null)
{
    if ($start > $end || $start > count($coll)) {
        return $coll;
    }

    $realStart = $start ?? 0;

    if ($end > count($coll)) {
    $end = count($coll);
    }

    $realEnd = $end ?? count($coll);

    for ($i = $realStart; $i < $realEnd; $i++) {
        $coll[$i] = $value;
    }
    print_r($coll);
    return $coll;
}
// fill($coll, $value, $start, $end);

// tutor's
// BEGIN
// function fill(&$coll, $value, $begin = 0, $end = null)
// {
//     $length = count($coll);
//     $end = $end ?? $length;
//     $normalizedBegin = $begin >= $end ? $end : $begin;
//     $normalizedEnd = $end >= $length ? $length : $end;
//     for ($i = $normalizedBegin; $i < $normalizedEnd; $i++) {
//         $coll[$i] = $value;
//     }
// }
// END