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
        $end = 2;
        $this->assertEquals(['*', '*', 3, 4], fill($coll, $value, $start, $end));
        $end = 7;
        $this->assertEquals(['*', '*', '*', '*'], fill($coll, $value, $start, $end));
        $start = 8;
        $this->assertEquals(['*', '*', '*', '*'], $coll);
    
        $this->assertEquals(['*', '*', '*', '*'], fill($coll, $value));


    }
}
