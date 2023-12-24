<div class="container">
    <h2 class="my-5 title-center">Inventory management</h2>
    <a href="create.php" class="btn btn-outline-primary my-3"><i class="fa-regular fa-plus"></i>  Add discount</a>
    <table class="table table-hover ">
        <thead>
            <th>Product id</th>
            <th>Product name</th>
            <th>Add date</th>
            <th>Current quantity</th>
            <th>Input quantity</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            foreach($inventory as $item):
                $addDate = date('d/m/Y', strtotime($item['date_add']));
            ?>
            <tr>
                <td><?php echo $item["product_id"] ?></td>
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo $addDate ?></td>
                <td><?php echo $item["current_quantity"] ?></td>
                <td><?php echo $item["input_quantity"] ?></td>
                <td>
                    <form action="edit.php" method="post">
                        <input type="hidden" value="<?php echo $item["product_id"] ?>" name="product_id">
                        <button type="submit" class="btn btn-outline-primary" name="date_add" value="<?php echo $item["date_add"] ?>" ><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>
                </td>
                <td>
                <form action="destroy.php" method="post" onsubmit="return confirm('Ban co muon xoa?')" >
                <input type="hidden" value="<?php echo $item["product_id"] ?>" name="product_id">
                <button type="submit" class="btn btn-outline-danger" name="date_add" value="<?php echo $item["date_add"] ?>" ><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</div>