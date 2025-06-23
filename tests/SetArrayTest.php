<?php

require_once __DIR__ . "/../src/SetArray.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;

class SetFunctionTest extends TestCase
{
    public function testSetExistingPath()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];
        
        set($coll, ['a', 'b', 'c'], 4);
        
        $this->assertSame(4, $coll['a']['b']['c']);
    }

    public function testSetNonExistingPath()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];

        set($coll, ['x', 'y', 'z'], 5);
        
        $this->assertSame(5, $coll['x']['y']['z']);
    }

    public function testSetDeepNest()
    {
        $coll = [];
        
        set($coll, ['level1', 'level2', 'level3'], 'value');
        
        $this->assertSame('value', $coll['level1']['level2']['level3']);
    }

    public function testSetOverwritingExistingValue()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];
        
        set($coll, ['a', 'b', 'c'], 10);
        $this->assertSame(10, $coll['a']['b']['c']);

        set($coll, ['a', 'b', 'c'], 20);
        $this->assertSame(20, $coll['a']['b']['c']);
    }

    public function testSetMultipleValues()
    {
        $coll = [];
        
        set($coll, ['a', 'b'], 'initial');
        
        $this->assertSame('initial', $coll['a']['b']);
        
        set($coll, ['a', 'c'], 'second');
        
        $this->assertSame('second', $coll['a']['c']);
    }

    // Optional: Test that subsequent tests don't affect each other by ensuring the array state is independent
    public function testStateIndependence()
    {
        $coll = [];
        set($coll, ['a'], 'test');
        
        $this->assertSame('test', $coll['a']);
    }
}