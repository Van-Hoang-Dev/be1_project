<?php 
    class User extends Database{
        

        //Check you user
        public function checkLogin($username){
            $sql = parent::$connection->prepare("SELECT * FROM `member` WHERE username = ? OR email= ?");
            $sql->bind_param("ss", $username, $username);
            return parent::select($sql)[0];
        }   

        //Add new user
        public function addNewUser($firstname, $lastname, $username, $gender, $email, $phone, $address, $password){
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = parent::$connection->prepare("INSERT INTO `member`
            (`firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `password`) 
            VALUES (?,?,?,?,?,?,?,?)");
            $sql->bind_param("sssissss", $firstname, $lastname, $username, $gender, $email, $phone, $address, $hashPassword );
            return $sql->execute();
        }

    }