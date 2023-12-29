<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

//Lay product id
$product_id = "";
$buy_now = "";
$cart = [];
$userID = "";
$user = "";

//Lấy thông tin tài khoản lưu trên session
if (isset($_SESSION['account'])) {
    $userID = $_SESSION['account']["id"];
    $userModel = new User();
    $user = $userModel->getUserByID($userID);
}

//Lây thông tin tài khoản từ chi tiết sản phẩm
$productModel = new Product();
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
}

if(!empty($product_id)){
    $product = $productModel->getProductByID($product_id);
    $cart_item = array(
        "id" => $product["id"],
        "name" => $product["name"],
        "price" => $product["price"],
        "image" =>  $product["image"],
        "quantity" => 1,
        "discount_status" => 0,
        "subtotal" => $product["price"]
    );
    
    array_push($cart, $cart_item);
}

//Nếu như không tồn tại sản phẩm được lấy từ chi tiết thì lấy ở session của giỏ hàng
if (empty($product_id)) {
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
}

$data = [
    "title" => "Check out",
    "slot" => $template->render("blocks/checkout_layout", ["cart" => $cart, "user" => $user])
];

$template->view("layout", $data);
