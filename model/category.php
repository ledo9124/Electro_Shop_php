<?php
function loadall_category($name = '')
{
    $sql = "select * from category where 1";
    if ($name != '') {
        $sql .= " and category_name like '%" . $name . "%'";
    }
    $sql .= " order by category_id asc";
    $listCategories = pdo_query($sql);
    return $listCategories;
}
function loadone_category($category_id)
{
    if ($category_id > 0) {
        $sql = "select * from category where category_id=" . $category_id;
        $category = pdo_query_one($sql);
        return $category;
    } else {
        return "";
    }
}
function count_category()
{
    $sql = "SELECT category.category_id ,  COUNT(product_id) AS soLuongSanPham
    FROM category
    LEFT JOIN product ON category.category_id = product.category_id
    GROUP BY category.category_id;";

    $count_category_id = pdo_query($sql);
    return $count_category_id;
}

function insert_category($category_name, $category_image)
{
    $sql = "INSERT INTO `category`(`category_name` , `category_img`) VALUES ('$category_name' , '$category_image');";
    pdo_execute($sql);
}

function update_category($category_id, $category_name, $category_image)
{
    if ($category_image) {
        $sql = "UPDATE `category` SET`category_name` = '{$category_name}', `category_img` = '{$category_image}'  WHERE `category`.`category_id` = $category_id";
    }else {
        $sql = "UPDATE `category` SET`category_name` = '{$category_name}'  WHERE `category`.`category_id` = $category_id";
    }
    pdo_execute($sql);
}
// Câu truy vấn xóa cứng
function hard_delete_category($id)
{
    $sql = "DELETE FROM category WHERE category_id=" . $id;
    pdo_execute($sql);
}
