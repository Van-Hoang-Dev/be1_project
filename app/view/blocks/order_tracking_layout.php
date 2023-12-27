<div class="container my-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="order-tracking">
                <div class="woocommerce">
                    <div class="woocommerce-page-header mb-5">
                        <ul>
                            <li class="shopping-cart-link"> <a href="viewcart.php">Cart</a></li>
                            <li class="checkout-link"><a href="checkout.php">Checkout</a></li>
                            <li class="order-tracking-link active"><a href="odertracking.php">Order Tracking</a></li>
                        </ul>
                    </div>
                        <p style="padding: 0px 0px 60px;" class="text-black">To track your order please enter your Order ID in the box below and press the "Track" button.
                            This was given to you on your receipt and in the confirmation email you should have
                            received.
                        </p>
                        <form action="detail_order.php" method="post">
                        <div class="mb-5">
                                <label for="billing_method" class="form-label"><b class="text-black">Billing Phone Or Email</b></label>
                                <input type="text" class="form-control" id="billing_method" name="billing_method" placeholder="Phone number you used during checkout" height="30px">
                            </div>
                            <div class="mt-5 mb-5">
                                <label for="order-id" class="form-label"><b class="text-black">Order Code</b></label>
                                <input type="text" class="form-control" id="order_code" name="order_code" placeholder="Found in your order confirmation email." height="30px">
                            </div>
                            <div class="d-grid">
                                <button class="form-control btn btn-primary button" type="submit" height="30px"><b>Track</b></button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>