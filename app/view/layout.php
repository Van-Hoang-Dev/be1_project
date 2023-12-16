<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            if (!empty($title)) :
            ?>
            <?php echo $title; ?>

        <?php endif ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link icon for title -->
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/383/383765.png" type="image/x-icon">
    <!-- Link boostrap -->
    <link rel="stylesheet" href="public/bootstrap-5/css/bootstrap.min.css">
    <!-- Link fontawsome -->
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
    <!-- Link owlCarousel -->
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/shop.css">
    <link rel="stylesheet" href="public/css/cartstyle.css">
</head>

<body>
    <!-- Begin Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img class="img-fluid nav-logo" src="public/images/logo/Logo.png" alt="Logi"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-md-3">
                            <a class="nav-link active-color" aria-current="index.php" href="#">Home</a>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item px-md-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-md-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Page
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link icon-header" href="#">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-header" href="#">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="wishlist-box">
                                <a class="nav-link icon-header" href="#">
                                    <i class="fa-regular fa-star"></i>
                                </a>
                                <span class="count-wishlist">0</span>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="cart-box">
                                <a class="nav-link icon-header" href="#">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                                <span class="cart-count">0</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->
    <!-- Begin content -->
    <?php 
    if(!empty($slot)) :
    ?>
    <?php echo $slot;?>

    <?php  endif ?>

    <!-- End content -->
    <!-- Begin Footer -->
    <footer>
        <div class="subscribe-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <h2 class="subscribe-title">Subscribe for Join Us!</h2>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <div class="subscribe-decs"> Subcribe to get information coupons.</div>
                    </div>
                    <div class="col-md-6">
                        <form action="#" method="get">
                            <div class="input-email">
                                <input type="email" name="email" placeholder="Your email adress...">
                                <button type="button">Subscribe</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="footer-info">
                <div class="row">
                    <div class="col-md-5">
                        <div class="info-item">
                            <h2>Get in touch</h2>
                            <div class="number-phone">
                                <div class="number-phone-decs">
                                    Call Us 24/7 Free
                                </div>
                                <a href="tel:+1800 6565 222">1800 6565 222</a>
                            </div>
                            <ul class="list-item">
                                <li><span>60, 29th Street, San Francisco, CA 94110, United States</span></li>
                                <li><a href="mailto:support@arostore.com">support@arostore.com</a></li>
                            </ul>
                            <ul class="socail-link">
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="info-item">
                            <h2>Infomation</h2>
                            <ul class="list-item list-item-hover">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Blog</a></li>
                                <li><a href="#">Start a Return</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Shipping FAQs</a></li>
                                <li><a href="#">All Product</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="info-item">
                            <h2>Userful Links</h2>
                            <ul class="list-item list-item-hover">
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Laptop $ Tablet</a></li>
                                <li><a href="#">Gadgets</a></li>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 title">
                        <div> © 2023 Aro store. All rights reserved.</div>
                    </div>
                    <div class="col-md-6">
                        <div class="pay-methods"><img class="img-fluid" src="/project/public/images/logo/footer.png" alt="pay method"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Stop Footer -->

</body>

</html>