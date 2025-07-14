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
        $item = ['name' => 'car', 'price' => 100];
        addItem($cart, $item, 3);
        
        $this->assertCount(1, $cart['items']);
        $this->assertEquals($item, $cart['items'][0]['good']);
        $this->assertEquals(3, $cart['items'][0]['count']);
    }

    public function testGetItemsReturnsCorrectItems()
    {
        $cart = getCart();
        addItem($cart, ['name' => 'car', 'price' => 100], 3);
        addItem($cart, ['name' => 'tv', 'price' => 10], 5);
        
        $items = getItems($cart);
        $this->assertCount(2, $items);
        $this->assertEquals(['name' => 'car', 'price' => 100], $items[0]['good']);
        $this->assertEquals(3, $items[0]['count']);
        $this->assertEquals(['name' => 'tv', 'price' => 10], $items[1]['good']);
        $this->assertEquals(5, $items[1]['count']);
    }

    public function testGetCountReturnsTotalQuantity()
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