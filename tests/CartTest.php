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
    public function testGetCartCreatesEmptyCart()
    {
        $cart = getCart();
        $this->assertIsArray($cart);
        $this->assertArrayHasKey('items', $cart);
        $this->assertCount(0, $cart['items']);
    }

    public function testAddItemToCart()
    {
        $cart = getCart();
        $good = ['name' => 'car', 'price' => 100];
        addItem($cart, $good, 3);
        
        $this->assertCount(1, $cart['items']);
        $this->assertEquals($good, $cart['items'][0]['good']);
        $this->assertEquals(3, $cart['items'][0]['count']);
    }

    public function testGetItemsListAndQuantityOfItems()
    {
        $cart = getCart();
        addItem($cart, ['name' => 'car', 'price' => 100], 3);
        addItem($cart, ['name' => 'tv', 'price' => 10], 5);
        
        $items = getItems($cart);
        $this->assertEquals(2, getItemsCount($cart));
        $this->assertEquals(['name' => 'car', 'price' => 100], $items[0]['good']);
        $this->assertEquals(3, $items[0]['count']);
        $this->assertEquals(['name' => 'tv', 'price' => 10], $items[1]['good']);
        $this->assertEquals(5, $items[1]['count']);
    }

    public function testGetCountTotalQuantityOfGoods()
    {
        $cart = getCart();
        addItem($cart, ['name' => 'car', 'price' => 100], 3);
        addItem($cart, ['name' => 'tv', 'price' => 10], 5);
        
        $this->assertEquals(8, getCount($cart));
    }

    public function testGetCostReturnsTotalPrice()
    {
        $cart = getCart();
        addItem($cart, ['name' => 'car', 'price' => 100], 3);
        addItem($cart, ['name' => 'tv', 'price' => 10], 5);
        
        $this->assertEquals(350, getCost($cart));
    }
}

// <?php

// declare(strict_types=1);

// use Cart;

// class CartTest extends \PHPUnit\Framework\TestCase
// {
//     public function testCartFunctions()
//     {
//         // Initialize the cart
//         $cart = Cart\getCart();

//         // Test adding items
//         $good1 = ['name' => 'car', 'price' => 100];
//         $count1 = 4;
//         $cart = Cart\addItem($cart, $good1, $count1);
        
//         $this->assertCount(1, $cart['items']);
        
//         $good2 = ['name' => 'tv', 'price' => 50];
//         $count2 = 2;
//         $cart = Cart\addItem($cart, $good2, $count2);
        
//         $this->assertCount(2, $cart['items']);

//         // Test getting items
//         $items = Cart\getItems($cart);
//         $this->assertIsArray($items);
//         $this->assertCount(2, $items);

//         // Test getting items count
//         $itemsCount = Cart\getItemsCount($cart);
//         $this->assertEquals(2, $itemsCount);

//         // Test getting total goods count
//         $totalGoodsCount = Cart\getCount($cart);
//         $this->assertEquals(6, $totalGoodsCount); // 4 + 2

//         // Test getting the total cost
//         $totalCost = Cart\getCost($cart);
//         $this->assertEquals(600, $totalCost); // (100 * 4) + (50 * 2)
//     }
// }