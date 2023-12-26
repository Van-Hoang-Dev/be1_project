<?php 
require_once 'config/database.php';

$template = new Template();

$ordercode = "";
$orderDetails = [];
$customer = [];

$orderModel = new Order();
if(isset($_COOKIE["customer"])){
    $customer = json_decode($_COOKIE["customer"], true);
    $ordercode = $customer["order_code"] ;
    $orderDetails = $orderModel->getAllOrderByUserID($ordercode);
}
// var_dump($customer);
// var_dump($orderDetails);

$data = [
    "title" => "Detail Order",
    "slot" => $template->render("blocks/detail_order_layout", ["orderDetails"=>$orderDetails, "customer"=> $customer])
];
$template->view("layout", $data);

