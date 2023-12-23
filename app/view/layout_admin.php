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
    <link rel="stylesheet" href="../../public/fontawesome/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/login.css">
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
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link icon-header" href="#">
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
                            <li class="nav-item px-3">
                                <span style="line-height: 20px;">Hello, <?php echo $_SESSION['account']['lastname'] ?></span>
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
    <!-- Begin content -->
    <?php
    if (!empty($slot)) :
    ?>
        <?php echo $slot; ?>

    <?php endif ?>

    <!-- End content -->

    <script src="../../public/bootstrap-5/js/bootstrap.bundle.min.js"></script>
</body>

</html>