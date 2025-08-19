<?php

function gcd($x, $y) {
    while ($y != 0) {
        $temp = $y;
        $y = $x % $y;
        $x = $temp;
    }
    return abs($x);
}

function makeRational($num, $denom)
{
    $gcd = gcd($num, $denom);
    return ['num' => $num / $gcd, 'denom' => $denom / $gcd];
}



function getNum($rational)
{
    return $rational['num'];
}
function getDenom($rational)
{
    return $rational['denom'];
}
function add($rational1, $rational2)
{
    $num3 = $rational1['num'] + $rational2['num'];
    $denom3 = $rational2['denom'] + $rational1['denom'];
    return makeRational($num3, $denom3);
}
function sub($rational1, $rational2)
{
    $num3 = $rational1['num'] - $rational2['num'];
    $denom3 = $rational1['denom'] - $rational2['denom'];
    return makeRational($num3, $denom3);
}

//$num = 10;
//$denom = 20;
$rational1 = makeRational(10,3);
$rational2 = makeRational(3,9);
print_r("rational1");
print_r("\n");
print_r($rational1);
print_r("\n");
print_r("rational2");
print_r("\n");
print_r($rational2);
print_r("\n");
//$gcd = gcd($rational1['num'], $rational1['denom']);
//print_r($gcd);
//print_r("\n");
//$gcd = gcd($rational2['num'], $rational2['denom']);
//print_r($gcd);
//print_r("\n");
print_r("num1");
print_r("\n");
print_r(getNum($rational1));
print_r("\n");
print_r("denom1");
print_r("\n");
print_r(getDenom($rational1));
print_r("\n");
print_r("num2");
print_r("\n");
print_r(getNum($rational2));
print_r("\n");
print_r("denom2");
print_r("\n");
print_r(getDenom($rational2));
print_r("\n");
print_r("add");
print_r("\n");
print_r(add($rational1, $rational2));
print_r("\n");
print_r("sub");
print_r("\n");
print_r(sub($rational1, $rational2));



//AI's
//Hello. Please tell me how to normalize a fraction in PHP
//
//OpenAI logo
//OpenAI GPT-4o mini
//1 hour ago
//To normalize a fraction in PHP, you need to reduce it to its simplest form. This involves dividing the numerator and the denominator by their greatest common divisor (GCD). Here's a step-by-step guide along with a sample code:
//
//Define the fraction: You will have the numerator and the denominator.
//Calculate the GCD: You can use the gcd function to find the greatest common divisor of the numerator and denominator.
//Divide both the numerator and denominator by the GCD: This will give you the normalized fraction.
//Here's how you can implement this in PHP:
//function gcd($a, $b) {
//    while ($b != 0) {
//        $temp = $b;
//        $b = $a % $b;
//        $a = $temp;
//    }
//    return abs($a);
//}
//
//function normalizeFraction($numerator, $denominator) {
//    // Handle the case where denominator is zero
//    if ($denominator == 0) {
//        throw new InvalidArgumentException("Denominator cannot be zero.");
//    }
//
//    // Calculate the GCD of numerator and denominator
//    $gcd = gcd($numerator, $denominator);
//
//    // Divide numerator and denominator by GCD
//    $normalizedNumerator = $numerator / $gcd;
//    $normalizedDenominator = $denominator / $gcd;
//
//    // Ensure the denominator is positive
//    if ($normalizedDenominator < 0) {
//        $normalizedNumerator = -$normalizedNumerator;
//        $normalizedDenominator = -$normalizedDenominator;
//    }
//
//    return [$normalizedNumerator, $normalizedDenominator];
//}
//
//// Example of usage
//$numerator = 4;
//$denominator = 8;
//
//list($normNum, $normDen) = normalizeFraction($numerator, $denominator);
//echo "Normalized fraction: $normNum/$normDen"; // Output: Normalized fraction: 1/2
//Explanation:
//gcd Function: This function calculates the greatest common divisor using the Euclidean algorithm.
//normalizeFraction Function: This function handles the normalization by checking for a zero denominator, calculating the GCD, and dividing both the numerator and denominator by the GCD. It also ensures that the denominator is positive to maintain standard notation for fractions.
//                                                                                                                                                                                                                                                                            You can adjust the input values for different fractions, and the code will output the normalized result.