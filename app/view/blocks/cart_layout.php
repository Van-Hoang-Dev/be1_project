<?php
    // Tính totalPrice
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['subtotal'];
    }
?>
<div class="cart my-5">
    <div class="container">
        <div class="woocommerce-page-header">
            <ul>
                <li class="shopping-cart-link"> <a href="./viewcart">Cart</a></li>
                <li class="checkout-link"><a href="checkout.php">Checkout</a></li>
                <li class="order-tracking-link active"><a href="odertracking.php">Order Tracking</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Product</th>
                            <th></th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Subtotal</th>
                            <th class="product-remove"></th>
                        </tr>
                    </thead>
                    <?php if (isset($cart)) : ?>
                    <tbody>
                        <?php    
                        foreach($cart as $item):
                        ?>
                        <tr class="woocommerce-cart-form__cart-item cart_item">
                            <td class="product-thumbnail">
                                <a href=""><img width="80" height="80" src="public/images/content/products/<?php echo $item["image"] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>
                            </td>
                            <td>
                            <a href="#" class="text-black"><?php echo $item["name"] ?></a>
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
                                <form action="delete-item-cart.php" method="post">
                                    <input type="hidden" name="idRemove" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="btn btn-dark text-white" aria-label="Remove this item">×</button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                        <tr>
                            <td colspan="6" class="actions">
                            <hr>
                                <div class="bottom-cart">
                                    <div class="coupon">
                                    <form action="#" class=" d-flex flex-row justify-content-center">
                            <div class="formbold-mb-3" style="margin: 0;">
                                <input type="text" name="voucher" id="voucher" class="formbold-form-input"/>
                            </div>
                            <button type="submit" class="formbold-btn" style="margin: 0; margin-left: 20px;">Apply voucher</button>
                        </form>
                                    </div>
                                    <h2><a href="./shop">Continue Shopping</a></h2>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php endif ?>
                </table>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <div cellspacing="0" class="shop_table shop_table_responsive">
                            <div class="cart-subtotal">
                                <div class="title">Subtotal</div>
                                <div data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $totalPrice ?>.00</bdi></span>
                                </div>
                            </div>
                            <div class="order-total">
                                <div class="title">Total</div>
                                <div data-title="Total"><strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>
                                                <?php echo $totalPrice ?>.00</bdi></span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="wc-proceed-to-checkout">
                            <a href="checkout.php" class="checkout-button button alt wc-forward">
                                Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>