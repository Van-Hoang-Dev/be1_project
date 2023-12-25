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
    // var_dump(session_regenerate_id($phone));
    $_SESSION['account'] = $user;
    header('location: index.php');
} else {
    echo "<script>alert('Đăng nhập không thành công!!!'); window.location.href='index';</script>";
}

