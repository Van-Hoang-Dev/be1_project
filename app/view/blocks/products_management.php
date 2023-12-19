<div class="container">
    <h2 class="my-5 title-center">Product management</h2>
    <a href="create.php" class="btn btn-outline-primary my-3"><i class="fa-regular fa-plus"></i>  Add Product</a>
    <table class="table table-hover">
        <thead>
            <th>Photo</th>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            // var_dump($products);
            foreach($products as $product):
            ?>
            <tr>
            <td> <img class="img-fluid" style="width:100px" src="<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>"></td>
                <td><?php echo $product["id"] ?></td>
                <td><?php echo $product["name"] ?></td>
                <td>$<?php echo $product["price"] ?>.00</td>
                <td><?php echo $product["description"]; ?></td>
                <td>
                    <form action="edit.php" method="post">
                        <button type="submit" class="btn btn-outline-primary" name="id" value="<?php echo $product["id"] ?>" ><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>
                </td>
                <td>
                <form action="destroy.php" method="post" onsubmit="return confirm('Ban co muon xoa?')" >
                        <button type="submit" class="btn btn-outline-danger" name="id" value="<?php echo $product["id"] ?>" ><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</div>