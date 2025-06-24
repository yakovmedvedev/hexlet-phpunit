<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/SetArray.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Functional;

class FunctionalTest extends TestCase
{
    // Так определяется переменная на уровне класса
    // Ее называют свойством
    // Здесь private закрывает переменную от внешнего доступа
    private $coll;

    // Метод ничего не возвращает
    public function setUp(): void
    {
        // Так к переменной происходит доступ внутри класса
        // В этом случае — запись данных
        $this->coll = [];
    }

public function testPath(): void

{

$this->assertEquals( $coll, set($coll, ['a', 'b', 'c'], 4));

}
}