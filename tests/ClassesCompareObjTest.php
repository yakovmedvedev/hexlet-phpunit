<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/ClassesCompareObj.php";

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
use App\Users;

use function App\Classes\Compare\Obj\areUsersEqual;

class ClassesCompareObjTest extends TestCase
{
    public function testAreUsersEqual()
    {
        $user1 = new \App\Users();
        $user1->id = 1;
        $user1->name = 'Petr';

        $user2 = new \App\Users();
        $user2->id = 1;
        $user2->name = 'Ignat';

        $this->assertTrue(areUsersEqual($user1, $user2));

        $user3 = new \App\Users();
        $user3->id = 2;

        $this->assertFalse(areUsersEqual($user1, $user3));

        $user4 = new \App\Users();
        $user4->id = true;

        $this->assertFalse(areUsersEqual($user1, $user4));

        $user5 = new \App\Users();
        $user5->id = "1";

        $this->assertFalse(areUsersEqual($user1, $user5));
    }

    public function testAreUserEqualWithWrongType()
    {
        $this->expectException(\TypeError::class);
        $user1 = new \App\Users();
        $user1->id = 1;
        $user1->name = 'Petr';

        $obj = new \stdClass();
        $obj->id = 1;

        $this->assertFalse(areUsersEqual($user1, $obj));
    }
}
