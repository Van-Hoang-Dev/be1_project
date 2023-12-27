<?php 
require_once 'config/database.php';

$template = new Template();

$ordercode = "";
$orderMethod = "";
$orderDetails = [];
$customer = [];

$orderModel = new Order();
if(isset($_COOKIE["customer"])){
    $customer = json_decode($_COOKIE["customer"], true);
    $ordercode = $customer["order_code"];
}

if(isset($_POST["order_code"])){
    $ordercode = $_POST["order_code"];
}
if(isset($_POST["billing_method"])){
    $orderMethod = $_POST["billing_method"];
}

$userModel = new User;

$customer =  $userModel->getUserByPhoneOrEmail($orderMethod);

$orderDetails = $orderModel->getAllOrderByOrderCode($ordercode);

// var_dump($customer);
// var_dump($orderDetails);

$data = [
    "title" => "Detail Order",
    "slot" => $template->render("blocks/detail_order_layout", ["orderDetails"=>$orderDetails, "customer"=> $customer])
];
$template->view("layout", $data);

