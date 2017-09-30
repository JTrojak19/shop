<?php
include "/home/joanna/Workspace/shop/class/Item.php"; 
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class ItemTest extends TestCase 
{
    use TestCaseTrait;
    protected function getConnection() {
       $pdo = new PDO(
       'mysql:dbname=shop_tests;host=localhost',
       'root',
       'coderslab'
     );
     return $this->createDefaultDBConnection($pdo, 'shop_tests');
    }

    protected function getDataSet() {
        
    }
}
