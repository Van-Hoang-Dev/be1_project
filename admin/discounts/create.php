<?php 
require_once "../../config/database.php";

$template = new Template();

$data = [
    "title"=> "Add discount",
    "slot" => $template->render("blocks/form/discount/add_discount_form")
];

$template->view("layout_admin", $data);