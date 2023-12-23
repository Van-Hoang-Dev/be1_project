
<div class="formbold-form-wrapper mt-3">
    <form action="store.php" method="post" onsubmit="return validateDates()">
        <div class="formbold-form-title">
            <h2 class="">Add Inventory</h2>
        </div>
        <div class="formbold-mb-3">
            <label for="discount_code" class="formbold-form-label">
                Select product
            </label>
            <select class="form-select"  name="product_id">
            <option selected>Select product</option>
            <?php 
                foreach($products as $product):
            ?>
              <option value="<?php echo $product["id"] ?>"><?php echo $product['name']?></option>
            
            <?php endforeach; ?>
            <option>Other</option>
            </select>
        
        </div>
        <div class="formbold-mb-3">
            <label for="date_add" class="formbold-form-label">
                Date add
            </label>
            <input type="date" name="date_add" id="date_add" class="formbold-form-input" required />
        </div><div class="formbold-mb-3">
            <label for="discount_amount" class="formbold-form-label">
                Input quantity
            </label>
            <input type="number" name="input_quantity" id="input_quantity" class="formbold-form-input" required />
        </div>
        <button type="submit" class="formbold-btn">Add</button>
        <a href="manage_discount.php" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>

<script>
    function validateDates() {
      let startDate = document.getElementById("start_date").value;
      let endDate = document.getElementById("end_date").value;

      if (startDate > endDate) {
        alert("Ngày bắt đầu phải nhỏ hơn ngày kết thúc");
        return false; // Ngăn chặn việc gửi form nếu có lỗi
      }

      return true; // Cho phép gửi form nếu không có lỗi
    }
  </script>