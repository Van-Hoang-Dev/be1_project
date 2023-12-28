<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

//Add san pham vao order_detail
$userID = "";
$order_status = "";
$billing_first_name = "";
$billing_last_name = "";
$billing_street_address = "";
$billing_postcode_zip = "";
$billing_phone = "";
$billing_email_address = "";

if (isset($_POST["user_id"])) {
    $userID = $_POST["user_id"];
}
if (isset($_POST["billing_first_name"])) {
    $billing_first_name = $_POST["billing_first_name"];
}
if (isset($_POST["billing_last_name"])) {
    $billing_last_name = $_POST["billing_last_name"];
}
if (isset($_POST["billing_street_address"])) {
    $billing_street_address = $_POST["billing_street_address"];
}
if (isset($_POST["billing_postcode_zip"])) {
    $billing_postcode_zip = $_POST["billing_postcode_zip"];
}
if (isset($_POST["billing_phone"])) {
    $billing_phone = $_POST["billing_phone"];
}
if (isset($_POST["billing_email_address"])) {
    $billing_email_address = $_POST["billing_email_address"];
}



$userOrder = [
    "firstname" => $billing_first_name,
    "lastname" => $billing_last_name,
    "address" => $billing_street_address,
    "postcode_zip" => $billing_postcode_zip,
    "phone" => $billing_phone,
    "email" => $billing_email_address
];

$bill_items = $_SESSION["cart"];

$orderModel = new Order();
$userModel = new User();
$productModel = new Product();
$productQuantity = "";

//Them thong tin cua user vao table member
$userID = $userModel->addUserOrder($userOrder);
//Them userid vao bang order
$orderID = $orderModel->addOrder($userID);
//Tao ra ma hoa don
$order_code = generateInvoiceNumber($orderID, $userID);

//Thông tin của người dùng
$customer = [
    "userID" => $userID,
    "firstname" => $userOrder["firstname"],
    "lastname" => $userOrder["lastname"],
    "order_code" => $order_code
];
$customerJSON = json_encode($customer);

setcookie("customer", $customerJSON, time() + (86400 * 7),"/", "", true, true); // HttpOnly and Secure flags

$cartModel = new CartModel();
foreach ($bill_items as $key => $bill_item) {

    $productQuantity = $productModel->getCurrentQuantityOfProductByProductID($bill_item["id"]);
    $newQuantity = $productQuantity["current_quantity"] - $bill_item["quantity"];
    $productModel->updateQuantityWhenOrder($bill_item["id"], $newQuantity);

    $orderDetail = [
        "order_id" => $orderID,
        "product_id" => $bill_item["id"],
        "quantity" => $bill_item["quantity"],
        "price_per_unit" => $bill_item["price"],
        "subtotal" => $bill_item["subtotal"],
        "order_code" => $order_code
    ];

    if ($orderModel->addOrderDetail($orderDetail)) {
        $cartModel->removeProductFromCart($bill_item["id"]);
    }

    unset($_SESSION["cart"]);
    unset($_SESSION["cart-quantity"]);
}

header('location: detail_order.php');

// Hàm tạo mã hóa đơn
function generateInvoiceNumber($orderID, $userID) {

    $prefix = 'ORD';
    // Lấy ngày hiện tại
    $currentDateTime = date('dmYHis');
    // Định dạng mã đơn hàng
    $invoiceNumber = $prefix . '-' . $currentDateTime . '-' . str_pad($userID, 3, '0', STR_PAD_LEFT) . "-". str_pad($orderID, 3, '0', STR_PAD_LEFT);
    return $invoiceNumber;
}
