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
use App\Classes\Time;

class ClassesStaticMethodTest extends TestCase
{
    public function testTime()
    {
        $time = Time::fromString('10:23');
        $this->assertEquals('10:23', $time);
        $this->assertInstanceOf(Time::class, $time);

        $time2 = Time::fromString('3:8');
        $this->assertEquals('3:8', $time2);
    }
}