<?php

function removeFirstLevel($array) {
    $result = [];

    foreach ($array as $item) {
        // If the item is an array, merge its values into the result
        if (is_array($item)) {
            $result = array_merge($result, removeFirstLevel($item)); // Recursively flatten
        }
    }

    // Now, append all the values from the first level that are arrays to the result
    foreach ($array as $item) {
        if (is_array($item)) {
            foreach ($item as $nestedItem) {
                $result[] = $nestedItem; // Collect each item from the nested arrays
            }
        }
    }

    return $result;
}

// Example usage
$tree1 = [[5], 1, [3, 4]];
$flattenedArray = removeFirstLevel($tree1);
print_r($flattenedArray); // Output: [5, 3, 4]