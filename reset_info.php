<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$firstname = "";
$lastname = "";
$email = "";
$phone = "";
$address = "";
$postcode_zip = "";
$password = "";

if(isset($_POST["firstname"])){
    $firstname = $_POST["firstname"];
}

if(isset($_POST["lastname"])){
    $lastname = $_POST["lastname"];
}
if(isset($_POST["username"])){
    $username = $_POST["username"];
}

if(isset($_POST["address"])){
    $address = $_POST["address"];
}

if(isset($_POST["postcode_zip"])){
    $postcode_zip = $_POST["postcode_zip"];
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
}

if(isset($_POST["password"])){
    if (strlen($_POST["password"]) == 0) {
        $password = $_SESSION['account']['password'];
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
}

// Get user
$userModel = new User();
$user = $userModel->resetAccount($firstname, $lastname, $email, $phone, $address, $postcode_zip, $password);

if ($user == true) {
    header('location: index.php');
} else {
    echo "<script>alert('Cập nhật không thành công!!!'); window.location.href='index.php';</script>";
}

