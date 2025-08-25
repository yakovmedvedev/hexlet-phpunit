<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesRemoveLevel.php";

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

use function Trees\Remove\Level\removeFirstLevel;

class TreesRemoveLevelTest extends TestCase
{
    public function testEmpty()
    {
        $tree = [];
        $result = [];
        $this->assertEquals($result, removeFirstLevel($tree));
    }

    public function testFlat()
    {
        $tree = [1, 100, 3];
        $result = [];
        $this->assertEquals($result, removeFirstLevel($tree));
    }

    public function testRemoveFirstLevel()
    {
        $tree = [[1, [3, 2]], 2, [3, 5], 2, [130, [1, [550, 10]]]];
        $result = [1, [3, 2], 3, 5, 130, [1, [550, 10]]];
        $this->assertEquals($result, removeFirstLevel($tree));
    }
}