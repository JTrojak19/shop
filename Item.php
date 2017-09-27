<?php
$mysqli = new mysqli('localhost', 'root', 'coderslab', 'shop');
class Item 
{
    private $id; 
    private $name; 
    private $description; 
    private $price; 
    private $amount; 
    
    public function __construct() {
        $this->id = -1;
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
    public function saveToDB(mysqli $connection) {
        
        if ($this->id == -1) {
            $sql = "INSERT INTO products(name, amount, price, description) VALUES('$this->name', '$this->amount', '$this->price', '$this->description')"; 
            $result = $connection->query($sql); 
            
            if ($result == true) {
                $this->id = $connection->insert_id; 
                return true; 
            }
            return false; 
        }
    }
}
$item = new Item(); 
$item->setName('kosiarka'); 
$item->setAmount(10); 
$item->setPrice(100); 
$item->setDescription('Taka sobie kosiarka'); 
var_dump($item->saveToDB($mysqli)); 
var_dump($item); 
