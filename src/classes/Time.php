<?php

namespace App\Classes;

class Time
{
    public $hours;
    public $minutes;
    static $time;

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
    public function __toString()
    {
        return $this->hours . ':' . $this->minutes;
    }

    public static function fromString($time)
    {
        list($hours, $minutes) = explode(':', $time);
        return new self((int)$hours, (int)$minutes);
    }
}

$time = new Time(10, 15);
echo($time);
print_r("\n");

print_r("\n");

print_r("\n");
echo ($time = Time::fromString('7:05'));



// Класс Time предназначен для создания объекта-времени. Его конструктор принимает на вход количество часов и минут
//в виде двух отдельных параметров.

// <?php

// $time = new Time(10, 15);
// echo $time; // => 10:15
// src/Time.php
// Добавьте в класс Time статический метод fromString, который позволяет создавать инстансы Time на основе времени
//переданного строкой формата часы:минуты.

// <?php

// $time = Time::fromString('10:23');
// $this->assertEquals('10:23', $time); // автоматически вызывается __toString
// Подсказки
// Вам может понадобиться функция explode()

//tutor's
// <?php

// namespace App;

// class Time
// {
//     private $h;
//     private $m;

//     // BEGIN
//     public static function fromString($time)
//     {
//         [$h, $m] = explode(':', $time);
//         return new self($h, $m);
//     }
//     // END

//     public function __construct($h, $m)
//     {
//         $this->h = $h;
//         $this->m = $m;
//     }

//     public function __toString()
//     {
//         return "{$this->h}:{$this->m}";
//     }
// }