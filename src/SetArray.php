<?php

namespace Set\Array;

// $coll = ['a',['b',['c' => 10]]];
// $path = ['one', 'two', 'elleven'];
// $value = 5;


function set(array &$coll, array $path, $value) {
    $current =& $coll;  // Reference to the current position in the collection

    foreach ($path as $key) {
        // If the key does not exist, create an empty array for that key
        if (!isset($current[$key])) {
            $current[$key] = [];
        }

        // Move the reference to the next level down the array
        $current =& $current[$key];
    }

    // Set the value at the last level of the array
    $current = $value;
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

