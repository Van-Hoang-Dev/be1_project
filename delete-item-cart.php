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
    // var_dump($cart);
    // var_dump($idRemove);
    foreach ($cart as $index => $item) {
        if ($item['id'] == $idRemove) {
            unset($cart[$index]);
           
            $_SESSION['cart'] = $cart;
            break; 
            
        }
    }
    header('location: viewcart');
}

