<div class="checkout-layout mt-5">
    <div class="woocommerce">
        <div class="woocommerce-page-header mb-4">
            <ul>
                <li class="shopping-cart-link <?php if (isset($_GET['c'])) echo $_GET['c'] == 1 ? "active-color" : "" ?>"> <a href="user_info.php?c=1">Your info</a></li>
                <li class="shopping-cart-link <?php if (isset($_GET['c'])) echo $_GET['c'] == 2 ? "active-color" : "" ?>"> <a href="order_history.php?c=2">Your ordered</a></li>
            </ul>
        </div>
    </div>
</div>
<hr>
<div class="info-user">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <img src="public/images/avatar/avatar-1.png" alt="">
            <form action="#" method="POST">
                <div class="formbold-form-title">
                    <h2 class=""><?php echo $user["firstname"] . " " . $user["lastname"] ?> </h2>
                    <p>
                    </p>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">
                            First name
                        </label>
                        <input type="text" name="firstname" id="firstname" class="formbold-form-input" value="<?php echo $user["firstname"] ?>" />
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label"> Last name </label>
                        <input type="text" name="lastname" id="lastname" class="formbold-form-input" value="<?php echo $user["lastname"] ?>" />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> Email </label>
                        <input type="email" name="email" id="email" class="formbold-form-input" value="<?php echo $user["email"] ?>" />
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label"> Phone number </label>
                        <input type="text" name="phone" id="phone" class="formbold-form-input" value="<?php echo $user["phone"] ?>" />
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">
                        Address
                    </label>
                    <input type="text" name="address" id="address" class="formbold-form-input" value="<?php echo $user["address"] ?>" />
                </div>

                <div class="formbold-mb-3">
                    <label for="post" class="formbold-form-label"> Post/Zip code </label>
                    <input type="text" name="post" id="post" class="formbold-form-input" value="<?php echo $user["postcode_zip"] ?>" />
                </div>

                <button type="submit" class="formbold-btn">Save</button>
            </form>
        </div>
    </div>
</div>