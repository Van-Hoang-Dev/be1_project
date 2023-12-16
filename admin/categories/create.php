<?php
require_once '../../config/database.php';

$template = new Template();

$data = [
    "title" => "Add category",
    "slot" => $template->render("blocks/form/category/add_category_form")
];

$template->view("layout_admin", $data);
