<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

// Thêm sản phẩm vào giỏ hàng
$productID = "";
if(isset($_POST["add_to_cart"])){
    $productID = $_POST["add_to_cart"];
}
$index = "";
if (isset($_POST['index'])) {
    $index = $_POST['index'];
}

$productModel = new Product();
$product = $productModel->getProductByID($productID);
$productCurrentQuantity = $productModel->getCurrentQuantityOfProductByProductID($productID);

$cart = array(
    "id" => $product["id"],
    "name" => $product["name"],
    "price" => $product["price"],
    "image" =>  $product["image"],
    "quantity" => 1,
    "subtotal" => $product["price"]
);

// Kiem tra gio hang da duoc tao hay chua
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
    $_SESSION["cart-quantity"] = 0;
}
var_dump($productCurrentQuantity["current_quantity"]);

// Kiem tra xem san pham da tung co trong gio hang hay chua
$product_exists = false;
foreach ($_SESSION["cart"] as &$item) {
    if($item["id"] == $productID){
        if($item["quantity"] < $productCurrentQuantity["current_quantity"] && $productCurrentQuantity["current_quantity"] != 0 ){
        $item["quantity"]++;
        $_SESSION["cart-quantity"]++;
        $item["subtotal"] = ($item["price"] * $item["quantity"]);
        $product_exists = true;
        }
        break;
    }
}

//Neu san pham chua co trong gio hang thi them moi
if(!$product_exists && $productCurrentQuantity["current_quantity"] != 0){
    array_push($_SESSION["cart"], $cart);
    $_SESSION["cart-quantity"]++;
}

var_dump($_SESSION["cart"]);
var_dump($_SESSION["cart-quantity"]);

//Them cart vao databse
if(isset($_SESSION['account']) && isset($_SESSION["cart"])){
    $cartModel = new CartModel();
    $userID = $_SESSION['account']["id"];
    $quantity = "";
    foreach ($_SESSION["cart"] as &$item) {
        if($item["id"] == $productID){
            $quantity = $item["quantity"];
            break;
        }
    }
    $cartModel->addCartToDB($userID, $productID, $quantity);
}

if ($index == 1) {
    header('location: shop');
} else {
    header('location: detail?id='.$productID);
}
exit;