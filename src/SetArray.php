<?php

namespace Set\Array;

// $coll = ['a',['b',['c' => 10]]];
// $path = ['one', 'two', 'elleven'];
// $value = 5;


function set(array &$coll, array $path, $value) {
    $current =& $coll;
    $lastIndex = count($path) - 1;

    foreach ($path as $key) {
        
        if (!in_array($key, $current)) {
            $current[$key] = [];
        }
        if ($key === $path[$lastIndex]) {
            $current[$key] = $value;
        }

        $current =& $current[$key];
    }

    return $coll;
}
// Testing the function
$coll = [
    'a' => [
        'b' => [
            'c' => 3
        ]
    ]
];

set($coll, ['a', 'b', 'c'], 4);
print_r($coll);

set($coll, ['x', 'y', 'z'], 5);
print_r($coll);
?>

