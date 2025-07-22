<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ReverseString.php";

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

use function ReverseString\reverseString;

class ReverseStringFixturesTest extends TestCase
{
    private $initialText;
    private $resultText;

    public function setUp(): void
    {
        $this->initialText = file_get_contents(__DIR__ . "/fixtures/initial.txt");
        $this->resultText = file_get_contents(__DIR__ . "/fixtures/result.txt");
    }
    public function testEqualStrings()
    {
        $this->assertEquals($this->initialText, reverseString($this->resultText));
    }
}