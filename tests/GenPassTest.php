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


// tutor's
// <?php

// namespace App\Tests;

// use PHPUnit\Framework\TestCase;

// use function App\Implementations\generatePassword;

// class PasswordGeneratorTest extends TestCase
// {
//     // BEGIN
//     public function testGeneratePasswordDefaultLength(): void
//     {
//         $password = generatePassword();
//         $this->assertEquals(5, mb_strlen($password), 'Password should be of default length 5');
//     }

//     public function testGeneratePasswordCustomLength(): void
//     {
//         $length = 10;
//         $password = generatePassword($length);
//         $this->assertEquals($length, mb_strlen($password), 'Password should be of specified length');
//     }

//     public function testGeneratePasswordOnlyLowercase(): void
//     {
//         $password = generatePassword(8);
//         $this->assertEquals(mb_strtolower($password), $password, 'Password should contain only lowercase letters');
//     }

//     public function testGeneratePasswordWithUppercase(): void
//     {
//         $password = generatePassword(8, includeUppercase: true);
//         $this->assertNotEquals(mb_strtolower($password), $password, 'Password should contain at least one uppercase letter');
//     }

//     public function testGeneratePasswordWithDigits(): void
//     {
//         $password = generatePassword(8, includeDigits: true);
//         $containsDigits = false;

//         for ($i = 0; $i < mb_strlen($password); $i++) {
//             if (is_numeric($password[$i])) {
//                 $containsDigits = true;
//                 break;
//             }
//         }

//         $this->assertTrue($containsDigits, "Password should contain at least one digit character, password: {$password}");
//     }

//     public function testGeneratePasswordWithSpecialCharacters(): void
//     {
//         $password = generatePassword(8, includeSpecial: true);
//         $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';
//         $containsSpecial = false;

//         for ($i = 0; $i < mb_strlen($password); $i++) {
//             if (str_contains($specialChars, $password[$i])) {
//                 $containsSpecial = true;
//                 break;
//             }
//         }

//         $this->assertTrue($containsSpecial, 'Password should contain at least one special character');
//     }

//     public function testGeneratePasswordWithAllOptions(): void
//     {
//         $password = generatePassword(12, true, true, true);

//         $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';
//         $containsSpecial = false;

//         for ($i = 0; $i < mb_strlen($password); $i++) {
//             if (strpos($specialChars, $password[$i]) !== false) {
//                 $containsSpecial = true;
//                 break;
//             }
//         }

//         $containsDigits = false;

//         for ($i = 0; $i < mb_strlen($password); $i++) {
//             if (is_numeric($password[$i])) {
//                 $containsDigits = true;
//                 break;
//             }
//         }

//         $this->assertNotEquals(mb_strtolower($password), $password, 'Password should contain at least one uppercase letter');
//         $this->assertTrue($containsDigits, "Password should contain at least one digit character, password: {$password}");
//         $this->assertTrue($containsSpecial, "Password should contain at least one special character, password: {$password}");
//     }

//     public function testGeneratePasswordZeroLength(): void
//     {
//         $password = generatePassword(0);
//         $this->assertEquals('', $password, 'Password should be an empty string for length 0');
//     }

//     public function testGeneratePasswordOneLength(): void
//     {
//         $password = generatePassword(1);
//         $this->assertEquals(1, mb_strlen($password), 'Password should be an empty string for length 0');
//     }
//     // END
// }