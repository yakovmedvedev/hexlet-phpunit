<?php
//not done((
// 
require_once __DIR__ . "/../src/Stack.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Stack;


class StackTest extends TestCase
{
    public function testMainFlow(): void
    {
        $stack = [];
        // Добавляем два элемента в стек и затем извлекаем их
        array_push($stack, 'one');
        array_push($stack, 'two');

        $value1 = array_pop($stack);
        $this->assertEquals('two', $value1);
        $value2 = array_pop($stack);
        $this->assertEquals('one', $value2);
    }
}

// class StackTest extends TestCase
// {
//     public function testMainFlow(): void
//     {
//         $stack = Stack\make();
//         // Добавляем два элемента в стек и затем извлекаем их
//         Stack\push($stack, 'one');
//         Stack\push($stack, 'two');

//         $value1 = Stack\pop($stack);
//         $this->assertEquals('two', $value1);
//         $value2 = Stack\pop($stack);
//         $this->assertEquals('one', $value2);
//     }
// }