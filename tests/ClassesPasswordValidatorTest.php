<?php

namespace Hexlet\Phpunit\Tests;

// require_once __DIR__ . "/../src/classes/ClassesPasswordValidator.php";

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
use App\Classes\PasswordValidator;

use function App\Classes\Password\Validator\validate;

class ClassesPasswordValidatorTest extends TestCase
{
    public function testValidateWithDefaultOptions()
    {
        $validator = new PasswordValidator();
        $errors1 = $validator->validate('qwertyui');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small'
        ], $errors2);

        $errors3 = $validator->validate('another-password');
        $this->assertEmpty($errors3);
    }

    public function testValidateWithOptions()
    {
        $validator = new PasswordValidator([
            'containNumbers' => true
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small',
            'containNumbers' => 'should contain at least one number'
        ], $errors2);

        $errors3 = $validator->validate('q23ty');
        $this->assertEquals([
            'minLength' => 'too small',
        ], $errors3);
    }

    public function testValidateWithIncorrectOptions()
    {
        $validator = new PasswordValidator([
            'containNumberz' => null
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);

        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small',
        ], $errors2);
    }
}