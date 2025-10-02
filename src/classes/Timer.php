<?php

namespace App\Classes;

class Timer
{
    public const SEC_PER_MIN = 60;

    // BEGIN (write your solution here)
    private $secondsCount;
    public const SEC_PER_HOUR = 3600;

    public function __construct($a, $b = 0, $c = 0)
    {
        $secondsCount = $a + $b * self::SEC_PER_MIN + $c * self::SEC_PER_HOUR;
        $this->secondsCount = $secondsCount;
    }
    // END

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}


//Реализуйте недостающие части класса Timer, который описывает собой таймер обратного отсчета.
//Необходимо дописать конструктор, принимающий на вход три параметра: секунды, минуты (необязательный)
//и часы (необязательный).
//Конструктор должен подсчитать общее количество секунд для переданного времени и записать его в свойство secondsCount.
//
//Воспользуйтесь константой SEC_PER_MIN для перевода минут в секунды (через умножение)
//Реализуйте дополнительную константу SEC_PER_HOUR и воспользуйтесь ей для перевода часов в секунды
//Примеры:
//<?php
//
$timer1 = new Timer(5, 25, 125);
print_r($timer1);

print_r("\n");
print_r($timer1->getLeftSeconds());
print_r("\n");
echo($timer1->tick());
print_r("\n");
echo($timer1->getLeftSeconds());
print_r("\n");
$timer2 = new Timer(8, 20, 8);
$timer2->getLeftSeconds();

//tutor's
// class Timer
// {
//     public const SEC_PER_MIN = 60;

//     // BEGIN
//     public const SEC_PER_HOUR = 60 * self::SEC_PER_MIN;

//     private $secondsCount;

//     public function __construct($sec, $min = 0, $hour = 0)
//     {
//         $this->secondsCount = $sec + $min * self::SEC_PER_MIN + $hour * self::SEC_PER_HOUR;
//     }
//     // END

//     public function getLeftSeconds()
//     {
//         return $this->secondsCount;
//     }

//     public function tick()
//     {
//         $this->secondsCount--;
//     }
// }
