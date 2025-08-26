<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesImmutableTrees.php";

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
use function Trees\Immutable\Trees\makeTree;

class TreesImmutableTreesTest extends TestCase
{
    public function testMakeDirrectory()
    {
        $actual = ['name' => 'etc', 'children' => [], 'meta' => [], 'type' => 'directory'];
        $this->assertEquals($actual, mkdir('etc', [], []));
    }
    public function testMakeFile()
    {
        $actual = ['name' => 'bashrc', 'meta' => [], 'type' => 'file'];
        $this->assertEquals($actual, mkfile('bashrc', []));
    }
        public function testMakeTree()
    {
        $actual = [
            'name' => 'etc',
            'children' =>
            [
                [
                    'name' => 'bashrc',
                    'meta' => [],
                    'type' => 'file'
                ],
                [
                    'name' => 'consul',
                    'children' =>
                        [
                            [
                                'name' => 'config.json',
                                'meta' => [], 'type' => 'file'
                            ]
                        ],
                    'meta' => [],
                    'type' => 'directory'
                ]
            ],
            'meta' => ['key' => 'value'],
            'type' => 'directory'
        ];
        $this->assertEquals($actual, makeTree());
    }
}