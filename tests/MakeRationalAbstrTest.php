<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/MakeRationalAbstr.php";

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

use function Make\Rational\Abstr\gcd;
use function Make\Rational\Abstr\lcm;
use function Make\Rational\Abstr\makeRational;
use function Make\Rational\Abstr\getNum;
use function Make\Rational\Abstr\getDenom;
use function Make\Rational\Abstr\add;
use function Make\Rational\Abstr\sub;
use function Make\Rational\Abstr\ratToString;

class MakeRationalAbstrTest extends TestCase
{
    private $x;
    private $y;
    private $a;
    private $b;

    public function setUp(): void
    {
        $this->x = 6;
        $this->y = 8;
        $this->a = 2;
        $this->b = -9;
    }
    public function testGcd()
    {
        // $x = 6;
        // $y = 8;
        $this->assertEquals(2, gcd($this->x, $this->y));
    }
    public function testLcm()
    {
        // $x = 6;
        // $y = 8;
        $this->assertEquals(24, lcm($this->x, $this->y));
    }
    public function testMakeRational()
    {
        $this->assertEquals(['num' => 3, 'denom' => 4], makeRational($this->x, $this->y));
    }
    public function testIfNegativeDenom()
    {
        $this->assertEquals(['num' => -2, 'denom' => 9], makeRational($this->a, $this->b));
    }
    public function testGetNum()
    {
        $this->assertEquals(3, getNum(makeRational($this->x, $this->y)));
    }
    public function testGetDenom()
    {
        $this->assertEquals(4, getDenom(makeRational($this->x, $this->y)));
    }
    public function testCommonDenom()
    {
        $this->assertEquals(36, lcm(getDenom(makeRational($this->x, $this->y)), getDenom(makeRational($this->a, $this->b))));
    }
    public function testAdd()
    {
        $this->assertEquals(['num' => 19, 'denom' => 36], add(makeRational($this->x, $this->y), makeRational($this->a, $this->b)));
    }
        public function testSub()
    {
        $this->assertEquals(['num' => 35, 'denom' => 36], sub(makeRational($this->x, $this->y), makeRational($this->a, $this->b)));
    }
    public function testRatToString()
    {
        $this->assertEquals('3/4', ratToString(makeRational($this->x, $this->y)));
    }
}