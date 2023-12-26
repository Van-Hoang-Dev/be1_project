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
                    <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
                  </div>
                  <!-- Show the info order here -->
                  <?php 
                  $total = 0;
                  foreach($orderDetails as $orderDetail):
                    $total = $total +  $orderDetail["subtotal"];
                  ?>
                  <div class="card shadow-0 border mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">
                          <img src="<?php echo $orderDetail["image"] ?>"
                            class="img-fluid" alt="Phone">
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
                          <p class="text-muted mb-0 small"><?php echo $orderDetail["price_per_unit"] ?></p>
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
                    <p class="text-muted mb-2"><span class="fw-bold me-4">Total: </span> <?php echo $total ?></p>
                  </div>
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
                    <p class="text-muted mb-2"><span class="fw-bold me-4">GST 18%</span> 123</p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <p class="text-muted mb-0">Recepits Voucher : <?php echo $orderDetail["order_code"] ?></p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges: </span> Free</p>
                  </div>
                </div>
                <div class="card-footer border-0 px-4 py-5"
                  style="background-color: #ffb300; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                  <h5 class="d-flex align-items-center justify-content-end text-black text-uppercase mb-0">Total
                    paid: <span class="h4 mb-0 ms-2">$1040</span></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>