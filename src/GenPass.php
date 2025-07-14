<?php

namespace Gen\Pass;

function generatePassword($length = 5, $includeUppercase = false, $includeDigits = true, $includeSpecial = true)
{
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $special = '!@#$%^&*(),.?":{}|<>';

    $characterSet = $lowercase; // Start with lowercase letters
    $password = '';

    // Add characters to the set based on the flags
    if ($includeUppercase === true) {
        $characterSet .= $uppercase;
    }
    if ($includeDigits === true) {
        $characterSet .= $digits;
    }
    if ($includeSpecial === true) {
        $characterSet .= $special;
    }

    print_r('$characterSet: ' . $characterSet . "\n");

    // Check if at least one character type is included
    if (strlen($characterSet) === 0) {
        return 'At least one character type must be included.';
    }

    // Ensure the password contains at least one of each selected type

    // if (strpos($characterSet, $lowercase) !== false) {
    //     $password .= $lowercase[rand(0, mb_strlen($lowercase) - 1)]; // Ensure at least one lowercase
    // }
    if (preg_match("/[a-z]/", $characterSet) !== false) {
        $password .= $lowercase[rand(0, mb_strlen($lowercase) - 1)];
    }
    if ($includeUppercase) {
        $password .= $uppercase[rand(0, mb_strlen($uppercase) - 1)];
    }
    if ($includeDigits) {
        $password .= $digits[rand(0, mb_strlen($digits) - 1)];
    }
    if ($includeSpecial) {
        $password .= $special[rand(0, mb_strlen($special) - 1)];
    }

    // Generate password

    $remainingLength = $length - mb_strlen($password);
    for ($i = 0; $i < $remainingLength; $i++) {
        $randomIndex = rand(0, mb_strlen($characterSet) - 1); // Get random index
        $password .= $characterSet[$randomIndex]; // Build the password
    }
    $password = str_shuffle($password);
    print_r('password: ' . $password . "\n");
    return $password;
}
