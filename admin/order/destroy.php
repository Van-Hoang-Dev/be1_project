<?php

require_once "../../config/database.php";

$order_id = "";

if (isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];
}
var_dump($order_id);


$orderModel = new Order();
if (!empty($order_id)) {
    if($orderModel->deleteOrder($order_id)){
        $_SESSION["notify"] = ["check" => 1, "notify" => "Delete order successful!"];
    } else {
        $_SESSION["notify"] = ["check" => 0, "notify" => "Delete order unsuccessful!"];
    }
    header('location: manage_order.php');
}
