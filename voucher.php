<?php 
require_once 'config/database.php';

$template = new Template();

$userID = "";
if(isset($_SESSION["account"])){
    $userID = $_SESSION["account"]["id"];
}
$discountModel = new Discount();
$discounts = $discountModel->getAllDiscount();

// var_dump($discounts);

$data = [
    "title" => "User information",
    "slot" => $template->render("blocks/voucher_layout", ["discounts"=>$discounts])
];
$template->view("layout", $data);

