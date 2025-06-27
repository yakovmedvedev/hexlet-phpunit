<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/CalcRect.php";

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

use function Calc\Rect\calculateRectangleArea;

class CalcRectTest extends TestCase
{
    private $length;
    private $width;

    protected function setUp(): void
    {
        // $this->length = ;
        // $this->width = ;
    }
        public static function dimentionsProvider(): array
    {
        return [
            // Valid dimensions
            [2, 3, 6],    // Expected area: 2 * 3
            [5, 10, 50],  // Expected area: 5 * 10
            [1, 1, 1],    // Expected area: 1 * 1
            [7, 4, 28],   // Expected area: 7 * 4
            
            // Invalid dimensions
            [-2, 3, null], // Expected area: Invalid dimensions
            [2, -3, null], // Expected area: Invalid dimensions
            [0, 5, null],  // Expected area: Invalid dimensions
            [5, 0, null],  // Expected area: Invalid dimensions
        ];
    }
    #[DataProvider('dimentionsProvider')]
    public function testCalculateRectangleArea($length, $width, $expected)
    {
        $result = calculateRectangleArea($length, $width);
        $this->assertEquals($expected, $result);
    }
}