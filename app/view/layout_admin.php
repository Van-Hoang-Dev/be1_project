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
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="../categories/manage_category">Manage Categories</a>
                        </li>
                        <li class="nav-item px-md-3">
                            <a class="nav-link" href="../products/manage_product">Manage Products</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                        <?php if (!isset($_SESSION['account'])) :?>
                        <li class="nav-item px-3">
                            <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </li>
                        <?php else : ?>
                            <li class="nav-item px-3">
                                <a class="nav-link icon-header" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Hello, <?php echo $_SESSION['account']['lastname'] ?>
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
    <!-- Search -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Begin content -->
    <?php 
    if(!empty($slot)) :
    ?>
    <?php echo $slot;?>

    <?php  endif ?>

    <!-- End content -->

    <script src="../../public/bootstrap-5/js/bootstrap.bundle.min.js"></script>
</body>

</html>