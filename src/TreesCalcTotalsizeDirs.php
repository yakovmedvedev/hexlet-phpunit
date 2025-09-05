<?php

//namespace Trees\Calc\Totalsize\Dirs;
//
//$autoloadPath1 = __DIR__ . '/../../../autoload.php';
//$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
//if (file_exists($autoloadPath1)) {
//    require_once $autoloadPath1;
//} else {
//    require_once $autoloadPath2;
//}

// Реализуйте функцию du(), которая принимает на вход директорию. Функция возвращает список узлов (директорий и файлов),
// вложенных в указанную директорию на один уровень, и место, которое они занимают. Размер файла задается в метаданных.
// Размер директории складывается из сумм всех размеров файлов, находящихся внутри во всех поддиректориях. Сами папки размера не имеют.
// Пример

//use function Php\Immutable\Fs\Trees\trees\mkdir;
//use function Php\Immutable\Fs\Trees\trees\mkfile;
//use function App\du\du;

function makedir(string $name, array $children = [], array $meta = [])
{
    return [
        "name" => $name,
        "children" => $children,
        "meta" => $meta,
        "type" => "directory",
    ];
}

/**
 * Make file node
 * @param string $name
 * @param array $meta
 * @return array
 */
function mkfile(string $name, array $meta = [])
{
    return [
        "name" => $name,
        "meta" => $meta,
        "type" => "file",
    ];
}

$tree = makedir('/', [
    makedir('etc', [
        makedir('apache'),
        makedir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),
        ]),
        makedir('consul', [
            mkfile('config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);
//print_r($tree);
// du($tree);
// [
//     ['etc', 10280],
//     ['hosts', 3500],
//     ['resolve', 1000],
// ]
// Примечания
// Обратите внимание на структуру результирующего массива. Каждый элемент — массив с двумя значениями: именем директории и размером файлов внутри.
// Результат отсортирован по размеру в обратном порядке. То есть сверху самые тяжёлые, внизу самые лёгкие.
// Подсказки
// usort
// Вам может пригодиться функция reduce()

function du($tree)
{

    $children = $tree['children'];
//    print_r($children);
//    $file = $children['type'] == 'file' ? $children['meta']['size'] : $children['meta']['name'];
//    print_r($file);
    $filesFiltered = array_filter($children, fn($child) => $child['type'] == 'file');
    print_r($filesFiltered);
    $dirsFiltered = array_filter($children, fn($child) => $child['type'] == 'directory');
    print_r($dirsFiltered);
    $dirsSize = array_reduce($dirsFiltered, function($size, $node) {
        if ($node['type'] == 'file') {
        $size[] += $node['meta']['size'];}
        return $size;
    }, []);
    print_r($dirsSize);

}
du($tree);
