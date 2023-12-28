<?php

require_once "../../config/database.php";

$review_id = "";

if (isset($_POST["review_id"])) {
    $review_id = $_POST["review_id"];
}
var_dump($review_id);


$reviewModel = new Review();
if (!empty($review_id)) {
    $reviewModel->deleteReview($review_id);
    header('location: manage_review.php');
}
