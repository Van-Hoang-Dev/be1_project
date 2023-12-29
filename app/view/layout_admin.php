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

    <!-- Link icon for title -->
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/383/383765.png" type="image/x-icon">
    <!-- Link boostrap -->
    <link rel="stylesheet" href="../../public/bootstrap-5/css/bootstrap.min.css">
    <!-- Link fontawsome -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../public/fontawesome/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="../../public/css/range.css">
</head>

<body>
    <!-- Begin Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="./../../index"><img class="img-fluid nav-logo" src="../../public/images/logo/Logo.png" alt="Logi"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-md-3">
                            <a class="nav-link active-color" aria-current="#" href="../../index">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../categories/manage_category">Manage Categories</a></li>
                                <li><a class="dropdown-item" href="../products/manage_product">Manage Products</a></li>
                                <li><a class="dropdown-item"  href="../discounts/manage_discount">Manage Vouchers</a></li>
                                <li><a class="dropdown-item"  href="../inventory/manage_inventory">Manage Inventory</a></li>
                                <li><a class="dropdown-item"  href="../order/manage_order">Manage Order</a></li>
                                <li><a class="dropdown-item"  href="../user/manage_user">Manage User</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link active-color" aria-current="#" href="../email/email.php">Send email</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#searchModalByKey">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
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
                                <a class="nav-link icon-header" href="../../logout">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->
     <!-- Reset Infomation -->
     <?php if (isset($_SESSION['account'])) : ?>
    <div class="modal fade" id="updateInfoModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="titleModal">Reset Infomation </h1>
                    <img class="logo" src="../../public/images/logo/Logo.png" alt="logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../../reset_info.php">
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
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['account']['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['account']['address'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['account']['phone'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="postcode_zip" name="postcode_zip" value="<?php echo $_SESSION['account']['postcode_zip'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New password</label>
                            <input type="password" class="form-control" id="password"  name="password">
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
                    <img class="logo" src="../../public/images/logo/Logo.png" alt="logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../../search">
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
                    <img class="logo" src="../../public/images/logo/Logo.png" alt="logo">
                    <div class="spinner-border text-success ms-auto" role="status">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../../search">
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
    <!-- Begin content -->

    <?php
    if (!empty($slot)) :
    ?>
        <?php echo $slot; ?>

    <?php endif ?>

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
                    }else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    progress.style.left = (minVal/ rangeInput[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal/ rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>
    <!-- End content -->
    <script src="../../public/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
	.create( document.querySelector( '#editor' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );
    </script>
</body>

</html>