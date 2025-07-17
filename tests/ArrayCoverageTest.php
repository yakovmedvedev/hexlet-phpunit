<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ArrayCoverage.php";

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

use function ArrayCoverage\get;
use function ArrayCoverage\indexOf;
use function ArrayCoverage\slice;

class ArrayCoverageTest extends TestCase
{
    public function testGet(): void
    {

        $actual1 = get([1, 2, 3, 4], 2, 'a');
        $this->assertEquals(3, $actual1);

        // BEGIN (write your solution here)
        
        // END
    }

    public function testSlice(): void
    {
        $actual1 = slice([1, 2, 3, 4, 5, 6], 1, 4);
        $this->assertEquals([2, 3, 4], $actual1);
        $actual2 = slice([1, 2, 3, 4, 5, 6], -3, 5);
        $this->assertEquals([4, 5], $actual2);
        $actual3 = slice([1, 2, 3, 4, 5, 6], 0, -5);
        $this->assertEquals(1, count([1, 2, 3, 4, 5, 6]) + (-5));

        // BEGIN (write your solution here)
        
        // END
    }

    public function testIndexOf(): void
    {
        $actual1 = indexOf([2, 1, 3, 2, 4], 2);
        $this->assertEquals(0, $actual1);
        $actual2 = indexOf([], 2);
        $this->assertEquals(-1, $actual2);
        $actual3 = indexOf([2, 1, 3, 2, 4], 7);
        $this->assertEquals(-1, $actual3);
        $actual4 = indexOf([2, 1, 3, 2, 4], 4, -1);
        $this->assertEquals(4, $actual4);

        // BEGIN (write your solution here)
        
        // END
    }
}


// 
// tutor's
// <?php

// namespace App\Tests;

// use PHPUnit\Framework\TestCase;

// use function App\get;
// use function App\indexOf;
// use function App\slice;

// class AppTest extends TestCase
// {
//     public function testGet(): void
//     {

//         $actual1 = get([1, 2, 3, 4], 2, 'a');
//         $this->assertEquals(3, $actual1);

//         // BEGIN
//         $actual2 = get([1, 2, 3, 4], 7, 'a');
//         $this->assertEquals('a', $actual2);

//         $actual3 = get([1, 2, 3, 4], 7);
//         $this->assertNull($actual3);
//         // END
//     }

//     public function testSlice(): void
//     {
//         $actual1 = slice([1, 2, 3, 4, 5, 6], 1, 4);
//         $this->assertEquals([2, 3, 4], $actual1);

//         // BEGIN
//         $actual2 = slice([1, 2, 3, 4, 5, 6], -4, -2);
//         $this->assertEquals([3, 4], $actual2);

//         $this->assertEquals([], slice([]));

//         $actual3 = slice([1, 2, 3, 4], -10, 10);
//         $this->assertEquals([1, 2, 3, 4], $actual3);
//         // END
//     }

//     public function testIndexOf(): void
//     {
//         $actual1 = indexOf([2, 1, 3, 2, 4], 2);
//         $this->assertEquals(0, $actual1);

//         // BEGIN
//         $actual2 = indexOf([1, 2, 3, 2, 4], 2, -3);
//         $this->assertEquals(3, $actual2);

//         $actual3 = indexOf([1, 2, 2], 2, -10);
//         $this->assertEquals(1, $actual3);

//         $actual4 = indexOf([], 0);
//         $this->assertEquals(-1, $actual4);

//         $actual5 = indexOf([1, 2, 3, 2, 4], 5);
//         $this->assertEquals(-1, $actual5);
//         // END
//     }
// }
