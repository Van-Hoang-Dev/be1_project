<?php if(!empty($orderDetails)): ?>
<section class="gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #ffb300;"><?php echo $customer["firstname"] . " " . $customer["lastname"]; ?></span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #ffb300;">Receipt</p>
            </div>
            <!-- Show the info order here -->
            <?php
            $total = 0;
            $order_status = 0;
            $discount_code = "";
            $discountModel = new Discount;
            foreach ($orderDetails as $orderDetail) :
              $total = $total +  $orderDetail["subtotal"];
              $order_status = $orderDetail["order_status"];
              $discount_code = $orderDetail["discount_code"];
            ?>
              <div class="card shadow-0 border mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="public/images/content/products/<?php echo $orderDetail["image"] ?>" class="img-fluid" alt="Phone">
                    </div>
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0"><?php echo $orderDetail["name"] ?></p>
                    </div>
                    <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small"></p>
                        </div> -->
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Description:</p>
                      <!-- <p class="text-muted mb-0 small"><?php echo $orderDetail["description"] ?></p> -->
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Qty: <?php echo $orderDetail["quantity"] ?></p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <?php  if($orderDetail["subtotal"] < $orderDetail["price_per_unit"] * $orderDetail["quantity"]): ?>
                      <p class="text-muted mb-0 small" style="text-decoration: line-through; margin-right: 10px;"><?php $price  = $orderDetail["price_per_unit"] * $orderDetail["quantity"]; echo number_format($price, 2, '.', ',');?></p>
                      <p class="text-muted mb-0 small">$<?php echo $orderDetail["subtotal"] ?></p>
                      <?php else : ?>
                        <p class="text-muted mb-0 small">$<?php echo $orderDetail["subtotal"] ?></p>
                        <?php  endif?>
                    </div>
                  </div>
                  <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <!-- <div class="row d-flex align-items-center">
                        <div class="col-md-2">
                          <p class="text-muted mb-0 small">Track Order</p>
                        </div>
                        <div class="col-md-10">
                          <div class="progress" style="height: 6px; border-radius: 16px;">
                            <div class="progress-bar" role="progressbar"
                              style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="d-flex justify-content-around mb-1">
                            <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                            <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                          </div>
                        </div>
                      </div> -->
                </div>
              </div>
            <?php endforeach; ?>


            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-2">Order Details</p>
              <p class="text-muted mb-2"><span class="fw-bold me-4">Total: </span>$ <?php echo number_format($total, 2, '.', ',') ?></p>
            </div>
            <?php 
            if($discount_code != "none"):
            $discount_amount = $discountModel->getAmountOfDiscount($discount_code)["discount_amount"];
            ?>
            <div class="d-flex justify-content-between pt-2">
            <p class="small text-muted mb-0">Apply Voucher : <?php echo $discount_code ?></p>
            <p class="small text-muted mb-0">Amount: <?php echo $discount_amount ?>%</p>
            </div>
            <?php endif ?>
            <hr>

            <!-- <div class="d-flex justify-content-between pt-2">
                    <p class="text-muted mb-2">Invoice Number : 788152</p>
                    <p class="text-muted mb-2"><span class="fw-bold me-4">Discount: </span> $19.00</p>
                  </div> -->
            <div class="d-flex justify-content-between mb-1">
              <p class="text-muted mb-2">Your email : <?php echo $orderDetail["email"] ?></p>
              <p class="text-muted mb-2"><span class="fw-bold me-4">Phone: </span> <?php echo $orderDetail["phone"] ?></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <p class="text-muted mb-0">Your Address : <?php echo $orderDetail["address"] ?></p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Postcode zip: </span> <?php echo $orderDetail["postcode_zip"] ?></p>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
              <p class="text-muted mb-2">Invoice Date : <?php echo date('d/m/Y', strtotime($orderDetail["order_date"])); ?></p>
            </div>

            <div class="d-flex justify-content-between mb-3">
              <p class="text-muted mb-0">Recepits Voucher : <?php echo $orderDetail["order_code"] ?></p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="text-muted mb-2">Status : <?php
                                                  if ($orderDetail["order_status"] == 0) {
                                                    echo "Cofirming";
                                                  } else if ($orderDetail["order_status"] == 1) {
                                                    echo "Cofirmed";
                                                  } else if ($orderDetail["order_status"] == 2) {
                                                    echo "Delivering";
                                                  } else if ($orderDetail["order_status"] == 3) {
                                                    echo "Delivered";
                                                  }
                                                  ?></p>
            </div>
          </div>
          <div class="card-footer border-0 px-4 py-5" style="background-color: #ffb300; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-black text-uppercase mb-0">Total
              paid: <span class="h4 mb-0 ms-2">$<?php echo number_format($total, 2, '.', ',') ?></span></h5>
          </div>
        </div>
        <?php if($order_status == 0): ?>
       <form action="cancel_order.php" method="post">
       <input type="hidden" name="order_code" value="<?php echo $order_code ?>">  
       <div class="d-grid gap-2 mt-5">                                      
        <button class="btn btn-outline-primary" type="submit">Cancel</button>
       </div>
        </form>           
        <?php  endif;?>                              
      </div>
    </div>
  </div>
</section>
<?php else: ?>
  <div class="container">
    <div class="alert alert-danger my-5" role="alert">
    Unable to find invoice units for this invoice unit!
  </div>
  </div>
  <?php endif ?>