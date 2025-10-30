<?php
 
namespace App;
 
use Illuminate\Collections;
 
class DeckOfCards
{
    private $deck;

    public function __construct(array $coll)
    {
        $this->deck = collect($coll)
            ->flatMap(fn($card) => array_fill(0, 4, $card))
            ->shuffle();
    }
    public function getShuffled(): array
    {
        return $this->deck->shuffle()->toArray();
    }
}

$q = [6, 7, 8, 9, 10, 'king'];
$coll = new DeckOfCards($q);
print_r($coll->getShuffled($q));
 
// Collection::macro('toUpper', function () {
//     return $this->map(function ($value) {
//         return Str::upper($value);
//     });
// });
 
// $collection = collect(['first', 'second']);
 
// $upper = $collection->toUpper();