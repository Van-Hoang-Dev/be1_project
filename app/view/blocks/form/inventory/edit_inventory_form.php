
<div class="formbold-form-wrapper mt-3">
    <form action="update.php" method="post">
        <div class="formbold-form-title">
            <h2 class="">Edit Inventory</h2>
        </div>
        <input type="hidden" name="product_id" id="product_id" class="formbold-form-input" value="<?php echo $inventoryItem["product_id"] ?>" />
        <div class="formbold-mb-3">
            <label for="discount_code" class="formbold-form-label">
                Product name
            </label>
            <input type="text" name="product_name" id="product_name" class="formbold-form-input" readonly  value="<?php echo $inventoryItem["name"] ?>"  />
        </div>
        <div class="formbold-mb-3">
            <label for="date_add" class="formbold-form-label">
                Date add
            </label>
            <input type="date" name="date_add" id="date_add" class="formbold-form-input" readonly  value="<?php echo $inventoryItem["date_add"]?>" />
        </div>
        <div class="formbold-mb-3">
            <label for="date_update" class="formbold-form-label">
                Date update
            </label>
            <input type="date" name="date_update" id="date_update" class="formbold-form-input" required  value="<?php echo $inventoryItem["date_add"]?>" />
        </div>
        
        <div class="formbold-mb-3">
            <label for="discount_amount" class="formbold-form-label">
                Input quantity
            </label>
            <input type="number" name="input_quantity" id="input_quantity" class="formbold-form-input" required value="<?php echo $inventoryItem["input_quantity"] ?>" />
            <input type="hidden" name="old_quantiy" value="<?php echo $inventoryItem["input_quantity"] ?>">
        </div>
        <button type="submit" class="formbold-btn">Update</button>
        <a href="manage_inventory.php" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>