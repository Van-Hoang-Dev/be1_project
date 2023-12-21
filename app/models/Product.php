<?php
class Product extends Database
{
    //Get all product function
    public function getAllProduct()
    {
        $sql = parent::$connection->prepare("SELECT * FROM products;");
        return parent::select($sql);
    }

    //Get product with id
    public function getProductByID($productID)
    {
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?;");
        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    // GET PRODUCT BY CATEGORY ID
    public function getProductsByCategory($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT *
                                            FROM products
                                            INNER JOIN category_product
                                            ON products.id = category_product.product_id
                                            WHERE category_product.category_id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    //Get product with category by id
    public function getProductWithCategoryByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT DISTINCT products.*, 
                                                GROUP_CONCAT(category_product.category_id) as 'category_id' 
                                                FROM `products` 
                                                INNER JOIN category_product 
                                                ON category_product.product_id = products.id 
                                                WHERE id=?;");
        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    //Get Product by categoyID function
    public function getProductHaveCategoryID($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `products` 
                                            INNER JOIN category_product 
                                            ON category_product.product_id = products.id
                                            WHERE category_product.product_id = ?");
        $sql->bind_param("i", $id);
        return parent::select($sql)[0];
    }

    //Add producut function
    public function store($productName, $prodcutPrice, $productDescription, $productImage, $categoriesID)
    {
        $sql = parent::$connection->prepare("INSERT INTO `products`(`name`, `price`, `description`, `image`) VALUES (?,?,?,?)");
        $sql->bind_param("siss", $productName, $prodcutPrice, $productDescription, $productImage);
        $sql->execute();

        $insertedProduct = parent::$connection->insert_id;
        $value = "";
        $type = "";

        $insertedValues = [];
        foreach ($categoriesID as $category) {
            $value .= '(?,?),';
            $type .= 'ii';
            array_push($insertedValues, $category, $insertedProduct);
        }
        $value  =  substr($value, 0, -1);
        $sql = parent::$connection->prepare("INSERT INTO `category_product`(`category_id`, `product_id`) VALUES $value ");
        $sql->bind_param($type, ...$insertedValues);

        return $sql->execute();
    }

    //Update product function
    public function update($productID, $productName, $productPrice, $productDescription, $productImage, $categoriesID)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `name`= ?,`price`= ?,`description`= ?,`image`= ? WHERE id=? ;");
        $sql->bind_param("sissi", $productName, $productPrice, $productDescription, $productImage, $productID);
        $sql->execute();

        //Xoa cac dinh muc cu
        $sql = parent::$connection->prepare("DELETE FROM `category_product` WHERE product_id = ?");
        $sql->bind_param("i", $productID);
        $sql->execute();

        //Them moi vao category_product
        $value = "";
        $type = "";

        $insertedValues = [];
        foreach ($categoriesID as $category) {
            $value .= '(?,?),';
            $type .= 'ii';
            array_push($insertedValues, $category, $productID);
        }
        $value  =  substr($value, 0, -1);
        $sql = parent::$connection->prepare("INSERT INTO `category_product`(`category_id`, `product_id`) VALUES $value ");
        $sql->bind_param($type, ...$insertedValues);

        return $sql->execute();
    }

    //Delete product functon
    public function destroy($productID)
    {
        //Xoa category_product
        $sql = parent::$connection->prepare("DELETE FROM `category_product` WHERE product_id = ?");
        $sql->bind_param("i", $productID);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE id =?");
        $sql->bind_param("i", $productID);
        return $sql->execute();
    }

    //Paginationbar

    //Get total product 
    public function getTotalProducts(){
        $sql = parent::$connection->prepare("SELECT COUNT(*) FROM `products`;");
        return parent::select($sql)[0];
    }

    public function getProductWithLimit($curentPage, $perPage){
        $startRecord = ($curentPage -1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `products` LIMIT ?, ?;");
        $sql->bind_param("ii", $startRecord, $perPage);
        return parent::select($sql);
    }

    public function getPaginationBar($url, $total, $page, $perPage, $offset){
        if($total < 0){
            return "";
        }

        $totalLinks = ceil($total/ $perPage);

        if($total <= 1){
            return "";
        }

        $first = "";
        $last = "";
        $previous = "";
        $next = "";

        if($page > 1){
            $first = "<li class='page-item'><a class='page-link' href='". $url ."?page=". 1 ."'><<</a></li>&nbsp;&nbsp;";
			$previous = "<li class='page-item'><a class='page-link' href='".$url."?page=".($page - 1)."'>Previous</a></li>";
        }

        if($page < $totalLinks) {
			$last = "<li class='page-item'><a class='page-link' href='". $url."?page=". $totalLinks ."'>>></a></li>&nbsp;&nbsp;";
            $next = "<li class='page-item'><a class='page-link' href='".$url."?page=".($page + 1)."'>Next</a></li>&nbsp;&nbsp;";
		}

        $from = $page - $offset;
		$to = $page + $offset;
		
		if($from <= 0) {
			$from = 1;
		}
		
		if($to > $totalLinks) {
			$to = $totalLinks;
		}

        $link = "";
        for($i = $from; $i <= $to; $i++){
            $link = $link . "<li class='page-item'><a class='page-link ". ($i == $page? "active" : "")."' href='".$url."?page=".$i."'>".$i."</a></li>";
        }

        return $first . $previous .  $link  . $next . $last;
    }

}
