<?php

namespace App; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

class Rational
{
    public $numer;
    public $denom;
    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }
    public function getNumer()
    {
        return $this->numer;
    }
    public function getDenom()
    {
        return $this->denom;
    }
    public function add($rational)
    {
        $newNumer = $this->getNumer() * $rational->getDenom() + $rational->getNumer() * $this->getDenom();
        $newDenom = $this->getDenom() * $rational->getDenom();
        return new Rational($newNumer, $newDenom);
    }
    public function sub($rational)
    {
        $newNumer = $this->getNumer() * $rational->getDenom() - $rational->getNumer() * $this->getDenom();
        $newDenom = $this->getDenom() * $rational->getDenom();
        return new Rational($newNumer, $newDenom);
    }
}
$rat1 = new Rational(3, 9);
print_r($rat1);
print_r("\n");
$rat2 = new Rational(10, 3);
print_r($rat2);
print_r("\n");
////print_r($rat1->gcd() . "\n");
//print_r("rat1 lcm " . $rat1->gcd());
print_r("\n");
//print_r("rat2 lcm " . $rat2->lcm());
print_r(3 % 6);
//
print_r($rat3 = $rat1->add($rat2)); // Абстракция для рационального числа 99/27
print_r("\n");
print_r($rat4 = $rat1->sub($rat2));
//function gcd(int $x, int $y): int
//{
//    while ($y != 0) {
//        $temp = $y;
//        $y = $x % $y;
//        $x = $temp;
//    }
//    return abs($x);
//}

//function lcm(int $x, int $y): int
//{
//    return ($x * $y) / gcd($x, $y);
//}


//$rat1 = new Rational(10, 3);
//print_r($rat1->getNumer());

//Реализуйте класс для работы с рациональными числами, включающий в себя следующие методы:
//
//Конструктор — принимает на вход числитель и знаменатель.
//Метод getNumer() — возвращает числитель
//Метод getDenom() — возвращает знаменатель
//Сложение add() — прибавляет переданную дробь к дроби на которой был вызван метод.
//Вычитание sub() — находит разность между дробью на которой был вызван метод и переданной дробью.
//Нормализацию делать не надо!
//
//Подобные абстракции, как правило, создаются неизменяемыми. Поэтому сделайте так, чтобы методы add() и sub() возвращали новое рациональное число, а не мутировали объект.
//
//Примеры
//<?php
//
//$rat1 = new Rational(3, 9);
//$rat1->getNumer(); // 3
//$rat1->getDenom(); // 9
//
//print_r($rat2 = new Rational(10, 3));
////
//print_r($rat3 = $rat1->add($rat2)); // Абстракция для рационального числа 99/27
//$rat3->getNumer(); // 99
//$rat3->getDenom(); // 27
//
//$rat4 = $rat1->sub($rat2); // Абстракция для рационального числа -81/27
//$rat4->getNumer(); // -81
//$rat4->getDenom(); // 27