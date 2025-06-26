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

    public function testSetSingleValue()
    {
        $path = ['a'];
        $value = 'value1';

        set($this->coll, $path, $value);

        $this->assertEquals(['a' => 'value1'], $this->coll);
    }

    public function testSetExistingValue()
    {
        $this->coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];

        set($this->coll, ['a', 'b', 'c'], 4);

        $this->assertEquals(['a' => ['b' => ['c' => 4]]], $this->coll);
    }

    public function testSetNewNestedValue()
    {
        $this->coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];

        set($this->coll, ['x', 'y', 'z'], 5);

        $this->assertEquals([
            'a' => ['b' => ['c' => 3]],
            'x' => ['y' => ['z' => 5]],
        ], $this->coll);
    }

    public function testSetMultipleLevels()
    {
        $this->coll = [];

        set($this->coll, ['x', 'y', 'z'], 'deepValue');

        $this->assertEquals(['x' => ['y' => ['z' => 'deepValue']]], $this->coll);
    }

    public function testSetWithExistingStructure()
    {
        // Setting initial structure with 'three' as an empty array
        $this->coll = [
            'one' => [
                'two' => [
                    'three' => []
                ]
            ]
        ];
        
        set($this->coll, ['one', 'two', 'three', 'four'], 'newValue');

        $this->assertEquals(['one' => ['two' => ['three' => ['four' => 'newValue']]]], $this->coll);
    }

    public function testSetWithEmptyPath()
    {
        $path = [];
        $value = 'value';

        set($this->coll, $path, $value);

        // Since the path is empty, the structure should stay empty
        $this->assertEquals([], $this->coll);
    }
}