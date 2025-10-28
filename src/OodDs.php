<?php

namespace App\Ood\Ds;

use Ds\Stack;

<?php


class Stack {
    protected $stack;
    protected $size;
    public function __construct($size = 50) {
// Инициализировать стек
        $this->stack = array();
// Инициализировать размер стека
        $this->size = $size;
    }
    /** * Вставляет элемент в стек * @param type $data */
    public function push($data) {
// Проверяет переполнение стека
        if (count($this->stack) < $this->size) {
// Вставляет элемент в начало
            array_unshift($this->stack, $data);
        } else {
// Если стек полон, возвращает исключение `Stack Overflow`
            throw new RuntimeException("Stack overflow");
        }
    }
    /** * Извлекает элемент из стека * */
    public function pop() {
// Если стек пуст
        if (empty($this->stack)) {
            throw new RuntimeException("Stack underflow");
        } else {
            return array_shift($this->stack);
        }
    }
}

$str1 = 'ab#cwwww';
$str2 = 'abc';

function compare($str1, $str2)
{
    // инициализируем стек
    $stack = new Stack();

//    for ($i = (strlen($str1) - 1); $i >= 0; $i--) {
    for ($i = 0; $i < strlen($str1); $i++) {
        $current = $str1[$i];
        var_dump($current);
        if ($current === "#") {
            (!$stack->isEmpty()) ?? $stack->pop();
        } else {
            $stack->push($current);
        }
            $stack->push($current);
//        return $stack;

    }
    print_r($stack);
//    return $stack;
}
compare($str1, $str2);
//$stack = new Stack();
//print_r($stack);
//$stack->push(3);
//print_r($stack);
//$stack->push(13);
//print_r($stack);
//$stack->pop();
//print_r($stack);
