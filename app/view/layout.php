<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (!empty($title)) {
            echo $title;
        } ?>
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Link icon for title -->
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/383/383765.png" type="image/x-icon">
    <!-- Link boostrap -->
    <link rel="stylesheet" href="public/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Link fontawsome -->
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
    <!-- Link owlCarousel -->
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/shop.css">
    <link rel="stylesheet" href="public/css/cartstyle.css">
    <link rel="stylesheet" href="public/css/detail.css">
    <link rel="stylesheet" href="public/css/range.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/checkoutstyle.css">
    <link rel="stylesheet" href="public/css/odertrackingstyle.css">
    <link rel="stylesheet" href="public/css/comment.css">
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
                            <a class="nav-link active-color" aria-current="index.php" href="index.php">Home</a>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <?php if (isset($_SESSION['account']) && $_SESSION['account']['role'] == 1) : ?>
                            <li class="nav-item px-md-3">
                                <a class="nav-link" href="./admin/products/manage_product">Manage</a>
                            </li>
                        <?php endif ?>
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
                            <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#searchModalByKey">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="cart-box">
                                <a class="nav-link icon-header" href="viewcart.php">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                                <span class="cart-count">0</span>
                            </div>
                        </li>
                        <?php if (!isset($_SESSION['account'])) : ?>
                            <li class="nav-item px-3">
                                <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item px-3 d-flex">
                                <a class="nav-link icon-header">
                                    Hello, <?php echo $_SESSION['account']['lastname'] ?>
                                </a>
                                <a class="nav-link icon-header" data-bs-toggle="modal" data-bs-target="#updateInfoModal">
                                    <i class="bi bi-feather"></i>
                                </a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link icon-header" href="logout.php">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Modal -->
    <!-- Reset Infomation -->
    <?php if (isset($_SESSION['account'])) : ?>
        <div class="modal fade" id="updateInfoModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="titleModal">Reset Infomation </h1>
                        <img class="logo" src="public/images/logo/Logo.png" alt="logo">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="reset_info.php">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['account']['firstname'] ?>" aria-label="First name" name="firstname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['account']['lastname'] ?>" aria-label="Last name" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['account']['username'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['account']['email'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['account']['address'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['account']['phone'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-grid col-6 mx-auto my-3">
                                <input type="submit" class="btn btn-success text-light fw-bolder" value="Update Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif ?>
    <!-- Search -->
    <div class="modal fade" id="searchModalByKey" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="titleModal">Search </h1>
                    <img class="logo" src="./public/images/logo/Logo.png" alt="logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="./search">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="key" class="form-label"><i class="bi bi-search fs-3 fw-bolder"></i></label>
                            <input type="text" class="form-control" id="key" name="key" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <button type="submit" class="btn btn-success text-light fw-bolder"><i class="fa-solid fa-magnifying-glass-arrow-right"></i></button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <a class="btn btn-success text-light fw-bolder" href="#" data-bs-toggle="modal" data-bs-target="#searchModalByPrice">
                                Search price
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="searchModalByPrice" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="titleModal">Search </h1>
                    <img class="logo" src="./public/images/logo/Logo.png" alt="logo">
                    <div class="spinner-border text-success ms-auto" role="status">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="./search">
                    <div class="modal-body just-align-center">
                        <div class="wrapper">
                            <header>
                                <h2>Price Range</h2>
                            </header>
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" name="priceS" value="50" readonly>
                                </div>
                                <div class="separator">
                                    -
                                </div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" name="priceE" value="450" readonly>
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="500" value="50" step="10">
                                <input type="range" class="range-max" min="0" max="500" value="450" step="10">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <button type="submit" class="btn btn-success text-light fw-bolder"><i class="fa-solid fa-magnifying-glass-arrow-right"></i></button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <a class="btn btn-success text-light fw-bolder" href="#" data-bs-toggle="modal" data-bs-target="#searchModalByKey">
                                Search key
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Log in -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="titleModal">Welcome to </h1>
                    <img class="logo" src="public/images/logo/Logo.png" alt="logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="login.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Enter your phone number</label>
                            <input type="text" class="form-control" id="phone" name="phone" autofocus value="<?php if (isset($_COOKIE["member_phone"])) {
                                                                                                                    echo $_COOKIE["member_phone"];
                                                                                                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Enter your password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_COOKIE["random_password"])) {
                                                                                                                    echo $_COOKIE["random_password"];
                                                                                                                } ?>">
                        </div>
                    </div>
                    <!-- Remember Info -->
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="remember-account" <?php if (isset($_COOKIE["random_selector"])) { ?> checked <?php } ?>>
                            <label class="form-check-label" for="autoSizingCheck">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <input type="submit" name="login" class="btn btn-primary text-light fw-bolder" style="background-color: #1877F2;" value="Log in">
                        </div>
                        <div>
                            <p class="login-text">Do not have an account ?</p>
                            <a href="#" class="register_link" data-bs-toggle="modal" data-bs-target="#signinModal" data-bs-whatever="@mdo">Register now!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign in -->
    <div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
                    <img class="logo" src="public/images/logo/Logo.png" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="register.php" method="post">
                    <div class="modal-body">
                        <!-- Information User -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username*" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number*" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Adress*" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New password*" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Comfirm password*" required>
                        </div>

                        <!-- Choose Gender -->
                        <div class="mb-3">
                            Gender
                            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" value="1">
                            <label class="btn" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" value="2">
                            <label class="btn" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="other" autocomplete="off" value="3">
                            <label class="btn" for="other">Other</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid gap-2 col-6 mx-auto my-3">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signinModal" data-bs-whatever="@mdo" style="background-color: #42b72a;">Register</button>
                        </div>
                        <div class="login">
                            <p class="login-text">Already have an account?</p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Begin content -->
    <?php
    if (!empty($slot)) :
        echo $slot;
    endif ?>
    <!-- End content -->
    <!-- Begin Footer -->
    <footer>
        <div class="subscribe-box mt-5">
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
    <script>
        let priceGap = 50;
        const rangeInput = document.querySelectorAll('.range-input input');
        let priceInput = document.querySelectorAll('.price-input input');
        let progress = document.querySelector('.slider .progress');

        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value);
                let maxVal = parseInt(rangeInput[1].value);
                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>
    <script src="public/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="public/owlcarousel/jquery-3.7.1.min.js"></script>
    <script src="public/owlcarousel/owl.carousel.min.js"></script>
    <script src="public/js/app.js"></script>
    <script>
        $('.owl-5').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.owl-4').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                700: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.owl-3').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script src="public/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // Editor configuration.
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(handleSampleError);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const starContainer = document.getElementById('star-rating');
            const stars = starContainer.querySelectorAll('.fa-star');
            const ratingInput = document.getElementById('rating-input');

            starContainer.addEventListener('click', function(event) {
                const clickedStar = event.target;
                if (clickedStar.classList.contains('fa-star')) {
                    const clickedStarIndex = parseInt(clickedStar.getAttribute('data-star'));

                    // Reset all stars
                    stars.forEach(star => {
                        star.classList.remove('fa-solid');
                        star.classList.add('fa-regular');
                    });

                    // Highlight clicked stars
                    for (let i = 0; i < clickedStarIndex; i++) {
                        stars[i].classList.remove('fa-regular');
                        stars[i].classList.add('fa-solid');
                    }

                    // Update input value
                    ratingInput.value = clickedStarIndex;
                }
            });
        });
    </script>
</body>

</html>