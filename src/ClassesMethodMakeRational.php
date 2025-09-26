<?php

class Rational
{
    public $numer;
    public $denom;
    private $temp;
    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }
    public function getNumer()
    {
        return $this->numer;
    }
    public function getDenom()
    {
        return $this->denom;
    }
    public function gcd()
    {
        while ($this->getDenom() != 0) {
        $this->temp = $this->getDenom();
        $this->denom = $this->getNumer() % $this->getDenom();
        $this->numer = $this->temp;
    }
        return $this->numer = abs($this->numer);
    }
    public function lcm()
    {
        return ($this->getNumer() * $this->getDenom() / $this->gcd());
    }

}
$rat1 = new Rational(3, 5);
$rat2 = new Rational(8, 9);
//print_r($rat1->gcd() . "\n");
print_r($rat1->lcm());
print_r("\n");
print_r($rat2->lcm());
// function gcd(int $x, int $y): int
// {
//     while ($y != 0) {
//         $temp = $y;
//         $y = $x % $y;
//         $x = $temp;
//     }
//     return abs($x);
// }

// function lcm(int $x, int $y): int
// {
//     return ($x * $y) / gcd($x, $y);
// }
// function makeRational($num, $denom)
// {
//     if ($denom < 0) {
//         $num = -$num;
//         $denom = -$denom;
//     }
//     $gcd = gcd($num, $denom);
//     return ['num' => $num / $gcd, 'denom' => $denom / $gcd];
// }

// function getNum($x)
// {
//     return $x['num'];
// }
// function getDenom($x)
// {
//     return $x['denom'];
// }

// function ratToString($x)
// {
//     return getNum($x) . '/' . getDenom($x);
// }

// function add($rational1, $rational2)
// {
//     $commonDenom = lcm(getDenom($rational1), getDenom($rational2));
//     $rational1['num'] = getNum($rational1) * ($commonDenom / getDenom($rational1));
//     $rational2['num'] = getNum($rational2) * ($commonDenom / getDenom($rational2));
//     $resultNum = $rational1['num'] + $rational2['num'];
//     return makeRational($resultNum, $commonDenom);
// }
// function sub($rational1, $rational2)
// {
//     $commonDenom = lcm(getDenom($rational1), getDenom($rational2));
//     $rational1['num'] = getNum($rational1) * ($commonDenom / getDenom($rational1));
//     $rational2['num'] = getNum($rational2) * ($commonDenom / getDenom($rational2));
//     $resultNum = $rational1['num'] - $rational2['num'];
//     return makeRational($resultNum, $commonDenom);
// }

// $rational1 = makeRational(6,8);
// $rational2 = makeRational(2,-9);