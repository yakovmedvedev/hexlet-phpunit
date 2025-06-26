<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/SetArray.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;

use function Set\Array\set;

class SetArrayTest extends TestCase
{
    private $coll;

    protected function setUp(): void
    {
        $this->coll = [];
    }

    public function testSetExistingPath()
    {
        $coll = ['a' => ['b' => ['c' => 3]]];
        set($coll, ['a', 'b', 'c'], 4);
        $this->assertEquals(['a' => ['b' => ['c' => 4]]], $coll);
    }

    public function testSetNewPath()
    {
        $coll = ['a' => ['b' => ['c' => 3]]];
        set($coll, ['x', 'y', 'z'], 5);
        $this->assertEquals(
            [
                'a' => ['b' => ['c' => 3]],
                'x' => ['y' => ['z' => 5]],
            ], 
            $coll
        );
    }

    public function testSetComplexPath()
    {
        $coll = ['a' => ['b' => ['c' => 3]]];
        set($coll, ['a', 'b', 'd'], 6);
        $this->assertEquals(
            [
                'a' => [
                    'b' => [
                        'c' => 3,
                        'd' => 6,
                    ],
                ],
            ], 
            $coll
        );
    }

    public function testSetDeepNestedPath()
    {
        $coll = [];
        set($coll, ['a', 'b', 'c', 'd'], 8);
        $this->assertEquals(['a' => ['b' => ['c' => ['d' => 8,],],],], $coll);
    }

    public function testSetOverwriteExistingValue()
    {
        $coll = ['a' => ['b' => ['c' => 3]]];
        set($coll, ['a', 'b', 'c'], 10);
        $this->assertEquals(['a' => ['b' => ['c' => 10]]], $coll);
    }
}