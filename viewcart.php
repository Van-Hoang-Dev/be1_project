<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(
    function ($classname) {
        require_once "app/models/$classname.php";
    }
);

$template = new Template();
$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}


$data = [
    "title" => "Shopping Cart",
    "slot" => $template->render("blocks/cart_layout", ["cart" => $cart])
];

$template->view("layout", $data);
