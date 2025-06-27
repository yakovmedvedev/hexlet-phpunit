<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/SetArray.php";

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Functional;

use function Set\Array\set;


class SetArrayTutorsTest extends TestCase
{
    //BEGIN
    private $data;
    private $dataCopy;

    public function setUp(): void
    {
        $this->data = [
            'a' => [
                'b' => [
                    'c' => 'd'
                ]
            ]
        ];
        $this->dataCopy = $this-> data;
    }

    public function testSolutionWithPlainSet(): void
    {
        set($this->data, ['a'], 'value');
        $this->dataCopy['a'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNestedSet(): void
    {
        set($this->data, ['a', 'b', 'c'], 'value');
        $this->dataCopy['a']['b']['c'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }

    public function testSolutionWithNewProperty(): void
    {
        set($this->data, ['a', 'b', 'd'], 'value');
        $this->dataCopy['a']['b']['d'] = 'value';
        $this->assertEquals($this->dataCopy, $this->data);
    }
    //END
}