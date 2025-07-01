<?php

namespace Gen\Pass;

$symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$length = 8;
$includeUppercase = true;
$includeDigits = true;
$includeSpecial = true;
$digits = '1234567890';

function generatePassword($length, $symbols, $includeSpecial = false)
{

    $pass = [];
    for ($i = 0; $i < $length; $i++) {
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';
        $symbol = rand(0, mb_strlen($symbols) - 1);
        $pass[] = $symbols[$symbol];

    }

    if (str_contains($specialChars, implode($pass))) {
    return $pass;
}
    print_r(implode($pass));
    return implode($pass);
}
generatePassword($length, $symbols);