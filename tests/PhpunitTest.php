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

use function Test\Php\Unit\makeArray;

class PhpunitTest extends TestCase
{
    private $string;

    protected function setUp(): void
    {
        $this->string = '';
    }
    public function testStringFormat(): void
    {
        // $string = "ewewewewe";

        makeArray($string);

        $this->assertContains('that', $array);
    }

}