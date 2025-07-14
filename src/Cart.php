<?php

namespace Cart;

function getCart() {
    return [
        'items' => [],
    ];
}

function addItem(&$cart, $good, $count) {
    $cart['items'][] = ['good' => $good, 'count' => $count];
}

function getItems($cart) {
    return $cart['items'];
}

function getCost($cart) {
    $total = 0;
    foreach ($cart['items'] as $item) {
        $total += $item['good']['price'] * $item['count'];
    }
    return $total;
}

function getCount($cart) {
    $totalCount = 0;
    foreach ($cart['items'] as $item) {
        $totalCount += $item['count'];
    }
    return $totalCount;
}