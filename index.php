<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();
$userModel = new User();

// Check if the user is already logged in
if (!isset($_SESSION['phone']) && isset($_COOKIE['remember-account'])) {
    $token = $_COOKIE['remember-account'];
    
    $tokenDatabase = $userModel->getToken($token);

    if ($token == $tokenDatabase['token']) {
        // Log in the user
        $user = "";
        try {
            $user = $userModel->loginAccount($tokenDatabase['phone']);

        } catch (\Throwable $th) {
            throw $th;
        }
        $_SESSION['account'] = $user;
      
    }
}

//Lấy sản phẩm từ database
if (isset($_SESSION["account"])) {
    $cartQuantity = "";
    $cartModel = new CartModel;
    $userID = $_SESSION["account"]["id"];
    $carts =  $cartModel->getAllCartProductByUserID($userID);
    $cartQuantity = $cartModel->getTotalCartQuantity($userID);

    if (isset($cartQuantity) && isset($userID)) {
        if (empty($_SESSION["cart"])) {
            $_SESSION["cart"] = $carts;
            $_SESSION["cart-quantity"] = $cartQuantity;
        }
    }
}

$data = [
    "title" => "Home",
    "slot" => $template->render("blocks/home_layout", [])
];

$template->view("layout", $data);
