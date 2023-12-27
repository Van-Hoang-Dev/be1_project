<?php 
require_once 'config/database.php';

$template = new Template();

$userID = "";
if(isset($_SESSION["account"])){
    $userID = $_SESSION["account"]["id"];
}
$orderModel = new Order();
$orders = $orderModel->getAllOrderByUserID($userID);

// var_dump($orders);

$data = [
    "title" => "User information",
    "slot" => $template->render("blocks/order_history_layout", ["orders" => $orders])
];
$template->view("layout", $data);

