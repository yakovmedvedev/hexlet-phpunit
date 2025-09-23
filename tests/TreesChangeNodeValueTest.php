<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesChangeNodeValue.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Functional;
use PHPUnit\Framework\Attributes\DataProvider;

use function Trees\Change\Node\Value\changeClass;

class TreesChangeNodeValueTest extends TestCase
{
    public function testChangeClass1()
    {
        $htmlTree = [
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

        $expected = [
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
                            'className' => 'new-class',
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

        $clonedTree = array();
        $clonedTree = $htmlTree;
        $this->assertEquals($expected, changeClass($htmlTree, 'hexlet-community', 'new-class'));
    }
}
