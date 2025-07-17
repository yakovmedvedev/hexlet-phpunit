<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TestPhpUnit.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Functional;

use function Test\Php\Unit\makeArray;

class PhpunitTest extends TestCase
{
    private $array;


    protected function setUp(): void
    {
        $this->array = [];
    }
    public function testArray(): void
    {
        $string = "that's a string!";
        makeArray($string);

        $this->assertTrue(in_array("a", makeArray($string)));
        $this->assertEquals("a", in_array("a", makeArray($string)));
    }

}