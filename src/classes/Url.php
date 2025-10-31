<?php

namespace App\Classes;

class Url
{
    public $addr;
    // public $port;
    public $scheme;
    public $host;
    public $queryParams;
    public function __construct($addr)
    {
        $parsed = parse_url($addr);
        print_r($parsed);
        $this->addr = $addr;
        $this->scheme = $parsed['scheme'];
        $this->host = $parsed['host'];
        // $this->port = $parsed['port'];
        parse_str($parsed['query'] ?? '', $this->queryParams);
    }
    public function getAddr()
    {
        return $this->addr;
    }
    public function getScheme():string
    {
        return $this->scheme;
    }
    public function getHostName():string
    {
        return $this->host;
    }
    // public function getPort():int
    // {
    //     return $this->port;
    // }
    public function getQueryParams()
    {
        return $this->queryParams;
    }
    public function getQueryParam(string $param, $default = null)
    {
        return $this->queryParams[$param] ?? $default;
    }
    public function equals(Url $url): bool
    {
        return $this->addr === $url->getAddr();
    }
}
//$addr = 'https://ru.hexlet.io/courses/php-object-oriented-design/lessons/modeling/exercise_unit';
$protocol = new Url('http://yandex.ru:80?key=value&key2=value2');
//$protocol2 = new Url('http://ru.hexlet.io/courses/php-object-oriented-design/lessons/modeling/exercise_unit');
print_r($protocol);
$protocol->getScheme();
echo($protocol->getScheme());
print_r("\n");
echo($protocol->getHostName());
print_r("\n");
// echo($protocol->getPort());
print_r("\n");
print_r($protocol->getQueryParams());
print_r("\n");
print_r($protocol->getQueryParam('key3', 'key'));
print_r("\n");
print_r($protocol->equals(new Url('http://yandex.ru:80?key=value&key2=value2')));

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

//tutor's
//class Url
//{
//    private $url;
//    private $queryParams;
//
//    public function __construct($url)
//    {
//        $this->url = parse_url($url);
//        $this->queryParams = [];
//
//        if (isset($this->url['query'])) {
//            parse_str($this->url['query'], $this->queryParams);
//        }
//    }
//
//    public function getScheme()
//    {
//        return $this->url['scheme'];
//    }
//
//    public function getHostName()
//    {
//        return $this->url['host'];
//    }
//
//    public function getQueryParams()
//    {
//        return $this->queryParams;
//    }
//
//    public function getQueryParam($key, $defaultValue = null)
//    {
//        return $this->queryParams[$key] ?? $defaultValue;
//    }
//
//    public function equals(Url $url)
//    {
//        return $this == $url;
//    }
//}