<div class="content-shop">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="categories">
                    <h2>Categories</h2>
                    <div class="category-item">
                            <a href="shop.php" class="<?php
                                                        if (empty($_GET["category_id"])) {
                                                            echo "active";
                                                        } ?>">
                                <span>All Products</span>
                            </a>
                        </div>
                    <?php
                    foreach ($categories as $category) :
                    ?>
                        <div class="category-item">
                            <a href="shop.php?category_id=<?php echo $category["category_id"]; ?>" class="<?php
                                                                                                            if (isset($_GET["category_id"])) {
                                                                                                                echo ($_GET["category_id"] == $category["category_id"]) ? "active" : "";
                                                                                                            } ?>">
                                <span><?php echo $category["name"]; ?></span>
                            </a>
                        </div>

                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-items">
                    <div class="row">
                        <?php
                        foreach ($products as $product) :
                        ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-emtry">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <!-- <div class="onsale">-13%</div> -->
                                        </div>
                                        <div class="product-image">
                                            <img class="img-fluid" src="public/images/content/products/<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>" alt="Mac mini M2 2023">
                                        </div>
                                    </div>
                                    <div class="product-button">
                                        <div class="icon">
                                            <div class="tooltip-content">Add to cart</div>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" name="add_to_cart" value="<?php echo $product["id"] ?>">
                                                <input type="hidden" name="index" value="1">
                                                <button type="submit"><i class="fa-solid fa-bag-shopping"></i></button>
                                            </form>
                                        </div>
                                        <div class="icon">
                                            <div class="tooltip-content">Wishlist</div>
                                            <form action="#" method="post">
                                                <input type="hidden" name="add_to_wishlist" value="<?php echo $product["id"] ?>">
                                                <button type="submit"><i class="fa-regular fa-star"></i></button>
                                            </form>
                                        </div>
                                        <div class="icon">
                                            <div class="tooltip-content">Compare</div>
                                            <a href="#"><i class="fa-solid fa-layer-group"></i></a>
                                        </div>
                                        <div class="icon">
                                            <div class="tooltip-content">Quick view</div>
                                            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title">
                                            <form action="detail.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                                <input type="submit" class="btn-no-border" value="<?php echo $product["name"] ?>">
                                            </form>
                                        </h3>
                                        <div class="rating none">
                                            <div class="star-rating none">
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span class="cost">$<?php echo $product["price"] ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>

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
                <?php endif ?>
            </div>
        </div>
    </div>
</div>