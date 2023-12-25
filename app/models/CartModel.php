<?php 
    class CartModel extends Database{
        
        public function addCartToDB($userID, $productID, $quantity){
            //Kiem tran xem san pham trong gio hang da co hay khong
            $existingProduct = $this->getCartByProductUser($userID, $productID);

            if(isset($existingProduct)){
                //Neu san pham ton tai thi tang so luong cho san pham do
                $this->updateCartQuantity($productID, $quantity);
            }
            else{
                $sql = parent::$connection->prepare("INSERT INTO `cart_products`(`user_id`, `product_id`, `quantity`) VALUES (?,?,?)");
                $sql->bind_param("iii", $userID, $productID, $quantity);
                $sql->execute();
            }
        }

        //Ham lay gio hang theo user

        public function getCartByProductUser($userID, $productID){
            $sql = parent::$connection->prepare("SELECT * FROM cart_products WHERE user_id = ? AND product_id = ? ");
            $sql->bind_param("ii", $userID, $productID);
            return parent::select($sql);
        }

        //Ham cap nhat  so luong san pham trong gio hang
        public function updateCartQuantity($productID, $newQuantity){
            $sql = parent::$connection->prepare("UPDATE `cart_products` SET `quantity`= ? WHERE product_id = ? ");
            $sql->bind_param("ii", $newQuantity, $productID);
            return $sql->execute();
        }

        //Xoa san pham trong gio hang
        public function removeProductFromCart($proudctID){
            $sql = parent::$connection->prepare("DELETE FROM `cart_products` WHERE product_id = ?");
            $sql->bind_param("i", $proudctID);
            return $sql->execute();
        }

    }