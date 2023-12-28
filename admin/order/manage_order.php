<?php
require_once '../../config/database.php';

$template = new Template();

//Get product
$orderModel = new Order;
$orders = $orderModel->getAllOrders();

$data = [
    "title" => "Order Management",
    "slot" => $template->render("blocks/manage/order_management", ["orders" => $orders])
];

$template->view("layout_admin", $data);
