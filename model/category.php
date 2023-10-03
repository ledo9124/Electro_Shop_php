<?php
function loadall_category()
{
    $sql = "select * from category order by category_id desc";
    $listCategories = pdo_query($sql);
    return $listCategories;
}
function load_category_name($category_id)
{
    if ($category_id > 0) {
        $sql = "select * from product where category_id=" . $category_id;
        $category = pdo_query_one($sql);
        extract($category);
        return $category_name;
    } else {
        return "";
    }
}

function load_category_img($category_id)
{
    if ($category_id > 0) {
        $sql = "select * from product where category_id=" . $category_id;
        $category = pdo_query_one($sql);
        extract($category);
        return $category_img;
    } else {
        return "";
    }
}

function count_category()
{
    $sql = "SELECT COUNT(product_id) AS soLuongSanPham
    FROM category
    LEFT JOIN product ON category.category_id = product.category_id
    GROUP BY category.category_id;";

    $count_category_id = pdo_query($sql);
    return $count_category_id;    
}