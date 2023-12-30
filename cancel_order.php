<?php

require_once "config/database.php";

$order_code = "";

if (isset($_POST["order_code"])) {
    $order_code = $_POST["order_code"];
}


$orderModel = new Order();
if (!empty($order_code)) {
    $orderModel->deleteOrderByCode($order_code);
    header('location: shop.php');
}
