<?php
include "/home/joanna/Workspace/shop/class/Item.php"; 
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class ItemTest extends TestCase 
{
    use TestCaseTrait;
    public function getConnection() {
       $pdo = new PDO(
       'mysql:dbname=shop_tests;host=localhost',
       'root',
       'coderslab'
     );
     return $this->createDefaultDBConnection($pdo, 'shop_tests');
    }

    public function getDataSet() {
        return $this->createXMLDataSet('/home/joanna/Workspace/shop/dataset.xml');
    }
    public function testShouldCreateItem() {
        $this->assertEquals(1, $this->getConnection()->getRowCount('products'));
        $item = new Item();
        $this->assertInstanceof(Item::class, $item);
        $item->setName('płytki'); 
        $this->assertEquals('płytki', $item->getName()); 
        $item->setAmount(10); 
        $this->assertEquals(10, $item->getAmount()); 
        $item->setPrice(12); 
        $this->assertEquals(12, $item->getPrice()); 
        $item->setDescription('śliskie'); 
        $this->assertEquals('śliskie', $item->getDescription()); 
        $item->saveToDB(new mysqli('localhost', 'root', 'coderslab', 'shop_tests')); 
        $this->assertEquals(2, $this->getConnection()->getRowCount('products'));      
    }
    public function testShouldLoadAllItems() {
        $item = new Item();
        $item->setName('cos'); 
        $item->setAmount(10); 
        $item->setPrice(1); 
        $item->setDescription('cos tam'); 
        $item->saveToDB(new mysqli('localhost', 'root', 'coderslab', 'shop_tests')); 
        $item->loadAllItems(new mysqli('localhost', 'root', 'coderslab', 'shop_tests')); 
        $this->assertNotEmpty($item); 
        $this->assertInstanceOf(Item::class, $item); 
        $this->assertNotEmpty($item); 
        $this->assertArrayHasKey(0, $item->loadAllItems(new mysqli('localhost', 'root', 'coderslab', 'shop_tests'))); 
       $this->assertInternalType("array", $item->loadAllItems(new mysqli('localhost', 'root', 'coderslab', 'shop_tests'))); 
    }
    public function testShouldDeleteItem() {
        $item = new Item(); 
        $item->setName('cos cos'); 
        $item->setAmount(9); 
        $item->setPrice(2); 
        $item->setDescription('opis'); 
        $item->saveToDB(new mysqli('localhost', 'root', 'coderslab', 'shop_tests')); 
        $this->assertEquals(2, $this->getConnection()->getRowCount('products'));
        $item->deleteItem(new mysqli('localhost', 'root', 'coderslab', 'shop_tests')); 
        $this->assertEquals(1, $this->getConnection()->getRowCount('products')); 
    }
}
