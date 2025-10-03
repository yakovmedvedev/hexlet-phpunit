<?php

namespace App\Classes;

use App\Classes\ComparableInterface;

class User implements ComparableInterface {
    private $id;
    private $name;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function compareTo($user2) {
        return $this->id === $user2->id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }
}