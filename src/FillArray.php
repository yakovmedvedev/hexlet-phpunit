<?php

namespace FillArray;

$coll =  [1, 2, 3, 4];
$value = '*';
$start = null;
$end = null;
function fill(&$coll, $value, $start, $end)
{
    if ($start > $end || $start > count($coll)) {
        return $coll;
    }
        if ($start === null) {
        $start = 0;
    }
    if ($end > count($coll) || $end === null) {
    $end = count($coll);
    }
    for ($i = $start; $i < $end; $i++) {

        $coll[$i] = $value;
    }
    print_r($coll);
    return $coll;
}
fill($coll, $value, $start, $end);