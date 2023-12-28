<?php 

require_once 'config/database.php';

$discount_code = "";
if(isset($_POST["discount_code"])){
    $discount_code = $_POST["discount_code"];
}

$discountModel = new Discount();

$discountItems = $discountModel->getDiscountByCode($discount_code);

foreach($_SESSION["cart"] as &$item){
    $result = $discountModel->checkProductHaveDiscount($discount_code, $item["id"]);
    if(!empty($result) && $item['discount_status'] == 0 ){
        $item['subtotal'] = $item['subtotal'] - (($item['subtotal'] * $result["discount_amount"])/100);
        $item['discount_status'] = 1;
        $discountModel->updateDiscountStatus($item["id"]);
    }
}

header('location: viewcart.php');

// var_dump($discountItems);
var_dump($_SESSION["cart"]);


