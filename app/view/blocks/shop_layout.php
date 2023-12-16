<div class="content-shop">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="categories">
                    <h2>Categories</h2>
                    <?php
                    foreach ($categories as $category) :
                    ?>
                        <div class="category-item">
                            <a href="shop.php?category_id=<?php echo $category["category_id"]; ?>" class="<?php if (isset($_GET["category_id"])) {
                                                                                                                echo ($_GET["category_id"] == $category["category_id"]) ? "active" : "";
                                                                                                            } ?>"><?php echo $category["name"]; ?><span></span></a>
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
                                            <img class="img-fluid" src="<?php echo $product["image"] ?>" alt="Mac mini M2 2023">
                                        </div>
                                    </div>
                                    <div class="product-button">
                                        <div class="icon">
                                            <div class="tooltip-content">Add to card</div>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" name="add_to_cart" value="<?php echo $product["id"]?>">
                                                <button type="submit"><i class="fa-solid fa-bag-shopping"></i></button>
                                            </form>
                                            <!-- <a href="#" id="myLink"><i class="fa-solid fa-bag-shopping"></i></a> -->
                                        </div>
                                        <div class="icon">
                                            <div class="tooltip-content">Wishlist</div>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" name="add_to_cart" value="<?php echo $product["id"]?>">
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
                                            <a href="#"><?php echo $product["name"] ?></a>
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
                                            <span class="cost">$<?php $product["price"] ?>.00</span>
                                            <!-- <span class="discount">$400.00</span> -->
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
            <div class="number-page">
                <ul class="pagination">
                    <?php 
                    echo $paginationBar; ?>
                </ul>
            </div>

            </div>
        </div>
    </div>
</div>
