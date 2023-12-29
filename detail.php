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

$id = "";
$product = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
    }
    $textComment = "";
    $idComment = "";
    if (isset($_POST["text-comment"])) {
        $textComment = $_POST["text-comment"];
    }

    if (isset($_POST["id-comment"])) {
        $idComment = $_POST["id-comment"];
    }
    if (!empty($textComment) && !empty($idComment)) {
        // var_dump($textComment, $idComment);
        $reviewModel->resetReview($textComment, $idComment);
    }
} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }
}

$product = $productModel->getProductHaveCategoryIDDetail($id);

$category = $categoryModel->getCategoryByID($product['category_id']);
$products = $productModel->getAllProduct();


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
if (isset($_POST['send_review'])) {
    $rating = "";
    $comment = "";

    if (isset($_POST['rating'])) {
        $rating = $_POST['rating'];
    }

    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
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

$data = [
    "title" => "Product Detail",
    "slot" => $template->render("blocks/product_detail_layout", ['product' => $product, 'category' => $category, 'products' => $products, 'reviews' => $reviews])
];
$template->view("layout", $data);
