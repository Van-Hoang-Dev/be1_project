<?php 

require_once '../../config/database.php';

$discount_code = "";
$discount_amount = "";
$description = "";
$startDate = "";
$endDate = "";


if(isset($_POST['discount_code'])){
    $discount_code = $_POST['discount_code'];
}
if(isset($_POST['discount_amount'])){
    $discount_amount =intval($_POST['discount_amount']);
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}
if(isset($_POST['start_date'])){
    $startDate = $_POST['start_date'];
}
if(isset($_POST['end_date'])){
    $endDate = $_POST['end_date'];
}

$discount = ["discount_code" => $discount_code,
             "discount_amount" =>$discount_amount,
             "description" => $description,
             "start_date" => $startDate,
             "end_date" => $endDate
];


$discountModel = new Discount();
$discountModel->addDiscount($discount);
header('location: manage_discount.php');
