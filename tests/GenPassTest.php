<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/GenPass.php";

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

use function Gen\Pass\generatePassword;

class GenPassTest extends TestCase
{
    private $number;

    protected function setUp(): void
    {
        $this->number = 0;
    }
        public static function passProvider(): array
    {
        return [
            ['jqBr(D)0WSna'],
            ['G(Sn|.Q.oo7q'],
            ['kC;pqX2,a:{{+<[k*|=pvycU'],
        ];
    }
    #[DataProvider('passProvider')]
    public function testGeneratePassword($number, $expected)
    {
        $result = generatePassword($number);
        $this->assertEquals($expected, generatePassword($number));
    }
}