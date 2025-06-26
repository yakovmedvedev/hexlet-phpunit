<?php

namespace Set\Array;

// $coll = ['a',['b',['c' => 10]]];
// $path = ['one', 'two', 'elleven'];
// $value = 5;

function set(array &$coll, array $path, $value): array
{
    $length = count($path);
    $lastIndex = $length - 1;
    $nested = &$coll;
    for ($index = 0; $index < $length; $index++) {
        $key = $path[$index];
        $newValue = $value;
        if ($index !== $lastIndex) {
            $objValue = $nested[$key] ?? null;
            $newValue = is_array($objValue) ? $objValue : [];
        }
        $nested[$key] = $newValue;
        $nested = &$nested[$key];
    }
    print_r($coll);
    return $coll;
}


// function set(array &$coll, array $path, $value) {
//     $current =& $coll;
//     $lastIndex = count($path) - 1;

//     foreach ($path as $key) {
        
//         if (!in_array($key, $current)) {
//             $current[$key] = [];
//         }
//         if ($key === $path[$lastIndex]) {
//             $current[$key] = $value;
//         }

//         $current =& $current[$key];
//     }

//     return $coll;
// }
// // Testing the function
// $coll = [
//     'a' => [
//         'b' => [
//             'c' => 3
//         ]
//     ]
// ];

// set($coll, ['a', 'b', 'c'], 4);
// print_r($coll);

// set($coll, ['x', 'y', 'z'], 5);
// print_r($coll);
// ?>

