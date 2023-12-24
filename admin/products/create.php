<?php
require_once '../../config/database.php';

$template = new Template();

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();

//Get discount
$discountModel = new Discount();
$discounts = $discountModel->getAllDiscount();

$data = [
    "title" => "Add product",
    "slot" => $template->render("blocks/form/product/add_product_form", ["categories" => $categories, "discounts" => $discounts])
];

$template->view("layout_admin", $data);
