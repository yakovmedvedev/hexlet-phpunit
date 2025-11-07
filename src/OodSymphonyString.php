<?php

namespace App\Ood\Symphony\String;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Illuminate\Collection;
use Symfony\Component\String\UnicodeString;

use function Symfony\Component\String\s;
use function Symfony\Component\String\u;
use function Symfony\Component\String\split;

$text = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;;

function getQuestions(string $text)
{
    $result = implode("\n", collect(s($text)->split("\n"))
    ->map(function($value, $key) {
    return $value->trim();})
    ->filter(function ($value, $key) {
    return $value->endsWith('?');})
    ->toArray());

    return $result;
}
getQuestions($text);

// Реализуйте функцию getQuestions(), которая принимает на вход текст (полученный из редактора)
// и возвращает извлеченные из этого текста вопросы. Это должна быть строчка в форме списка
// разделенных переводом строки вопросов (смотрите секцию "Примеры").

// Входящий текст разбит на строки и может содержать любые пробельные символы. Некоторые из этих строк
// являются вопросами. Они определяются по последнему символу: если это знак ?, то считаем строку вопросом.

// Примеры
// <?php

// $text = <<<HEREDOC
// lala\r\nr
// ehu?\t
// vie?eii
// \n \t
// i see you
// /r \n
// one two?\r\n\n
// turum-purum
// HEREDOC;

// $result = getQuestions($text); // "ehu?\none two?"
// echo $result;
// ehu?
// one two?


//tutor's

// use function Symfony\Component\String\s;

// // BEGIN
// function getQuestions(string $text)
// {
//     $result = collect(s($text)->split("\n"))
//         ->map(fn($line) => $line->trim())
//         ->filter(fn ($line) => $line->endsWith('?'))
//         ->toArray();
//     return implode("\n", $result);
// }