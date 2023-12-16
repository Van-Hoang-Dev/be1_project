<?php var_dump($_SESSION["cart"]); ?>
<div class="cart my-5">
    <div class="container">
        <div class="woocommerce-page-header">
            <ul>
                <li class="shopping-cart-link"> <a href="./cart.html">Cart</a></li>
                <li class="checkout-link"><a href="./checkout.html">Checkout</a></li>
                <li class="order-tracking-link active"><a href="./odertracking.html">Order Tracking</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                <table>
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Subtotal</th>
                            <th class="product-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php    
                        foreach($cart as $item):
                        ?>
                        <tr class="woocommerce-cart-form__cart-item cart_item">
                            <td class="product-thumbnail">
                                <a href=""><img width="80" height="80" src="<?php echo $item["image"] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>
                                <div class="product-name d-flex justify-content-center fw-bold align-middle">
                                    <a href="#" class="text-black"><?php echo $item["name"] ?></a>
                                </div>
                            </td>

                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $item["price"] ?></bdi></span>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span><?php echo $item["quantity"] ?></bdi></span>
                            </td>
                            </td>
                            <td class="product-subtotal" data-title="Subtotal">
                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $item["price"] ?></bdi></span>
                            </td>
                            <td class="product-remove">
                                <a href="#" class="remove fs-3" aria-label="Remove this item" data-product_id="1" data-product_sku="D1117">×</a>
                            </td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                        <tr>
                            <td colspan="6" class="actions">
                                <div class="bottom-cart">
                                    <div class="coupon">
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                    </div>
                                    <h2><a href="#">Continue Shopping</a></h2>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <div cellspacing="0" class="shop_table shop_table_responsive">
                            <div class="cart-subtotal">
                                <div class="title">Subtotal</div>
                                <div data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>450.00</bdi></span>
                                </div>
                            </div>
                            <div class="order-total">
                                <div class="title">Total</div>
                                <div data-title="Total"><strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>
                                                450.00</bdi></span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="wc-proceed-to-checkout">
                            <a href="#" class="checkout-button button alt wc-forward">
                                Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>