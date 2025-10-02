<?php

namespace Hexlet\Phpunit\Tests;

// require_once __DIR__ . "/../src/classes/User.php";

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
use App\Classes\Timer;

class ClassesConstantsTest extends TestCase
{
    public function testTimer1()
    {
        $timer = new Timer(10);
        $this->assertEquals(10, $timer->getLeftSeconds());
        $timer->tick();
        $this->assertEquals(9, $timer->getLeftSeconds());
    }

    public function testTimer2()
    {
        $timer = new Timer(8, 20, 8);
        $this->assertEquals(30008, $timer->getLeftSeconds());
        $timer->tick();
        $this->assertEquals(30007, $timer->getLeftSeconds());
    }
}
