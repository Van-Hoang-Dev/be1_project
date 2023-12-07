<?php
    class Database{
        public static $connection = null;

        //Tao ham ket noi voi co so du lieu
        public function __construct(){
            if(!self::$connection != null){
                self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                self::$connection->set_charset("utf8mb4");
            }
        }

        //Ham lay du lieu tu co so di lieu (Select)
        public function select($sql){
            $item = [];
            $sql->execute();

            $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $item;
        }

        
    }