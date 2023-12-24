<?php
$recentView = "";
if (isset($_COOKIE['recentView'])) {
    $recentView = json_decode($_COOKIE['recentView']);
}
// var_dump($_COOKIE);
// var_dump($products);
// var_dump($recentView);
?>
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>detail</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Shop Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="big_img">
                    <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" width="500px">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ms-auto col-lg-8">
                    <div class="product__details__text">
                        <div class="product__label fs-3 mb-3"><?php echo $product['name'] ?></div>
                        <h5 class="text-dark mb-3">Price: $<?php echo $product['price'] ?>.00</h5>
                        <p class="product-desc mb-4">
                            <?php echo $product['description'] ?>
                        </p>
                        <ul>
                            <li>Category: <?php echo $category['name'] ?></li>
                        </ul>
                        <div class="product_option">
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-dark mb-3">Add to cart</a>
                                <a href="#" class="btn btn-outline-dark btn-buy">Buy now</a>
                            </div>
                            <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                        </div>
                        <div class="mt-4 d-flex">
                            <div class="wishlist d-flex align-items-center">
                                <div class="icon-wishlist">
                                    <form action="#" method="post">
                                        <i class="fa-regular fa-star"></i>
                                    </form>
                                </div>
                                <span class="fs-6 text-icon">Add to Wishlist</span>
                            </div>
                            <div class="compare d-flex align-items-center">
                                <div class="icon-compare">
                                    <form action="#" method="post">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </form>
                                </div>
                                <span class="fs-6 text-icon">Compare</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="safe-checkout">
                                <div class="img-safe-checkout"> <img src="https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2023/05/payments-2.png" alt="Image Safe Checkout"></div>
                                <div class="title-safe-checkout">Guaranteed Safe Checkout</div>
                            </div>
                        </div>
                        <div class="social-icon">
                            <label>Share : </label>
                            <div class="social-share">
                                <a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                                <a href="#" title="Twitter" class="share-twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" title="LinkedIn" class="share-linkedin"><i class="bi bi-linkedin"></i></a>
                                <a href="#" title="Github" class="share-github"><i class="bi bi-github"></i></a>
                                <a href="#" title="Threads" class="share-threads"><i class="bi bi-threads"></i></a>
                                <a href="#" title="Instagram" class="share-instagram"><i class="bi bi-instagram"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_COOKIE['recentView'])) : ?>
            <div class="row">
                <div class="breadcrumb-option">
                    <div class="container">
                        <div class="row">
                            <div class="breadcrumb__text text-center">
                                <h2>Related Products</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related__products__slider owl-carousel">
                    <?php foreach ($recentView as $itemProductRC) :
                        foreach ($products as $item) :
                            if ($itemProductRC == $item['id']) : ?>
                                <div class="product-emtry">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <div class="onsale">-13%</div>
                                        </div>
                                        <div class="product-image">
                                            <img class="img-fluid" src="<?php echo $item["image"] ?>" alt="Mac mini M2 2023">
                                        </div>
                                    </div>
                                    <div class="product-button">
                                        <div class="icon">
                                            <div class="tooltip-content">Add to cart</div>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" name="add_to_cart" value="<?php echo $item["id"] ?>">
                                                <button type="submit"><i class="fa-solid fa-bag-shopping"></i></button>
                                            </form>
                                        </div>
                                        <div class="icon">
                                            <div class="tooltip-content">Wishlist</div>
                                            <form action="#" method="post">
                                                <input type="hidden" name="add_to_wishlist" value="<?php echo $item["id"] ?>">
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
                                        <h3 class="product-title fs-6">
                                            <a class="text-dark fw-bolder" href="./detail.php?id=<?php echo $item['id'] ?>"><?php echo $item["name"] ?></a>
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
                                            <span class="cost">$<?php echo $item["price"] ?>.00</span>
                                        </div>
                                    </div>
                                </div>
                    <?php endif;
                        endforeach;
                    endforeach ?>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".related__products__slider").owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>