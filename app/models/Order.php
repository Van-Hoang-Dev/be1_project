<?php 
class Order extends Database{

    //Them đơn hàng
    public function addOrder($userID){
        $sql = parent::$connection->prepare("INSERT INTO `orders`(`user_id`) VALUES (?)");
        $sql->bind_param("i", $userID );
        $sql->execute();
        $inserteOrder = parent::$connection->insert_id;
        return $inserteOrder;
    }

    //Thêm chi tiết đơn hàng
    public function addOrderDetail($orderDetail){
        $sql = parent::$connection->prepare("INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `price_per_unit`, `subtotal`, `order_code`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("iiiiis", $orderDetail["order_id"], $orderDetail["product_id"], $orderDetail["quantity"], $orderDetail["price_per_unit"], $orderDetail["subtotal"], $orderDetail["order_code"] );
        return $sql->execute();
    }

    //Get All order
    public function getAllOrderByOrderCode($order_code){
        $sql = parent::$connection->prepare("SELECT orders.user_id, orders.order_date, order_details.*, products.*, member.firstname, member.lastname, member.email, member.phone, member.address, member.postcode_zip 
        FROM `orders` 
        INNER JOIN order_details ON order_details.order_id = orders.order_id
        INNER JOIN products ON products.id = order_details.product_id
        INNER JOIN member ON member.id = orders.user_id
        WHERE order_details.order_code = ?;");
        $sql->bind_param("s", $order_code );
        return parent::select($sql);
    }

    //Get All order of user
    public function getAllOrder($userID){
        $sql = parent::$connection->prepare("SELECT * FROM `orders` 
        INNER JOIN order_details ON order_details.order_id = orders.order_id
        INNER JOIN products ON products.id = order_details.product_id
        WHERE orders.user_id = ?;");
        $sql->bind_param("i", $userID);
        return parent::select($sql);
    }

}