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
            <div class="boxDisplayImages my-3" id="boxDisplayImages">
            <?php 
            $productImages = explode(",", $product["images"]);
            foreach($productImages as $image):    
            ?>
            <img src="../../public/images/content/products/<?php echo $image ?>" alt="<?php echo $product["name"] ?>">
            <?php endforeach; ?>
            <hr>
            </div>
            <input type="hidden" name="existing_images" value="<?php echo $product["images"] ?>">
            <input type="file" name="image[]" id="image" multiple accept="image/*" class="formbold-form-input">
        </div>
        <div class="formbold-mb-3">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="choose_update" id="btnradio1" autocomplete="off" checked value="1">
                <label class="btn btn-outline-primary" for="btnradio1">Chosse new update</label>

                <input type="radio" class="btn-check" name="choose_update" id="btnradio2" autocomplete="off" value="2">
                <label class="btn btn-outline-primary" for="btnradio2">Keep the both</label>
               
                <input type="radio" class="btn-check" name="choose_update" id="btnradio3" autocomplete="off" value="0">
                <label class="btn btn-outline-primary" for="btnradio3">Keep the old</label>
            </div>
        </div>
        <hr>
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

        <hr>
        <div class="formbold-mb-3 mt-3">
            <label for="" class="formbold-form-label"> Vocher </label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <?php
                foreach ($discounts as $discount) :
                    $productDiscounts = explode(",", $product["discount_id"]);
                $check = "";
                foreach($productDiscounts as $productDiscount){
                    if($discount["discount_id"] == $productDiscount){
                        $check = "checked";
                    }
                }
                ?>

                    <input type="checkbox" class="btn-check" id="<?php echo $discount["discount_code"] ?>" autocomplete="off" name="discounts[]" value="<?php echo $discount["discount_id"] ?>" <?php echo $check; ?>>
                    <label class="btn btn-outline-primary" for="<?php echo $discount["discount_code"] ?>"><?php echo $discount["discount_code"] ?></label>

                <?php
                endforeach
                ?>
            </div>
        </div>

        <button type="submit" class="formbold-btn">Edit</button>
        <a href="manage_product.php" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>
<script type="text/javascript">
    let image = document.getElementById("image");
    let boxDisplayImages = document.getElementById("boxDisplayImages");
    let content = boxDisplayImages.innerHTML;

    image.addEventListener("change", (e) => {
        // Xóa hết các hình đã hiển thị trước đó
        boxDisplayImages.innerHTML = content +  "";
        // Lặp qua từng file và hiển thị nó
        for (let i = 0; i < e.target.files.length; i++) {
            let img = document.createElement("img");
            img.src = URL.createObjectURL(e.target.files[i]);
            img.className = "displayedImage";
            boxDisplayImages.appendChild(img);
            console.log(URL.createObjectURL(e.target.files[i]));
        }
    });
</script>