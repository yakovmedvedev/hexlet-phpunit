<?php


use function PHPSTORM_META\map;

class Url
{
    public $addr;
    public $port;
    public $scheme;
    public $host;
    public function __construct($addr)
    {
        $this->addr = $addr;
    }
    public function getScheme():string
    {
        return substr($this->addr, 0, 7) === 'http://' ? 'http' : 'https';
    }
    public function getHostName():string
    {
        $name = str_replace($this->getScheme() . '://', '', $this->addr);
        $domain = '';
        for ($i=0; $i<strlen($name); $i++) {

            if ($name[$i] === '/' || $name[$i] === ':') {
                break;
            }
            $domain .= $name[$i];
        }
        return $domain;
    }
}
//$addr = 'https://ru.hexlet.io/courses/php-object-oriented-design/lessons/modeling/exercise_unit';
$protocol = new Url('http://ru.hexlet.io/courses/php-object-oriented-design/lessons/modeling/exercise_unit');
$protocol2 = new Url('http://ru.hexlet.io/courses/php-object-oriented-design/lessons/modeling/exercise_unit');
print_r($protocol);
$protocol->getScheme();
echo($protocol->getScheme());
print_r("\n");
echo($protocol2->getHostName());

//В данном упражнении вам предстоит реализовать класс Url, который позволяет извлекать из HTTP адреса,
//представленного строкой, его части.
//
//Класс должен содержать конструктор и методы:
//
//конструктор - принимает на вход HTTP адрес в виде строки.
//getScheme() - возвращает протокол передачи данных (без двоеточия).
//getHostName() - возвращает имя хоста.
//getQueryParams() - возвращает параметры запроса в виде пар ключ-значение объекта.
//getQueryParam() - получает значение параметра запроса по имени. Если параметр с переданным именем не существует,
//метод возвращает значение заданное вторым параметром (по умолчанию равно null).
//equals($url) - принимает объект класса Url и возвращает результат сравнения с текущим объектом - true или false.
//<?php
//
//use App\Url;
//
//$url = new Url('http://yandex.ru:80?key=value&key2=value2');
//$url->getScheme(); // 'http'
//$url->getHostName(); // 'yandex.ru'
//$url->getQueryParams();
//// [
////     'key' => 'value',
////     'key2' => 'value2',
//// ];
//$url->getQueryParam('key'); // 'value'
//// второй параметр - значение по умолчанию
//$url->getQueryParam('key2', 'lala'); // 'value2'
//$url->getQueryParam('new', 'ehu'); // 'ehu'
//$url->getQueryParam('new'); // null
//$url->equals(new Url('http://yandex.ru:80?key=value&key2=value2')); // true
//$url->equals(new Url('http://yandex.ru:80?key=value')); // false