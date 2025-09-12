<?php

namespace Trees\Calc\Totalsize\Dirs\Test;

require_once __DIR__ . "/../src/TreesCalcTotalsizeDirs.php";

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
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Trees\Calc\Totalsize\Dirs\du;

class TreesCalcTotalsizeDirsTest extends TestCase
{
    public function testDuTree()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache'),
                mkdir('nginx', [
                    mkfile('nginx.conf', ['size' => 800]),
                ]),
                mkdir('consul', [
                    mkfile('config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $expected = [
            ['etc', 10280],
            ['hosts', 3500],
            ['resolve', 1000],
        ];

        $this->assertEquals($expected, du($tree));
    }

    public function testDuChildren()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache'),
                mkdir('nginx', [
                    mkfile('nginx.conf', ['size' => 800]),
                ]),
                mkdir('consul', [
                    mkfile('config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $expected = [
            ['consul', 9480],
            ['nginx', 800],
            ['apache', 0],
        ];

        $this->assertEquals($expected, du(getChildren($tree)[0]));
    }
}