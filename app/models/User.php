<?php 
    class User extends Database {
        
        // Login Account
        public function loginAccount($username){
            $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE phone = ?");
            $sql->bind_param("s", $username);
            return parent::select($sql)[0];
        }   

        // Register Account
        public function registerAccount($firstname, $lastname, $username, $gender, $email, $phone, $address, $password){
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = parent::$connection->prepare("INSERT INTO `member`
            (`firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `password`) 
            VALUES (?,?,?,?,?,?,?,?)");
            $sql->bind_param("sssissss", $firstname, $lastname, $username, $gender, $email, $phone, $address, $hashPassword );
            return $sql->execute();
        }

        //Get user by id
        public function getUserByID($userID){
            $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE id = ?;");
            $sql->bind_param("i", $userID);
            return parent::select($sql)[0];
        }

        // Reset Info Account
        public function resetAccount($firstname, $lastname, $username, $email, $phone, $address, $password){
            $sql = parent::$connection->prepare("UPDATE member 
                                                SET `firstname` = ?, `lastname`= ?, `username`= ?, `email` = ?, `address`= ?, `password` =?  
                                                WHERE `phone`= ?");
            $sql->bind_param("sssssss", $firstname, $lastname, $username, $email, $address, $password , $phone );
            return $sql->execute();
        }

        public function getTokenByPhoneNumber($phone,$expired) {
            $sql = parent::$connection->prepare("SELECT * FROM token_auth_tb WHERE `phone` = ? AND `is_expired` = ?");
            $sql->bind_param("si", $phone, $expired);
            return parent::select($sql)[0];
        }

        public function markAsExpired($tokenId) {
            $sql = parent::$connection->prepare(
                "UPDATE token_auth_tb SET is_expired = 1 WHERE id = ?"
            );
            $sql->bind_param("i", $tokenId);
            return $sql->execute();
        }
        
        public function insertToken($phone, $random_password_hash, $random_selector_hash, $expiry_date) {
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
        

        public function clearUserCookie() {
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
    }