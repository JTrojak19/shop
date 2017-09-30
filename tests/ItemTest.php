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
    }
}
