<?php 

require_once "../../config/database.php";

$discount_id ="";
if(isset($_POST["discount_id"])){
    $discount_id = $_POST["discount_id"];
}

$discountModel = new Discount();
if(!empty($discount_id)){
    if($discountModel->deleteDiscount($discount_id)){
        $_SESSION["notify"] = ["check" => 1, "notify"=>"Delete discount successful!"];
}
else{
    $_SESSION["notify"] = ["check" => 0, "notify"=>"Delete discount unsuccessful!"];
}
    header('location: manage_discount');
}

