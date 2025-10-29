<?php

namespace App;

use Illuminate\Collection;

$coll = [6, 7, 8, 9, 10, 'king'];



class DeckOfCards
{
    public $deck;

    public function __construct(array $coll)
    {
        $this->deck = $deck;
        $this->deck = collect($coll);
    }

    public function getShuffled()
    {
        $this->deck = map(fn($card) => array_fill(0, 4, $card))->shuffle()->all();
    }
}
print_r($deck);
$q = [6, 7, 8, 9, 10, 'king'];
$coll = new DeckOfCards($q);
$coll->getShuffled($q);

// Collection::macro('toUpper', function () {
//     return $this->map(function ($value) {
//         return Str::upper($value);
//     });
// });
 
// $collection = collect(['first', 'second']);
 
// $upper = $collection->toUpper();
