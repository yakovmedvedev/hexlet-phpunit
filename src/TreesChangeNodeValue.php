<?php

namespace Trees\Change\Node\Value;

$tree = [
    'name' => 'html',
    'type' => 'tag-internal',
    'children' => [
        [
            'name' => 'body',
            'type' => 'tag-internal',
            'children' => [
                [
                    'name' => 'h1',
                    'type' => 'tag-internal',
                    'children' => [
                        [
                            'name' => '',
                            'type' => 'text',
                            'content' => 'Сообщество',
                        ],
                    ],
                ],
                [
                    'name' => 'p',
                    'type' => 'tag-internal',
                    'children' => [
                        [
                            'type' => 'text',
                            'content' => 'Общение между пользователями Хекслета',
                        ],
                    ],
                ],
                [
                    'name' => 'hr',
                    'type' => 'tag-leaf',
                ],
                [
                    'name' => 'input',
                    'type' => 'tag-leaf',
                ],
                [
                    'name' => 'div',
                    'type' => 'tag-internal',
                    'className' => 'hexlet-community',
                    'children' => [
                        [
                            'name' => 'div',
                            'type' => 'tag-internal',
                            'className' => 'text-xs-center',
                            'children' => [],
                        ],
                        [
                            'name' => 'div',
                            'type' => 'tag-internal',
                            'className' => 'fa fa-spinner',
                            'children' => [],
                        ],
                    ],
                ],
            ],
        ],
    ],
];


//function changeClass(array $tree, string $old, string $new): array
//{
//    if (isset($tree['className']) && $old == $tree['className']) {
//        $tree['className'] = $new;
//    }
//    if (isset($tree['children'])) {
//        $tree['children'] = array_map(fn ($item) => changeClass($item, $old, $new), $tree['children']);
//    }
//    return $tree;
//}

function changeClass(array $tree, string $oldClass, string $newClass): array
{
    array_key_exists('className', $tree) && $tree['className'] === $oldClass ? $tree['className'] = $newClass : $tree;

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

//tutor's
// function changeClass($node, $classNameFrom, $classNameTo) {
//   if (array_key_exists('className', $node)) {
//     $className = $node['className'];
//     $newClassName = $classNameFrom === $className ? $classNameTo : $className;
//     $node['className'] = $newClassName;
//   }
//   if ($node['type'] === 'tag-internal') {
//     $newChildren = array_map(fn($item) => changeClass($item, $classNameFrom, $classNameTo), $node['children']);
//     $node['children'] = $newChildren;
//   }

//   return $node;
// };
