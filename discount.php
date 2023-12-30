<?php 

require_once 'config/database.php';

$discount_code = "none";
if(isset($_POST["discount_code"])){
    $discount_code = $_POST["discount_code"];
}

$discountModel = new Discount();

$discountItems = $discountModel->getDiscountByCode($discount_code);

foreach($_SESSION["cart"] as &$item){
    $result = $discountModel->checkProductHaveDiscount($discount_code, $item["id"]);
    $is_valid = $discountModel->checkDiscountCode($discount_code);
    if($is_valid["is_valid"] == 0){
        $_SESSION["notify"] = "This voucher was in valid!";
    }
    if(!empty($result) && $item['discount_status'] == 0 && $is_valid["is_valid"] == 1){
        $item['subtotal'] = $item['subtotal'] - (($item['subtotal'] * $result["discount_amount"])/100);
        $item['discount_status'] = 1;
        $_SESSION["discount"] = ["discount_code" => $discount_code, "discount_amount" =>$result["discount_amount"] ];
        $discountModel->updateDiscountStatus($item["id"]);
    }
}

header('location: viewcart.php');

