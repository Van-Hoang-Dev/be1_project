<?php

require_once "../../config/database.php";

$user_id = "";

if (isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];
}
// var_dump($user_id);

$userModel = new User();

if (!empty($user_id)) {
   $userModel->deleteUser($user_id);
    header('location: manage_user.php');
}
