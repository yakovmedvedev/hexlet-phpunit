<?php

namespace Trees\Aggr\Nodes;

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

// В реализации используем рекурсивный процесс,
// чтобы добраться до самого дна дерева.
function getHiddenFilesCount($tree)
{
    $name = getName($tree);
  if (isFile($tree) && str_starts_with(getChildren($tree)['name'], '.') == true) {
    // Возвращаем 1, для учета текущего файла
    return '1';
  }

  // Если узел — директория, получаем его детей
  $children = getChildren($tree);
//   print_r($children);
  // Самая сложная часть
  // Считаем количество потомков для каждого из детей,
  // вызывая рекурсивно нашу функцию getNodesCount
  $descendantsCount = array_map(fn($child) => getHiddenFilesCount($child), $children);
  // Возвращаем 1 (текущая директория) + общее количество потомков
  print_r($descendantsCount);
  return array_sum($descendantsCount);
}

print_r(getHiddenFilesCount($tree)); // 8
// Кода здесь немного, но он довольно хитрый. Есть несколько ключевых моментов:

// Функция проверяет тип узла. Если узел — это файл, тогда из функции возвращается единица
// В случае, если узел — директория, тогда получаем детей и для каждого ребенка вновь вызываем нашу функцию. Затем повторяем алгоритм заново
// Вызов функции на каждом ребенке возвращает свой собственный результат (количество его потомков). Эти результаты образуют массив с числами, которые нужно объединить
// В конце считается общее количество всех потомков узла + единица (текущий узел сам по себе)
// Перед тем как двигаться дальше, с этим кодом нужно "поиграть". Это единственный способ разобраться с ним.

// пройдено 5 уроков из 9
// Теория
// ИИ-помощник
// Обсуждение
