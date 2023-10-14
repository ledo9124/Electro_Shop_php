<div class="container categories-list-table p-4">
    <div class="row align-items-center">
        <div class="col-6 h1 m-4 title">Category</div>
        <div class="col-auto search">
            <form action="index.php?act=categories-list" method="post">
                <input placeholder="Search..." type="text" name="search" />
                <input type="submit" name="submit" value="Go">
            </form>
        </div>
    </div>
    <table class="table table-hover mb-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
            if ($listCategories) {
                foreach ($listCategories as $category) {
                    extract($category);
                    $img = $img_path_admin . $category_img;

                    echo '
                        <tr>
                            <td><input type="checkbox" class="ui-checkbox" name="category_checkbox"></td>
                            <td>' . $category_id . '</td>
                            <td>' . $category_name . '</td>
                            <td><img src="' . $img . '" alt="' . $category_name . '"></td>
                            <td>
                                <a href="index.php?act=category-edit&category_id=' . $category_id . '" class="btn btn-warning">Edit</a>
                                <a href="index.php?act=category-delete&category_id=' . $category_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a>
                            </td>
                        ';
                }
                ;
            } else {
                echo "<tr>
                            <td colspan='5' class='text-message text-danger'>Category not found is '$value_search' !</td>
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
        <form action="index.php?act=categories-list" method="post">
            <input class="btn btn-info" type="submit" name="show-all" value="Show all">
        </form>
        <a href="index.php?act=category" class="btn btn-success add-new">Add new</a>
    </div>


</div>

<script>
    
</script>