<?php
class Review extends Database {

    //Get all review
    public function getAllReviews(){
        $sql = parent::$connection->prepare("SELECT review.*, member.firstname, member.lastname, member.email, products.name ,
        (SELECT image FROM images 
        WHERE images.product_id = products.id AND images.main = 1) AS 'image'
        FROM `review`
        LEFT JOIN member ON member.phone = review.user_phone
        LEFT JOIN products ON products.id = review.product_id;");
        return parent::select($sql);
    }

    //Delete review
    public function deleteReview($review_id){
        $sql = parent::$connection->prepare("DELETE FROM `review` WHERE review_id = ?");
        $sql->bind_param("i", $review_id);
        return $sql->execute();
    }

    // Add review 
    public function addReview($review)
    {
        $sql = parent::$connection->prepare("INSERT INTO `review`
                                                (`product_id`, `user_phone`, `rating`, `comment`) 
                                                VALUES (?,?,?,?)");
        $sql->bind_param("isis", $review['product_id'], $review['user_phone'], $review['rating'], $review['comment']);
        return $sql->execute();
    }

    // Lay review cho 1 san pham
    public function getReviewByIDProduct($productID)
    {
        $sql = parent::$connection->prepare("SELECT review.*, `member`.lastname, `member`.firstname
                                            FROM `review`
                                            INNER JOIN member ON
                                            `review`.user_phone = `member`.phone
                                            WHERE product_id = ?");
        $sql->bind_param("i", $productID);
        return parent::select($sql);
    }
}