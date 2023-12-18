<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$phone = "";
$password = "";

if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
}

if(isset($_POST["password"])){
    $password = $_POST["password"];
}


// Get user
$userModel = new User();
$user = $userModel->loginAccount($phone);

if ($user && password_verify($password, $user["password"])) {
    
    var_dump("Login thành công");
    var_dump($user);
    $_SESSION['account'] = $user;
    header('location: index.php');
} else {
    var_dump("Login không thành công");
}

