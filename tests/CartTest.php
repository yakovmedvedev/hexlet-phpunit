<?php

namespace Hexlet\Phpunit\Tests;

require_once __DIR__ . "/../src/Cart.php";

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

use function Cart\getCart;
use function Cart\addItem;
use function Cart\getItems;
use function Cart\getCost;
use function Cart\getCount;
use function Cart\getItemsCount;

class CartTest extends TestCase
{
    public function testCartFunctions()
    {
        // cart
        $cart = getCart();

        // adding items
        $good = ['name' => 'car', 'price' => 100];
        $count = 4;
        addItem($cart, $good, $count);
        
        $this->assertCount(1, $cart);
        
        $good = ['name' => 'tv', 'price' => 50];
        $count = 2;
        addItem($cart, $good, $count);
        
        $this->assertCount(2, $cart['items']);

        // items
        $this->assertIsArray(getItems($cart));
        $this->assertCount(2, getItems($cart));

        // items count
        $this->assertEquals(2, count(getItems($cart)));

        // total goods count
        $this->assertEquals(6, getCount($cart));

        // total cost
        $this->assertEquals(500, getCost($cart));
    }
}

// tutor's
// <?php

// namespace App\Tests;

// use PHPUnit\Framework\TestCase;

// use function App\Implementations\getCart;
// use function App\Implementations\addItem;
// use function App\Implementations\getItems;
// use function App\Implementations\getCost;
// use function App\Implementations\getCount;

// class SolutionTest extends TestCase
// {
//     public function testCart(): void
//     {
//         // BEGIN
//         $cart = getCart();

//         $this->assertEquals(0, count(getItems($cart)));

//         $this->assertEquals(getItems($cart), []);
//         $this->assertEquals((int)getCost($cart), 0);
//         $this->assertEquals(getCount($cart), 0);

//         addItem($cart, ['name' => 'car', 'price' => 100], 3);
//         $this->assertEquals(1, count(getItems($cart)));
//         $this->assertEquals(300, getCost($cart));
//         $this->assertEquals(3, getCount($cart));

//         addItem($cart, ['name' => 'tv', 'price' => 10], 5);
//         $this->assertEquals(2, count(getItems($cart)));
//         $this->assertEquals(350, getCost($cart));
//         $this->assertEquals(8, getCount($cart));
//         // END
//     }
// }