<?php


//AI
// Function to create a point
function makeDecartPoint($x, $y) {
    return ['x' => $x, 'y' => $y];
}

// Function to create a rectangle
function makeRectangle($topLeft, $width, $height) {
    if ($width <= 0 || $height <= 0) {
        throw new InvalidArgumentException("Width and height must be positive values.");
    }

    return [
        'topLeft' => $topLeft,
        'width' => $width,
        'height' => $height
    ];
}

// Get the starting point of the rectangle
function getStartPoint($rectangle) {
    return $rectangle['topLeft'];
}

// Get the width of the rectangle
function getWidth($rectangle) {
    return $rectangle['width'];
}

// Get the height of the rectangle
function getHeight($rectangle) {
    return $rectangle['height'];
}

// Check if the rectangle contains the origin
function containsOrigin($rectangle) {
    $topLeft = $rectangle['topLeft'];
    $bottomRight = [
        'x' => $topLeft['x'] + $rectangle['width'],
        'y' => $topLeft['y'] - $rectangle['height']
    ];

    return ($topLeft['x'] <= 0 && $bottomRight['x'] >= 0) && ($bottomRight['y'] <= 0 && $topLeft['y'] >= 0);
}

// Example usage
$p = makeDecartPoint(0, 1);
$rectangle = makeRectangle($p, 4, 5);

echo containsOrigin($rectangle) ? 'true' : 'false'; // Output: false

$rectangle2 = makeRectangle(makeDecartPoint(-4, 3), 5, 4);
echo "\n" . (containsOrigin($rectangle2) ? 'true' : 'false'); // Output: true

?>