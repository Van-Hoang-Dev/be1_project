<?php 
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$userModel = new User();
$util = new Util();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration 
$cookie_expiration_time = $current_time +(86400); 

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (! empty($_SESSION["member_phone"])) {
    $isLoggedIn = true;
}
// Check if loggedin session exists
else if (! empty($_COOKIE["member_phone"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
    // Initiate userModel token verification diirective to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    
    // Get token for username
    $userToken = $userModel->getTokenByPhoneNumber($_COOKIE["member_phone"], 0);
   
    // Validate random password cookie with database
    if (password_verify($_COOKIE["random_password"], $userToken["password_hash"])) {
        $isPasswordVerified = true;
    }
    
    // Validate random selector cookie with database
    if (password_verify($_COOKIE["random_selector"], $userToken["selector_hash"])) {
        $isSelectorVerified = true;
    }
    
    // check cookie expiration by date
    if($userToken["expiry_date"] >= $current_date) {
        $isExpiryDateVerified = true;
    }
    
    // Redirect if all cookie based validation retuens true
    // Else, mark the token as expired and clear cookies
    if (!empty($userToken["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified) {
        $isLoggedIn = true;
        $_SESSION['account'] = $userModel->loginAccount($userToken['phone']);

    } else {
        if(!empty($userToken["id"])) {
            $userModel->markAsExpired($userToken["id"]);
        }
        // clear cookies
        $util->clearUserCookie();
    }
}
?>