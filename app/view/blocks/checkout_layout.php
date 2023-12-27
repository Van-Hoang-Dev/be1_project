<!-- View Cart -->
<div class="checkout-layout mt-5">
    <div class="woocommerce">
        <div class="woocommerce-page-header mb-4">
            <ul>
                <li class="shopping-cart-link"> <a href="viewcart.php">Cart</a></li>
                <li class="checkout-link"><a href="checkout.php">Checkout</a></li>
                <li class="order-tracking-link active"><a href="odertracking.php">Order Tracking</a></li>
            </ul>
        </div>
        <div class="checkout-top">
            <div class="content-left-checkout">
                <div class="woocommerce-info">
                    Returning customer? <a class="showlogin" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Click here to login</a></div>
            </div>
            <div class="content-right-checkout">
                <div class="woocommerce-info">
                    Have a coupon? <a class="showcoupon" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Click here to enter your code</a> </div>
                <div class="collapse mt-3" id="collapseExample">
                    <div class="card card-body">
                        <p style="text-align: center;">If you have a coupon code, please apply it below.</p>
                        <form action="#" class=" d-flex flex-row justify-content-center">
                            <div class="formbold-mb-3" style="margin: 0;">
                                <input type="text" name="voucher" id="voucher" class="formbold-form-input" />
                            </div>
                            <button type="submit" class="formbold-btn" style="margin: 0; margin-left: 20px;">Apply voucher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="order.php" method="post" class="checkout woocommerce-checkout pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 col-md-12 col-12">
                        <div class="row" id="customer_details">
                            <div class="col-12">
                                <div class="woocommerce-billing-fields">
                                    <h3>Billing details</h3>
                                    <div>
                                        <?php
                                        if (!empty($user)) :
                                        ?>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_first_name_field" data-priority="10">
                                                <label for="billing_first_name" class="">First name&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" autocomplete="given-name" required value="<?php echo $user["firstname"] ?>">
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                                                <label for="billing_last_name" class="">Last name&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" autocomplete="given-name" required value="<?php echo $user["lastname"] ?>">
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_street_address_field" data-priority="50">
                                                <label for="billing_street_address" class="">Street address&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_street_address" placeholder="House number and street name" id="billing_street_address" value="<?php echo $user["address"] ?>" required>
                                                </span>
                                            </p>
                                            <p class="form-row address-field form-row-wide" id="billing_address_2_field" data-priority="60"><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc." value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc."></span></p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_postcode_zip_field" data-priority="70" required>
                                                <label for="billing_postcode_zip" class="">Postcode zip&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_postcode_zip" id="billing_postcode_zip" value="<?php echo $user["postcode_zip"] ?>" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_phone_field" data-priority="10">
                                                <label for="billing_phone" class="">Phone&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_phone" id="billing_phone" value="<?php echo $user["phone"] ?>" autocomplete="given-name" readonly>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_email_address_field" data-priority="10">
                                                <label for="billing_email_address" class="">Email address&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_email_address" id="billing_email_address" value="<?php echo $user["email"] ?>" autocomplete="given-name" readonly>
                                                </span>
                                            </p>
                                        <?php else : ?>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_first_name_field" data-priority="10">
                                                <label for="billing_first_name" class="">First name&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                                                <label for="billing_last_name" class="">Last name&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_street_address_field" data-priority="50">
                                                <label for="billing_street_address" class="">Street address&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_street_address" placeholder="House number and street name" id="billing_street_address" value="" required>
                                                </span>
                                            </p>
                                            <p class="form-row address-field form-row-wide" id="billing_address_2_field" data-priority="60"><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc." value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc."></span></p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_postcode_zip_field" data-priority="70" required>
                                                <label for="billing_postcode_zip" class="">Postcode zip&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_postcode_zip" id="billing_postcode_zip" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_town_city_field" data-priority="10">
                                                <label for="billing_town_city" class="">Town / City&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_town_city" id="billing_town_city" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_phone_field" data-priority="10">
                                                <label for="billing_phone" class="">Phone&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_phone" id="billing_phone" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-first validate-required woocommerce-validated" id="billing_email_address_field" data-priority="10">
                                                <label for="billing_email_address" class="">Email address&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label><span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text " name="billing_email_address" id="billing_email_address" value="" autocomplete="given-name" required>
                                                </span>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-12 col-12">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <div class="checkout-review-order-table-wrapper">
                                <div class="shop_table woocommerce-checkout-review-order-table">
                                    <div class="title-product-name">Product</div>
                                    <?php
                                    $subTotal = 0;
                                    foreach ($cart as $item) :
                                        $subTotal = $subTotal + (intval($item["price"]) * intval($item["quantity"]));
                                    ?>
                                        <div class="cart_item">
                                            <div class="info-product">
                                                <div class="product-thumble">
                                                    <img width="600" height="600" src="<?php echo $item["image"] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                                                </div>
                                                <div class="product-name">
                                                    <?php echo $item["name"] ?>&nbsp; <strong class="product-quantity">QTY : <?php echo $item["quantity"] ?></strong> </div>
                                            </div>
                                            <div class="product-total">
                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo intval($item["price"]) * intval($item["quantity"]) ?></bdi></span>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                    <div class="cart-subtotal">
                                        <h2 class="text">Subtotal</h2>
                                        <div class="subtotal-price">
                                            <p class="text-price">$<?php echo $subTotal ?></p>
                                        </div>
                                    </div>
                                    <div class="order-total">
                                        <h2 class="text">Total</h2>
                                        <div class="total-price">
                                            <p class="text">$<?php echo $subTotal ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header fs-5 fw-bold">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Direct bank transfer
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">Make your payment directly into our bank
                                                    account. Please use your Order ID as the payment reference. Your
                                                    order will not be shipped until the funds have cleared in our
                                                    account.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header fs-5 fw-bold">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Check payments
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">Please send a check to Store Name, Store
                                                    Street, Store Town, Store State / County, Store Postcode.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header fs-5 fw-bold">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Cash on delivery
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">Pay with cash upon delivery.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                    PayPal <img src="../image/AM_mc_vs_ms_ae_UK.png" alt="" height="16px">What is PayPal?
                                                </button>
                                            </h2>
                                            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">Pay via PayPal; you can pay with your credit
                                                    card if you don’t have a PayPal account.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row place-order">
                                    <noscript>
                                        Since your browser does not support JavaScript, or it is disabled, please
                                        ensure you click the <em>Update Totals</em> button before placing your
                                        order. You may be charged more than the amount stated above if you fail to
                                        do so. <br /><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update
                                            totals</button>
                                    </noscript>
                                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place
                                        order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="form-row notes" id="order_comments_field" data-priority=""><label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea></span></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>