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


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setStock(string $stock)
    {
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStock(): string
    {
        return $this->stock;
    }

    public function saveToDB(Connection $connection)
    {
        if($this->id == -1) {
            $sql = "INSERT INTO product (id, name, price, description, stock)
                    VALUES ('$this->id', '$this->name', '$this->price', '$this->description', '$this->stock')";
            $result = $connection->query($sql);

            if($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } else {
                return false;
            }
        } else {
            $sql = "UPDATE product 
                    SET id='$this->id',
                        name='$this->name',
                        price='$this->price',
                        description='$this->description',
                        stock='$this->stock'
                    WHERE id=$this->id";
            $result = $connection->query($sql);

            if($result == true) {
                return true;
            } else {
                return false;
            }
        }
    }


}