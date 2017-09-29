<?php
include "/home/joanna/Workspace/shop/config.php";
include '/home/joanna/Workspace/shop/class/Item.php';
?>
<!DOCTYPE>
<html>
    <head>
        <title>
            Products Index
        </title>
    </head>
    <body>
        <h1>Products</h1>
        <table>
           <?php
           $products = new Item(); 
           $allproducts =$products->loadAllItems($mysqli); 
           foreach ($allproducts as $products) {
               echo "<tr>"; 
               echo "<td>".$products->getName()."</td>";
               echo "<td>".$products->getDescription()."</td>"; 
               echo "<td>".$products->getPrice()."</td>"; 
               echo "<td>".$products->getAmount()."</td>"; 
               echo "</tr>"; 
           }
           ?>
        </table>
    </body>
</html>


