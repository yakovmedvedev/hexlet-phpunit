<?php

namespace App\Classes;

interface ComparableInterface
{
    public function __construct($id, $name);
    public function getId();
    public function getName();
}