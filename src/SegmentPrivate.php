<?php

namespace App; 

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

class SegmentPrivate
{
    private $beginPoint;
    private $endPoint;
    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }
    public function getBeginPoint()
    {
        return $this->beginPoint;
    }
    public function getEndPoint()
    {
        return $this->endPoint;
    }
}
$segment = new SegmentPrivate(3, 9);
echo $segment->getBeginPoint();
echo $segment->getEndPoint();