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
    public function loginAccount($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE phone = ?");
        $sql->bind_param("s", $username);
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

    // Reset Info Account
    public function resetAccount($firstname, $lastname, $email, $phone, $address, $postcode_zip ,$password)
    {
        $sql = parent::$connection->prepare("UPDATE member 
                                                SET `firstname` = ?, `lastname`= ?, `email` = ?, `address`= ?,`postcode_zip`= ?, `password` =?  
                                                WHERE `phone`= ?");
        $sql->bind_param("sssssss", $firstname, $lastname, $email, $address, $postcode_zip, $password, $phone);
        return $sql->execute();
    }

    public function getTokenByPhoneNumber($phone, $expired)
    {
        $sql = parent::$connection->prepare("SELECT * FROM token_auth_tb WHERE `phone` = ? AND `is_expired` = ?");
        $sql->bind_param("si", $phone, $expired);
        return parent::select($sql)[0];
    }

    public function markAsExpired($tokenId)
    {
        $sql = parent::$connection->prepare(
            "UPDATE token_auth_tb SET is_expired = 1 WHERE id = ?"
        );
        $sql->bind_param("i", $tokenId);
        return $sql->execute();
    }

    public function insertToken($phone, $random_password_hash, $random_selector_hash, $expiry_date)
    {
        $sql = parent::$connection->prepare(
            "INSERT INTO token_auth_tb (`phone`, `password_hash`, `selector_hash`, `expiry_date`) VALUES (?, ?, ?, ?)"
        );
        $sql->bind_param('ssss', $phone, $random_password_hash, $random_selector_hash, $expiry_date);

        // Thực hiện câu lệnh SQL và kiểm tra lỗi
        if ($sql->execute()) {
            return true; // Thành công
        } else {
            // Xử lý lỗi
            echo "Error: " . $sql->error;
            return false;
        }
    }


    public function clearUserCookie()
    {
        if (isset($_COOKIE["member_phone"])) {
            setcookie("member_login", "");
        }
        if (isset($_COOKIE["random_password"])) {
            setcookie("random_password", "");
        }
        if (isset($_COOKIE["random_selector"])) {
            setcookie("random_selector", "");
        }
    }

    //Check customer was in database
    public function checkCustomer($email, $phone)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE `email` = ? AND phone = ?");
        $sql->bind_param("ss", $email, $phone);
        return parent::select($sql)[0];
    }
}
