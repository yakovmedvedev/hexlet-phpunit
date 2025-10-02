<?php


class Time
{
    public $hours;
    public $minutes;

    public function __construct($hours, $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }
    public function getHours()
    {
        return $this->hours;
    }
    public function getMinutes()
    {
        return $this->minutes;
    }

    public static function fromString()
    {
        return new self($a, $b));
    }
}

$time = new Time(10, 15);
print_r($time);
echo ($time = Time::fromString('10:23'));



// Класс Time предназначен для создания объекта-времени. Его конструктор принимает на вход количество часов и минут в виде двух отдельных параметров.

// <?php

// $time = new Time(10, 15);
// echo $time; // => 10:15
// src/Time.php
// Добавьте в класс Time статический метод fromString, который позволяет создавать инстансы Time на основе времени переданного строкой формата часы:минуты.

// <?php

// $time = Time::fromString('10:23');
// $this->assertEquals('10:23', $time); // автоматически вызывается __toString
// Подсказки
// Вам может понадобиться функция explode()