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
    private $password;

    public function setUp(): void
    {
        $this->password = null; // Initialize the password property
    }
    public static function passwordProvider(): array
    {
        return [
            [8, false, false, false],
            [5, true, false, false],
            [5, true, true, false],
            [5, true, true, true],
            [10, false, true, true],
        ];
    }
    #[DataProvider('passwordProvider')]
    public function testGeneratePasswordLowercase(): void
    {
        $this->password = generatePassword(8, false, false, false);
        $this->assertEquals(8, strlen($this->password));
        $this->assertTrue(ctype_lower($this->password));
    }
    #[DataProvider('passwordProvider')]
    public function testGeneratePasswordUppercase(): void
    {
        $this->password = generatePassword(5, true);
        $this->assertEquals(5, strlen($this->password));
        $this->assertTrue($this->containsLowercase($this->password));
        $this->assertTrue($this->containsUppercase($this->password));
    }
    #[DataProvider('passwordProvider')]
    public function testGeneratePasswordWithDigits(): void
    {
        $this->password = generatePassword(5, true, true);
        $this->assertEquals(5, strlen($this->password));
        $this->assertTrue($this->containsLowercase($this->password));
        $this->assertTrue($this->containsUppercase($this->password));
        $this->assertTrue($this->containsDigit($this->password));
    }
    #[DataProvider('passwordProvider')]
    public function testGeneratePasswordWithSpecialCharacters(): void
    {
        $this->password = generatePassword(5, true, true, true);
        $this->assertEquals(5, strlen($this->password));
        $this->assertTrue($this->containsLowercase($this->password));
        $this->assertTrue($this->containsUppercase($this->password));
        $this->assertTrue($this->containsDigit($this->password));
        $this->assertTrue($this->containsSpecial($this->password));
    }

    private function containsLowercase($password)
    {
        return preg_match('/[a-z]/', $password) !== 0;
    }
    private function containsUppercase($password)
    {
        return preg_match('/[A-Z]/', $password) !== 0;
    }
    private function containsDigit($password)
    {
        return preg_match('/[0-9]/', $password) !== 0;
    }
    private function containsSpecial($password)
    {
        return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password) !== 0;
    }
}


    // public function testGeneratePassword($length, $includeUppercase, $includeDigits, $includeSpecial, $expectedContains)
    // {
    //     $this->password = generatePassword($length, $includeUppercase, $includeDigits, $includeSpecial);
    //     $this->assertEquals($length, strlen($this->password));

    //     // Check for the expected character types
    //     $hasUppercase = false;
    //     $hasDigit = false;
    //     $hasSpecial = false;
        
    //     // Character sets for checks
    //     $specialChars = '!@#$%^&*(),.?":{}|<>';

    //     // Iterate over each character in the password and check types
    //     for ($i = 0; $i < strlen($this->password); $i++) {
    //         $char = $this->password[$i];

    //         if (ctype_upper($char)) {
    //             $hasUppercase = true;
    //         }

    //         if (ctype_digit($char)) {
    //             $hasDigit = true;
    //         }

    //         if (strpos($specialChars, $char) !== false) {
    //             $hasSpecial = true;
    //         }
    //     }

    //     // Assertions based on flags
    //     $this->assertEquals($expectedContains['uppercase'], $hasUppercase);
    //     $this->assertEquals($expectedContains['digit'], $hasDigit);
    //     $this->assertEquals($expectedContains['special'], $hasSpecial);
    // }

    // public function passwordProvider()
    // {
    //     return [
    //         [8, false, false, false, ['uppercase' => false, 'digit' => false, 'special' => false]],
    //         [5, true, false, false, ['uppercase' => true, 'digit' => false, 'special' => false]],
    //         [5, true, true, false, ['uppercase' => true, 'digit' => true, 'special' => false]],
    //         [5, true, true, true, ['uppercase' => true, 'digit' => true, 'special' => true]],
    //         [10, false, true, true, ['uppercase' => false, 'digit' => true, 'special' => true]],
    //     ];
    // }

// }