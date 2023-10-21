<?php

    include './model/pdo.php';
    include './model/category.php';
    include './model/product.php';
    include './model/comment.php';
    include './model/client.php';

    include './global.php';
    $client = '';
    if (isset($_SESSION['account']) && ($_SESSION['account'])) {
        $client = loadall_client('', $_SESSION['account']);
        if ($client) {
            if ($client[0]['client_role'] == 1) {
                header('location: ./admin/index.php');
                exit;
            }
        }
    }

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
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    if (!isset($_SESSION['account'])) {
                        echo '<script type="text/javascript">window.location.href = "./view/login/sign-in.php";</script>';
                        exit;
                    }else {
                        $comment_content = $_POST['comment_content'];
                        $product_id = $_POST['product_id'];
                        $client = loadall_client('' , $_SESSION['account']);
                        $client_id = $client[0]['client_id'];
                        $comment_rating = $_POST['rating'];
                        
                        insert_comment($comment_content , $product_id , $client_id , $comment_rating);
                        echo '<script type="text/javascript">window.location.href = "./index.php?act=product-page&idsp='.$product_id.'";</script>';
                        exit;
                    }
                }

                $new_5_product = loadall_product_new(5);
                if (isset($_GET['idsp'])) {
                    $product = loadone_product($_GET['idsp']);
                    extract($product);
                    $related_product = load_product_related($product_id , $category_id);
                    
                    $product_sigle = loadone_product($product_id);
                    $product_view = $product_sigle['product_view']+1;
                    update_product_view($_GET['idsp'] , $product_view);
                    $list_comments = loadall_comment($product_id);
                    

                };

                include './view/product-page.php';
                break;


            case 'profile':
                
                include './view/profile.php';
                break;
            case 'profile-update':
                if (isset($_POST['avatar']) && ($_POST['avatar'])) {
                    $client_img = $_FILES['file']['name'];
                    $target_dir = './uploads/';
                    $target_file = $target_dir.basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)) {
                    }

                    update_account_avater($client[0]['client_email'] , $client_img);
                    echo '<script type="text/javascript">window.location.href = "./index.php?act=profile";</script>';
                    exit;
                }

                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $user_name = $_POST['user_name'];
                    $client_email = $_POST['email'];
                    $client_password = $_POST['password'];

                    update_account( $client_email,$user_name, $client_password);
                    echo '<script type="text/javascript">window.location.href = "./index.php?act=profile";</script>';
                    exit;
                }
                break;


            case 'logout':
                logout();
                echo '<script type="text/javascript">window.location.href = "index.php";</script>';
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