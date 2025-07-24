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
    private $csv;
    private $json;
    private $yaml;
    private $html;

    public function setUp(): void
    {
        $this->csv = __DIR__ . "/fixtures/list.csv";
        $this->json = __DIR__ . "/fixtures/list.json";
        $this->yaml = __DIR__ . "/fixtures/list.yaml";
        $this->html = __DIR__ . "/fixtures/list.html";
    }
    public function testEqualStringsCsv()
    {
        $this->assertStringEqualsFile($this->html, makeList($this->csv));
    }
    public function testEqualStringsJson()
    {
        $this->assertStringEqualsFile($this->html, makeList($this->json));
    }
    // public function testEqualStringsYaml()
    // {
    //     $this->assertStringEqualsFile($this->html, makeList($this->yaml));
    // }
    
}

//tutor's
//  <?php

// namespace App\Tests;

// use PHPUnit\Framework\TestCase;

// use function App\Implementations\toHtmlList;

// class SolutionTest extends TestCase
// {
//     //BEGIN
//     public function testtoHtmlList(): void
//     {
//         $expected = file_get_contents($this->getFixtureFullPath("result.html"));

//         $result = toHtmlList($this->getFixtureFullPath("list.csv"));
//         $this->assertEquals($expected, $result);

//         $result2 = toHtmlList($this->getFixtureFullPath("list.json"));
//         $this->assertEquals($expected, $result2);

//         $result3 = toHtmlList($this->getFixtureFullPath("list.yaml"));
//         $this->assertEquals($expected, $result3);
//     }

//     public function getFixtureFullPath($fixtureName)
//     {
//         $parts = [__DIR__, 'fixtures', $fixtureName];
//         return realpath(implode('/', $parts));
//     }
//     //END
// }