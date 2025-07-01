<?php

namespace Gen\Pass;

function generatePassword($length = 8, $includeUppercase = false, $includeDigits = false, $includeSpecial = false) {
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $special = '!@#$%^&*(),.?":{}|<>';

    $characterSet = $lowercase; // Start with lowercase letters

    // Add characters to the set based on the flags
    if ($includeUppercase) {
        $characterSet .= $uppercase;
    }
    if ($includeDigits) {
        $characterSet .= $digits;
    }
    if ($includeSpecial) {
        $characterSet .= $special;
    }

    print_r($characterSet . "\n");

    // Check if at least one character type is included
    if (strlen($characterSet) === 0) {
        return 'At least one character type must be included.';
    }

    // Generate password
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, mb_strlen($characterSet) - 1); // Get random index
        $password .= $characterSet[$randomIndex]; // Build the password
    }
    print_r($password);
    return $password;
}
generatePassword($length = 8, $includeUppercase = true, $includeDigits = true, $includeSpecial = true);