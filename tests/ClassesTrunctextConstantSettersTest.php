<?php

namespace App\Tests;

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
use App\Classes\Truncater;

use function App\Classes\Truncater\truncate;

class ClassesTrunctextConstantSettersTest extends TestCase
{
    public function testTruncate()
    {
        $truncater = new Truncater();
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one two', $actual);
        $actual = $truncater->truncate('one two', ['length' => 6]);
        $this->assertEquals('one tw...', $actual);
        $actual = $truncater->truncate('one two', ['separator' => '.']);
        $this->assertEquals('one two', $actual);
        $actual = $truncater->truncate('one two', ['length' => '3']);
        $this->assertEquals('one...', $actual);

        $truncater = new Truncater(['length' => 3]);
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);
        $actual = $truncater->truncate('one two', ['separator' => '!']);
        $this->assertEquals('one!', $actual);
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);

        $actual = $truncater->truncate('one two', ['length' => 7]);
        $this->assertEquals('one two', $actual);
    }
}
