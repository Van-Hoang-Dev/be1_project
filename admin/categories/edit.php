<?php
require_once '../../config/database.php';

$template = new Template();

$categoryID = "";
if(isset($_POST["category_id"])){
    $categoryID = $_POST["category_id"];
}

$categoryModel = new Category();
$category = $categoryModel->getCategoryByID($categoryID);

$data = [
    "title" => "Edit category",
    "slot" => $template->render("blocks/form/category/edit_category_form", ["category" => $category])
];

$template->view("layout_admin", $data);

