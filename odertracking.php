<?php 
require_once 'config/database.php';

$template = new Template();

$data = [
    "title" => "Order tracking",
    "slot" => $template->render("blocks/order_tracking_layout", [])
];
$template->view("layout", $data);

