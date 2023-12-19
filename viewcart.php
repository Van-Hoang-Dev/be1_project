<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

$data = [
    "title" => "Shop",
    "slot" => $template->render("blocks/cart_layout", ["cart" => $_SESSION["cart"]])
];

$template->view("layout", $data);
