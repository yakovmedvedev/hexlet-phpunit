<?php

namespace Gen\Pass;

$symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-=[]{}|;:,.<>?/';
$length = 12;
$includeUppercase = true;
$includeDigits = true;
$includeSpecial = true;
$digits = '1234567890';
$specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?/';

function generatePassword($length, $symbols)
{
    
    $pass = [];    
    for ($i = 0; $i < $length; $i++) {
        $symbol = rand(0, mb_strlen($symbols) - 1);
//        var_dump($symbol);
        $pass[] = $symbols[$symbol];
    }
    print_r(implode($pass) . "\n");
    return implode($pass);
// $password = generatePassword(8, includeSpecial: true);

    
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
generatePassword($length, $symbols);
//print_r($containsSpecial); // => true
