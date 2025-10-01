<?php


class Timer
{
//    public $seconds;
//    public $minutes;
//    public $hours;
    private $secondsCount;
    public const SEC_PER_MIN = 60;
    public const SEC_PER_HOUR = 3600;

    public function __construct($seconds, $minutes = 0, $hours = 0, &$secondsCount = 0)
    {
        $this->secondsCount = $seconds + $minutes * self::SEC_PER_MIN + $hours * self::SEC_PER_HOUR;
    }
    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }
    public function tick()
    {
        $newSecondCount = $this->secondsCount - 1;
        $newSecondCount = &$this->secondsCount;

       return $this->secondsCount -1;
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
//print_r($timer1->getMinutes());
//print_r("\n");
//print_r($timer1->getHours());
print_r("\n");
print_r($timer1->getLeftSeconds());
print_r("\n");
echo($timer1->tick());
print_r("\n");
echo($timer1->getLeftSeconds());
// 10
//$timer1->tick();
//$timer1->getLeftSeconds(); // 9
//
//$timer2 = new Timer(8, 20, 8);
//$timer2->getLeftSeconds(); // 3000
