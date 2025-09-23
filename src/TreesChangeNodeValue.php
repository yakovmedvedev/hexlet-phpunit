<?php

namespace Trees\Change\Node\Value;

$tree = [
    'name' => 'div',
    'type' => 'tag-internal',
    'className' => 'hexlet-community',
    'children' => [
        [
            'name' => 'div',
            'type' => 'tag-internal',
            'className' => 'old-class',
            'children' => [],
        ],
        [
            'name' => 'div',
            'type' => 'tag-internal',
            'className' => 'old-class',
            'children' => [],
        ],
    ],
];
//print_r($tree);

function changeClass($tree, $oldClass, $newClass)
{
    // Make a copy of the node
//    $result = $tree;

    // If className matches, update it
    if (isset($tree['className']) && $tree['className'] === $oldClass) {
        $tree['className'] = $newClass;
    }

    // Recursively process children, if any
    if (isset($tree['children']) && is_array($tree['children'])) {
        $tree['children'] = array_map(function($child) use ($oldClass, $newClass) {
            return changeClass($child, $oldClass, $newClass);
        }, $tree['children']);
    }

    return $tree;
}




$result = changeClass($tree, 'hexlet-community', 'new-class');
print_r($result);

//Реализуйте функцию changeClass, которая принимает на вход html-дерево и заменяет во всех узлах переданное имя класса
//на новое. Имена классов передаются через параметры.
// Результат:
// [
//     'name' => 'div',
//     'type' => 'tag-internal',
//     'className' => 'hexlet-community',
//     'children' => [
//         [
//             'name' => 'div',
//             'type' => 'tag-internal',
//             'className' => 'new-class',
//             'children' => [],
//         ],
//         [
//             'name' => 'div',
//             'type' => 'tag-internal',
//             'className' => 'new-class',
//             'children' => [],
//         ],
//     ],
// ]
