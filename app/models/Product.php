<?php
class Product extends Database
{
    //Get all product function
    public function getAllProduct()
    {
        $sql = parent::$connection->prepare("SELECT products.*,
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM products ORDER BY products.id ASC");
        return parent::select($sql);
    }

    //Get product with id
    public function getProductByID($productID)
    {
        $sql = parent::$connection->prepare("SELECT products.*,
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM products WHERE products.id = ?");
        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    // Tìm sản phẩm theo tên
    public function getProductsByKeyWord($keyword)
    {
        // 2. Tạo câu SQL
        $keyword = "%$keyword%";
        $sql = parent::$connection->prepare("SELECT products.*,
        (SELECT image FROM images 
        WHERE images.product_id = products.id AND images.main = 1) AS 'image'  
        FROM `products` WHERE name LIKE ?");
        $sql->bind_param('s', $keyword);
        return parent::select($sql);
    }

    // Tìm sản phẩm theo giá
    public function getProductsByPrice($priceS, $priceE)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products
        WHERE price BETWEEN ? AND ?");
        $sql->bind_param('ii', $priceS, $priceE);
        return parent::select($sql);
    }

    // Lấy tất cả sản phẩm KÈM DANH MỤC
    //  public function getAllProductsWithCategories()
    //  {
    //      // 2. Tạo câu SQL
    //      $sql = parent::$connection->prepare("SELECT DISTINCT products.*, (
    //          SELECT GROUP_CONCAT(categories.name,'-',categories.id)
    //          FROM categories
    //          INNER JOIN category_product
    //          ON category_product.category_id =categories.id
    //          WHERE category_product.product_id = products.id) AS category_name
    //          FROM `products`
    //          INNER JOIN category_product
    //          ON products.id = category_product.product_id");

    //      return parent::select($sql);
    //  }

    // GET PRODUCT BY CATEGORY ID
    public function getProductsByCategory($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare("SELECT products.*,
                                            (SELECT image FROM images 
                                             WHERE images.product_id = products.id AND images.main = 1) AS 'image'
                                            FROM products
                                            INNER JOIN category_product
                                            ON products.id = category_product.product_id
                                            WHERE category_product.category_id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    public function getProductWithCategoryByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT products.*,
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        GROUP_CONCAT(DISTINCT category_product.category_id) as 'category_id',
         FROM `products` 
         INNER JOIN category_product 
         ON category_product.product_id = products.id 
         WHERE id=?
         GROUP BY
         products.id, products.name, products.price, products.description, products.image;");

        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    //Get product with category and discount by id
    public function getProductWithCategoryAndDiscountByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT products.*, 
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image',
        GROUP_CONCAT(DISTINCT category_product.category_id) as 'category_id',
        GROUP_CONCAT(DISTINCT discount_product.discount_id) as 'discount_id' 
         FROM `products` 
         INNER JOIN category_product 
         ON category_product.product_id = products.id 
         INNER JOIN discount_product 
         ON discount_product.product_id = products.id
         WHERE id=?
         GROUP BY
         products.id, products.name, products.price, products.description, products.image;");

        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    //Get product with category and discount by id
    public function getProductWithCategoryDiscountAndImageByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT products.*, 
        GROUP_CONCAT(DISTINCT category_product.category_id) as 'category_id',
        GROUP_CONCAT(DISTINCT discount_product.discount_id) as 'discount_id',
        GROUP_CONCAT(DISTINCT images.image,'-' ,images.main) as 'images'
         FROM `products` 
         LEFT JOIN category_product 
         ON category_product.product_id = products.id 
         LEFT JOIN discount_product 
         ON discount_product.product_id = products.id
         LEFT JOIN images 
         ON images.product_id = products.id
         WHERE id=?
        
         GROUP BY
         products.id, products.name, products.price;");

        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    //Get Product by categoyID function
    public function getProductHaveCategoryID($id)
    {
        $sql = parent::$connection->prepare("SELECT products.*,
                                              category_product.category_id,
                                            (SELECT image FROM images 
                                            WHERE images.product_id = products.id AND images.main = 1) AS 'image' 
                                            FROM `products` 
                                            INNER JOIN category_product 
                                            ON category_product.product_id = products.id
                                            WHERE category_product.product_id = ?");
        $sql->bind_param("i", $id);
        return parent::select($sql)[0];
    }

    //Get current quantity
    public function getCurrentQuantityOfProductByProductID($productID)
    {
        $sql = parent::$connection->prepare("SELECT current_quantity FROM products WHERE id = ? ");
        $sql->bind_param("i", $productID);
        return parent::select($sql)[0];
    }

    //Update the current quantity if order
    public function updateQuantityWhenOrder($productID, $newQuantity)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `current_quantity`=? WHERE id= ?");
        $sql->bind_param("ii", $newQuantity, $productID);
        return $sql->execute();
    }

    //Add producut function
    public function store($productName, $prodcutPrice, $productDescription, $categoriesID, $discount_id, $main_image, $productImages)
    {
        /******************Product*************************/
        $sql = parent::$connection->prepare("INSERT INTO `products`(`name`, `price`, `description`) VALUES (?,?,?)");
        $sql->bind_param("sis", $productName, $prodcutPrice, $productDescription);
        $sql->execute();

        /******************Categoty*************************/
        //Lay id cua san pham vua them
        $insertedProduct = parent::$connection->insert_id;
        $value = "";
        $type = "";

        //Them vao bang cateogory_product
        $insertedValues = [];
        foreach ($categoriesID as $category) {
            $value .= '(?,?),';
            $type .= 'ii';
            array_push($insertedValues, $category, $insertedProduct);
        }
        $value  =  substr($value, 0, -1);
        $sql = parent::$connection->prepare("INSERT INTO `category_product`(`category_id`, `product_id`) VALUES $value ");
        $sql->bind_param($type, ...$insertedValues);
        $sql->execute();

        /******************Discount*************************/
        //Them vao bang discount_product
        if (!empty($discount_id)) {
            $value = "";
            $type = "";
            $insertedValues = [];
            foreach ($discount_id as $discount) {
                $value .= '(?,?),';
                $type .= 'ii';
                array_push($insertedValues, $discount, $insertedProduct);
            }
            $value  =  substr($value, 0, -1);
            $sql = parent::$connection->prepare("INSERT INTO `discount_product` (`discount_id`, `product_id`) VALUES $value");
            $sql->bind_param($type, ...$insertedValues);
            $sql->execute();
        }

        /******************Images*************************/
        //Them anh chính vào bang
        $main = 1;
        $sql = parent::$connection->prepare("INSERT INTO `images`(`image`, `product_id`, main) VALUES (?,?,?)");
        $sql->bind_param("ssi", $main_image, $insertedProduct, $main);
        $sql->execute();

        //Them vao bang image
        if (!empty($productImages)) {
            $value = "";
            $type = "";
            $insertedValues = [];
            foreach ($productImages as $image) {
                $value .= '(?,?),';
                $type .= 'si';
                array_push($insertedValues, $image, $insertedProduct);
            }
            $value  =  substr($value, 0, -1);
            $sql = parent::$connection->prepare("INSERT INTO `images`(`image`, `product_id`) VALUES $value");
            $sql->bind_param($type, ...$insertedValues);
            $sql->execute();
        }
    }

    //Update product function
    public function update($productID, $productName, $productPrice, $productDescription, $categoriesID, $discount_id, $main_image ,$productImages)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `name`= ?,`price`= ?,`description`= ?  WHERE id=? ;");
        $sql->bind_param("sisi", $productName, $productPrice, $productDescription, $productID);
        $sql->execute();


        /******************Categoty*************************/
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
        $sql->execute();

        /******************Images*************************/
        //Sửa chính trong bang
        if(!empty($main_image)){
            $sql = parent::$connection->prepare("DELETE FROM `images` WHERE product_id= ? AND main = 1");
            $sql->bind_param("i", $productID);
            $sql->execute();

            $main = 1;
            $sql = parent::$connection->prepare("INSERT INTO `images`(`image`, `product_id`, main) VALUES (?,?,?)");
            $sql->bind_param("ssi", $main_image, $productID, $main);
            $sql->execute();
        }


        //Xoa images
        if (!empty($productImages)) {
            $sql = parent::$connection->prepare("DELETE FROM `images` WHERE product_id= ? AND main = 0");
            $sql->bind_param("i", $productID);
            $sql->execute();

            //Them vao bang image
            $value = "";
            $type = "";
            $insertedValues = [];
            foreach ($productImages as $image) {
                $value .= '(?,?),';
                $type .= 'si';
                array_push($insertedValues, $image, $productID);
            }
            $value  =  substr($value, 0, -1);
            $sql = parent::$connection->prepare("INSERT INTO `images`(`image`, `product_id`) VALUES $value");
            $sql->bind_param($type, ...$insertedValues);
            $sql->execute();
        }

        /******************Categoty*************************/
        if (!empty($discount_id)) {
            //Xoa discount
            $sql = parent::$connection->prepare("DELETE FROM `discount_product` WHERE product_id= ?");
            $sql->bind_param("i", $productID);
            $sql->execute();
            //Them moi 
            $value = "";
            $type = "";
            $insertedValues = [];
            foreach ($discount_id as $discount) {
                $value .= '(?,?),';
                $type .= 'ii';
                array_push($insertedValues, $discount, $productID);
            }
            $value  =  substr($value, 0, -1);
            $sql = parent::$connection->prepare("INSERT INTO `discount_product` (`discount_id`, `product_id`) VALUES $value");
            $sql->bind_param($type, ...$insertedValues);
        }
        return $sql->execute();
    }

    //Delete product functon
    public function destroy($productID)
    {
        //Xoa category_product
        $sql = parent::$connection->prepare("DELETE FROM `category_product` WHERE product_id = ?");
        $sql->bind_param("i", $productID);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `discount_product` WHERE product_id= ?");
        $sql->bind_param("i", $productID);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `images` WHERE product_id =?");
        $sql->bind_param("i", $productID);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE id =?");
        $sql->bind_param("i", $productID);
        return $sql->execute();
    }

    //Paginationbar

    //Get total product 
    public function getTotalProducts()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(*) FROM `products`;");
        return parent::select($sql)[0];
    }


    public function getProductWithLimit($curentPage, $perPage)
    {
        $startRecord = ($curentPage - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT products.*,
        (SELECT image FROM images 
         WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM `products`
         LIMIT ?, ?;");
        $sql->bind_param("ii", $startRecord, $perPage);
        return parent::select($sql);
    }

    public function getPaginationBar($url, $total, $page, $perPage, $offset)
    {
        if ($total < 0) {
            return "";
        }

        $totalLinks = ceil($total / $perPage);

        if ($total <= 1) {
            return "";
        }

        $first = "";
        $last = "";
        $previous = "";
        $next = "";

        if ($page > 1) {
            $first = "<li class='page-item'><a class='page-link' href='" . $url . "?page=" . 1 . "'><<</a></li>&nbsp;&nbsp;";
            $previous = "<li class='page-item'><a class='page-link' href='" . $url . "?page=" . ($page - 1) . "'>Previous</a></li>";
        }

        if ($page < $totalLinks) {
            $last = "<li class='page-item'><a class='page-link' href='" . $url . "?page=" . $totalLinks . "'>>></a></li>&nbsp;&nbsp;";
            $next = "<li class='page-item'><a class='page-link' href='" . $url . "?page=" . ($page + 1) . "'>Next</a></li>&nbsp;&nbsp;";
        }

        $from = $page - $offset;
        $to = $page + $offset;

        if ($from <= 0) {
            $from = 1;
        }

        if ($to > $totalLinks) {
            $to = $totalLinks;
        }

        $link = "";
        for ($i = $from; $i <= $to; $i++) {
            $link = $link . "<li class='page-item'><a class='page-link " . ($i == $page ? "active" : "") . "' href='" . $url . "?page=" . $i . "'>" . $i . "</a></li>";
        }

        return $first . $previous .  $link  . $next . $last;
    }
}
