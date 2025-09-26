<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ClassesConstructor.php";

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
use App\Segment;
use App\Point;

use function App\Classes\Constructor\reverse;

class ClassesConstructorTest extends TestCase
{
    public function testReverse()
    {
        $point1 = new Point(1, 10);
        $point2 = new Point(11, -3);
        $segment = new Segment($point1, $point2);
        $reversedSegment = reverse($segment);

        $this->assertEquals($point2, $reversedSegment->beginPoint);
        $this->assertNotSame($point2, $reversedSegment->beginPoint);

        $this->assertEquals($point1, $reversedSegment->endPoint);
        $this->assertNotSame($point1, $reversedSegment->endPoint);
    }

    public function testReverse2()
    {
        $point1 = new Point(1, 10);
        $point2 = new Point(11, -3);
        $segment = new Segment($point2, $point1);
        $reversedSegment = reverse($segment);

        $this->assertEquals($point1, $reversedSegment->beginPoint);
        $this->assertNotSame($point1, $reversedSegment->beginPoint);

        $this->assertEquals($point2, $reversedSegment->endPoint);
        $this->assertNotSame($point2, $reversedSegment->endPoint);
    }
}
