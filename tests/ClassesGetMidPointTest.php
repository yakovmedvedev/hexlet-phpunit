<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ClassesGetMidPoint.php";

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
use App\Point1;

use function App\Classes\Get\Mid\Point\getMidpoint;

class ClassesGetMidPointTest extends TestCase
{
    public function testGetMidpoint1()
    {
        $point1 = new Point1();
        $point1->x = 1;
        $point1->y = 10;
        $point2 = new Point1();
        $point2->x = 10;
        $point2->y = 1;

        $midpoint = getMidpoint($point1, $point2);
        $this->assertEquals(5.5, $midpoint->x);
        $this->assertEquals(5.5, $midpoint->y);
    }
    public function testGetMidpoint2()
    {
        $point1 = new Point1();
        $point1->x = 0;
        $point1->y = 0;
        $point2 = new Point1();
        $point2->x = 4;
        $point2->y = -2;

        $midpoint = getMidpoint($point1, $point2);
        $this->assertEquals(2, $midpoint->x);
        $this->assertEquals(-1, $midpoint->y);
    }
}
