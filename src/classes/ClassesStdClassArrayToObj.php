<?php


$data = [
    '1key' => '1value',
    '11key2' => 'value2',
];

class MyStdClass
{
    public $array = [];
     public function __set($name, $value)
     {
         $this->array[$name] = $value;
     }
     public function __get($name)
     {
         return $this->array[$name];
     }
}


function toStd(array $array)
{
    $obj = new MyStdClass();
    $obj->$array[$name];
    $obj->$name2 = $array[1];
//    $name = ;
//    $value = 'value';
//    $name2 = 'key2';
//    $value2 = 'value2';
//    $obj->name = $value;
//    $obj->name2 = $value2;
    return $obj;
}

$dataAsObj = new MyStdClass();
print_r($dataAsObj);

$config = toStd($data);
print_r($config);

$config->key; // value
$config->key2; // value2



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