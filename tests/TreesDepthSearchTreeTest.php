<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesDepthSearchTree.php";

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

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Trees\Depth\Search\Tree\dfs;

class TreesDepthSearchTreeTest extends TestCase

{
    public function testDepthSearch()
    {
$tree = mkdir('/', [
  mkdir('etc', [
    mkfile('bashrc'),
    mkfile('consul.cfg'),
  ]),
  mkfile('hexletrc'),
  mkdir('bin', [
    mkfile('ls'),
    mkfile('cat'),
  ]),
]);


        $expected = '=> /
=> etc
=> bashrc
=> consul.cfg
=> hexletrc
=> bin
=> ls
=> cat';
        $actual = dfs($tree);
        $this->assertEquals($expected, $actual);
    }
}