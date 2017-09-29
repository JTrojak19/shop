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

           <?php
           $products = new Item(); 
           $allproducts =$products->loadAllItems($mysqli);
           var_dump($allproducts); 
           ?>

    </body>
</html>


