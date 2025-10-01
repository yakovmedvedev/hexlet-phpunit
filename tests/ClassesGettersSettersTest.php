<?php

namespace Hexlet\Phpunit\Tests;

// require_once __DIR__ . "/../src/classes/User.php";

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
use App\Classes\User;
use App\Classes\User\Address;

class ClassesGettersSettersTest extends TestCase
{
    public function testAddress()
    {
        $address = new Address('Russia', 'Moscow', 'Lenina');

        $this->assertEquals('Russia', $address->getCountry());
        $this->assertEquals('Moscow', $address->getCity());
        $this->assertEquals('Lenina', $address->getStreet());

        $address->setCountry('Netherlands');
        $this->assertEquals('Netherlands', $address->getCountry());

        $address->setCity('Amsterdam');
        $this->assertEquals('Amsterdam', $address->getCity());

        $address->setStreet('Brouwersgracht');
        $this->assertEquals('Brouwersgracht', $address->getStreet());
    }

    public function testUsersWithAddresses()
    {
        $user = new User('Ivan');
        $this->assertEquals('Ivan', $user->getName());

        $address = new User\Address('Russia', 'Moscow', 'Lenina');

        $user->addAddress($address);

        $user2 = new User('Mila');
        $user2->addAddress($address);

        $this->assertEquals(
            $user->getAddresses(),
            $user2->getAddresses()
        );

        $this->assertEquals(
            $user->getAddresses(),
            [$address]
        );

        $address->setCountry('USA');

        $this->assertEquals(
            $user->getAddresses(),
            $user2->getAddresses()
        );

        $address2 = new User\Address('Russia', 'Omsk', 'Belinskigo');
        $user->addAddress($address2);
        $this->assertIsArray($user->getAddresses());
        $this->assertCount(2, $user->getAddresses());

        $this->assertEquals(
            $user->getAddresses(),
            [$address, $address2]
        );
    }
}
