<?php 
    require_once "config/database.php";
    spl_autoload_register(function($classname){
        require_once "app/models/$classname.php";
    });

    $productModel = new Product;
    $product = $productModel->getAllProduct();

    var_dump($product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>