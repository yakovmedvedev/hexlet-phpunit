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
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;

$tree = mkdir(
    'my images', [
        mkfile('avatar.jpg', ['owner' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['owner' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations', [], ['stuff' => 'media'])
    ], ['owner' => 'me']
);

function changeOwner($tree, $owner)
{
  $name = getName($tree);
  $newMeta = getMeta($tree);
  $newMeta['owner'] = $owner;

  if (isFile($tree)) {
    // Возвращаем обновленный файл
    return mkfile($name, $newMeta);
  }

  $children = getChildren($tree);
  // Ключевая строчка
  // Вызываем рекурсивное обновление каждого ребенка
  $newChildren = array_map(function ($child) use ($owner) {
      return changeOwner($child, $owner);
  }, $children);
  // Создаем директорию
  $newTree = mkdir($name, $newChildren, $newMeta);

  // Возвращаем обновленную директорию
  return $newTree;

}
$owner = 'sss';
print_r(changeOwner($tree, $owner));