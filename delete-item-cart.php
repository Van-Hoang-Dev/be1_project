<?php
require_once 'config/database.php';
// Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idRemove = isset($_POST['idRemove']) ? $_POST['idRemove'] : '';
    $cart = $_SESSION['cart'];
    $cartModel = new CartModel();
    foreach ($cart as $key => $item) {
        if ($item['id'] == $idRemove) {
            unset($cart[$key]);
            $cartModel->removeProductFromCart($item['id']);
            $_SESSION['cart'] = $cart;
            break; 
        }
    }
    header('location: viewcart');
}

