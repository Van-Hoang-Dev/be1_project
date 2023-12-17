<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$fistname = "";
$lastname = "";
$username = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$gender = "";


if(isset($_POST["firstname"])){
    $fistname = $_POST["firstname"];
}
if(isset($_POST["lastname"])){
    $lastname = $_POST["lastname"];
}
if(isset($_POST["username"])){
    $username = $_POST["username"];
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
}
if(isset($_POST["address"])){
    $address = $_POST["address"];
}
if(isset($_POST["password"])){
    $password = $_POST["password"];
}
if(isset($_POST["gender"])){
    $gender = $_POST["gender"];
}

// var_dump($fistname);
// var_dump($lastname);
// var_dump($username);
// var_dump($gender);
// var_dump($email);
// var_dump($phone);
// var_dump($address);
// var_dump($password);

//Add new user into database
$userModel = new User();
$user = $userModel->addNewUser($fistname, $lastname, $username, $gender, $email, $phone, $address, $password);
if($user){
    var_dump("Dang ki thanh cong");
}
else{
    var_dump("Dang ki khong thanh cong");
}