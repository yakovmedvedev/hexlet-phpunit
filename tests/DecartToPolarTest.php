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
    private $x;
    private $y;

    public function setUp(): void
    {
        $this->x = 5;
        $this->y = 8;
    }
    public function testMakePoint()
    {
        $this->assertEquals([
    ['angle' => 1.0121970114513],
    ['radius' => 9.4339811320566]
        ], makePoint($this->x, $this->y));
    }
}