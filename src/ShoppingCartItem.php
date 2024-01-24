<?php

namespace Eworkssk\ZadaniePhp;

class ShoppingCartItem
{
    public int $id;
    public string $name;
    public float $price;
    public int $quantity;

    public function __construct($id, $name, $price, $quantity) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }
    
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
}