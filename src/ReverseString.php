<?php

namespace ReverseString;

// $string = "Обычно фикстуры хранятся в отдельных файлах в своей директории";
function reverseString($string)
{
    return implode(array_reverse(mb_str_split($string)));
}
print_r(reverseString($string));