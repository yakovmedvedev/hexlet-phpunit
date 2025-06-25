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
        // Initialize the collection before each test
        $this->coll = [
            'a' => [
                'b' => [
                    'c' => 3,
                ],
            ],
        ];
    }

    public function testSetExistingPath()
    {
        set($this->coll, ['a', 'b', 'c'], 4);
        $this->assertEquals(4, $this->coll['a']['b']['c']);
    }

    public function testSetNewPath()
    {
        set($this->coll, ['x', 'y', 'z'], 5);
        $this->assertEquals(5, $this->coll['x']['y']['z']);
    }

    public function testAddAnotherNestedPath()
    {
        set($this->coll, ['a', 'd'], 6);
        $this->assertEquals(6, $this->coll['a']['d']);
    }

    public function testOverwriteExistingPath()
    {
        set($this->coll, ['a', 'b'], 7);
        $this->assertEquals(7, $this->coll['a']['b']);
        // Ensure 'b' has been replaced and does not hold 'c' under it anymore
        $this->assertArrayNotHasKey('c', $this->coll['a']);
    }

    public function testDeepNestedPath()
    {
        set($this->coll, ['a', 'b', 'd', 'e', 'f'], 8);
        $this->assertEquals(8, $this->coll['a']['b']['d']['e']['f']);
    }

    // Example negative test case
    public function testInvalidOverwrite()
    {
        set($this->coll, ['a', 'b'], 9);
        $this->assertNotEquals(3, $this->coll['a']['b']); // Asserting that it is not the old value
    }

    public function testThatNonExistentKeyDoesNotThrowError()
    {
        $this->assertArrayNotHasKey('nonexistent', $this->coll);
        // This next line is actually not checking an error, it's merely setting it, it should pass
        set($this->coll, ['nonexistent', 'key'], 'value');
        $this->assertEquals('value', $this->coll['nonexistent']['key']);
    }
}