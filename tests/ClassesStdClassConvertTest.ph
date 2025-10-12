<?php

namespace App\Tests;


// require_once __DIR__ . "/../src/ClassesThrowExeption.php";

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

use function App\Classes\Std\Class\Array\To\Obj\toStd;

class ClassesStdClassConvertTest extends TestCase
{
    public function testConverter()
    {
        $data = [
            'key' => 'value',
            'key2' => 'value2',
        ];
        $config = toStd($data);
        $this->assertEquals((object) $data, $config);

        $data2 = [
            'keysdd' => 'vasdfalue',
            'kasdfey2' => 'asdvalue2',
        ];
        $config = toStd($data2);
        $this->assertEquals((object) $data2, $config);
    }
}
