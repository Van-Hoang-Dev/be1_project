<?php 
    require_once 'config/database.php';
    //Autoloading spl NOT sql
    spl_autoload_register(function ($classname) {
        require_once "app/models/$classname.php";
    });

    $template = new Template();

    //Get category id
    $category_id = "";

    //Get category
    $categorieModel = new Category();
    $categories = $categorieModel->getAllCategory();
    //Get product
    $productModel = new Product();
    $products = $productModel->getAllProduct();

    if(isset($_GET["category_id"])){
        $category_id = $_GET["category_id"];
        $products = $productModel->getProductByCategoryID($category_id);
    }

    $data = ["title" => "Shop",
            "slot" => $template->render("blocks/shop_layout", ["products" => $products, "categories" => $categories])];

    $template->view("layout", $data);
?>