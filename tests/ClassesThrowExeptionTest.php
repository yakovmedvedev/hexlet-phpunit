<?php

namespace Classes\Throw\Exeption\Test;

// require_once __DIR__ . "/../src/ClassesThrowExeption.php";

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

use function App\Classes\Throw\Exeption\json_decode;

class ClassesThrowExeptionTest extends TestCase
{
    public function testJsonDecode1()
    {
        $data = \json_decode('{ "key": "value" }', true);
        $this->assertEquals(['key' => 'value'], $data);
    }

    public function testJsonDecode2()
    {
        $this->expectException(Exception::class);
        $data = \json_decode('{ key": "value" }', true);
    }
}
