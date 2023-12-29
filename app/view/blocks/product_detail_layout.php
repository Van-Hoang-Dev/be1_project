<?php
$recentView = "";
if (isset($_COOKIE['recentView'])) {
    $recentView = json_decode($_COOKIE['recentView']);
}

?>
<!-- Shop Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <nav class="my-5" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?p=1">Home</a></li>
                <li class="breadcrumb-item"><a href="shop.php?p=2">Shop</a></li>
                <li class="breadcrumb-item">Detail</li>
                <li class="breadcrumb-item active-color" aria-current="page"><?php echo $product["name"] ?></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-6">
                <div class="big_img border rounded" style="text-align: center;">
                    <img id="mainPhoto" src="public/images/content/products/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" width="450px">
                </div>

                <div class="other-images">
                    <div class="p-2 border rounded">
                        <?php 
                        foreach($images as $image):
                        ?>
                        <img class="border rounded itemPhoto m-2" src="public/images/content/products/<?php echo $image["image"] ?>" alt="<?php echo $product['name'] ?>" width="70px">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ms-auto col-lg-8">
                    <div class="product__details__text">
                        <div class="product__label fs-3 mb-3"><?php echo $product['name'] ?></div>
                        <h5 class="text-dark mb-3">Price: $<?php echo $product['price'] ?></h5>
                        <p class="product-desc mb-4">
                            <?php echo $product['description'] ?>
                        </p>
                        <ul>
                            <li>Category: <?php echo $category['name'] ?></li>
                        </ul>
                        <div class="product_option">
                            <form action="cart" method="post">
                                <input type="hidden" name="add_to_cart" value="<?php echo $product["id"] ?>">
                                <input type="hidden" name="index" value="2">
                                <button type="submit" class="btn btn-dark mb-3 btn-buy text-light" style="width: 100%;">Add to cart</button>
                            </form>
                            <form action="checkout.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product["id"] ?>">
                                <button class="btn btn-outline-dark btn-buy text-dark" style="width: 100%;">Buy now</button>
                            </form>
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
                        <?php if (empty($reviews)) : ?>
                            <button class="btn-write-comment" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Write a comment</button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 700px;">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo $product['name'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form action="detail.php" method="post">
                                        <div class="d-flex">
                                            <p>Your rating: </p>
                                            <div class="star-rating ms-3" id="star-rating">
                                                <i class="fa-regular fa-star" data-star="1"></i>
                                                <i class="fa-regular fa-star" data-star="2"></i>
                                                <i class="fa-regular fa-star" data-star="3"></i>
                                                <i class="fa-regular fa-star" data-star="4"></i>
                                                <i class="fa-regular fa-star" data-star="5"></i>
                                            </div>
                                            <input type="hidden" id="rating-input" name="rating" readonly>
                                            <input type="hidden" id="rating-input" name="id" readonly value="<?php echo $product['id'] ?>">
                                        </div>

                                        <div class="box-text">
                                            <div class="form-group">
                                                <textarea id="editor" name="comment" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="send_review" value="Send Comment" class="btn btn-success mt-3">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- REview -->
        <?php if (isset($reviews) && count($reviews) > 0) : ?>
            <div class="row mb-5">
                <div class="col">
                    <div class="container">
                        <section class="comment-box-layout">
                            <h2><?php echo count($reviews) ?> review for <span><?php echo $product['name'] ?></span></h2>
                            <div class="content-comment mt-5">
                                <?php foreach ($reviews as $item) : ?>
                                    <div class="user-info">
                                        <img class="img-fluid" src="public/images/avatar/avatar-1.png" alt="">
                                        <div class="box-user">
                                            <div class="star-rating">
                                                <?php for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $item['rating']) {
                                                        echo '<i class="fa-solid fa-star"></i>';
                                                    } else {
                                                        echo '<i class="fa-regular fa-star"></i>';
                                                    }
                                                } ?>
                                            </div>
                                            <p class="username"><?php echo $item['firstname'] . ' ' . $item['lastname'] ?></p>
                                            <p><?php echo  $item['review_date'] ?></p>
                                        </div>
                                    </div>
                                    <div class="commnet-content-box">
                                        <?php echo $item['comment'] ?>
                                    </div>
                                    <hr>
                                <?php endforeach ?>
                            </div>

                            <button class="btn-write-comment" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Write a comment</button>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 700px;">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo $product['name'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form action="detail.php" method="post">
                                        <div class="d-flex">
                                            <p>Your rating: </p>
                                            <div class="star-rating ms-3" id="star-rating">
                                                <i class="fa-regular fa-star" data-star="1"></i>
                                                <i class="fa-regular fa-star" data-star="2"></i>
                                                <i class="fa-regular fa-star" data-star="3"></i>
                                                <i class="fa-regular fa-star" data-star="4"></i>
                                                <i class="fa-regular fa-star" data-star="5"></i>
                                            </div>
                                            <input type="hidden" id="rating-input" name="rating" readonly>
                                            <input type="hidden" id="rating-input" name="id" readonly value="<?php echo $product['id'] ?>">
                                        </div>

                                        <div class="box-text">
                                            <div class="form-group">
                                                <textarea id="editor" name="comment" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="send_review" value="Send Comment" class="btn btn-success mt-3">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- Related Product -->
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
                                            <!-- <div class="onsale">-13%</div> -->
                                        </div>
                                        <div class="product-image">
                                            <img class="img-fluid" src="public/images/content/products/<?php echo $item["image"] ?>" alt="Mac mini M2 2023">
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
                                            <span class="cost">$<?php echo $item["price"] ?></span>
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
<style>
    .action {
        border: 2px solid yellow;
    }
</style>
<script>
    let previous;
    let itemPhotos = document.querySelectorAll(".itemPhoto")
    let mainPhoto = document.querySelector("#mainPhoto");
    itemPhotos.forEach(itemPhoto => {
        itemPhoto.addEventListener('click', function() {
            if (previous) {
                previous.classList.remove('border-warning-subtle');
            }
            console.log(itemPhoto.getAttribute('src'));
            mainPhoto.setAttribute('src', itemPhoto.getAttribute('src'));
            itemPhoto.classList.add('border-warning-subtle');
            previous = itemPhoto;
        });
    });
</script>
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