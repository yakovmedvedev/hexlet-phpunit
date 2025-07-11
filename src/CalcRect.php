<?php

namespace Calc\Rect;

// $length = 2;
// $width = 3;

function calculateRectangleArea(int $length, int $width)
{
    if ($length <= 0 || $width <= 0) {
        return null; // Invalid dimensions
    }
    return $length * $width;
}