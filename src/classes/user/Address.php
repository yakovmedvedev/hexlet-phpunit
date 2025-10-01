<?php

namespace App\Classes\User;

// $autoloadPath1 = __DIR__ . '/../../../autoload.php';
// $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
// if (file_exists($autoloadPath1)) {
//     require_once $autoloadPath1;
// } else {
//     require_once $autoloadPath2;
// }

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