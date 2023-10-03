<?php

    include './model/pdo.php';
    include './model/category.php';
    include './model/product.php';
    include './model/comment.php';

    include './global.php';
    include './view/asset/layout/header.php';
    $listCategories = loadall_category();

    // echo '<pre>';
    // print_r($listCategories);
    // echo '</pre>';

    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act=$_GET['act'];

        switch ($act) {
            case 'shop-page':
                $new_5_product = loadall_product_new(5);
                
                if (isset($_GET['category_id'])) {
                    $list_products = loadall_product($_GET['category_id']);
                }else {
                    $list_products = loadall_product_shop();
                }

                include './view/shop-page.php';
                break;
            case 'product-page':
                $new_5_product = loadall_product_new(5);
                if (isset($_GET['idsp'])) {
                    $product = loadone_product($_GET['idsp']);
                    extract($product);
                    $related_product = load_product_related($product_id , $category_id);
                    
                    $product_sigle = loadone_product($product_id);


                    $list_comments = loadall_comment($product_id);

                };


                include './view/product-page.php';
                break;
        }

    } else {
        $count_products = count_category();
        $top_10_product = loadall_product_top(10);
        $new_10_product = loadall_product_new(10);

        include './view/category_slider.php';
        include './view/home-page.php';
    }

    include './view/asset/layout/footer.php';


?>