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
    private $x;

    public function setUp(): void
    {
        $this->x = [[5], 1, [3, 4]];
    }
    public function testRemoveFirstLevel()
    {
        $this->assertEquals([5, 3, 4], removeFirstLevel($this->x));
    }
}