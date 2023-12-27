<div class="formbold-form-wrapper mt-3">


    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="formbold-form-title">
            <h2 class="">Edit Product</h2>
        </div>

        <div class="formbold-mb-3">
            <label for="id" class="formbold-form-label">
                ID
            </label>
            <input type="text" name="id" id="id" class="formbold-form-input" value="<?php echo $product["id"] ?>" readonly />
        </div>

        <div class="formbold-mb-3">
            <label for="name" class="formbold-form-label">
                Name
            </label>
            <input type="text" name="name" id="name" class="formbold-form-input" value="<?php echo $product["name"] ?>" />
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
            <textarea id="editor" class="form-control" name="description"><?php echo $product["description"] ?></textarea>
        </div>
        <hr class="my-5">
        <div class="formbold-mb-3">
            <label for="main_image" class="formbold-form-label">Main Image </label>
            <div class="boxDisplayImage my-3" id="boxDisplayImage">
            
            <?php
                $exitingImage = "";
                if(!empty($productImages)):
                $productImages = explode(",", $product["images"]);
                foreach ($productImages as $image) :
                    $imageItem = explode("-", $image);
                    if ($imageItem[1] == 1) :
                        $exitingImage = $imageItem[0];
                ?>
                            <img src="../../public/images/content/products/<?php echo $imageItem[0] ?>" alt="<?php echo $product["name"] ?>">
                    <?php
                    endif;
                endforeach; 
            endif;
                    ?>

            </div>
            <div class="input-group mb-3">
                <input type="hidden" name="existing_main_image" value="<?php echo $exitingImage ?>" >
                <input type="file" name="main_image" id="main_image" class="form-control" />
            </div>
        </div>
        <div class="formbold-mb-3">
            <label for="image" class="formbold-form-label">
                Image
            </label>
            <div class="boxDisplayImages my-3" id="boxDisplayImages">
                <?php
                $exitingImages = "";
                if(!empty($productImages)):
                $productImages = explode(",", $product["images"]);
                foreach ($productImages as $image) :
                    $imageItem = explode("-", $image);
                    if ($imageItem[1] == 0) :
                        $exitingImages .= $imageItem[0] . ",";
                ?>
                            <img src="../../public/images/content/products/<?php echo $imageItem[0] ?>" alt="<?php echo $product["name"] ?>">
                    <?php
                    endif;
                endforeach; 
            endif;
                    ?>
                    <hr>
                        </div>
                        <input type="hidden" name="existing_images" value="<?php echo $exitingImages ?>">
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
            <hr class="my-5">
            <div class="row">
                <?php
                foreach ($categories as $category) :
                    $productCategories = explode(",", $product["category_id"]);
                    $check = "";
                    foreach ($productCategories as $productCategory) {
                        if ($category["category_id"] == $productCategory) {
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
                        foreach ($productDiscounts as $productDiscount) {
                            if ($discount["discount_id"] == $productDiscount) {
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
    let main_image = document.getElementById("main_image");
    let boxDisplayImages = document.getElementById("boxDisplayImages");
    let boxDisplayImage = document.getElementById("boxDisplayImage");
    let content = boxDisplayImages.innerHTML;

    main_image.addEventListener("change", (e) => {
        boxDisplayImage.innerHTML = ""
        let img = document.createElement("img");
            img.src = URL.createObjectURL(e.target.files[0]);
            img.className = "displayedImage";
            boxDisplayImage.appendChild(img);
            console.log(URL.createObjectURL(e.target.files[0]));
    });


    image.addEventListener("change", (e) => {
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