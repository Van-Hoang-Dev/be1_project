<?php
require_once '../../config/database.php';

$template = new Template();

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();

$data = [
    "title" => "Add product",
    "slot" => $template->render("blocks/form/product/add_product_form", ["categories" => $categories])
];

$template->view("layout_admin", $data);
