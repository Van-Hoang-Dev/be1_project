<?php
require_once '../../config/database.php';

$template = new Template();

//Get product
$userModel = new User;
$users = $userModel->getAllUsers();

$data = [
    "title" => "User Management",
    "slot" => $template->render("blocks/manage/user_management", ["users" => $users])
];

$template->view("layout_admin", $data);
