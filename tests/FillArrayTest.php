<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/FillArray.php";

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

use function FillArray\fill;

class FillArrayTest extends TestCase
{
    public function testFillArray()
    {
        $coll = [1, 2, 3, 4];
        $value = '*';
        $start = 0;
        $end = count($coll);
        
        $this->assertEquals(['*', '*', '*', '*'], fill($coll, $value, $start, $end));
        $value = '**';
        $start = 4;
        $this->assertEquals(['*', '*', '*', '*'], fill($coll, $value, $start, $end));
        $start = 3;
        $end = 2;
        $value = '**';
        $this->assertEquals(['*', '*', '*', '*'], fill($coll, $value, $start, $end));
        $end = 7;
        $this->assertEquals(['*', '*', '*', '**'], fill($coll, $value, $start, $end));
        $this->assertEquals(['**', '**', '**', '**'], fill($coll, $value));
        $coll = [];
        $this->assertEquals([], fill($coll, $value, $start, $end));
    }
}


//tutor's
//  BEGIN
// class SolutionTest extends TestCase
// {
//     private $coll;

//     public function setUp(): void
//     {
//         $this->coll = [1, 2, 3, 4];
//     }

//     public function testFill1(): void
//     {
//         fill($this->coll, '*', 1, 3);
//         $this->assertEquals([1, '*', '*', 4], $this->coll);
//     }

//     public function testFill2(): void
//     {
//         fill($this->coll, '*');
//         $this->assertEquals(['*', '*', '*', '*'], $this->coll);
//     }

//     public function testFill3(): void
//     {
//         fill($this->coll, '*', 10, 12);
//         $this->assertEquals([1, 2, 3, 4], $this->coll);
//     }

//     public function testFill4(): void
//     {
//         fill($this->coll, '*', 2, 2);
//         $this->assertEquals([1, 2, 3, 4], $this->coll);
//     }

//     public function testFill5(): void
//     {
//         fill($this->coll, '*', 0, 10);
//         $this->assertEquals(['*', '*', '*', '*'], $this->coll);
//     }
// }
// END