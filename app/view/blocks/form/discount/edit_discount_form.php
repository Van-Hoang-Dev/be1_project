<div class="formbold-form-wrapper mt-3">
    <form action="update.php" method="post" onsubmit="return validateDates()">
        <div class="formbold-form-title">
            <h2 class="">Edit Discount</h2>
        </div>
        <input type="hidden" name="discount_id" id="discount_id" class="formbold-form-input" value="<?php echo $discount["discount_id"] ?>" />
        <div class="formbold-mb-3">
            <label for="discount_code" class="formbold-form-label">
                Discount code
            </label>
            <input type="text" name="discount_code" id="discount_code" class="formbold-form-input" value="<?php echo $discount["discount_code"] ?>" required />
        </div>
        <div class="formbold-mb-3">
            <label for="discount_amount" class="formbold-form-label">
                Discount amount
            </label>
            <input type="number" name="discount_amount" id="discount_amount" class="formbold-form-input" value="<?php echo $discount["discount_amount"] ?>" required />
        </div>
        <div class="formbold-mb-3">
            <label for="description" class="formbold-form-label">
                Description
            </label>
            <textarea name="description" id="discount_amount" class="formbold-form-input" required><?php echo $discount["description"] ?></textarea>
        </div>
       
        <div class="formbold-mb-3">
            <label for="start_date" class="formbold-form-label">
                Start date
            </label>
            <input type="date" name="start_date" id="start_date" class="formbold-form-input" value="<?php echo $discount["start_date"] ?>" required />
        </div>
        <div class="formbold-mb-3">
            <label for="end_date" class="formbold-form-label">
                End date
            </label>
            <input type="date" name="end_date" id="end_date" class="formbold-form-input" value="<?php echo $discount["end_date"] ?>" required />
        </div>
        <button type="submit" class="formbold-btn">Update</button>
        <a href="manage_discount.php" class="formbold-btn-outline">Back</a>
    </form>
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