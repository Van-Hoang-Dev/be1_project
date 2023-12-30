<?php
require_once 'config/database.php';

//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$userModel = new User();
$util = new Util();

if (!empty($_POST["login"])) {


    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Get user
    $user = $userModel->loginAccount($phone);
    if (password_verify($password, $user["password"])) {
        $_SESSION['account'] = $user;
    }

    if (!empty($_POST["remember-account"])) {

        $random_selector = $util->createToken(16);
        setcookie("remember-account", $random_selector, time() + (3600*24*30), "/");

        $userModel->addToken($user['phone'], $random_selector);
    } else {
        setcookie("remember-account", "", time() - (1), "/");
    }
    header('location: index.php');
}
