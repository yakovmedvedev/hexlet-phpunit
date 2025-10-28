<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/OodDsStack.php";

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
use Ds\Stack;

use function App\Ood\Ds\Stack\checkIfBalanced;

class OodDsStackTest extends TestCase
{   
    public function testBalanced()
    {
        $expression = '{}()<>[]';
        $this->assertTrue(checkIfBalanced($expression));
    }
    // public function testNotBalanced()
    // {
    //     $expression = '{}()<>]]';
    //     $this->assertGreaterThan(0, checkIfBalanced($expression));
    // }
}
