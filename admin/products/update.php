<?php
require_once "../../config/database.php";

$productID = "";
$productName = "";
$productPrice = "";
$productDescription = "";
$chooseUpdate = "";
$existingImages = "";
$existingMainImage = "";
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
if (isset($_POST["existing_main_image"])) {
    $existingMainImage = $_POST["existing_main_image"];
}
$main_image = "";

if (!empty($_FILES["main_image"]["name"])) {
    $target_dir = "../../public/images/content/products/";
    $unique_filename = uniqid() . "." . pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . $unique_filename;
    if (is_uploaded_file($_FILES["main_image"]["tmp_name"])) {
        $main_image = $unique_filename;
        if (!empty($existingMainImage)) {
            unlink($target_dir . $existingMainImage);
        }
    }
    if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {
        echo "Upload file success.";
    }
}

if ($chooseUpdate == 1) {
    $target_dir = "../../public/images/content/products/";
    if (!empty($imageLinks)) {
        $imageLinks = explode(",", $existingImages);
        foreach ($imageLinks as $imageLink) {
            unlink($target_dir . $imageLink);
        }
    }
    $productImages = uploadFile();
} else if ($chooseUpdate == 2) {
    $productImages = explode(",", $existingImages);
    $new  = uploadFile();
    $productImages = array_merge($productImages, $new);
}

// var_dump($main_image);
$page = "";
if(isset($_SESSION["page"])){
    $page = $_SESSION["page"];
}

$productModel = new Product();
if (!empty($productID) && !empty($productName) &&  !empty($productPrice) && !empty($productDescription) && !empty($categoriesID)) {
    $productModel->update($productID, $productName, $productPrice, $productDescription, $categoriesID, $discount_id, $main_image, $productImages);
    header('location: manage_product.php?page='.$page);
}

function uploadFile()
{
    $target_dir = "../../public/images/content/products/";
    $uploadOk = 1;
    $productImages = [];

    // //Xu ly upload file hinh
    // Lap qua tung file
    if (!empty($_FILES["image"]["tmp_name"][0])) {
        foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
            // Generate a unique filename to avoid overwriting existing files
            $unique_filename = uniqid() . "." . pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION);
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
    }

    if ($uploadOk) {
        echo "All was upload";
    } else {
        echo "One or more files failed to upload.";
    }
    return $productImages;
}
