<?php
require_once '../../config/database.php';


$order_status = "";
$order_id = "";

if (isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];
}

if (isset($_POST["order_status"])) {
    $order_status = $_POST["order_status"];
}

// var_dump($order_id);
// var_dump($order_status);

$orderModel = new Order();
if (!empty($order_status) && !empty($order_id)) {
    if ($orderModel->updateOrderStatus($order_id, $order_status)) {
        $_SESSION["notify"] = ["check" => 1, "notify" => "Update order successful!"];
    } else {
        $_SESSION["notify"] = ["check" => 0, "notify" => "Update order unsuccessful!"];
    }
    header('location: manage_order.php');
}