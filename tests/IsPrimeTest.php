<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/IsPrime.php";

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

use function Is\Prime\isPrime;

class IsPrimeTest extends TestCase
{
    private $number;

    protected function setUp(): void
    {
        $this->number = 0;
    }
        public static function numbersProvider(): array
    {
        return [
            [-1, false],
            [0, false],
            [1, false],
            [2, true],
            [3, true],
            [4, false],
            [5, true],
            [6, false],
            [7, true],
            [8, false],
            [9, false],
            [10, false],
            [11, true],
            [13, true],
            [15, false],
            [17, true],
            [19, true],
            [20, false],
            [23, true],
            [24, false],
            [25, false],
            [29, true],
            [100, false],
            [101, true],
            [121, false],
            [127, true],
        ];
    }
    #[DataProvider('numbersProvider')]
    public function testIsPrime($number, $expected)
    {
        $result = isPrime($number);
        $this->assertEquals($expected, $result);
    }
}