<div class="container">
    <h2 class="my-5 title-center">User management</h2>
    <table class="table table-hover mt-5">
        <thead style="text-align: center;">
            <th>Review id</th>
            <th>Customer</th>
            <th>Phone</th>
            <!-- <th>Email</th> -->
            <th>Phone</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            // var_dump($reviews);
            foreach ($reviews as $review) :
            ?>
                <tr>
                    <td><?php echo $review["review_id"] ?></td>
                    <td><?php echo $review["firstname"] . " " . $review["lastname"] ?></td>
                    <td><?php echo $review["user_phone"] ?></td>
                    <!-- <td><?php echo $review["email"] ?></td> -->
                    <td> <img class="img-fluid" style="width:100px" src="../../public/images/content/products/<?php echo $review["image"] ?>" alt="<?php echo $review["name"] ?>"></td>
                    <td style="color: #ffb300;">
                        <?php for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $review['rating']) {
                                echo '<i class="fa-solid fa-star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star"></i>';
                            }
                        } ?>
                    </td>
                    <td><textarea readonly><?php echo $review["comment"] ?></textarea></td>
                    <td><?php echo $review["review_date"] ?></td>
                    <td>
                        <form action="destroy.php" method="post" onsubmit="return confirm('Are you sure delete?')">
                            <button type="submit" class="btn btn-outline-danger" name="review_id" value="<?php echo $review["review_id"] ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>