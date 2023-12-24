<?php 

require_once '../../config/database.php';

$discount_id = "";
$discount_code = "";
$discount_amount = "";
$is_active = "";
$startDate = "";
$endDate = "";


if(isset($_POST['discount_id'])){
    $discount_id = $_POST['discount_id'];
}
if(isset($_POST['discount_code'])){
    $discount_code = $_POST['discount_code'];
}
if(isset($_POST['discount_amount'])){
    $discount_amount =intval($_POST['discount_amount']);
}
if(isset($_POST['is_active'])){
    $is_active = intval($_POST['is_active']);
}
if(isset($_POST['start_date'])){
    $startDate = $_POST['start_date'];
}
if(isset($_POST['end_date'])){
    $endDate = $_POST['end_date'];
}

$discount = [
            "discount_id" => $discount_id,
            "discount_code" => $discount_code,
             "discount_amount" =>$discount_amount,
             "is_active" => $is_active,
             "start_date" => $startDate,
             "end_date" => $endDate
];

var_dump($discount);
$discountModel = new Discount();
$discountModel->updateDiscount($discount);
header('location: manage_discount.php');