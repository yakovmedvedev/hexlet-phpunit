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

class SetFunctionTest extends TestCase
{
    // Test setting a value at an existing nested path
    public function testSetExistingPath()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];
        
        // Calling set() to change the value of 'c' to 4
        set($coll, ['a', 'b', 'c'], 4);
        
        // Assert that the value was updated correctly
        $this->assertSame(4, $coll['a']['b']['c']);
    }

    // Test setting a value at a non-existing path
    public function testSetNonExistingPath()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];

        // Setting a value in a new nested path
        set($coll, ['x', 'y', 'z'], 5);
        
        // Assert that the new values are set as expected
        $this->assertSame(5, $coll['x']['y']['z']);
    }

    // Test setting a value at a deep nested path
    public function testSetDeepNest()
    {
        $coll = [];
        
        // Set a value deep in the array
        set($coll, ['level1', 'level2', 'level3'], 'value');
        
        // Confirm the deep value was set correctly
        $this->assertSame('value', $coll['level1']['level2']['level3']);
    }

    // Test overwriting an existing value
    public function testSetOverwritingExistingValue()
    {
        $coll = [
            'a' => [
                'b' => [
                    'c' => 3
                ]
            ]
        ];
        
        // Update existing nested value
        set($coll, ['a', 'b', 'c'], 10);
        $this->assertSame(10, $coll['a']['b']['c']);

        // Overwrite the value again
        set($coll, ['a', 'b', 'c'], 20);
        $this->assertSame(20, $coll['a']['b']['c']);
    }

    // Test setting multiple values in various paths
    public function testSetMultipleValues()
    {
        $coll = [];
        
        // Set initial value
        set($coll, ['a', 'b'], 'initial');
        
        // Confirm the initial value was set correctly
        $this->assertSame('initial', $coll['a']['b']);
        
        // Set another value at a different path
        set($coll, ['a', 'c'], 'second');
        
        // Check that the second value is as expected
        $this->assertSame('second', $coll['a']['c']);
    }

    // Test that state is independent between tests
    public function testStateIndependence()
    {
        $coll = [];
        
        // Set a value independent of other tests
        set($coll, ['a'], 'test');
        
        // Verify its outcome
        $this->assertSame('test', $coll['a']);
    }
}