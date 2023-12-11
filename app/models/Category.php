<?php 
    class Category extends Database{
        //Ham lay tat ca category
        public function getAllCategory(){
            $sql = parent::$connection->prepare("SELECT * FROM categories;");
            return parent::select($sql);
        }
    }