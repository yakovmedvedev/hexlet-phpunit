<?php

namespace Gen\Pass;


$length = 12;
$includeUppercase = true;
$includeDigits = true;
$includeSpecial = true;


function generatePassword($length, $includeUppercase, $includeDigits, $includeSpecial)
{
    $pass = [];
    $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=[]{}|;:,.<>?/';
    for ($i = 0; $i < $length; $i++) {
        $symbol = rand(0, mb_strlen($symbols) - 1);
//        var_dump($symbol);
        $pass[] = $symbols[$symbol];
    }
    print_r(implode($pass) . "\n");
    return implode($pass);
// $password = generatePassword(8, includeSpecial: true);

    $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';
    $containsSpecial = false;

    for ($i = 0; $i < $length; $i++) {
        if (strstr($specialChars, $pass[$i])) {
            var_dump($pass[$i]);
            $containsSpecial = true;
            echo "containsSpecial";
            break;
        }
    }
    print_r($pass);
    return $pass;
}
generatePassword($length, $includeUppercase, $includeDigits, $includeSpecial);
//print_r($containsSpecial); // => true
