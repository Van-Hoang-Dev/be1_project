<div class="container">
    <h2 class="my-5 title-center">Detail Order</h2>
    <table class="table table-hover" style="text-align: center;">
        <thead>
            <th>Code</th>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Adress customer</th>
        </thead>
        <tbody>
            <?php
            // var_dump($orders);
            foreach ($orders as $order) :
            ?>
                <tr>
                    <td><?php echo $order["order_code"] ?></td>
                    <td><img class="img-fluid" style="width:100px" src="../../public/images/content/products/<?php echo $order["image"] ?>" alt="<?php echo $order["name"] ?>"></td>
                    <td><?php echo $order["name"] ?></td>
                    <td><?php echo $order["quantity"] ?></td>
                    <td><?php echo $order["subtotal"] ?></td>
                    <td><?php echo $order["address"] ?></td>
                    <td>
                    
                    </td>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="manage_order" class="btn btn-primary">Back</a>

</div>