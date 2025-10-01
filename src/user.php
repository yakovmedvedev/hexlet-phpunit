<?php


class Address
{
    public $country;
    public $city;
    public $street;
    public function __construct($country, $city, $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getStreet()
    {
        return $this->street;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function setStreet($street)
    {
        $this->street = $street;
    }
}
class User
{
    public $name;
    public $address;
    public $addresses;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addAddress(User\Address $address)
    {
        $this->address[] = $address;
    }
    public function getAddresses()
    {
        $this->address[] = $address;
        return $this->adresses[] = $address;
    }
    public function getName()
    {
        return $this->name;
    }
}

$user = new User('Ivan');
print_r($user);
print_r("\n");
$address = new Address('Russia', 'Moscow', 'Lenina');
$address2 = new Address('Russia', 'Leningrad', 'Enina');
$user->addAddress($address);
print_r("\n");
$user->addAddress($address2);
print_r($user);
print_r("\n");


$user2 = new User('Mila');
print_r($user2);
print_r("\n");

$user2->addAddress($address);
print_r($user2);
print_r("\n");
print_r($user->getAddresses());
print_r("\n");
// Изменение происходит сразу у обоих пользователей
// Такое поведение неожиданно и ломает систему
$address->setCountry('USA');
print_r($address);


//В задании необходимо реализовать пользователей которым можно добавлять адреса. Такое часто встречается в интернет магазинах, когда у одного пользователя может быть набор разных адресов для доставки. Пользователь и адрес представлены двумя классами:
//
//App\User\Address
//App\User
//src/User/Address.php
//Реализуйте следующие публичные методы:
//
//__construct($country, $city, $street)
//getCountry() — возвращает страну.
//getCity() — возвращает город.
//getStreet() — возвращает улицу.
//setCountry($country) — устанавливает страну.
//setCity($city) — устанавливает город.
//setStreet($street) — устанавливает улицу.
//src/User.php
//Реализуйте следующие публичные методы:
//
//__construct($name)
//addAddress(User\Address $address) — добавляет адрес пользователю.
//getAddresses() — возвращает массив адресов пользователя.
//getName() — возвращает имя пользователя.
//Примеры
//Для демонстрации проблемы изменяемости, объекты адресов содержат сеттеры:
//
//<?php
//
//$user = new User('Ivan');
//$address = new User\Address('Russia', 'Moscow', 'Lenina');
//$user->addAddress($address);
//
//$user2 = new User('Mila');
//$user2->addAddress($address);
//
//// Изменение происходит сразу у обоих пользователей
//// Такое поведение неожиданно и ломает систему
//$address->setCountry('USA');