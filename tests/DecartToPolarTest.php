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

class DecartToPolarTest extends TestCase
{
    private $x = 5;
    private $y = 8;

    public function setUp(): void
    {
        $this->x;
        $this->y;
    }
    public function testMakePointInPolarSystem()
    {
        $this->assertEquals(makePoint($this->x, $this->y), ['angle' => 1.0121970114513341, 'radius' => 9.433981132056603]);
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