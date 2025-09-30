<?php

namespace Hexlet\Phpunit\Tests;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\SegmentPrivate;
use PHPUnit\Framework\TestCase;

class ClassesSegmentPrivateVarsTest extends TestCase
{
    public function testBeginPointIsPrivate()
    {
        $this->expectException(\Error::class);
        $segment = new SegmentPrivate(3, 9);
        $segment->beginPoint;
    }

    public function testEndPointIsPrivate()
    {
        $this->expectException(\Error::class);
        $segment = new SegmentPrivate(3, 9);
        $segment->endPoint;
    }

    public function testPrecisePoints()
    {
        $segment = new SegmentPrivate(3, 9);
        $this->assertEquals(3, $segment->getBeginPoint());
        $this->assertEquals(9, $segment->getEndPoint());
    }
}
