

<div class="container category-form">
    <div class="h1 m-5 title">Category</div>

    <form action="index.php?act=category-update" method="post" enctype="multipart/form-data" id="form-category-edit" class="m-5">
        <input type="hidden" name="category-id" value="<?=$category['category_id']?>">
        <div class="form-group">
            <label for="category-name">Category name</label>
            <input type="text" rules="required" name="category-name" id="category-name" value="<?=$category['category_name']?>"/>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label class="custum-file-upload" for="file">
                <div class="img-upload"><img src="<?=$img_path_admin.$category['category_img']?>"></div>
            </label>
            <input type="file" name="file" id="file" hidden />
            <span class="form-message"></span>
        </div>

        <input class="btn btn-success" type="submit" name="submit" value="Edit" />

        <input type="button" class="btn btn-warning btn-retype" value="Retype">

        <a href="index.php?act=categories-list" class="btn btn-primary">Categories</a>
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
    new Validator("#form-category-edit");
</script>