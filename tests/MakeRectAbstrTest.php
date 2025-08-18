<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/MakeRectAbstr.php";

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

use function ReverseString\reverseString;

class MakeRectAbstrTest extends TestCase
{
    private $x;
    private $y;
    private $width;
    private $height;

    public function setUp(): void
    {
        $this->x = -1;
        $this->y = 1;
        $this->width = 4;
        $this->height = 5;
    }
    public function testMakeDecartPoint()
    {
        $this->assertEquals(['x' => -1, 'y' => 1], makeDecartPoint($this->x, $this->y));
    }
    public function testMakeRectangle()
    {
        $this->assertEquals(['topLeft' => ['x' => -1, 'y' => 1], 'width' => 4, 'height' => 5], makeRectangle(makeDecartPoint($this->x, $this->y), $this->width, $this->height));
    }
    public function testGetStartPoint()
    {
        $this->assertEquals(['x' => -1, 'y' => 1], getStartPoint(makeRectangle(makeDecartPoint($this->x, $this->y), $this->width, $this->height)));
    }
    public function testGetWidth()
    {
        $this->assertEquals(4, getWidth(makeRectangle(makeDecartPoint($this->x, $this->y), $this->width, $this->height)));
    }
    public function testGetHeight()
    {
        $this->assertEquals(5, getHeight(makeRectangle(makeDecartPoint($this->x, $this->y), $this->width, $this->height)));
    }
    public function testContainsOrigin()
    {
        $rectangle = makeRectangle(makeDecartPoint($this->x, $this->y), $this->width, $this->height);
        
        $this->assertTrue(containsOrigin($rectangle));
    }
}