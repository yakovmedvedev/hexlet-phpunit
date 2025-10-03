<?php

namespace App\Classes;

use App\Classes\ComparableInterface;

class User1 implements ComparableInterface
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function compareTo($user1, ComparableInterface $user2)
    {
        if ($user1->getId() == $user2->getId()) {
            return true;
        }
    }
}