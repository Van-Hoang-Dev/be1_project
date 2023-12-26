<?php
require_once 'config/database.php';

//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$userModel = new User();
$util = new Util();
require_once "authCookieSessionValidate.php";

if ($isLoggedIn) {
    header('location: index');  
}

if (!empty($_POST["login"])) {
    $isAuthenticated = false;

    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Get user
    $user = $userModel->loginAccount($phone);
    if (password_verify($password, $user["password"])) {
        $_SESSION['account'] = $user;
        $isAuthenticated = true;      
    }

    if ($isAuthenticated) {
        $_SESSION['member_phone'] = $user['phone'];
         // // Set Auth Cookies if 'Remember Me' checked
         if (!empty($_POST["remember-account"])) {

            setcookie("member_phone", $phone, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            $userToken = $userModel->getTokenByPhoneNumber($phone, 0);
            if (! empty($userToken["id"])) {
                $userModel->markAsExpired($userToken["id"]);
            }
            // Insert new token
            $userModel->insertToken($phone, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearUserCookie();
        }
        header('location: index');
    }
}
