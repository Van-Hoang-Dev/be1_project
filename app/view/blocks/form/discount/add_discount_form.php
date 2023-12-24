
<div class="formbold-form-wrapper mt-3">
    <form action="store.php" method="post" onsubmit="return validateDates()">
        <div class="formbold-form-title">
            <h2 class="">Add Discount</h2>
        </div>
        <div class="formbold-mb-3">
            <label for="discount_code" class="formbold-form-label">
                Discount code
            </label>
            <input type="text" name="discount_code" id="discount_code" class="formbold-form-input" required />
        </div>
        <div class="formbold-mb-3">
            <label for="discount_amount" class="formbold-form-label">
                Discount amount
            </label>
            <input type="number" name="discount_amount" id="discount_amount" class="formbold-form-input" required />
        </div>
        <div class="formbold-mb-3">
            <label for="option1" class="formbold-form-label">
                Is active
            </label>
            <input type="radio" class="btn-check" name="is_active" id="option1" autocomplete="off" value="1" required>
            <label class="btn btn-outline-success" for="option1">Active</label>
            <input type="radio" class="btn-check" name="is_active" id="option2" autocomplete="off" value="0" required>
            <label class="btn btn-outline-warning" for="option2">Inactive</label>
        </div>
        <div class="formbold-mb-3">
            <label for="start_date" class="formbold-form-label">
                Start date
            </label>
            <input type="date" name="start_date" id="start_date" class="formbold-form-input" required/>
        </div>
        <div class="formbold-mb-3">
            <label for="end_date" class="formbold-form-label">
                End date
            </label>
            <input type="date" name="end_date" id="end_date" class="formbold-form-input" required/>
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