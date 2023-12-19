<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Product detail</h2>
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
                  <img class="big_img" src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" width="500px">  
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <div class="product__label fs-3 mb-3"><?php echo $product['name'] ?></div>
                    <h5 class="text-dark mb-3">Price: $<?php echo $product['price']?>.00</h5>
                    <p class="product-desc mb-4">
                      <?php echo $product['description'] ?>
                    </p>
                    <ul>
                        <li>Category: Headphone</li>
                    </ul>
                    <div class="product_option">
                      <div class="d-grid gap-2">
                        <a href="#" class="btn btn-dark mb-3">Add to cart</a>
                        <a href="#" class="btn btn-outline-dark btn-buy">Buy now</a>
                      </div>
                        <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>