<?php
class CartModel extends Database
{

    public function addCartToDB($userID, $productID, $quantity)
    {
        //Kiem tran xem san pham trong gio hang da co hay khong
        $existingProduct = $this->getCartByProductUser($userID, $productID);

        if (!empty($existingProduct)) {
            //Neu san pham ton tai thi tang so luong cho san pham do
            $this->updateCartQuantity($productID, $quantity);
        } else {
            $sql = parent::$connection->prepare("INSERT INTO `cart_products`(`user_id`, `product_id`, `quantity`) VALUES (?,?,?)");
            $sql->bind_param("iii", $userID, $productID, $quantity);
            return $sql->execute();
        }
    }

    //Lấy tất cả sản phẩm có trong dỏ hàng theo user
    public function getAllCartProductByUserID($userID)
    {
        $sql = parent::$connection->prepare("SELECT *, (cart_products.quantity * products.price) AS 'subtotal' ,
            (SELECT image FROM images 
            WHERE images.product_id = products.id AND images.main = 1) AS 'image'
            FROM `cart_products`
            INNER JOIN products ON cart_products.product_id = products.id 
            WHERE user_id = ?;");
        $sql->bind_param("i", $userID);
        return parent::select($sql);
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng
    public function getTotalCartQuantity($userID)
    {
        $sql = parent::$connection->prepare("SELECT SUM(quantity) as 'total_cart' FROM `cart_products` 
            WHERE user_id = ?
            GROUP BY user_id;");
        $sql->bind_param("i", $userID);
        $result = parent::select($sql);

        // Kiểm tra xem có kết quả hay không
        if ($result !== null && !empty($result)) {
            // Trả về giá trị total_cart
            return $result[0]['total_cart'];
        } else {
            // Trả về 0 nếu không có kết quả
            return 0;
        }
    }


    //Ham lay gio hang theo user

    public function getCartByProductUser($userID, $productID)
    {
        $sql = parent::$connection->prepare("SELECT * FROM cart_products WHERE user_id = ? AND product_id = ? ");
        $sql->bind_param("ii", $userID, $productID);
        return parent::select($sql);
    }

    //Ham cap nhat  so luong san pham trong gio hang
    public function updateCartQuantity($productID, $newQuantity)
    {
        $sql = parent::$connection->prepare("UPDATE `cart_products` SET `quantity`= ? WHERE product_id = ? ");
        $sql->bind_param("ii", $newQuantity, $productID);
        return $sql->execute();
    }

    //Xoa san pham trong gio hang
    public function removeProductFromCart($proudctID)
    {
        $sql = parent::$connection->prepare("DELETE FROM `cart_products` WHERE product_id = ?");
        $sql->bind_param("i", $proudctID);
        return $sql->execute();
    }
}
