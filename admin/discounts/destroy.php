<?php 

require_once "../../config/database.php";

$discount_id ="";
if(isset($_POST["discount_id"])){
    $discount_id = $_POST["discount_id"];
}

$discountModel = new Discount();
if(!empty($discount_id)){
    $discountModel->deleteDiscount($discount_id);
    header('location: manage_discount');
}

