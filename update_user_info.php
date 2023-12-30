<?php
require_once 'config/database.php';

$userID = "";
$firstname = "";
$lastname = "";
$email = "";
$phone ="";
$address = "";
$postcode_zip = "";

if($_POST["id"]){
    $userID = $_POST["id"];
}
if($_POST["firstname"]){
    $firstname = $_POST["firstname"];
}

if($_POST["lastname"]){
    $lastname = $_POST["lastname"];
}

if($_POST["email"]){
    $email = $_POST["email"];
}

if($_POST["phone"]){
    $phone = $_POST["phone"];
}

if($_POST["address"]){
    $address = $_POST["address"];
}

if($_POST["postcode_zip"]){
    $postcode_zip = $_POST["postcode_zip"];
}

$user = [
    "id" => $userID,
    "firstname" => $firstname,
    "lastname" =>$lastname,
    "email" =>$email,
    "phone" => $phone,
    "address" => $address,
    "postcode_zip" => $postcode_zip
];

$userModel = new User;
if($userModel->updateUser($user)){
    $_SESSION["notify"] = ["check" => 1, "notify"=>"Update account successful!"];
    }
    else{
        $_SESSION["notify"] = ["check" => 0, "notify"=>"Update account unsuccessful!"];
    }
    header('location: user_info.php');

