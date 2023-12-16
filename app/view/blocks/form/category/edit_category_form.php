<div class="formbold-form-wrapper mt-3">
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="formbold-form-title">
            <h2 class="">Add Category</h2>
        </div>
        <div class="formbold-mb-3">
            <label for="id" class="formbold-form-label">
                ID
            </label>
            <input type="text" name="category_id" id="id" class="formbold-form-input" readonly value="<?php echo $category["category_id"] ?>" />
        </div>
        <div class="formbold-mb-3">
            <label for="name" class="formbold-form-label">
                Name
            </label>
            <input type="text" name="name" id="name" class="formbold-form-input" value="<?php echo $category["name"] ?>"/>
        </div>
        <button type="submit" class="formbold-btn">Edit</button>
        <a href="manage_category.php" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>