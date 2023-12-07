<?php 
    class Product extends Database{
        //Ham lay ta ca san pham
        public function getAllProduct(){
            $sql = parent::$connection->prepare("SELECT * FROM products;");
            return parent::select($sql);
        }

        //Ham lay Product theo categoyID
        public function getProductByCategoryID(String $category_id){
            $sql = parent::$connection->prepare("SELECT * FROM `products` 
            INNER JOIN category_product ON category_product.product_id = products.id
            WHERE category_product.category_id = ?;");
            $sql->bind_param("i", $category_id);
            return parent::select($sql);
        }
    }