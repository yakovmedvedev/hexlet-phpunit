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
        $start = null;
        $this->assertEquals(['**', '**', '**', '**'], fill($coll, $value, $start, $end));
        $coll = [];
        $this->assertEquals([], fill($coll, $value, $start, $end));
    }
    //     public function testFillFullDefault()
    // {
    //     $coll = [1, 2, 3, 4];
    //     fill($coll, '*');
    //     $this->assertEquals(['*', '*', '*', '*'], $coll);
    // }
}
