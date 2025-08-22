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

// Explanation:
// First Iteration: The first foreach loop checks each item in the original array. If the item is an array, it recursively merges items from the nested structure into the result.

// Second Iteration: The second foreach loop goes over the original array again. This time, it specifically checks for arrays and collects their values directly into the result, which effectively removes any root-level scalar values.

// Merge Results: The final output contains all elements from nested arrays, excluding the first-level non-array values.

// With the provided input, this code should return the desired output of [5, 3, 4].