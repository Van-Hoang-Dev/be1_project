<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$firstname = "";
$lastname = "";
$username = "";
$gender = "";
$email = "";
$phone = "";
$address ="";
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

if(isset($_POST["gender"])){
    $gender = intval($_POST["gender"]);
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

if (isset($_POST['password'])) {
    if(isset($_POST["repassword"])) {
        $password = ($_POST["password"] == $_POST["repassword"]) ? $_POST["repassword"] : false;   
    }
}

// //Get user
$userModel = new User();
$user = "";
if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($gender) && !empty($email) && !empty($phone) && !empty($address) && !empty($password)) {
    if ($password != false) {
        $userModel->registerAccount($firstname, $lastname, $username, $gender, $email, $phone, $address, $password);
        $user = $userModel->loginAccount($phone);
        $_SESSION['account'] = $user;
        echo "<script>alert('Đăng kí thành công!!!')</script>";
        header('location: index.php');
    } else {
        echo "<script>alert('Vui lòng nhập lại mật khẩu!!!')</script>";
        header('location: index.php');
    }
} else {
    echo "<script>alert('Vui lòng nhập đầy đủ thông tin!!!')</script>";
    header('location: index.php');
}