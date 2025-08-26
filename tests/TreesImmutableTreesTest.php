<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesImmutableTrees.php";

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

use function Trees\Immutable\Trees\mkdir;
use function Trees\Immutable\Trees\mkfile;

class TreesImmutableTreesTest extends TestCase
{
    public function testMakeDirrectory()
    {
        $actual = ['name' => 'etc', ['children', ['key' => 'value']], ['meta', ['description']], ['type' => 'directory']];
        $this->assertEquals($actual, mkdir($tree));
    }

}