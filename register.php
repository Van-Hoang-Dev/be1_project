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
$address ="";
$postcode_zip ="";
$password = "";

if(isset($_POST["firstname"])){
    $firstname = $_POST["firstname"];
}

if(isset($_POST["lastname"])){
    $lastname = $_POST["lastname"];
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

if(isset($_POST["postcode_zip"])){
    $postcode_zip = $_POST["postcode_zip"];
}

if (isset($_POST['password'])) {
    if(isset($_POST["repassword"])) {
        $password = ($_POST["password"] == $_POST["repassword"]) ? $_POST["repassword"] : false;   
    }
}

// //Get user
$userModel = new User();
$user = "";
if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($address) && !empty($postcode_zip) && !empty($password)) {
    if ($password != false) {
        $userModel->registerAccount($firstname, $lastname, $email, $phone, $address, $postcode_zip, $password);
        $user = $userModel->loginAccount($phone);
        $_SESSION['account'] = $user;
        echo "<script>alert('Đăng kí thành công!!!')</script>";
        header('location: index');
    } else {
        echo "<script>alert('Vui lòng nhập lại mật khẩu!!!')</script>";
        header('location: index');
    }
} else {
    echo "<script>alert('Vui lòng nhập đầy đủ thông tin!!!')</script>";
    header('location: index');
}