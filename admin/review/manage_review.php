<?php
require_once '../../config/database.php';

$template = new Template();

//Get product
$reviewModel = new Review;
$reviews = $reviewModel->getAllReviews();
// var_dump($reviews);

$data = [
    "title" => "Review Management",
    "slot" => $template->render("blocks/manage/review_management", ["reviews" => $reviews])
];

$template->view("layout_admin", $data);
