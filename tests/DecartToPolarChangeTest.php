<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/DecartToPolarChange.php";

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

use function DecartToPolarChange\makePoint;
use function DecartToPolarChange\getX;
use function DecartToPolarChange\getY;

class DecartToPolarChangeTest extends TestCase
{
    private $x;
    private $y;

    public function setUp(): void
    {
        $this->x = 5;
        $this->y = 8;
    }
    public function testMakePolarPoint()
    {
        $decartPoint = makePoint($this->x, $this->y);
        $this->assertEquals(['angle' => 1.01, 'radius' => 9.43], $decartPoint);
    }
    public function testGetXPointInDecartSystem()
    {
        $this->assertEquals(getX(makePoint($this->x, $this->y)), 5);
    }
    public function testGetYPointInDecartSystem()
    {
        $this->assertEquals(round(getY(makePoint($this->x, $this->y))), 8);
    }
}