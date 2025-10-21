<?php

namespace Hexlet\Phpunit\Tests;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Functional;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Rational;

// use function App\Classes\Method\Make\Rational\add;
// use function App\Classes\Method\Make\Rational\sub;

class ClassesMethodMakeRationalTest extends TestCase
{
    public function testGetNumDenumAddSubOfFractions()
    {
        $rat1 = new Rational(3, 9);
        $this->assertEquals(3, $rat1->getNumer());
        $this->assertEquals(9, $rat1->getDenom());

        $rat2 = new Rational(10, 3);
        $this->assertEquals(new Rational(99, 27), $rat1->add($rat2));
        $this->assertEquals(new Rational(-81, 27), $rat1->sub($rat2));
    }
}
