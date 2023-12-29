<?php
require_once 'config/database.php';
// Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

$minus = "";
$userID = "";
if (isset($_SESSION['account'])) {
    $userID = $_SESSION['account']['id'];
}

if (isset($_POST["minus"])) {
    $minus = $_POST["minus"];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idRemove = isset($_POST['idRemove']) ? $_POST['idRemove'] : '';
    $cart = $_SESSION['cart'];
    $cartModel = new CartModel();


    //Giam số lương sản phẩm trong giỏ hàng trên database
    if (!empty($minus) && !empty($userID)) {
        foreach ($_SESSION["cart"] as $key => &$item) {
            if ($item["id"] == $idRemove) {
                if ($item["quantity"] > 0) {
                    $item["quantity"]--;
                    $_SESSION["cart-quantity"]--;
                    $item["subtotal"] = ($item["price"] * $item["quantity"]);
                    $cartModel->updateCartQuantityByUserID($idRemove, $item["quantity"], $userID);
                }
                if ($item["quantity"] == 0) {
                    unset($cart[$key]);
                    $_SESSION["cart-quantity"] = $_SESSION["cart-quantity"] - $item["quantity"];
                    $cartModel->removeProductFromCart($item['id'], $userID);
                    $_SESSION['cart'] = $cart;
                }
                break;
            }
        }
    }

    if (!empty($userID) && empty($minus)) {
        foreach ($cart as $key => $item) {
            if ($item['id'] == $idRemove) {
                unset($cart[$key]);
                $_SESSION["cart-quantity"] = $_SESSION["cart-quantity"] - $item["quantity"];
                $cartModel->removeProductFromCart($item['id'], $userID);
                $_SESSION['cart'] = $cart;
                break;
            }
        }
    }



    if (!empty($minus)) {
        if (empty($userID)) {
            foreach ($_SESSION["cart"] as $key => &$item) {
                if ($item["id"] == $idRemove) {
                    if ($item["quantity"] > 0) {
                        $item["quantity"]--;
                        $_SESSION["cart-quantity"]--;
                        $item["subtotal"] = ($item["price"] * $item["quantity"]);
                    }
                    if ($item["quantity"] == 0) {
                        unset($cart[$key]);
                        $_SESSION["cart-quantity"] = $_SESSION["cart-quantity"] - $item["quantity"];
                        $_SESSION['cart'] = $cart;
                    }
                    break;
                }
            }
        }
    } else {
        foreach ($cart as $key => $item) {
            if ($item['id'] == $idRemove) {
                unset($cart[$key]);
                $_SESSION["cart-quantity"] = $_SESSION["cart-quantity"] - $item["quantity"];
                $_SESSION['cart'] = $cart;
                break;
            }
        }
    }

    header('location: viewcart');
}
