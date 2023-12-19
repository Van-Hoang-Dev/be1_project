<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

// Thêm sản phẩm vào giỏ hàng
if(isset($_POST["add_to_cart"])){
    $productID = $_POST["add_to_cart"];
}

$productModel = new Product();
$product = $productModel->getProductByID($productID);

$cart = array(
    "id" => $product["id"],
    "name" => $product["name"],
    "price" => $product["price"],
    "image" =>  $product["image"],
    "quantity" => 1
);

// Kiem tra gio hang da duoc tao hay chua
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

// Kiem tra xem san pham da tung co trong gio hang hay chua
$product_exists = false;
foreach ($_SESSION["cart"] as &$item) {
    if($item["id"] == $productID){
        $item["quantity"]++;
        $product_exists = true;
        break;
    }
}

//Neu san pham chua co trong gio hang thi them moi
if(!$product_exists){
    array_push($_SESSION["cart"], $cart);
}

header('location: viewcart');