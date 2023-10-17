<div class="container categories-list-table p-4">
    <div class="row align-items-center">
        <div class="col-6 h1 m-4 title">Statistical</div>
        <div class="col-auto search">
            <form action="index.php?act=statistical-list" method="post">
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
                <th scope="col">Category name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Smallest price</th>
                <th scope="col">Biggest price</th>
                <th scope="col">Average price</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php

            if ($listStatistical) {
                foreach ($listStatistical as $statictical) {
                    extract($statictical);
                    echo '
                    <tr>
                        <td><input type="checkbox" class="ui-checkbox" name="product_checkbox"></td>
                        <td>' . $category_id . '</td>
                        <td>' . $category_name . '</td>
                        <td>' . $quantity . '</td>
                        <td>$ ' . $smallest_price . '</td>
                        <td>$ ' . $biggest_price . '</td>
                        <td>$ ' . number_format($average_price , 2) . '</td>
    
                    ';
                }
            } else {
                echo "<tr>
                            <td colspan='5' class='text-message text-danger'>Category not found is '$category_name' !</td>
                        </tr>
                    ";
            }
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
        <a href="index.php?act=chart" class="btn btn-success add-new">Chart</a>
    </div>


</div>

<script>
    
</script>