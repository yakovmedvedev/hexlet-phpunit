<?php

function gcd(int $x, int $y): int
{
    while ($y != 0) {
        $temp = $y;
        $y = $x % $y;
        $x = $temp;
    }
    return abs($x);
}

function lcm(int $x, int $y): int
{
    return ($x * $y) / gcd($x, $y);
}

function makeRational($num, $denom)
{
    if ($denom < 0) {
        $num = -$num;
        $denom = -$denom;
    }
    $gcd = gcd($num, $denom);
    return ['num' => $num / $gcd, 'denom' => $denom / $gcd];
}

function getNum($x)
{
    return $x['num'];
}
function getDenom($x)
{
    return $x['denom'];
}

function ratToString($x)
{
    return getNum($x) . '/' . getDenom($x);
}

function add($rational1, $rational2)
{
    $commonDenom = lcm($rational1['denom'], $rational2['denom']);
    $rational1['num'] = $rational1['num'] * ($commonDenom / $rational1['denom']);
    $rational2['num'] = $rational2['num'] * ($commonDenom / $rational2['denom']);
    $rational3['num'] = $rational1['num'] + $rational2['num'];
    return ratToString(makeRational($rational3['num'], $commonDenom));
}
function sub($rational1, $rational2)
{
    $commonDenom = lcm($rational1['denom'], $rational2['denom']);
    $rational1['num'] = $rational1['num'] * ($commonDenom / $rational1['denom']);
    $rational2['num'] = $rational2['num'] * ($commonDenom / $rational2['denom']);
    $rational3['num'] = $rational1['num'] - $rational2['num'];
    return ratToString(makeRational($rational3['num'], $commonDenom));
}

print_r(6 % 8);
$rational1 = makeRational(6,8);
$rational2 = makeRational(3,-9);
print_r("rational1");
print_r("\n");
print_r($rational1);
print_r("\n");
print_r("rational2");
print_r("\n");
print_r($rational2);
print_r("\n");
print_r("gcd");
print_r("\n");
print_r(gcd(12, 21));
print_r("\n");
print_r("lcm");
print_r("\n");
print_r(lcm(6, 8));
print_r("\n");
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
print_r("\n");



//AI's
//Hello. I need to find the least common multiple of two numbers in php. I have two fractions with different denominators. I need to add and subtract them. Can you outlined the script? Thanks
//
//OpenAI logo
//OpenAI GPT-4o mini
//2 minutes ago
//Certainly! To add and subtract fractions with different denominators in PHP, you'll first need to find the least common multiple (LCM) of the denominators. Here's how you can outline your script:
//
//Define a function to calculate the GCD (Greatest Common Divisor).
//Define a function to calculate the LCM using the GCD.
//Input the two fractions.
//Calculate the LCM of the denominators.
//Convert each fraction to have the same denominator.
//Perform the addition or subtraction.
//Simplify the resulting fraction if necessary.
//Here is an example implementation:
//
//PHP
//<?php
//
//// Function to calculate GCD
//function gcd($a, $b) {
//    while ($b != 0) {
//        $temp = $b;
//        $b = $a % $b;
//        $a = $temp;
//    }
//    return $a;
//}
//
//// Function to calculate LCM
//function lcm($a, $b) {
//    return ($a * $b) / gcd($a, $b);
//}
//
//// Function to add two fractions
//function addFractions($numerator1, $denominator1, $numerator2, $denominator2) {
//    $commonDenominator = lcm($denominator1, $denominator2);
//    $newNumerator1 = $numerator1 * ($commonDenominator / $denominator1);
//    $newNumerator2 = $numerator2 * ($commonDenominator / $denominator2);
//    $resultNumerator = $newNumerator1 + $newNumerator2;
//
//    return simplifyFraction($resultNumerator, $commonDenominator);
//}
//
//// Function to subtract two fractions
//function subtractFractions($numerator1, $denominator1, $numerator2, $denominator2) {
//    $commonDenominator = lcm($denominator1, $denominator2);
//    $newNumerator1 = $numerator1 * ($commonDenominator / $denominator1);
//    $newNumerator2 = $numerator2 * ($commonDenominator / $denominator2);
//    $resultNumerator = $newNumerator1 - $newNumerator2;
//
//    return simplifyFraction($resultNumerator, $commonDenominator);
//}
//
//// Function to simplify a fraction
//function simplifyFraction($numerator, $denominator) {
//    $gcd = gcd(abs($numerator), abs($denominator));
//    return [$numerator / $gcd, $denominator / $gcd];
//}
//
//// Input: Fractions
//$numerator1 = 1;
//$denominator1 = 4;
//
//$numerator2 = 1;
//$denominator2 = 6;
//
//// Add fractions
//list($resultNumeratorAdd, $resultDenominatorAdd) = addFractions($numerator1, $denominator1, $numerator2, $denominator2);
//echo "Addition Result: {$resultNumeratorAdd}/{$resultDenominatorAdd}\n";
//
//// Subtract fractions
//list($resultNumeratorSub, $resultDenominatorSub) = subtractFractions($numerator1, $denominator1, $numerator2, $denominator2);
//echo "Subtraction Result: {$resultNumeratorSub}/{$resultDenominatorSub}\n";
//
//?
//<!--Explanation:-->
//<!--GCD Function: This function calculates the GCD of two numbers using the Euclidean algorithm.-->
//<!---->
//<!--LCM Function: This function calculates the LCM using the relationship between GCD and LCM.-->
//<!---->
//<!--Add/Subtract Functions: These functions find a common denominator, convert the fractions, perform the operation (addition or subtraction), and return the result.-->
//<!---->
//<!--Simplify Function: This function simplifies the resulting fraction by dividing both numerator and denominator by their GCD.-->
//<!---->
//<!--Example Usage: The last part of the script demonstrates the addition and subtraction of two fractions (1/4 and 1/6) and outputs the results.-->
//<!---->
//<!--Feel free to modify the numerators and denominators in the example usage to test with different fractions!-->



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