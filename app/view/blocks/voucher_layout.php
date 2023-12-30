<section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Get Voucher Here !<span style="color: #ffb300;">
                                </span>!</h5>
                        </div>
                        <!-- Show the info order here -->
                        <div class="card shadow-0 border mb-4 p-4">
                            <?php 
                                foreach($discounts as $discount):
                                    $startDate = date('d/m/Y', strtotime($discount['start_date']));
                                    $endDate = date('d/m/Y', strtotime($discount['end_date']));
                            ?>
                           <div class="voucher-box my-3" style=" border: 1px solid #ccc; border-radius: 10px; padding: 10px 20px; box-shadow: 1px 2px 1px 1px #ccc;">
                            <h5>Voucher name: <span style="font-weight: 700;" ><?php echo $discount["discount_code"] ?></span></h5>
                            <div class="d-flex justify-content-between" style="font-weight: 500; margin-top: 15px;">
                                <p class="date">Start date: <?php echo $startDate ?></p>
                                <p class="date">End date: <?php echo $endDate ?></p>
                            </div>
                            <p>Sale <span><?php echo $discount["discount_amount"] ?>%</span></p>
                            <p class="description"><?php echo $discount["description"] ?></p>
                           </div>
                           <?php endforeach ?>
                        </div>

                        <div class="card-footer border-0 px-4 py-5" style="background-color: #ffb300; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>