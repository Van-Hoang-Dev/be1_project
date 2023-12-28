<?php 
require_once "../../config/database.php";

$template = new Template();

$data = [
    "title"=> "Send email",
    "slot" => $template->render("blocks/email_layout")
];

$template->view("layout_admin", $data);