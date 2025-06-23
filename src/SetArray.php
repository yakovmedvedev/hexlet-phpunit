<?php

namespace Set\Array;

$coll = [];
$path = ['a', 'b', 'c'];
$value = 5;
function set(array &$coll, array $path, $value) {
    $ref =& $coll;

    foreach ($path as $key) {
        if (!isset($ref[$key])) {
            $ref[$key] = [];
        }
        $ref =& $ref[$key];
    }
    $ref = $value;
    print_r($coll);
}
print_r(set($coll, $path, $value));

