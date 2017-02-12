<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.17
 * Time: 15:06
 */

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $product;

    protected function setUp()
    {
        parent::setUp();
        $this->product = new Product();
    }

    public function testCreateObject(){
        $this->assertInstanceOf(Product::class, $this->product);
    }

    function testSetName()
    {
        $this->product->setName('Piotr');
        $name = $this->product->getName();
        $this->assertEquals('Piotr', $name);
    }

    function testSetPrice()
    {
        $this->product->setPrice(100);
        $name = $this->product->getPrice();
        $this->assertEquals(100, $name);
    }

    function testSetDescription()
    {
        $this->product->setDescription('Opis');
        $name = $this->product->getDescription();
        $this->assertEquals('Opis', $name);
    }

    function testSetStock()
    {
        $this->product->setStock(20);
        $result = $this->product->getStock();
        $this->assertEquals(20, $result);
    }



}