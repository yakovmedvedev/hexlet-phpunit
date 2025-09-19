<?php

namespace Trees\Acc\Defdeep;

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
  mkdir('etca', [
    mkdir('apache'),
    mkdir('nginx', [
      mkfile('nginx.conf'),
    ]),
    mkdir('consul', [
      mkfile('config.json'),
      mkdir('data'),
    ]),
  ]),
  mkdir('logs'),
  mkfile('hosts'),
]);

// Function to find files by name with full path
function findFilesByName($tree, $searchString) {
    // Initialize empty array to store matching file paths
    $result = [];
    
    // Helper function to traverse the tree recursively
    $traverse = function ($node, $currentPath = '') use ($searchString, &$result, &$traverse) {
        // Get node's name
        $name = getName($node);
        // Build current path
        $path = $currentPath === '' ? $name : "$currentPath/$name";
        
        if (isFile($node)) {
            // If it's a file and name contains search string, add to results
            if (stripos($name, $searchString) !== false) {
                $result[] = $path;
            }
        } else {
            // If it's a directory, recurse through children
            $children = getChildren($node);
            foreach ($children as $child) {
                $traverse($child, $path);
            }
        }
    };
    
    // Start traversal from root
    $traverse($tree);
    return $result;
}


// Test the function
$result = findFilesByName($tree, 'co');
print_r($result);

// function array_flatten(array $multiDimArray): array {
//     $flatten = [];

//     $singleArray = array_map(function($arr) use (&$flatten) {
//         $flatten = array_merge($flatten, $arr);
//     }, $multiDimArray);

//     return $flatten;
// }

// function iter($node, $depth)
// {
//     $name = getName($node);
//     $children = getChildren($node);

//     // Если детей нет, то добавляем директорию
//     if (count($children) === 0) {
//         return [$name];
//     }
//     // Если это второй уровень вложенности, и директория не пустая,
//     // то не имеет смысла смотреть дальше
//     if ($depth === 3) {
//         // Почему возвращается именно пустой массив?
//         // Потому что снаружи выполняется array_flatten
//         // Он раскрывает пустые массивы
//         return [];
//     }
//     // Оставляем только директории
//     $emptyDirPaths = array_filter($children, fn($child) => isDirectory($child));
//     // Не забываем увеличивать глубину
//     $output = array_map(function ($child) use ($depth) {
//         return iter($child, $depth + 1);
//     }, $emptyDirPaths);

//     // Перед возвратом "выпрямляем" массив
//     return array_flatten($output);
// }

// function findEmptyPaths($tree)
// {
//     // Начинаем с глубины 0
//     return iter($tree, 0);
// }

// print_r(findEmptyPaths($tree)); // ['apache', 'logs']


// Аккумулятор—
// PHP: Деревья
// В некоторых ситуациях, во время обхода дерева, нужна дополнительная информация, которая зависит от расположения узла. Ее невозможно получить из описания самого узла, так как узел ее не содержит. Эту информацию нужно собирать прямо во время обхода.

// К такой информации, например, относится полный путь до файла или глубина текущего узла. Конкретный узел не знает о том, где он находится. Расположение файла в файловой структуре определяется узлами, которые ведут к конкретному файлу.

// В этом уроке мы познакомимся с понятием аккумулятор, специальным параметром, который собирает нужные данные во время обхода дерева. Его введение усложняет код, но без него подобные задачи выполнить невозможно.

// Возьмем для примера такую задачу: найдем все пустые директории в нашей файловой системе. Сначала реализуем простую версию, затем усложним ее и внедрим аккумулятор. Пример файловой системы ниже:

// <?php

// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;

// $tree = mkdir('/', [
//   mkdir('etc', [
//     mkdir('apache'),
//     mkdir('nginx', [
//       mkfile('nginx.conf'),
//     ]),
//     mkdir('consul', [
//       mkfile('config.json'),
//       mkdir('data'),
//     ]),
//   ]),
//   mkdir('logs'),
//   mkfile('hosts'),
// ]);
// В этой структуре три пустых директории: /logs, /etc/apache и /etc/consul/data. Код, решающий эту задачу, выглядит так:

// <?php

// function findEmptyDirPaths($tree)
// {
//     $name = getName($tree);
//     $children = getChildren($tree);

