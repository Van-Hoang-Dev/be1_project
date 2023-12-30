<?php
class User extends Database
{   
    //Get all user
    public function getAllUsers(){
        $sql = parent::$connection->prepare("SELECT id, firstname, lastname, email, phone, address, postcode_zip FROM `member`;");
        return parent::select($sql);
    }

    //Delete user by user id
    public function deleteUser($user_id){
        $sql = parent::$connection->prepare("DELETE FROM `member` WHERE id = ?");
        $sql->bind_param("i", $user_id);
        return $sql->execute();
    }
    // Login Account
    public function loginAccount($phone)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE phone = ?");
        $sql->bind_param("s", $phone);
        return parent::select($sql)[0];
    }

    // Register Account
    public function registerAccount($firstname, $lastname, $email, $phone, $address, $postcode_zip, $password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("INSERT INTO `member`
            (`firstname`, `lastname`, `email`, `phone`, `address`,  `postcode_zip` , `password`) 
            VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("sssssss", $firstname, $lastname, $email, $phone, $address, $postcode_zip, $hashPassword);
        return $sql->execute();
    }

    //Get user by id
    public function getUserByID($userID)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE id = ?;");
        $sql->bind_param("i", $userID);
        return parent::select($sql)[0];
    }

    //Get user by id
    public function getUserByPhoneOrEmail($method)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE phone = ? OR email =? ;");
        $sql->bind_param("ss", $method, $method);
        return parent::select($sql)[0];
    }

    //Add user order 
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

    // Reset Info Account
    public function resetAccount($firstname, $lastname, $email, $phone, $address, $postcode_zip ,$password)
    {
        $sql = parent::$connection->prepare("UPDATE member 
                                            SET `firstname` = ?, `lastname`= ?, `email` = ?, `address`= ?,`postcode_zip`= ?, `password` =?  
                                            WHERE `phone`= ?");
        $sql->bind_param("sssssss", $firstname, $lastname, $email, $address, $postcode_zip, $password, $phone);
        return $sql->execute();
    }

    public function updatePassword($phone, $email, $password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("UPDATE member 
                                            SET `password` =? WHERE `phone`= ? AND 'email' = ?");
        $sql->bind_param("sss", $password, $phone, $email);
        return $sql->execute();
    }

    // Get token
    public function getToken($token)
    {
        $sql = parent::$connection->prepare("SELECT * FROM member WHERE `token` = ?");
        $sql->bind_param("s", $token);
        return parent::select($sql)[0];
    }

    // Update token
    public function addToken($phone, $token)
    {
        $sql = parent::$connection->prepare(
            "UPDATE member SET token = ? WHERE phone = ?"
        );
        $sql->bind_param("ss", $token, $phone);
        return $sql->execute();
    }

    //Check customer was in database
    public function checkCustomer($email, $phone)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE `email` = ? AND phone = ?");
        $sql->bind_param("ss", $email, $phone);
        return parent::select($sql)[0];
    }
}
