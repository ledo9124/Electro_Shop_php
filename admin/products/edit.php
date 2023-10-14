

<div class="container product-form mb-5">
    <div class="h1 m-5 title">Product</div>

    <form action="index.php?act=product-update" method="post" enctype="multipart/form-data" id="form-product" class="m-5">
        <select class="form-select mb-5" aria-label="Default select example" name="category_id">
            <?php 

                foreach ($listCategories as $key => $category) {
                    extract($category);
                    
                    echo '
                        <option '.($product['category_id'] == $category_id ? 'selected' : '').' value="'.$category_id.'">'.$category_name.'</option>
                    ';
                }
            ?>

        </select>
        <input type="hidden" name="product-id" value="<?=$product['product_id']?>">
        <div class="form-group">
            <label for="product-name">Product name</label>
            <input type="text" rules="required" name="product-name" id="product-name" value="<?=$product['product_name']?>"/>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="product-price">Product price</label>
            <input type="text" rules="required" name="product-price" id="product-price" value="<?=$product['product_price']?>"/>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="product-description">Product secription</label>
            <input type="text" rules="required" name="product-description" id="product-description" value="<?=$product['product_description']?>"/>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label class="custum-file-upload" for="file">
                <div class="img-upload"><img src="<?=$img_path_admin.$product['product_image']?>"></div>
            </label>
            <input type="file" name="file" id="file" hidden />
            <span class="form-message"></span>
        </div>

        <input class="btn btn-success" type="submit" name="submit" value="Edit" />

        <input type="button" class="btn btn-warning btn-retype" value="Retype">

        <a href="index.php?act=products-list" class="btn btn-primary">Products</a>
    </form>

    <?php 
        if (isset($insert_success) && ($insert_success != '')) {
            echo '<p class="text-success">'.$insert_success.'</p>';
        }
    ?>
    

</div>

</div>
<script src="../view/asset/js/validator2_0.js"></script>
<script>
    new Validator("#form-product");
</script>