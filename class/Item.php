<?php
include "/home/joanna/Workspace/shop/config.php"; 
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
     public function loadAllItems(mysqli $connection) {
        $sql = "SELECT * FROM products"; 
        $ret = []; 
        $result = $connection->query($sql); 
        
        if ($result == true && $result->num_rows != 0) {
            
            foreach ($result as $row) {
                
                $loadedItem = new Item(); 
                $loadedItem->id = $row['id']; 
                $loadedItem->name = $row['name']; 
                $loadedItem->amount = $row['amount']; 
                $loadedItem->price = $row['price']; 
                $loadedItem->description = $row['description']; 
                
                $ret[] = $loadedItem; 
            }
        }
        return $ret; 
    }
     public function deleteItem(mysqli $connection) {
        
        if ($this->id != 1) {
            $sql = "DELETE FROM products WHERE id= $this->id"; 
            $result = $connection->query($sql); 
            if ($result == true) {
                $this->id = -1; 
                return true; 
            }
            return false; 
        }
        return true; 
    }
    public function loadItemByName(mysqli $connection, $name) {
        $sql = "SELECT * FROM products WHERE name=$this->name"; 
        $result = $connection->query($sql); 
        
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc(); 
            $loadedItem = new Item(); 
            $loadedItem->id = $row['id']; 
            $loadedItem->name = $row['name']; 
            $loadedItem->amount = $row['amount']; 
            $loadedItem->price = $row['price']; 
            $loadedItem->description = $row['description']; 
            
            return $loadedItem; 
        }
        return null; 
    }
    
}

