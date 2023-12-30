<?php 
require_once 'config/database.php';

$template = new Template();

$userModel = new User;
$userID = $_SESSION['account']["id"];
$user = $userModel->getUserByID($userID);


$data = [
    "title" => "User information",
    "slot" => $template->render("blocks/user_info_layout", ["user" =>$user])
];
$template->view("layout", $data);

