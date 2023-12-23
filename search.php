<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$key = "";

if(isset($_POST["key"])){
    $key = $_POST["key"];
}

// Get product
$productModel = new Product();
$products = $productModel->getProductsByKeyWord($key);
var_dump($products);
// if ($user && password_verify($password, $user["password"])) {
    
//     $_SESSION['account'] = $user;
//     header('location: index.php');
// } else {
//     echo "<script>alert('Đăng nhập không thành công!!!'); window.location.href='index.php';</script>";
// }

