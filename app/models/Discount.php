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
                                                (`discount_code`, `discount_amount`, `is_active`, `start_date`, `end_date`) 
                                                VALUES (?,?,?,?,?)");
        $sql->bind_param("siiss",  $discount['discount_code'], $discount['discount_amount'], $discount['is_active'], $startDate, $endDate);
        return $sql->execute();
    }

    //Update ma giam gia
    public function updateDiscount($discount)
    {
        $sql = parent::$connection->prepare("UPDATE `discounts` SET `discount_code`=? ,`discount_amount`=? ,`is_active`=?,`start_date`=?,`end_date`=? WHERE discount_id = ?");
        $sql->bind_param("siissi",  $discount['discount_code'], $discount['discount_amount'], $discount['is_active'], $discount["start_date"], $discount["end_date"], $discount["discount_id"]);
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
}
