<?php
require_once '../../config/database.php';

$template = new Template();

$order_code = "";
if(isset($_POST["order_code"])){
    $order_code = $_POST["order_code"];
}

//Get product
$orderModel = new Order;
$orders = $orderModel->getAllOrderByOrderCode($order_code);
$data = [
    "title" => "Product Management",
    "slot" => $template->render("blocks/manage/order_detail_management", ["orders" => $orders])
];

$template->view("layout_admin", $data);
