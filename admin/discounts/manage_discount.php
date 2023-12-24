<?php 
require_once "../../config/database.php";


$template = new Template();

//Get discount
$discountModel = new Discount();
$discounts = $discountModel->getAllDiscount();

$data = ["title"=>"Discount Management", 
        "slot" => $template->render("blocks/manage/discount_management", ["discounts"=>$discounts])];


$template->view("layout_admin", $data);