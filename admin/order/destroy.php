<?php

require_once "../../config/database.php";

$order_id = "";

if (isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];
}
var_dump($order_id);


$orderModel = new Order();
if (!empty($order_id)) {
    $orderModel->deleteOrder($order_id);
    header('location: manage_order.php');
}
