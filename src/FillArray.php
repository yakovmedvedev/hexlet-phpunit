<?php

namespace FillArray;

$coll =  [1, 2, 3, 4];
$value = '*';
$start = 0;
$end = 2;
function fill(&$coll, $value, $start, $end)
{
    if ($start > $end || $start > count($coll)) {
        return $coll;
    }
    if ($end > count($coll)) {
    $end = count($coll);
    }
    for ($i = $start; $i < $end; $i++) {

        $coll[$i] = $value;
    }
    print_r($coll);
    return $coll;
}
fill($coll, $value, $start, $end);