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
}
