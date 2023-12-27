<div class="container">
        <div class="checkout-layout mt-5">
            <div class="woocommerce">
                <div class="woocommerce-page-header mb-4">
                    <ul>
                    <li class="shopping-cart-link"> <a href="user_info.php">Your info</a></li>
                        <li class="checkout-link"><a href="order_history.php">Order history</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <section class="gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header px-4 py-5">
                                <h5 class="text-muted mb-0">Your Order, <span style="color: #ffb300;">
                                    </span>!</h5>
                            </div>
                            <!-- Show the info order here -->
                            <div class="card shadow-0 border mb-4">
                            <?php 
                            foreach($orders as $order) :
                            ?>
                                <div class="card-body px-4">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="public/images/content/products/<?php echo $order["image"]?>" class="img-fluid" alt="Phone">
                                        </div>
                                        <div
                                            class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"><?php echo $order["name"]?></p>
                                        </div>
                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Description:</p>
                                            <!-- <p class="text-muted mb-0 small"><?php echo $orderDetail["description"] ?></p> -->
                                        </div>
                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Qty: <?php echo $order["quantity"] ?></p>
                                        </div>
                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small"><?php echo $order["subtotal"] ?></p>
                                        </div>
                                    </div>
                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                </div>
                            <?php 
                                endforeach;
                            ?>
                            </div>


                            <div class="d-flex justify-content-between pt-2 px-4">
                                <p class="fw-bold mb-2">Order Details</p>
                                <p class="text-muted mb-2"><span class="fw-bold me-4">Total: </span> 100</p>
                            </div>
                            <hr>
                            <div class="card-footer border-0 px-4 py-5"
                                style="background-color: #ffb300; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                <h5
                                    class="d-flex align-items-center justify-content-end text-black text-uppercase mb-0">
                                    Total
                                    paid: <span class="h4 mb-0 ms-2"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>