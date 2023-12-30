<div class="container">
    <h2 class="my-5 title-center">Product management</h2>

    <!-- Thông báo -->
    <?php if (isset($_SESSION["notify"]) && $_SESSION["notify"]["check"] == 1) :
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION["notify"]["notify"]; unset($_SESSION["notify"]);?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION["notify"]) && $_SESSION["notify"]["check"] == 0): ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION["notify"]["notify"]; unset($_SESSION["notify"]);?>
        </div>
    <?php 
    endif;
    ?>

    <div class="row">
        <div class="col-6">
        <form class="d-flex" role="search" method="get" action="manage_product.php">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        </div>
    </div>

    <a href="create.php" class="btn btn-outline-primary my-3"><i class="fa-regular fa-plus"></i> Add Product</a>
    <table class="table table-hover">
        <thead>
            <th>Photo</th>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Current quantiry</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            // var_dump($products);
            foreach ($products as $product) :
            ?>
                <tr>
                    <td> <img class="img-fluid" style="width:100px" src="../../public/images/content/products/<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>"></td>
                    <td><?php echo $product["id"] ?></td>
                    <td><?php echo $product["name"] ?></td>
                    <td>$<?php echo $product["price"] ?></td>
                    <td><?php echo $product["description"]; ?></td>
                    <td><?php echo $product["current_quantity"]; ?></td>
                    <td>
                        <form action="edit.php" method="post">
                            <button type="submit" class="btn btn-outline-primary" name="id" value="<?php echo $product["id"] ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                        </form>
                    </td>
                    </td>
                    <td>
                        <form action="destroy.php" method="post" onsubmit="return confirm('Ban co muon xoa?')">
                            <button type="submit" class="btn btn-outline-danger" name="id" value="<?php echo $product["id"] ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <?php if (isset($paginationBar)) : ?>
        <div class="text-center">
            <div class="number-page">
                <ul class="pagination">
                    <?php
                    echo $paginationBar; ?>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <a href="manage_product.php" class="btn btn-outline-primary">Back</a>
    <?php endif ?>
</div>