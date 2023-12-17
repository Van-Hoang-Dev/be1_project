<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$username = "";
$password = "";

if(isset($_POST["username"])){
    $username = $_POST["username"];
}

if(isset($_POST["password"])){
    $username = $_POST["password"];
}

//Get user
$userModel = new User();
$user = $userModel->checkLogin($username);

if(password_verify($password, $user["password"])){
  var_dump("Login thanh cong");
}
else{
    var_dump("Login khong thanh cong");
}
