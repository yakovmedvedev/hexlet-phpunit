<?php

namespace App\Classess\Throw\Exeption;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function json_decode($json, $assoc = false)
{
    $result = \json_decode($json, $assoc);

    if (\json_last_error() !== \JSON_ERROR_NONE) {
        throw new \Exception('JSON decode error: ' . \json_last_error_msg());
    }

    return $result;
}