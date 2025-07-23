<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/HtmlListFromFixtures.php";

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

use function HtmlListFromFixtures\makeList;

class HtmlListTest extends TestCase
{
    private $csv = "./fixtures/list.csv";
    private $json;
    private $yaml;
    private $html;

    public function setUp(): void
    {
        // $this->csv = "./fixtures/list.csv";
        $this->json = "./fixtures/list.json";
        $this->yaml = file_get_contents(__DIR__ . "/fixtures/list.yaml");
        $this->html = file_get_contents(__DIR__ . "/fixtures/list.html");
    }
    public function testEqualStrings()
    {
        $csv = "./fixtures/list.csv";
        $this->assertEquals($this->html, makeList($csv));
    }
}