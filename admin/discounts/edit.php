<?php 
require_once "../../config/database.php";

$template = new Template();

$discountModel = new Discount();

//Lay id cua ma giam gia
$discount_id = "";
if(isset($_POST["discount_id"])){
    $discount_id = $_POST["discount_id"];
}

$discount = $discountModel->getDiscountById($discount_id);

$data = [
    "title"=> "Update discount",
    "slot" => $template->render("blocks/form/discount/edit_discount_form", ["discount" => $discount])
];

$template->view("layout_admin", $data);