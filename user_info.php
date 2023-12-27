<?php 
require_once 'config/database.php';

$template = new Template();

$user = $_SESSION['account'];
// var_dump( $_SESSION['account']);

$data = [
    "title" => "User information",
    "slot" => $template->render("blocks/user_info_layout", ["user" =>$user])
];
$template->view("layout", $data);

