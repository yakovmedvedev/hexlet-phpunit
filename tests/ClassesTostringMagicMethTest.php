<?php

namespace Hexlet\Phpunit\Tests;

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
use App\Classes\Point;
use App\Classes\Segment;

class ClassesTostringMagicMethTest extends TestCase
{
    public function testReverse()
    {
        $point1 = new Point(1, 10);
        $point2 = new Point(11, -3);
        $segment1 = new Segment($point1, $point2);
        $this->assertEquals('[(1, 10), (11, -3)]', "{$segment1}");

        $segment2 = new Segment($point2, $point1);
        $this->assertEquals('[(11, -3), (1, 10)]', "{$segment2}");
    }
}