<div class="formbold-form-wrapper mt-3">


    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="formbold-form-title">
            <h2 class="">Edit Product</h2>
        </div>

        <div class="formbold-mb-3">
            <label for="id" class="formbold-form-label">
                ID
            </label>
            <input type="text" name="id" id="id" class="formbold-form-input" value="<?php echo $product["id"] ?>" readonly/>
        </div>

        <div class="formbold-mb-3">
            <label for="name" class="formbold-form-label">
                Name
            </label>
            <input type="text" name="name" id="name" class="formbold-form-input" value="<?php echo $product["name"] ?>"/>
        </div>
        <div class="formbold-mb-3">
            <label for="price" class="formbold-form-label">
                Price
            </label>
            <input type="text" name="price" id="price" class="formbold-form-input" value="<?php echo $product["price"] ?>" />
        </div>

        <div class="formbold-mb-3">
            <label for="description" class="formbold-form-label">
                Description
            </label>
            <!-- <input type="text" name="description" id="description" class="formbold-form-input" value="<?php echo $product["description"] ?>" /> -->
            <textarea name="description"><?php echo $product["description"] ?></textarea>
        </div>
        <div class="formbold-mb-3">
            <label for="image" class="formbold-form-label">
                Image
            </label>
            <!-- <img id="boxDisplayImage" alt="" src="" style="width: 200px; margin: 10px 0"> -->
            <input type="text" name="image" id="image" class="formbold-form-input" value="<?php echo $product["image"] ?>" />
        </div>

        <div class="row">
            <?php
            foreach ($categories as $category) :
                $productCategories = explode(",", $product["category_id"]);
                $check = "";
                foreach($productCategories as $productCategory){
                    if($category["category_id"] == $productCategory){
                        $check = "checked";
                    }
                }
            ?>

                <div class="col-md-6">
                <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="<?php echo $category["category_id"] ?>" name="categories[]" value="<?php echo $category["category_id"] ?>" <?php echo $check; ?>>
                <label class="form-check-label" for="<?php echo $category["category_id"] ?>"><?php echo $category["name"] ?></label>
                </div>
                </div>
            <?php endforeach; ?>

        </div>
        <button type="submit" class="formbold-btn">Edit</button>
        <a href="manage_products.php" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>
<script type="text/javascript">
    let image = document.getElementById("image");
    let boxDisplayImage = document.getElementById("boxDisplayImage");
    console.log(image);

    image.addEventListener("input", (e) => {
        boxDisplayImage.src = URL.createObjectURL(e.target.files[0]);
        console.log(URL.createObjectURL(e.target.files[0]));
    })
</script>