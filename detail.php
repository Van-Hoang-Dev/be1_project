<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();
$reviewModel = new Review();

$product = "";
$id = "";
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$product = $productModel->getProductHaveCategoryID($id);


// var_dump($product);
$category = $categoryModel->getCategoryByID($product['category_id']);
$products = $productModel->getAllProduct();

// var_dump($category);

$recentViewID = [];
if (isset($_COOKIE['recentView'])) {
    $recentViewID = json_decode($_COOKIE['recentView']);
    if (count($recentViewID) >= 4) {
        array_shift($recentViewID);
        if (count($recentViewID) < 4) {
            if (!in_array($id, $recentViewID)) {
                array_push($recentViewID, $id);
            }
        }
    } else {
        if (!in_array($id, $recentViewID)) {
            array_push($recentViewID, $id);
        }
    }
} else {
    if (!in_array($id, $recentViewID)) {
        array_push($recentViewID, $id);
    }
}

$string =  json_encode($recentViewID);

setcookie('recentView', $string, time() + 60, "/");

// Review
if (isset($_GET['send_review'])) {
    $rating = "";
    $comment = "";
    if (isset($_GET['rating'])) {
        $rating = $_GET['rating'];
    }
    if (isset($_GET['comment'])) {
        $comment = $_GET['comment'];
    }
    $review = [
        'product_id' => $id,
        'user_phone' => $_SESSION['account']['phone'],
        'rating' => $rating,
        'comment' => $comment
    ];
    $reviewModel->addReview($review);
}
$reviews = $reviewModel->getReviewByIDProduct($id);
var_dump($reviews);

$data = [
    "title" => "Product Detail",
    "slot" => $template->render("blocks/product_detail_layout", ['product' => $product, 'category' => $category, 'products' => $products, 'reviews' => $reviews])
];
$template->view("layout", $data);
