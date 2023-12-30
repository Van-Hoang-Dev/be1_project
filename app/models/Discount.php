<?php
class Discount extends Database
{
    //Them ma giam gia vao databse
    public function addDiscount($discount)
    {

        // Chuyen dinh dang ngay ve YYYY-MM-DD (dinh dang ngay trong MySQL)
        $startDate = date('Y-m-d', strtotime($discount['start_date']));
        $endDate = date('Y-m-d', strtotime($discount['end_date']));


        $sql = parent::$connection->prepare("INSERT INTO `discounts`
                                                (`discount_code`, `discount_amount`, `description`, `start_date`, `end_date`) 
                                                VALUES (?,?,?,?,?)");
        $sql->bind_param("sisss",  $discount['discount_code'], $discount['discount_amount'], $discount['description'], $startDate, $endDate);
        return $sql->execute();
    }

    //Update ma giam gia
    public function updateDiscount($discount)
    {
        $sql = parent::$connection->prepare("UPDATE `discounts` SET `discount_code`=? ,`discount_amount`=? ,`description`=?,`start_date`=?,`end_date`=? WHERE discount_id = ?");
        $sql->bind_param("sisssi",  $discount['discount_code'], $discount['discount_amount'], $discount['description'], $discount["start_date"], $discount["end_date"], $discount["discount_id"]);
        return $sql->execute();
    }


    //Xoa ma giam gia trong database
    public function deleteDiscount($discount_id){
        $sql = parent::$connection->prepare("DELETE FROM `discounts` WHERE discount_id = ?");
        $sql->bind_param("i", $discount_id);
        return $sql->execute();
    }

    //Lay tat ca discount trong datase
    public function getAllDiscount()
    {
        $sql = parent::$connection->prepare("SELECT * FROM discounts");
        return parent::select($sql);
    }

    //Lay ma giam gia theo id
    public function getDiscountById($discount_id){
        $sql = parent::$connection->prepare("SELECT * FROM `discounts` WHERE discount_id = ?");
        $sql->bind_param("i", $discount_id);
        return parent::select($sql)[0];
    }

    public function getDiscountByCode($discount_code){
        $sql= parent::$connection->prepare("SELECT * FROM `discounts` INNER JOIN discount_product ON discount_product.discount_id = discounts.discount_id WHERE discount_code = ?;");
        $sql->bind_param("s", $discount_code);
        return parent::select($sql);
    }
    public function getAmountOfDiscount($discount_code){
        $sql= parent::$connection->prepare("SELECT * FROM `discounts`  WHERE discount_code = ?;");
        $sql->bind_param("s", $discount_code);
        return parent::select($sql)[0];
    }

    public function checkProductHaveDiscount($discount_code, $product_id){
        $sql= parent::$connection->prepare("SELECT * FROM `discounts` 
        INNER JOIN discount_product  ON discount_product.discount_id = discounts.discount_id
        WHERE discount_code = ? AND discount_product.product_id = ?;");
        $sql->bind_param("si", $discount_code, $product_id);
        
        $result = parent::select($sql);
        if(!empty($result)){
            return $result[0];
        }
        else{
            return 0;
        }
    }

    public function updateDiscountStatus($product_id){
        $sql = parent::$connection->prepare("UPDATE `cart_products` SET `discount_status`= 1 WHERE product_id = ?");
        $sql->bind_param("i", $product_id);
        return $sql->execute();
    }

    public function checkDiscountCode($discount_code){
        $sql= parent::$connection->prepare("SELECT CASE WHEN CURDATE() > `end_date` THEN 0 ELSE 1 END AS is_valid FROM `discounts` WHERE discounts.discount_code = ?;");
        $sql->bind_param("s", $discount_code);
        return parent::select($sql)[0];
    }



}
