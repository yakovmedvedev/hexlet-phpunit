<?php

namespace Hexlet\Phpunit\Tests;

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
use App\Classes\DeckOfCards;

class OodCollectTest extends TestCase
{   
    public function testGetShuffled1()
    {
        $expected = [2, 2, 2, 2, 3, 3, 3, 3];
        $deck = new DeckOfCards([2, 3]);
        $result1 = $deck->getShuffled();
        $result2 = $deck->getShuffled();
        $this->assertNotEquals($result1, $result2);

        sort($result1);
        $this->assertEquals($expected, $result1);

        sort($result2);
        $this->assertEquals($expected, $result2);
    }

    public function testGetShuffled2()
    {
        $expected = [7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9];
        $deck = new DeckOfCards([8, 9, 7]);
        $result1 = $deck->getShuffled();
        $result2 = $deck->getShuffled();
        $this->assertNotEquals($result1, $result2);

        sort($result1);
        $this->assertEquals($expected, $result1);

        sort($result2);
        $this->assertEquals($expected, $result2);
    }
}
