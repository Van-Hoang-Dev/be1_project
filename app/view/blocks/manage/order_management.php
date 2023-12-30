<div class="container">
    <h2 class="my-5 title-center">Order management</h2>

    <!-- Thông báo -->
    <?php if (isset($_SESSION["notify"]) && $_SESSION["notify"]["check"] == 1) :
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION["notify"]["notify"]; unset($_SESSION["notify"]);?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION["notify"]) && $_SESSION["notify"]["check"] == 0): ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION["notify"]["notify"]; unset($_SESSION["notify"]);?>
        </div>
    <?php 
    endif;
    ?>

    <table class="table table-hover mt-5" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>Customer</th>
            <th>Order code</th>
            <th>Order date</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Detail</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            foreach ($orders as $order) :
            ?>
                <tr>
                    <td><?php echo $order["order_id"] ?></td>
                    <td><?php echo $order["customer_name"] ?></td>
                    <td><?php echo $order["order_code"] ?></td>
                    <td><?php echo $order["order_date"] ?></td>
                    <td><?php echo $order["total_quantity"] ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-order="<?php echo $order["order_id"] ?>" data-order-status="<?php echo $order["order_status"] ?>">
                            <?php
                            if($order["order_status"] == 0){
                                echo "Cofirming";
                            }
                            else if($order["order_status"] == 1){
                                echo "Cofirmed";
                            }
                            else if($order["order_status"] == 2){
                                echo "Delivering";
                            }
                            else if($order["order_status"] == 3){
                                echo "Delivered";
                            }
                            ?>
                        </button>
                    </td>
                    </td>
                    <td>
                        <form action="order_detail.php" method="post">
                            <input type="hidden" name="order_code" value="<?php echo $order["order_code"] ?>">
                            <button class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="destroy.php" method="post" onsubmit="return confirm('Are you sure delete?')">
                            <button type="submit" class="btn btn-outline-danger" name="order_id" value="<?php echo $order["order_id"] ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="update" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body my-5">
                    <input type="hidden" name="order_id" value="" >
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="order_status" id="btnradio1" autocomplete="off" value="0">
                            <label class="btn btn-outline-primary" for="btnradio1">Confirming</label>

                            <input type="radio" class="btn-check" name="order_status" id="btnradio2" autocomplete="off" value="1">
                            <label class="btn btn-outline-primary" for="btnradio2">Confirmed</label>

                            <input type="radio" class="btn-check" name="order_status" id="btnradio3" autocomplete="off" value="2">
                            <label class="btn btn-outline-primary" for="btnradio3">Delivering</label>
                            
                            <input type="radio" class="btn-check" name="order_status" id="btnradio4" autocomplete="off" value="3">
                            <label class="btn btn-outline-primary" for="btnradio4">Delivered</label>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

    myModal._element.addEventListener('show.bs.modal', function (event) {
        let orderCode = event.relatedTarget.getAttribute('data-order');
        let orderStatus = event.relatedTarget.getAttribute('data-order-status');
        let radioButtons = document.querySelectorAll('input[name="order_status"]');

        console.log(orderStatus);
        // Cập nhật giá trị cho thẻ input trong modal
        document.querySelector('input[name="order_id"]').value = orderCode;

        radioButtons.forEach(function(radioButton) {
            if (radioButton.value == orderStatus) {
                radioButton.checked = true;
            } else {
                radioButton.checked = false;
            }
        });

    });
});
</script>