<?php
class Review extends Database {

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