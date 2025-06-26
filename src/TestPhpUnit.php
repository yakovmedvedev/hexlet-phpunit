<?php

namespace Test\Php\Unit;




function makeArray($string): array
{
    $string = "that's a string!";
    $array = explode(', ', $string);
    return $array;
}
print_r(makeArray($string));