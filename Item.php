<?php
class Item 
{
    public $id; 
    public $name; 
    public $description; 
    public $price; 
    public $amount; 
    
    public function __construct() {
        $this->id = 0;
        $this->name = "";
        $this->description = ""; 
        $this->price = 0; 
        $this->amount = 0; 
    }
    public function getId() {
        return $this->id; 
    }
    public function setName($name) {
        $this->name = $name; 
    }
    public function getName() {
        return $this->name; 
    }
    public function setDescription($description) {
        $this->description = $description; 
    }
    public function getDescription() {
        return $this->description; 
    }
    public function setPrice($price) {
        $this->price = $price; 
    }
    public function getPrice() {
        return $this->price; 
    }
    public function setAmount($amount) {
        $this->amount = $amount; 
    }
    public function getAmount() {
        return $this->amount; 
    }
}
