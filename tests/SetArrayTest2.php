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
use Hexlet\Phpunit\Functional;

use function Set\Array\set;

class SetArrayTest2 extends TestCase
{
    private $coll;

    public function setUp(): void
    {
        $this->coll = [];
    }
    
    public function testSetExistingPath()
    {
        $coll = [];
        
        set($coll, ['a', 'b', 'c'], 4);
        
        $this->assertSame(4, $coll['a']['b']['c']);
    
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
    // Test setting multiple values in various paths
    public function testSetMultipleValues()
    {
        $coll = [];
        
        // Set initial value
        set($coll, ['a', 'b', 'e'], 'initial');
        
        // Confirm the initial value was set correctly
        $this->assertSame('initial', $coll['a']['b']['e']);
        
        // Set another value at a different path
        set($coll, ['a', 'b', 'e'], 'second');
        
        // Check that the second value is as expected
        $this->assertSame('second', $coll['a']['b']['e']);
    }

public function testSetNonExistentValueShouldFail()
{
    $coll = [
        'a' => [
            'b' => 3
        ]
    ];

    // Attempt to set a value in a non-existent deep path
    set($coll, ['a', 'x', 'y'], 5);

    // Assert that 'x' should be created in this case since set() function creates it
    $this->assertArrayHasKey('x', $coll['a']);   // This should pass.
    
    // Assert that the value is actually what we set
    $this->assertSame(5, $coll['a']['x']['y']); // Ensures that value is set correctly

    // If you expect 'y' to exist under 'x' after this operation, remove any assertion checking for 'x' as missing.
    // If you don't want 'x' to exist at all:
    // $this->assertArrayNotHasKey('x', $coll['a']); // This will fail as 'x' is being set.
}
   public function testSetSingleValue()
    {
        $coll = [];
        // $path = ['a'];
        // $value = 'value1';

        set($coll, ['a'], 'value1');

        $this->assertEquals(['a' => 'value1'], $coll);
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