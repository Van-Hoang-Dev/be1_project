<?php 
    class Category extends Database{
        //Ham lay tat ca category
        public function getAllCategory(){
            $sql = parent::$connection->prepare("SELECT * FROM categories;");
            return parent::select($sql);
        }

        //Get category by ID
        public function getCategoryByID($categoryID){
            $sql = parent::$connection->prepare("SELECT * FROM `categories` WHERE category_id = ?");
            $sql->bind_param("i", $categoryID);
            return parent::select($sql)[0];
        }

        //Add category function
        public function store($categoryName){
            $sql = parent::$connection->prepare("INSERT INTO `categories` (name) VALUES (?)");
            $sql->bind_param("s", $categoryName);
            return $sql->execute();
        }

        //Edit category function
        public function update($categoryID, $categoryName){
            $sql = parent::$connection->prepare("UPDATE `categories` SET `name`=? WHERE category_id=?");
            $sql->bind_param("si", $categoryName, $categoryID);
            return $sql->execute();
        }

        //Delete category function
        public function destroy($categoryID){
            $sql = parent::$connection->prepare("DELETE FROM `categories` WHERE category_id=?");
            $sql->bind_param("i", $categoryID);
            return $sql->execute();
        }
    }