<div class="container">
    <h2 class="my-5 title-center">Category management</h2>
    <a href="create.php" class="btn btn-outline-primary my-3"><i class="fa-regular fa-plus"></i>  Add category</a>
    <table class="table table-hover ">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            // var_dump($products);
            foreach($categories as $category):
            ?>
            <tr>
                <td><?php echo $category["category_id"] ?></td>
                <td><?php echo $category["name"] ?></td>
                <td>
                    <form action="edit.php" method="post">
                        <button type="submit" class="btn btn-outline-primary" name="category_id" value="<?php echo $category["category_id"] ?>" ><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>
                </td>
                <td>
                <form action="destroy.php" method="post" onsubmit="return confirm('Ban co muon xoa?')" >
                        <button type="submit" class="btn btn-outline-danger" name="category_id" value="<?php echo $category["category_id"] ?>" ><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</div>