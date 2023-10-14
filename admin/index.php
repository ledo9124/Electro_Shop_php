<?php 

    include '../model/pdo.php';
    include '../model/product.php';
    include '../model/category.php';
    include '../model/comment.php';
    include '../model/client.php';
    include '../global.php';
    
    
    include './header.php';
    
    if (isset($_GET['act']) && ($_GET['act'] != '')) {
        $act = $_GET['act'];

        switch ($act) {


            case 'category':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $category_name = $_POST['category-name'];
                    $category_image = $_FILES['file']['name'];
                    $target_dir = '../uploads/';
                    $target_file = $target_dir.basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)) {
                    }
                    insert_category($category_name , $category_image);
                    $insert_success = 'Add success!';
   
                }

                include './categories/category.php';
                break;
            case 'categories-list':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $value_search = $_POST['search'];
                }else {
                    $value_search = '';
                }
                if (isset($_POST['show-all']) && ($_POST['show-all'])) {
                    $value_search = '';
                }
                $listCategories = loadall_category($value_search);

                include './categories/categories-list.php';
                break;
            case 'category-edit':
                if (isset($_GET['category_id']) && ($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                    $category = loadone_category($category_id);
                }

                include './categories/edit.php';
                break;
            case 'category-update':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $category_id = $_POST['category-id'];
                    $category_name = $_POST['category-name'];
                    $category_image = $_FILES['file']['name'];
                    $target_dir = '../uploads/';
                    $target_file = $target_dir.basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)) {
                    }
                    update_category($category_id , $category_name , $category_image);

                };
                
                $listCategories = loadall_category();
                include './categories/categories-list.php';
                break;
            case 'category-delete':
                if (isset($_GET['category_id']) && ($_GET['category_id'])) {
                    hard_delete_category($_GET['category_id']);
                }
                $listCategories = loadall_category();
                include './categories/categories-list.php';
                break;




            case 'product':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $category_id = $_POST['category_id'];
                    $product_name = $_POST['product-name'];
                    $product_price = $_POST['product-price'];
                    $product_description = $_POST['product-description'];
                    $product_image = $_FILES['file']['name'];
                    $target_dir = '../uploads/';
                    $target_file = $target_dir.basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)) {
                    }
                    insert_product($product_name,$product_price, $product_image , $product_description ,$category_id);
                    $insert_success = 'Add success!';
                }
                $listCategories = loadall_category();
                include './products/product.php';
                break;
            case 'products-list':
                $value_search = '';
                $category_id = '';
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $value_search = $_POST['search'];
                }
                if (isset($_POST['category-form']) && ($_POST['category-form'])) {
                    $category_id = $_POST['category_id'];
                }
                
                $iddm = $category_id;
                $listCategories = loadall_category();
                $listProducts = loadall_product($category_id,$value_search);
                include './products/products-list.php';
                break;
            case 'product-edit':
                if (isset($_GET['product_id']) && ($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    $product = loadone_product($product_id);
                }
                $listCategories = loadall_category();

                include './products/edit.php';
                break;
            case 'product-update':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $product_id = $_POST['product-id'];
                    $category_id = $_POST['category_id'];
                    $product_name = $_POST['product-name'];
                    $product_price = $_POST['product-price'];
                    $product_description = $_POST['product-description'];
                    $product_image = $_FILES['file']['name'];
                    $target_dir = '../uploads/';
                    $target_file = $target_dir.basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)) {
                    }
                    update_product($product_id, $product_name, $product_price, $product_description, $product_image, $category_id);
                };
                
                $listCategories = loadall_category();
                $listProducts = loadall_product();
                include './products/products-list.php';
                break;
            case 'product-delete':
                if (isset($_GET['product_id']) && ($_GET['product_id'])) {
                    hard_delete_product($_GET['product_id']);
                }
                $listCategories = loadall_category();
                $listProducts = loadall_product();
                include './products/products-list.php';
                break;
            



            case 'comments-list':
                $product_id = 0;
                $user_name = '';
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $user_name = $_POST['search'];
                }

                $listComments = loadall_comment($product_id , $user_name);
                include './comments/comments-list.php';
                break;



            case 'clients-list': 


                $listClients = loadall_client($user_name = '');
                include './clients/clients-list.php';
                break;
            
        }
    }else {
        include './home.php';
    }

    include './footer.php';

?>


