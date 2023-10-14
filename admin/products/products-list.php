<div class="container categories-list-table p-4">
    <div class="row align-items-center">
        <div class="col-6 h1 m-4 title">Category</div>
        <div class="col-auto search">
            <form action="index.php?act=products-list" method="post">
                <div class="mb-1">
                    <input placeholder="Search..." type="text" name="search" />
                    <input type="submit" name="submit" value="Go">
                </div>
            </form>
        </div>
    </div>
    
    <form action="index.php?act=products-list" method="post" id="category-form" class="row gap-3 mb-5">
        <select class="form-select col" aria-label="Default select example" name="category_id">
            <option selected value="0">All products</option>
            <?php 
                foreach ($listCategories as $key => $category) {
                    extract($category);
                    
                    echo '
                    <option '.($iddm == $category_id ? 'selected' : '').' value="'.$category_id.'">
                        '.$category_name.'
                    </option>
                    ';
                }
            ?>
            
        </select>
        <input class="col-1 btn btn-primary" type="submit" name="category-form" value="Search">
    </form>

    <table class="table table-hover mb-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">View</th>
                <th scope="col-3"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
            if ($listProducts) {
                foreach ($listProducts as $product) {
                    extract($product);
                    $img = $img_path_admin . $product_image;

                    echo '
                        <tr>
                            <td><input type="checkbox" class="ui-checkbox" name="product_checkbox"></td>
                            <td>' . $product_id . '</td>
                            <td>' . $product_name . '</td>
                            <td>' . $product_price. '</td>
                            <td>' . $product_description . '</td>
                            <td><img src="' . $img . '" alt="' . $product_name . '"></td>
                            <td w-50>' . $product_view. '</td>
                            <td>
                                <a href="index.php?act=product-edit&product_id=' . $product_id . '" class="btn btn-warning">Edit</a>
                                <a href="index.php?act=product-delete&product_id=' . $product_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a>
                            </td>
                        ';
                }
                ;
            } else {
                echo "<tr>
                            <td colspan='5' class='text-message text-danger'>Product not found is '$value_search' !</td>
                        </tr>
                    ";
            }
            ;
            ?>

            <!-- <tr>
                <td><input type="checkbox" class="ui-checkbox"></td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><img src="../view/asset/image/home_product1.png" alt=""></td>
            </tr> -->

        </tbody>
    </table>

    <div class="d-flex">
        <button class="btn btn-primary choose-all">Choose All</button>
        <button class="btn btn-danger deselect-all">Deselect All</button>
        <form action="index.php?act=products-list" method="post">
            <input class="btn btn-info" type="submit" name="show-all" value="Show all">
        </form>
        <a href="index.php?act=product" class="btn btn-success add-new">Add new</a>
    </div>


</div>
