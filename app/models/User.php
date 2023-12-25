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

    }