<?php
class User extends Database
{

    // Login Account
    public function loginAccount($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE phone = ?");
        $sql->bind_param("s", $username);
        return parent::select($sql)[0];
    }

    // Register Account
    public function registerAccount($firstname, $lastname, $username, $gender, $email, $phone, $address, $password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("INSERT INTO `member`
            (`firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `password`) 
            VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssissss", $firstname, $lastname, $username, $gender, $email, $phone, $address, $hashPassword);
        return $sql->execute();
    }

    //Get user by id
    public function getUserByID($userID)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE id = ?;");
        $sql->bind_param("i", $userID);
        return parent::select($sql)[0];
    }

    //User order 
    public function addUserOrder($userOrder)
    {
        $userOerderExisting = $this->checkCustomer($userOrder["email"], $userOrder["phone"]);
        if (isset($userOerderExisting)) {
            $sql = parent::$connection->prepare("UPDATE `member` SET 
                `firstname`=?,`lastname`=?,`address`=?,`postcode_zip`=?
                 WHERE id = ?");
            $sql->bind_param("ssssi", $userOrder["firstname"], $userOrder["lastname"], $userOrder["address"], $userOrder["postcode_zip"], $userOerderExisting["id"]);
            $sql->execute();
            return $userOerderExisting["id"];
        } else {
            $sql = parent::$connection->prepare("INSERT INTO `member`(`firstname`, `lastname`, `email`, `phone`, `address`, `postcode_zip`) VALUES (?,?,?,?,?,?)");
            $sql->bind_param("ssssss", $userOrder["firstname"], $userOrder["lastname"], $userOrder["email"], $userOrder["phone"], $userOrder["address"], $userOrder["postcode_zip"]);
            $sql->execute();
            $insertedUser = parent::$connection->insert_id;
        }
        return $insertedUser;
    }

    //Check customer was in database
    public function checkCustomer($email, $phone)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE `email` = ? AND phone = ?");
        $sql->bind_param("ss", $email, $phone);
        return parent::select($sql)[0];
    }
}
