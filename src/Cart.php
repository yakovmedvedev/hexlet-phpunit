<?php

namespace Cart;

function getCart()
{
    return [
        'items' => [],
    ];
}
$cart = getCart();
print_r("Initial cart: \n");
print_r($cart);
$good =['name' => 'car', 'price' => 100];
$count= 4;


function addItem(array &$cart, $good, $count)
{
    $cart['items'][] = ['good' => $good, 'count' => $count];
    return ($cart);
}
addItem($cart, $good, $count);
$good =['name' => 'tv', 'price' => 50];
$count= 2;
addItem($cart, $good, $count);
print_r("_______\nFull cart: \n");
print_r($cart);

function getItems($cart)
{
    $items = [];
    foreach ($cart['items'] as $item) {
        $items[] = $item;
    }
    return ($items);
}
print_r("_______\nList of items: \n");
print_r(getItems($cart));

function getItemsCount($cart)
{
    $items = [];
    foreach ($cart['items'] as $item) {
        $items[] = $item;
    }
    return count($items);
}
print_r("_______\nQuantity of items: \n");
print_r("Count: " . (getItemsCount($cart)) . "\n");

function getCount($cart)
{
    $count = 0;
    foreach ($cart['items'] as $item) {
        $count += $item['count'];
    }
    return $count;
}
print_r("_______\nQuantity of goods: \n");
print_r("Count: " . (getCount($cart)) . "\n");

function  getCost($cart)
{
    $total = 0;
    foreach ($cart['items'] as $item) {
        $total += $item['good']['price'] * $item['count'];
    }
    return $total;
}
print_r("_______\nTotal price of goods: \n");
print_r("Total: " . (getCost($cart)) . "\n");
