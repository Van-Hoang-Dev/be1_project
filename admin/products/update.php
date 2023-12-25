<?php
require_once "../../config/database.php";

$productID = "";
$productName = "";
$productPrice = "";
$productDescription = "";
$chooseUpdate = "";
$existingImages = "";
$productImages = [];
$categoresID = [];
$discount_id = [];

if (isset($_POST["id"])) {
    $productID = $_POST["id"];
}

if (isset($_POST["name"])) {
    $productName = $_POST["name"];
}
if (isset($_POST["price"])) {
    $productPrice = $_POST["price"];
}
if (isset($_POST["description"])) {
    $productDescription = $_POST["description"];
}
if (isset($_POST["image"])) {
    $productImages = $_POST["image"];
}
if (isset($_POST["categories"])) {
    $categoriesID = $_POST["categories"];
}
if (isset($_POST["discounts"])) {
    $discount_id = $_POST["discounts"];
}
if (isset($_POST["choose_update"])) {
    $chooseUpdate = $_POST["choose_update"];
}
if (isset($_POST["existing_images"])) {
    $existingImages = $_POST["existing_images"];
}

if ($chooseUpdate == 1) {
    $productImages = uploadFile();
}
else if ($chooseUpdate == 2) {
    $productImages = explode(",", $existingImages);
    $new  = uploadFile();
    $productImages = array_merge($productImages, $new);
}

var_dump($productImages);


$productModel = new Product();
if (!empty($productID) && !empty($productName) &&  !empty($productPrice) && !empty($productDescription) && !empty($categoriesID)) {
    $productModel->update($productID, $productName, $productPrice, $productDescription, $categoriesID, $discount_id, $productImages);
    header('location: manage_product.php');
}

function uploadFile()
{
    // //Xu ly upload file hinh

    $target_dir = "../../public/images/content/products/";
    $uploadOk = 1;
    $productImages = [];

    // Lap qua tung file
    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
        // Generate a unique filename to avoid overwriting existing files
        $unique_filename = md5(uniqid()) . "_" . basename($_FILES["image"]["name"][$key]);
        $target_file = $target_dir . $unique_filename;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if it's a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"][$key]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
            break; // Stop processing further files
        }

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            break; // Stop processing further files
        }

        if (is_uploaded_file($_FILES["image"]["tmp_name"][$key])) {
            array_push($productImages, $unique_filename);
        }

        // Upload the file
        if (!move_uploaded_file($_FILES["image"]["tmp_name"][$key], $target_file)) {
            echo "Failed to upload file.";
            $uploadOk = 0;
            break; // Stop processing further files
        }
    }

    if ($uploadOk) {
        echo "All was upload";
    } else {
        echo "One or more files failed to upload.";
    }
    return $productImages;
}
