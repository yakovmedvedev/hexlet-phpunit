<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesAggrNodes.php";

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
use function Trees\Aggr\Nodes\getHiddenFilesCount;


class TreesAggrNodesTest extends TestCase
{
    public function testGetHiddenFilesCount1()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache', []),
                mkdir('nginx', [
                    mkfile('.nginx.conf', ['size' => 800]),
                ]),
                mkdir('.consul', [
                    mkfile('.config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('.hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $actual = getHiddenFilesCount($tree);

        $this->assertEquals(3, $actual);
    }

    public function testGetHiddenFilesCount2()
    {
        $tree = mkdir('/', [
            mkdir('.etc', [
                mkdir('.apache', []),
                mkdir('nginx', [
                    mkfile('.nginx.conf', ['size' => 800]),
                ]),
            ]),
            mkdir('.consul', [
                mkfile('config.json', ['size' => 1200]),
                mkfile('.raft', ['size' => 80]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $actual = getHiddenFilesCount($tree);

        $this->assertEquals(2, $actual);
    }
}
