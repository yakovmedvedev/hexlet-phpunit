<?php

namespace App\Tests;

require_once __DIR__ . "/../src/OodSymphonyString.php";

use PHPUnit\Framework\TestCase;

use function App\Ood\Symphony\String\getQuestions;

class OodCollectStringTest extends TestCase
{
    public function testGetQuestions()
    {
        $text1 = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;
        $actual1 = getQuestions($text1);

        $expected1 = "ehu?\none two?";
        $this->assertEquals($expected1, $actual1);
    }
}