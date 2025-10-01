<?php

namespace App\Classes;

use App\Classes\Point;

class Segment
{
    public $point1;
    public $point2;

    public function __construct($point1, $point2)
    {
        $this->point1 = $point1;
        $this->point2 = $point2;
    }

    public function __toString()
    {
        return "[{$this->point1}, {$this->point2}]";
    }
}
$point1 = new Point(1, 10);
print_r($point1);
$point2 = new Point(11, -3);
$segment1 = new Segment($point1, $point2);
print_r($segment1);
echo $segment1; // [(1, 10), (11, -3)]
print_r("\n");
$segment2 = new Segment($point2, $point1);
echo $segment2; // [(11, -3), (1, 10)]