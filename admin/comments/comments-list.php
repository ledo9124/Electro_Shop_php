<div class="container categories-list-table p-4">
    <div class="row align-items-center">
        <div class="col-6 h1 m-4 title">Comment</div>
        <div class="col-auto search">
            <form action="index.php?act=comments-list" method="post">
                <input placeholder="Search..." type="text" name="search" />
                <input type="submit" name="submit" value="Go">
            </form>
        </div>
    </div>
    <table class="table table-hover mb-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id product</th>
                <th scope="col">User name</th>
                <th scope="col">Content</th>
                <th scope="col">Star rating</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
            if ($listComments) {
                foreach ($listComments as $comment) {
                    extract($comment);

                    echo '
                        <tr>
                            <td><input type="checkbox" class="ui-checkbox" name="comment_checkbox"></td>
                            <td>' . $product_id . '</td>
                            <td>' . $user_name . '</td>
                            <td>' . $comment_content . '</td>
                            <td>' . $comment_rating . '</td>
                            <td>' . $comment_date . '</td>
                            <td>
                                <a href="index.php?act=comment-delete&comment_id=' . $comment_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a>
                            </td>
                        ';
                }
                ;
            } else {
                echo "<tr>
                            <td colspan='5' class='text-message text-danger'>comment not found is '$user_name' !</td>
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
        <form action="index.php?act=comments-list" method="post">
            <input class="btn btn-info" type="submit" name="show-all" value="Show all">
        </form>
    </div>


</div>

<script>
    
</script>