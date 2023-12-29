<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();
$userModel = new User();
$productModel = new Product;

// Check if the user is already logged in
if (!isset($_SESSION['phone']) && isset($_COOKIE['remember-account'])) {
    $token = $_COOKIE['remember-account'];

    $tokenDatabase = $userModel->getToken($token);

    if ($token == $tokenDatabase['token']) {
        // Log in the user
        $user = "";
        try {
            $user = $userModel->loginAccount($tokenDatabase['phone']);
        } catch (\Throwable $th) {
            throw $th;
        }
        $_SESSION['account'] = $user;
    }
}

//Get page
$perPgae = 8;
$currentPage = 1;
$paginationBar = "";
if (isset($_GET["page"])) {
    $currentPage = intval($_GET["page"]);
}


//Get pagination bar
$total = $productModel->getTotalProducts()["COUNT(*)"];

$products =$productModel ->getProductWithLimit($currentPage, $perPgae);
$paginationBar = $productModel->getPaginationBar("index.php", $total, $currentPage, $perPgae, 2);

$data = [
    "title" => "Home",
    "slot" => $template->render("blocks/home_layout", ["products" => $products,"paginationBar" => $paginationBar])
];

$template->view("layout", $data);
