<?php

namespace App\Classess\Std\Class\Array\To\Obj;

$data2 = [
    'keysdd' => 'vasdfalue',
    'kasdfey2' => 'asdvalue2',
];

$array = [
    '1key' => 'value',
    'key2' => '1value2',
];

function toStd(array $arr) {
    $obj = new \stdClass();
    foreach ($arr as $key => $value) {
        $obj->$key = $value;
    }
    return $obj;
}

//$dataAsObj = new MyStdClass();
//print_r($dataAsObj);

$config = toStd($data2);
print_r($config);



//Реализуйте функцию toStd(), которая принимает на вход ассоциативный массив и возвращает объект типа stdClass
//такой же структуры. Выполните задачу, проставляя ключи и значения вручную без использования преобразования типа.
//
//Примеры
//<?php
//
//$data = [
//    'key' => 'value',
//    'key2' => 'value2',
//];
//$config = toStd($data);
//
//$config->key; // value
//$config->key2; // value2
//Примечания
//Это задание можно решить простым преобразованием типа (в object), но это не спортивно)
//Подсказки
//Вам понадобится динамическое обращение к свойствам:
//
//<?php
//
//$name = 'key';
//$obj->$name;

//tutor's
// BEGIN
//function toStd($data)
//{
//    $std = new \stdClass();
//    foreach ($data as $key => $value) {
//        $std->$key = $value;
//    }
//
//    return $std;
//}
// END