//     // Если детей нет, то добавляем директорию
//     if (count($children) === 0) {
//         return [$name];
//     }

//     // Фильтруем файлы, они нас не интересуют
//     $dirNames = array_filter($children, fn($child) => !isFile($child));
//     // Ищем пустые директории внутри текущей
//     $emptyDirNames = array_map(fn($dir) => findEmptyDirPaths($dir), $dirNames);

//     // array_flatten выправляет массив, так что он остается плоским
//     return array_flatten($emptyDirNames);
// }

// // В выводе указана только конечная директория
// // Подумайте, как надо изменить функцию, чтобы видеть полный путь
// findEmptyDirPaths($tree); // ['apache', 'data', 'logs']
// Самое необычное в этой реализации — функция из нашей библиотеки array_flatten. Зачем она нужна? Если оставить только array_map, то результат может удивить:

// <?php

// findEmptyDirPaths($tree);
// // [ [ [ 'apache' ], [], [ [Array] ] ], [ 'logs' ] ]
// Такое происходит из-за возврата массива на каждом уровне вложенности. На выходе получается массив массивов, напоминающий по структуре исходное файловое дерево. Чтобы этого не происходило, нужно выправлять код с помощью array_flatten.

// Попробуем усложнить задачу. Найдем все пустые директории, но с максимальной глубиной поиска 2 уровня. То есть директории /logs и /etc/apache подходят под это условие, а вот /etc/consul/data — нет.

// Для начала нужно понять откуда брать глубину. В деревьях глубина считается как количество ребер от корня до нужного узла. Визуально ее посчитать легко, а что насчет кода? Глубину конкретного узла можно представить как глубину предыдущего узла плюс единица.

// Следующий шаг – добавить переменную, которая передается при каждом рекурсивном вызове (проваливающимся в директорию). Эта переменная, в случае нашей задачи, содержит внутри себя текущую глубину. То есть на каждом уровне (внутри каждой директории) к ней добавляется единица. Такую переменную называют аккумулятором, так как она аккумулирует, то есть накапливает данные.

// Единственная проблема заключается в том, что у исходной функции findEmptyDirPaths ровно один параметр – узел. С его помощью невозможно передавать глубину всем вложенным директориям и файлам. Поэтому придется ввести внутреннюю функцию, которая сможет "пробрасывать" аккумулятор дальше по дереву:

// <?php

// use Php\Immutable\Fs\Trees\trees\isDirectory;

// // Функция iter используется внутри основной и может передавать аккумулятор
// // В качестве аккумулятора выступает переменная $depth, содержащая текущую глубину
// function iter($node, $depth)
// {
//     $name = getName($node);
//     $children = getChildren($node);

//     // Если детей нет, то добавляем директорию
//     if (count($children) === 0) {
//         return [$name];
//     }
//     // Если это второй уровень вложенности, и директория не пустая,
//     // то не имеет смысла смотреть дальше
//     if ($depth === 2) {
//         // Почему возвращается именно пустой массив?
//         // Потому что снаружи выполняется array_flatten
//         // Он раскрывает пустые массивы
//         return [];
//     }
//     // Оставляем только директории
//     $emptyDirPaths = array_filter($children, fn($child) => isDirectory($child));
//     // Не забываем увеличивать глубину
//     $output = array_map(function ($child) use ($depth) {
//         return iter($child, $depth + 1);
//     }, $emptyDirPaths);

//     // Перед возвратом "выпрямляем" массив
//     return array_flatten($output);
// }

// function findEmptyPaths($tree)
// {
//     // Начинаем с глубины 0
//     return iter($tree, 0);
// }

// findEmptyPaths($tree); // ['apache', 'logs']
// Можно пойти еще дальше и позволить указывать максимальную глубину снаружи:

// <?php

// function findEmptyDirPaths($tree, $depth = 2)
// {
//   // ...
// }
// Но возникает вопрос, а как сделать так, чтобы по умолчанию просматривалось все дерево? Например, можно взять заведомо большое число и сделать его значением по умолчанию. Такой подход сработает, но это хак. Правильный способ сделать это – использовать в качестве значения по умолчанию бесконечность INF.

// <?php

// function findEmptyDirPaths($tree, $depth = INF)
// {
//   // ...
// }
