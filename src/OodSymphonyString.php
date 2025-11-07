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

function getQuestions($text)
{
    // $result = new UnicodeString($text);
    $result = collect(s($text)->trim());
    // print_r($result);

    // $newText = explode('\\n', $result);
    $newText = [];
    foreach ($result as $str)
    {
        if ($str[-1] === '?')
        {
            return $str;
        }
        $newText[] = $str;
    }
    return $newText;

}
print_r(getQuestions($text));