<?php 
require_once "../../config/database.php";


$template = new Template();

//Get all category
$categoryModel = new Category();
$categories = $categoryModel->getAllCategory();

$data = ["title"=>"Add category", 
        "slot" => $template->render("blocks/category_management", ["categories"=>$categories])];


$template->view("layout_admin", $data);