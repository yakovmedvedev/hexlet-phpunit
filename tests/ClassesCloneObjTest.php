<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ClassesCloneObj.php";

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

use function App\Classes\Clone\Obj\dup;

class ClassesCloneObjTest extends TestCase
{
    public function testDup()
    {
        $point1 = new Point1();
        $point1->x = 3;
        $point1->y = 5;
        $point2 = dup($point1);

        $this->assertEquals(3, $point2->x);
        $this->assertEquals(5, $point2->y);
        $this->assertTrue($point1 == $point2);
        $this->assertFalse($point1 === $point2);
    }
}
