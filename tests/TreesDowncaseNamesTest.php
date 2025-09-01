<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesDowncaseNames.php";

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
use function Trees\Downcase\Names\downcaseFileNames;

class TreesDowncaseNamesTest extends TestCase
{

    public function testDowncaseFileNames()
    {
        $tree = mkdir('/', [
          mkdir('eTc', [
            mkdir('NgiNx'),
            mkdir('CONSUL', [
              mkfile('config.JSON'),
            ]),
          ]),
          mkfile('hOsts'),
        ]);

        $actual = downcaseFileNames($tree);
        $expected = [
          'children' => [
            [
              'children' => [
                [
                  'children' => [],
                  'meta' => [],
                  'name' => 'NgiNx',
                  'type' => 'directory',
                ],
                [
                  'children' => [['meta' => [], 'name' => 'config.json', 'type' => 'file']],
                  'meta' => [],
                  'name' => 'CONSUL',
                  'type' => 'directory',
                ],
              ],
              'meta' => [],
              'name' => 'eTc',
              'type' => 'directory',
            ],
            ['meta' => [], 'name' => 'hosts', 'type' => 'file'],
          ],
          'meta' => [],
          'name' => '/',
          'type' => 'directory',
        ];

        $this->assertEquals($expected, $actual);
    }

    public function testReturnFullCopy()
    {
        $tree = mkdir('/', [
          mkdir('eTc', [
            mkdir('NgiNx', [], ['size' => 4000]),
            mkdir('CONSUL', [
              mkfile('config.JSON', ['uid' => 0]),
            ]),
          ]),
          mkfile('hOsts'),
        ]);

        $actual = downcaseFileNames($tree);
        $expected = [
          'children' => [
            [
              'children' => [
                [
                  'children' => [],
                  'meta' => ['size' => 4000],
                  'name' => 'NgiNx',
                  'type' => 'directory',
                ],
                [

                  'children' => [['meta' => ['uid' => 0], 'name' => 'config.json', 'type' => 'file']],
                  'meta' => [],
                  'name' => 'CONSUL',
                  'type' => 'directory',
                ],
              ],
              'meta' => [],
              'name' => 'eTc',
              'type' => 'directory',
            ],
            ['meta' => [], 'name' => 'hosts', 'type' => 'file'],
          ],
          'meta' => [],
          'name' => '/',
          'type' => 'directory',
        ];

        $this->assertEquals($expected, $actual);
    }
}