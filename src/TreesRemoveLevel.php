<?php

namespace Trees\Remove\Level;

function removeFirstLevel($array) {

    $result = [];

    foreach ($array as $item) {
        if (is_array($item)) {
            foreach ($item as $nestedItem) {
                $result[] = $nestedItem;
            }
        }
    }

    return $result;
}

//tutor's
//function removeFirstLevel($tree)
//{
//    $nodes = array_filter($tree, fn($node) => is_array($node));
//    return array_merge(...$nodes);
//}