<div class="container">
    <h2 class="my-5 title-center">Discount management</h2>
    <a href="create.php" class="btn btn-outline-primary my-3"><i class="fa-regular fa-plus"></i>  Add discount</a>
    <table class="table table-hover ">
        <thead>
            <th>Id</th>
            <th>Code</th>
            <th>Amount</th>
            <th>Is active</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            foreach($discounts as $discount):
                $startDate = date('d/m/Y', strtotime($discount['start_date']));
                $endDate = date('d/m/Y', strtotime($discount['end_date']));
            ?>
            <tr>
                <td><?php echo $discount["discount_id"] ?></td>
                <td><?php echo $discount["discount_code"] ?></td>
                <td><?php echo $discount["discount_amount"] ?></td>
                <td><?php echo $discount["is_active"] ?></td>
                <td><?php echo $startDate ?></td>
                <td><?php echo $endDate ?></td>
                <td>
                    <form action="edit.php" method="post">
                        <button type="submit" class="btn btn-outline-primary" name="discount_id" value="<?php echo $discount["discount_id"] ?>" ><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>
                </td>
                <td>
                <form action="destroy.php" method="post" onsubmit="return confirm('Ban co muon xoa?')" >
                        <button type="submit" class="btn btn-outline-danger" name="discount_id" value="<?php echo $discount["discount_id"] ?>" ><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</div>