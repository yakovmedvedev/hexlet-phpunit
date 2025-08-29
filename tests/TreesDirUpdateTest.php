<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/TreesDirUpdate.php";

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
use function Trees\Dir\Update\compressImages;

class TreesDirUpdateTest extends TestCase

{
    public function testCompressImages()
    {
        $tree = mkdir('my images', [
            mkdir('documents.jpg'),
            mkfile('avatar.jpg', ['size' => 100]),
            mkfile('passport.jpg', ['size' => 200]),
            mkfile('family.jpg',  ['size' => 150]),
            mkfile('addresses',  ['size' => 125]),
            mkdir('presentations', [], ['stuff' => 'media'])
        ], ['owner' => 'me']
);

        $newTree = compressImages($tree);

        $expected = [
            'name' => 'my images',
            'children' => [
                ['name' => 'documents.jpg', 'children' => [], 'meta' => [], 'type' => 'directory'],
                ['name' => 'avatar.jpg', 'meta' => ['size' => 50], 'type' => 'file'],
                ['name' => 'passport.jpg', 'meta' => ['size' => 100], 'type' => 'file'],
                ['name' => 'family.jpg', 'meta' => ['size' => 75], 'type' => 'file'],
                ['name' => 'addresses', 'meta' => ['size' => 125], 'type' => 'file'],
                ['name' => 'presentations', 'children' => [], 'meta' => ['stuff' => 'media'], 'type' => 'directory']
            ],
            'meta' => ['owner' => 'me'],
            'type' => 'directory'
        ];

        $this->assertEquals($expected, $newTree);
    }
}