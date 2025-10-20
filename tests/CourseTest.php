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
use App\Classes\Course;

class CourseTest extends TestCase
{
    public function testJsonDecode1()
    {
        $name = new Course('John');
        $this->assertEquals('John', $name->getName());
    }
}

//tutor's
// <?php

// namespace App\Tests;

// use PHPUnit\Framework\TestCase;

// // BEGIN
// class CourseTest extends TestCase
// {
//     public function testGetName()
//     {
//         $name = 'my super course';
//         $course = new \App\Course($name);
//         $this->assertEquals($name, $course->getName());
//     }
// }

//Реализуйте тест CourseTest, проверяющий работоспособность метода getName() класса Course.

// Подсказки
// Класс Course можно найти в /src/Course.php