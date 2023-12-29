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
                <li class="shopping-cart-link <?php if (isset($_GET['c'])) echo $_GET['c'] == 1 ? "active-color" : "" ?>"> <a href="./viewcart?c=1">Cart</a></li>
                <li class="checkout-link <?php if (isset($_GET['c'])) echo $_GET['c'] == 2 ? "active-color" : "" ?>"><a href="checkout.php?c=2">Checkout</a></li>
                <li class="order-tracking-link <?php if (isset($_GET['c'])) echo $_GET['c'] == 3 ? "active-color" : "" ?>"><a href="odertracking.php?c=3">Order Tracking</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                <table class="table">
                    <thead style="text-align: center;">
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
                            foreach ($cart as $item) :
                            ?>
                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                    <td class="product-thumbnail">
                                        <a href=""><img width="80" height="80" src="public/images/content/products/<?php echo $item["image"] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>
                                    </td>
                                    <td>
                                        <a href="./detail.php?id=<?php echo $item['id'] ?>" class="text-black"><?php echo $item["name"] ?></a>
                                    </td>

                                    <td class="product-price" data-title="Price">
                                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $item["price"] ?></bdi></span>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <form class="d-inline-block" action="delete-item-cart.php" method="post">
                                            <input type="hidden" name="idRemove" value="<?php echo $item['id'] ?>">
                                            <input type="hidden" name="index" value="1">
                                            <input type="hidden" name="minus" value="1">
                                            <button type="submit" class="btn btn-outline-warning rounded-start-pill" style="--bs-btn-padding-y: 1px; --bs-btn-padding-x: 10px; --bs-btn-font-size: 14px;"><i class="fa-solid fa-minus"></i></button>
                                        </form>
                                        <span class="woocommerce-Price-amount amount mx-4"><bdi><span class="woocommerce-Price-currencySymbol"></span><?php echo $item["quantity"] ?></bdi></span>
                                        <form class="d-inline-block" action="cart.php" method="post">
                                            <input type="hidden" name="add_to_cart" value="<?php echo $item['id'] ?>">
                                            <input type="hidden" name="index" value="1">
                                            <button type="submit" class="btn btn-outline-warning rounded-end-pill" style="--bs-btn-padding-y: 1px; --bs-btn-padding-x: 10px; --bs-btn-font-size: 14px;"><i class="fa-solid fa-plus"></i></button>
                                        </form>
                                    </td>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal">
                                    <?php  
                                    $totalItem = $item["price"] * $item["quantity"];
                                    if($item["subtotal"] < $totalItem): ?>
                                        <span class="woocommerce-Price-amount amount d-block text-decoration-line-through"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $formattedSubtotal = number_format($totalItem, 2, '.', ','); ?></bdi></span>
                                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $formattedSubtotal = number_format($item["subtotal"], 2, '.', ','); ?></bdi></span>
                                    <?php  else: ?>
                                        <span class="woocommerce-Price-amount amount d-block"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $formattedSubtotal = number_format($item["subtotal"], 2, '.', ','); ?></bdi></span>
                                    <?php endif ?>
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
                                            <form action="discount.php" method="post" class=" d-flex flex-row justify-content-center">
                                                <div class="formbold-mb-3" style="margin: 0;">
                                                    <input type="text" name="discount_code" id="discount_code" class="formbold-form-input" />
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
                <?php if(isset($_SESSION["notify"])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION["notify"]; ?>
                </div>
                <?php 
                    endif;
                    unset($_SESSION["notify"]);
                ?>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <div cellspacing="0" class="shop_table shop_table_responsive">
                            <div class="cart-subtotal">
                                <div class="title">Subtotal</div>
                                <div data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span><?php echo $formattedSubtotal = number_format($totalPrice, 2, '.', ','); ?></bdi></span>
                                </div>
                            </div>
                            <div class="order-total">
                                <div class="title">Discount</div>
                                <div data-title="Total"><strong>
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>
                                     <?php echo $totalPrice ?></bdi></span></strong>
                                </div>
                            </div>
                            <div class="order-total">
                                <div class="title">Total</div>
                                <div data-title="Total"><strong>
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>
                                     <?php echo $totalPrice ?></bdi></span></strong>
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