<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

$cart = [];
$userID = "";
$user = "";

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

if(isset($_SESSION['account'])){
    $userID = $_SESSION['account']["id"];
    $userModel = new User();
    $user = $userModel->getUserByID($userID);
}

$data = [
    "title" => "Check out",
    "slot" => $template->render("blocks/checkout_layout", ["cart"=> $cart, "user"=>$user])
];

$template->view("layout", $data);
