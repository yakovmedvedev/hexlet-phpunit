<?php

namespace Trees\Dir\Update;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;

$tree = mkdir(
    'my images', [
        mkfile('avatar.jpg', ['size' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['size' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations', [], ['stuff' => 'media'])
    ], ['owner' => 'me']
);

function compressImages($tree)
{
$children = getChildren($tree);

$jpgChildren = array_filter($children, fn($child) => isFile($child) && str_ends_with(getName($child), '.jpg') === true);

$optJpgChildren = array_map(function ($child) {
    $name = getName($child);
    foreach ($child as $value) {
        $meta = getMeta($child);
        $meta['size'] = (int) $meta['size'] * 0.5;
    }
    return mkfile($name, $meta);   
}, $jpgChildren);

$allChildren = array_replace($children, $optJpgChildren);
return mkdir(getName($tree), $allChildren, getMeta($tree));

        
}
print_r(compressImages($tree));

//tutor's
// function compressImages($node)
// {
//     $children = getChildren($node);
//     $newChildren = array_map(function ($child) {
//         $name = getName($child);
//         if (!isFile($child) || !str_ends_with($name, '.jpg')) {
//             return $child;
//         }

//         $meta = getMeta($child);
//         $meta['size'] /= 2;

//         return mkfile($name, $meta);
//     }, $children);

//     return mkdir(getName($node), $newChildren, getMeta($node));
// }

// Реализуйте функцию compressImages(), которая принимает на вход директорию, находит внутри нее картинки и "сжимает" их. Под сжиманием понимается уменьшение свойства size в метаданных в два раза. Функция должна вернуть обновленную директорию со сжатыми картинками и всеми остальными данными, которые были внутри этой директории.
// Картинками считаются все файлы заканчивающиеся на .jpg.