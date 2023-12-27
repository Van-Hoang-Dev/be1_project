<?php
require_once "../../config/database.php";

$productName = "";
$productPrice = "";
$productDescription = "";
$productImages = [];
$categoriesID = [];
$discount_id = [];
$main_image = "";

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
    $productImage = $_POST["image"];
}
if (isset($_POST["categories"])) {
    $categoriesID = $_POST["categories"];
}
if (isset($_POST["discounts"])) {
    $discount_id = $_POST["discounts"];
}

$target_dir = "../../public/images/content/products/";
$uploadOk = 1;
//Upload hinh chinh
$unique_filename = uniqid() . "." . pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir . $unique_filename;
if (is_uploaded_file($_FILES["main_image"]["tmp_name"])) {
    $main_image = $unique_filename;
}
if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {
    echo "Upload file success.";
}


//Xu ly upload file hinh phụ
// Lap qua tung file
if (!empty($_FILES["image"]["tmp_name"][0])) {
    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
        // Generate a unique filename to avoid overwriting existing files
        $unique_filename = uniqid() . "." . pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION);
        $target_file = $target_dir . $unique_filename;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if it's a valid image
        if (!empty($_FILES["image"]["tmp_name"][$key])) {
            $check = getimagesize($_FILES["image"]["tmp_name"][$key]);
            if ($check === false) {
                echo "File is not an image.";
                $uploadOk = 0;
                break; // Stop processing further files
            }
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
}

if ($uploadOk) {
    $productModel = new Product();
    if (!empty($productName) &&  !empty($productPrice) && !empty($productDescription) && !empty($categoriesID)) {
    $productModel->store($productName, $productPrice, $productDescription, $categoriesID, $discount_id, $main_image, $productImages);
    header('location: manage_product.php');
    }
} else {
    echo "One or more files failed to upload.";
}

// var_dump($productName);
// var_dump($productPrice);
// var_dump($productDescription);
// var_dump($productImage);
// var_dump($categoriesID);
// var_dump($discount_id);
