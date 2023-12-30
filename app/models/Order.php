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

    //Sưa trang thai
    public function updateOrderStatus($order_id, $order_status){
        $sql = parent::$connection->prepare("UPDATE `orders` SET `order_status`= ? WHERE order_id = ?");
        $sql->bind_param("ii", $order_status, $order_id);
        return $sql->execute();
    }

    public function deleteOrder($order_id){

        $sql = parent::$connection->prepare("DELETE FROM `order_details` WHERE order_id = ?");
        $sql->bind_param("i", $order_id);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `orders` WHERE order_id = ?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

    //Lấy san phản được bán nhiều
    public function getTopSellingProduct(){
        $sql= parent::$connection->prepare("SELECT products.* , SUM(order_details.quantity) AS total_product, 
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM order_details
        INNER JOIN products ON order_details.product_id = products.id
        GROUP BY order_details.product_id
        HAVING total_product >= 2;");
        return parent::select($sql);
    }

    public function deleteOrderByCode($order_code){

        $sql = parent::$connection->prepare("SELECT order_id FROM `order_details` WHERE order_code = ?");
        $sql->bind_param("s", $order_code);
        $order_id =  parent::select($sql)[0];

        $sql = parent::$connection->prepare("SELECT order_id, product_id, quantity FROM `order_details` WHERE order_code = ? ;");
        $sql->bind_param("s", $order_code);
        $products =  parent::select($sql);

        foreach($products as $product){
            $sql = parent::$connection->prepare("UPDATE products SET 
            products.current_quantity = (current_quantity + ?)
            WHERE products.id = ?;");
            $sql->bind_param("ii", $product["quantity"] ,$product["product_id"]);
            $sql->execute();
        }


        $sql = parent::$connection->prepare("DELETE FROM `order_details` WHERE order_code = ?");
        $sql->bind_param("s", $order_code);
        $sql->execute();

        $order_id =  $order_id["order_id"];
        $sql = parent::$connection->prepare("DELETE FROM `orders` WHERE order_id = ?");
        $sql->bind_param("i", $order_id);
        $sql->execute();
    }

    //Thêm chi tiết đơn hàng
    public function addOrderDetail($orderDetail){
        $sql = parent::$connection->prepare("INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `price_per_unit`, `subtotal`, `order_code`, `discount_code`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("iiiiiss", $orderDetail["order_id"], $orderDetail["product_id"], $orderDetail["quantity"], $orderDetail["price_per_unit"], $orderDetail["subtotal"], $orderDetail["order_code"], $orderDetail["discount_code"] );
        return $sql->execute();
    }

    //Get All order
    public function getAllOrderByOrderCode($order_code){
        $sql = parent::$connection->prepare("SELECT orders.*, order_details.*, products.*, member.firstname, member.lastname, member.email, member.phone, member.address, member.postcode_zip,
         (SELECT image FROM images 
        WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM `orders` 
        INNER JOIN order_details ON order_details.order_id = orders.order_id
        INNER JOIN products ON products.id = order_details.product_id
        INNER JOIN member ON member.id = orders.user_id
        WHERE order_details.order_code = ?;");
        $sql->bind_param("s", $order_code );
        return parent::select($sql);
    }

    //Get All order of user
    public function getAllOrderByUserID($userID){
        $sql = parent::$connection->prepare("SELECT orders.*, products.*, order_details.*, 
        (SELECT image FROM images 
        WHERE images.product_id = products.id AND images.main = 1) AS 'image' 
        FROM `orders` 
        INNER JOIN order_details ON order_details.order_id = orders.order_id
        INNER JOIN products ON products.id = order_details.product_id
        WHERE orders.user_id = ?;");
        $sql->bind_param("i", $userID);
        return parent::select($sql);
    }

    //Get All order
    // public function getAllOrders(){
    //     $sql = parent::$connection->prepare("SELECT orders.*, products.*, order_details.*,
	// 	CONCAT(member.firstname, member.lastname) AS customer_name, member.email, member.phone, member.address,
    //     (SELECT image FROM images 
    //     WHERE images.product_id = products.id AND images.main = 1) AS 'image' 
    //     FROM `orders` 
    //     INNER JOIN member ON member.id = orders.user_id
    //     INNER JOIN order_details ON order_details.order_id = orders.order_id
    //     INNER JOIN products ON products.id = order_details.product_id
    //     ORDER BY order_details.order_code;");
    //     return parent::select($sql);
    // }

    public function getAllOrders(){
            $sql = parent::$connection->prepare("SELECT orders.order_id, orders.order_status, orders.order_date, order_details.order_code,
            CONCAT(member.firstname, member.lastname) AS customer_name, member.email, member.phone, member.address,
            COUNT(*) as total_quantity
                    FROM `orders` 
                    LEFT JOIN member ON member.id = orders.user_id
                    LEFT JOIN order_details ON order_details.order_id = orders.order_id
                    LEFT JOIN products ON products.id = order_details.product_id
                    GROUP BY order_details.order_code
                    ORDER BY orders.order_date DESC;");
        return parent::select($sql);
    }

}