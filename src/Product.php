<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.17
 * Time: 14:35
 */
class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $stock;

    public function __construct()
    {
        $this->id = -1;
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->stock = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


}