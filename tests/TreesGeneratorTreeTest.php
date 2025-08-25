<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesGeneratorTree.php";

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

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\map;

class TreesGeneratorTreeTest extends TestCase
{
    public function testGenerator()
    {
        $tree = [
            'name' => 'php-package',
            'children' => [
                ['name' => 'Makefile', 'meta' => [], 'type' => 'file'],
                ['name' => 'README.md', 'meta' => [], 'type' => 'file'],
                [
                    'name' => 'dist',
                    'children' => [],
                    'meta' => [],
                    'type' => 'directory'
                ],
                [
                    'name' => 'tests',
                    'children' => [
                        [
                            'name' => 'test.php',
                            'meta' => ['type' => 'text/php'],
                            'type' => 'file'
                        ]
                    ],
                    'meta' => [],
                    'type' => 'directory'
                ],
                [
                    'name' => 'src',
                    'children' => [
                        [
                            'name' => 'index.php',
                            'meta' => ['type' => 'text/php'],
                            'type' => 'file'
                        ]
                    ],
                    'meta' => [],
                    'type' => 'directory'
                ],
                [
                    'name' => 'phpunit.xml',
                    'meta' => ['type' => 'text/xml'],
                    'type' => 'file'
                ],
                [
                    'name' => 'assets',
                    'children' => [
                        [
                            'name' => 'util',
                            'children' => [
                                [
                                    'name' => 'cli',
                                    'children' => [
                                        [
                                            'name' => 'LICENSE',
                                            'meta' => [],
                                            'type' => 'file'
                                        ]
                                    ],
                                    'meta' => [],
                                    'type' => 'directory'
                                ]
                            ],
                            'meta' => [],
                            'type' => 'directory'
                        ]
                    ],
                    'meta' => ['owner' => 'root', 'hidden' => false],
                    'type' => 'directory'
                ]
            ],
            'meta' => ['hidden' => true],
            'type' => 'directory'
        ];

        $actual = generator();

        $this->assertEquals($tree, $actual);
    }
}
