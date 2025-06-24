<?php

namespace Set\Array;

// $coll = ['a',['b',['c' => 10]]];
// $path = ['one', 'two', 'elleven'];
// $value = 5;
function set(array &$coll, array $path, $value) {
    $ref =& $coll;

    foreach ($path as $key) {
        if (!isset($ref[$key])) {
            $ref[$key] = [1];
        }
        $ref =& $ref[$key];
    }
    $ref = $value;
    print_r($coll);
}
// print_r(set($coll, $path, $value));

