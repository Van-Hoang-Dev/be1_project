<div class="formbold-form-wrapper mt-3">


    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="formbold-form-title">
            <h2 class="">Add Product</h2>
        </div>
        <div class="formbold-mb-3">
            <label for="name" class="formbold-form-label"> Name </label>
            <input type="text" name="name" id="name" class="formbold-form-input" required />
        </div>
        <div class="formbold-mb-3">
            <label for="price" class="formbold-form-label"> Price </label>
            <input type="number" name="price" id="price" class="formbold-form-input" required/>
        </div>
        <div class="formbold-mb-3">
            <label for="description" class="formbold-form-label"> Description </label>
            <textarea id="editor" class="form-control" name="description"></textarea>
        </div>
        <hr class="my-5">
        <div class="formbold-mb-3">
            <label for="main_image" class="formbold-form-label">Main Image </label>
            <div class="boxDisplayImage my-3" id="boxDisplayImage"></div>
            <div class="input-group mb-3">
            <input type="file" name="main_image" id="main_image" class="form-control" required />
            </div>
        </div>
        <div class="formbold-mb-3">
            <label for="image" class="formbold-form-label"> Image </label>
            <div class="boxDisplayImages my-3" id="boxDisplayImages"></div>
            <input type="file" name="image[]" id="image" multiple accept="image/*" class="form-control">
        </div>
        <hr class="my-5">
        <div class="row mt-3">
            <label for="1" class="formbold-form-label"> Category </label>
            <?php
            foreach ($categories as $category) :
            ?>
                <div class="col-md-6">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="<?php echo $category["category_id"] ?>" name="categories[]" value="<?php echo $category["category_id"]  ?>">
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
                ?>

                    <input type="checkbox" class="btn-check" id="<?php echo $discount["discount_code"] ?>" autocomplete="off" name="discounts[]" value="<?php echo $discount["discount_id"] ?>">
                    <label class="btn btn-outline-primary" for="<?php echo $discount["discount_code"] ?>"><?php echo $discount["discount_code"] ?></label>

                <?php
                endforeach
                ?>
            </div>
        </div>

        <button type="submit" class="formbold-btn">Add</button>
        <a href="manage_product" class="formbold-btn-outline">Back</a>
    </form>
</div>
</div>
<script type="text/javascript">
    let image = document.getElementById("image");
    let main_image = document.getElementById("main_image");
    let boxDisplayImages = document.getElementById("boxDisplayImages");
    let boxDisplayImage = document.getElementById("boxDisplayImage");

    main_image.addEventListener("change", (e) => {
        boxDisplayImage.innerHTML = "";
        let img = document.createElement("img");
            img.src = URL.createObjectURL(e.target.files[0]);
            img.className = "displayedImage";
            boxDisplayImage.appendChild(img);
            console.log(URL.createObjectURL(e.target.files[0]));
    });


    image.addEventListener("change", (e) => {
        // Xóa hết các hình đã hiển thị trước đó
        boxDisplayImages.innerHTML = "";

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