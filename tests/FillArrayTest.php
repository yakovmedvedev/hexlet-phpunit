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
    private $coll;
    
    public function setUp(): void
    {
        $this->coll = [1, 2, 3, 4];
    }
    public function testFillArray1(): void
    {
        fill($this->coll, '*', 0, 4);
        $this->assertEquals(['*', '*', '*', '*'], $this->coll);
    }
    public function testFillArray2(): void
    {
        fill($this->coll, '*', 4, 4);
        $this->assertEquals([1, 2, 3, 4], $this->coll);
    }
    public function testFillArray3(): void
    {
        fill($this->coll, '*', 3, 2);
        $this->assertEquals([1, 2, 3, 4], $this->coll);
    }
    public function testFillArray4(): void
    {
        fill($this->coll, '*', 3, 7);
        $this->assertEquals([1, 2, 3, '*'], $this->coll);
    }
    public function testFillArray5(): void
    {
        fill($this->coll, '*');
        $this->assertEquals(['*', '*', '*', '*'], $this->coll);
    }
    // public function testFillArray6(): void
    // {
    //     $coll = [];
    //     $this->assertEquals([], $this->coll);
    // }
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