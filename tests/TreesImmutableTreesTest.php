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
        $dirrectory = ['name' => 'etc', 'children' => [], 'meta' => [], 'type' => 'directory'];
        $actual = mkdir('etc', [], []);
        $this->assertEquals($actual, $dirrectory);
    }
    public function testMakeFile()
    {
        $file = ['name' => 'bashrc', 'meta' => [], 'type' => 'file'];
        $actual = mkfile('bashrc', []);
        $this->assertEquals($actual, $file);
    }
        public function testMakeTree()
    {
        $tree = [
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
        $actual = makeTree();
        $this->assertEquals($actual, $tree);
    }
}