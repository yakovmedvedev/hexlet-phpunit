<?php

namespace App\Ood\Collect\String;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function getQuestions($text)
{
    // Разбиваем текст на массив строк, учитывая символы новой строки
    $lines = preg_split('/\R/', $text);

    // Фильтруем строки, оставляя только те, которые заканчиваются знаком вопроса
    $questions = array_filter($lines, function ($line) {
        return trim($line) !== '' && substr(trim($line), -1) === '?';
    });

    // Обрезаем пробелы и объединяем отфильтрованные вопросы в одну строку, разделяя переводами строки
    $questions = array_map('trim', $questions);

    return implode("\n", $questions);
}


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

$result = getQuestions($text); // "ehu?\none two?"
echo $result;
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