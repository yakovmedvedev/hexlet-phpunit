<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\map;

// function mkdir(string $name, array $children = [], array $meta = [])
// {
//     return [
//         "name" => $name,
//         "children" => $children,
//         "meta" => $meta,
//         "type" => "directory",
//     ];
// }

// /**
//  * mk file node
//  * @param string $name
//  * @param array $meta
//  * @return array
//  */
// function mkfile(string $name, array $meta = [])
// {
//     return [
//         "name" => $name,
//         "meta" => $meta,
//         "type" => "file",
//     ];
// }


//$tree = mkdir('php-package', [mkfile('Makefile'), mkfile('README.md'), mkdir('dist'), mkdir('tests', [mkfile('test.php', ['type' => 'text/php'])]), mkdir('src', [mkfile('index.php', ['type' => 'text/php'])]), mkfile('phpunit.xml', ['type' => 'text/xml']), mkdir('assets', [(mkdir('util', [mkdir('cli', mkfile('LICENSE'))]))], ['owner' => 'root', 'hidden' => false])], ['hidden' => true]);

function generator()
{
    return mkdir('php-package', [mkfile('Makefile'), mkfile('README.md'), mkdir('dist'), mkdir('tests', [mkfile('test.php', ['type' => 'text/php'])]), mkdir('src', [mkfile('index.php', ['type' => 'text/php'])]), mkfile('phpunit.xml', ['type' => 'text/xml']), mkdir('assets', [(mkdir('util', [mkdir('cli', [mkfile('LICENSE')])]))], ['owner' => 'root', 'hidden' => false])], ['hidden' => true]);
}
print_r(generator($tree));
