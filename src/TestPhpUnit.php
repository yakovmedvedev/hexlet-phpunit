<?php

namespace Test\Php\Unit;


$string = "that's a string!";

function makeArray($string): array
{
    
    $array = explode(' ', $string);

    return $array;
}
// print_r(makeArray($string));