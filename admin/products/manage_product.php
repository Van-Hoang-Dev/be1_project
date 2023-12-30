<?php
require_once '../../config/database.php';

$template = new Template();


//Get product
$productModel = new Product();
$products = $productModel->getAllProduct();

//Get search
$search = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $products = $productModel->getProductsByKeyWord($search);

    $data = [
        "title" => "Product Management",
        "slot" => $template->render("blocks/manage/products_management", ["products" => $products])
    ];
}

//Get page
if (empty($search)) {
    $perPgae = 6;
    $currentPage = 1;
    $paginationBar = "";
    if (isset($_GET["page"])) {
        $currentPage = intval($_GET["page"]);
        $_SESSION["page"] =  $currentPage;
    }
    //Get pagination bar
    $total = $productModel->getTotalProducts()["COUNT(*)"];

    $products = $productModel->getProductWithLimit($currentPage, $perPgae);
    $paginationBar = $productModel->getPaginationBar("manage_product.php", $total, $currentPage, $perPgae, 2);




    $data = [
        "title" => "Product Management",
        "slot" => $template->render("blocks/manage/products_management", ["products" => $products, "paginationBar" => $paginationBar])
    ];
}

$template->view("layout_admin", $data);
