<?php
require_once '../../config/database.php';

$template = new Template();

//Get product
$orderModel = new Order;
$orders = $orderModel->getAllOrders();

$data = [
    "title" => "Product Management",
    "slot" => $template->render("blocks/manage/products_management", ["products" => $products])
];

$template->view("layout_admin", $data);
