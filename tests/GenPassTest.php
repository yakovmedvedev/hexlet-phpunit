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
    private $length;
    private $symbols;

    protected function setUp(): void
    {
        $this->length = 12;
        $this->symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=[]{}|;:,.<>?/';
    }
        public static function passProvider(): array
    {
        return [
            ['#qBr(D)0WSna'],
            ['G#Sn|.Q.oo7q'],
            ['St1m2aFbwRDG'],
            ['*.q#0PU(Zjf['],
            ['J)d*#1IgLYAH']
        ];
    }
    #[DataProvider('passProvider')]
    public function testPasswordLength()
    {
        $expected = mb_strlen(generatePassword($this->length, $this->symbols));
        $this->assertEquals($expected, $this->length);
    }
    // #[DataProvider('passProvider')]
    //     public function testPasswordDigits()
    // {
    //     $length = 12;
    //     $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=[]{}|;:,.<>?/';
    //     $digits = '1234567890';
    //     $expected = str_contains($digits, generatePassword($length, $symbols));
    //     $this->assertTrue($expected, $digits);
    // }
    #[DataProvider('passProvider')]
        public function testPasswordSpecialSymbols()
    {
        // $length = 12;
        // $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=[]{}|;:,.<>?/';
        $pass = generatePassword($this->length, $this->symbols);
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';
        $containsSpecial = false;
        for ($i = 0; $i < mb_strlen($this->length); $i++) {
    if (str_contains($specialChars, $pass[$i])) {
        $containsSpecial = true;
        break;
    }
    }
        // $expected = true;
        $this->assertTrue($containsSpecial);
    }
}