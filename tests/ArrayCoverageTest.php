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
