<header>
  <div class="container">
    <div class="slide-bar">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 my-md-auto">
          <h1 class="slide-bar-header">Feel the Sound Apple Home Mini</h1>
          <p class="slide-bar-sub">More powerfull than ever.</p>
          <a href="./shop.php" class="btn-shop-now">Shop now</a>
        </div>
        <div class="col-md-4">
          <div class="slide-bar-box">
            <img src="public/images/header/header.png" alt="slide-header" class="img-fluid slide-bar-image">
            <div class="circle-1"><img src="public/images/header/img-2.png" alt="image"></div>
            <div class="circle-2"><img src="public/images/header/img-1.png" alt="image"></div>
            <div class="circle-3"><img src="public/images/header/img-3.png" alt="image"></div>
            <div class="circle-4"><span>50%<br>Off</span></div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>

    </div>
  </div>
  <div class="container">
    <div class="header-mobile-fix">
      <div class="header-item">
        <div class="shop-page">
          <a href="#">
            <i class="fa-solid fa-layer-group"></i>
            <span>Shop</span>
          </a>
        </div>
        <div class="my-account">
          <a href="#">
            <i class="fa-regular fa-user"></i>
            <span>Account</span>
          </a>
        </div>
        <div class="search-box">
          <a href="#">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Search</span>
          </a>
        </div>
        <div class="wishlist-box">
          <a href="#">
            <i class="fa-regular fa-heart"></i>
            <span>Wishlist</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="content">
  <div class="container">
    <div class="banner">
      <div class="row">
        <div class="col-md-4 p-0">
          <div class="banners">
            <div class="banner-image">
              <a href="#">
                <img class="img-fluid" src="public/images/content/banner/banner1.png" alt="banner">
              </a>
            </div>
            <div class="banner-info">
              <span class="banner-image-sub"> Save Up To 50%</span>
              <h3 class="banner-title">Earpods</h3>
              <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0">
          <div class="banners">
            <div class="banner-image">
              <a href="#">
                <img src="public/images/content/banner/banner2.png" alt="banner" class="img-fluid">
              </a>
            </div>
            <div class="banner-info">
              <span class="banner-image-sub"> Save Up To 50%</span>
              <h3 class="banner-title">Earpods</h3>
              <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0">
          <div class="banners">
            <div class="banner-image">
              <a href="#">
                <img src="public/images/content/banner/banner.png" alt="banner" class="img-fluid">
              </a>
            </div>
            <div class="banner-info">
              <span class="banner-image-sub black"> Save Up To 50%</span>
              <h3 class="banner-title black">Earpods</h3>
              <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="filter-heading">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="filter-order-by">
              <ul class="filter-orderby">
                <li class="active"><span>All Products</span></li>
                <li><span>New Arrivals</span></li>
                <li><span>Popular Products</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="product-items">
        <div class="row">
          <?php
          foreach ($products as $product) :
          ?>
            <div class="col-lg-3 col-md-3 col-sm-6">
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
                    <form action="detail" method="post">
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
  <div class="banner-advertise">
    <div class="container">
      <div class="advertise-content">
        <h2 class="advertise-title">Apple Watch <br> Series 8</h2>
        <div class="advertise-decs">Limited Weekly Deals <span class="price">$390.00</span></div>
        <a href="#" class="btn-shop-now">Shop now</a>
      </div>

    </div>
  </div>
  <div class="container">
    <div class="top-selling-product">
      <h2 class="title">
        Top Selling Products
      </h2>
      <div class="owl-5 owl-carousel owl-theme">
        <?php
        foreach($topSells as $product):
        ?>
        <div class="product-items">
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
                <form action="detail" method="post">
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
        <?php endforeach; ?>

      </div>
    </div>
  </div>


  <div class="type-items">
    <div class="row">
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item1.jpg" alt="">
          <div class="item-title">
            <h3>Watches</h3>
          </div>
          <div class="item-content">
            <span>ChromeOS</span>
            <span>Linux</span>
            <span>macOS</span>
            <span>Smarthome</span>
            <span>Windows</span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item2.jpg" alt="item2">
          <div class="item-title">
            <h3>Computers</h3>
          </div>
          <div class="item-content">
            <span>Keybord</span>
            <span>Linux</span>
            <span>Mouse</span>
            <span>Storage</span>
            <span>Windows</span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item3.jpg" alt="item3">
          <div class="item-title">
            <h3>SmartPhones</h3>
          </div>
          <div class="item-content">
            <span>CellPhones</span>
            <span>Google pixel</span>
            <span>Iphone</span>
            <span>Phone Cases</span>
            <span>Sumsung</span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item4.jpg" alt="Game & Video">
          <div class="item-title">
            <h3>Game & Video</h3>
          </div>
          <div class="item-content">
            <span>Linux</span>
            <span>Mouse</span>
            <span>Phone Casese</span>
            <span>Smart Home</span>
            <span>Storage</span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item5.jpg" alt="TV/Audio">
          <div class="item-title">
            <h3>TV/Audio</h3>
          </div>
          <div class="item-content">
            <span>ChromeOS</span>
            <span>Linux</span>
            <span>macOS</span>
            <span>Smarthome</span>
            <span>Windows</span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="item">
          <img class="img-fluid" src="public/images/content/type-items/item6.jpg" alt="Home Smart">
          <div class="item-title">
            <h3>Watches</h3>
          </div>
          <div class="item-content">
            <span>Keyboard</span>
            <span>macOS</span>
            <span>Phone Cases</span>
            <span>Storage</span>
            <span>Windows</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="banner">
    <div class="row">
      <div class="col-md-4 p-0">
        <div class="banners">
          <div class="banner-image">
            <a href="#">
              <img class="img-fluid" src="public/images/content/banner/banner-15.jpg" alt="Camera">
            </a>
          </div>
          <div class="banner-info">
            <span class="banner-image-sub">Flat Deal To 70%</span>
            <h3 class="banner-title">Camera</h3>
            <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 p-0">
        <div class="banners">
          <div class="banner-image">
            <a href="#">
              <img src="public/images/content/banner/banner-16.jpg" alt="banner" class="img-fluid">
            </a>
          </div>
          <div class="banner-info">
            <span class="banner-image-sub">Hot Sale 2023</span>
            <h3 class="banner-title">Smart Phone</h3>
            <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 p-0">
        <div class="banners">
          <div class="banner-image">
            <a href="#">
              <img src="public/images/content/banner/banner-17.jpg" alt="banner" class="img-fluid">
            </a>
          </div>
          <div class="banner-info">
            <span class="banner-image-sub black">Shop Brands Xbox</span>
            <h3 class="banner-title black">Gamepad</h3>
            <a href="#" class="btn-icon"><i class="fa-solid fa-circle-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-logo">
    <div class="owl-4 owl-carousel owl-theme">
      <div class="img-logo">
        <a href="">
          <img src="public/images/logo/feedly-logo.png" alt="feedly-logo">
        </a>
      </div>
      <div class="img-logo">
        <a href="">
          <img src="public/images/logo/hopin-logo.png" alt="hopin-logo">
        </a>
      </div>
      <div class="img-logo">
        <a href="">
          <img src="public/images/logo/lattice-logo.png" alt="lattice-logo">
        </a>
      </div>
      <div class="img-logo">
        <a href="">
          <img src="public/images/logo/spotifi-logo.png" alt="spotifi-logo">
        </a>
      </div>
      <div class="img-logo">
        <a href="">
          <img src="public/images/logo/upwork-logo.png" alt="upwork-logo">
        </a>
      </div>
    </div>

  </div>
  <div class="comment-boxs">
    <div class="owl-3 owl-carousel owl-theme">
      <div class="comment-box">
        <div class="icon-quotes">
          <i class="fa-solid fa-quote-right"></i>
        </div>
        <p>Their customer service is also outstanding, providing quick and helpful support whenever I’ve had questions or issues.</p>
        <div class="testimonial-image">
          <div class="customer-image">
            <img class="img-fluid" src="public/images/content/comment/customer1.jpg" alt="">
          </div>
          <div class="testimonial-info">
            <div class="customer-name">Edison</div>
            <div class="cuscomer-job">Design</div>
          </div>
        </div>
      </div>
      <div class="comment-box">
        <div class="icon-quotes">
          <i class="fa-solid fa-quote-right"></i>
        </div>
        <p>The software and user interfaces are intuitive and user-friendly, making it easy for me to stay connected and productive.</p>
        <div class="testimonial-image">
          <div class="customer-image">
            <img class="img-fluid" src="public/images/content/comment/customer2.jpg" alt="custumer 2">
          </div>
          <div class="testimonial-info">
            <div class="customer-name">Ann Smith</div>
            <div class="cuscomer-job">CEO & Founder</div>
          </div>
        </div>
      </div>
      <div class="comment-box">
        <div class="icon-quotes">
          <i class="fa-solid fa-quote-right"></i>
        </div>
        <p>Tablets to laptops and gaming systems, their products have consistently delivered top-notch performance and reliability.</p>
        <div class="testimonial-image">
          <div class="customer-image">
            <img class="img-fluid" src="public/images/content/comment/customer3.jpg" alt="custumer 3">
          </div>
          <div class="testimonial-info">
            <div class="customer-name">Annan</div>
            <div class="cuscomer-job">Photographer</div>
          </div>
        </div>
      </div>
      <div class="comment-box">
        <div class="icon-quotes">
          <i class="fa-solid fa-quote-right"></i>
        </div>
        <p>The software and user interfaces are intuitive and user-friendly, making it easy for me to stay connected and productive.</p>
        <div class="testimonial-image">
          <div class="customer-image">
            <img class="img-fluid" src="public/images/content/comment/customer4.jpg" alt="custumer 4">
          </div>
          <div class="testimonial-info">
            <div class="customer-name">Linda</div>
            <div class="cuscomer-job">Design</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>