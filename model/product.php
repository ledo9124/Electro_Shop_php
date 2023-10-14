<?php
function loadall_product_shop()
{
    $sql = "select * from product where 1 order by product_id asc";
    $listproduct = pdo_query($sql);
    return $listproduct;
}
function loadall_product_top($quantity)
{
    $sql = "select * from product where 1 order by product_view asc limit 0," . $quantity;
    $listproduct = pdo_query($sql);
    return $listproduct;
}
function loadall_product_new($quantity)
{
    $sql = "select * from product where 1 order by product_id asc limit 0," . $quantity;
    $listproduct = pdo_query($sql);
    return $listproduct;
}
function loadall_product($iddm = 0, $name = '')
{
    $sql = "select * from product where 1";
    // where 1 tức là nó đúng
    if ($name != '') {
        $sql .= " and product_name like '%" . $name . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and category_id ='" . $iddm . "'";
    }
    $sql .= " order by product_id asc";
    $listproduct = pdo_query($sql);
    return $listproduct;
}

// 
function loadone_product($product_id)
{
    $sql = "select * from product where product_id = $product_id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_product_related($product_id, $category_id)
{
    $sql = "select * from product where category_id = $category_id and product_id <> $product_id limit 0,4";
    $result = pdo_query($sql);
    return $result;
}
function insert_product($product_name, $product_price, $product_image, $product_description, $category_id)
{
    $sql = "INSERT INTO `product`(`product_name` , `product_price`, `product_image`, `product_description`, `category_id`) VALUES ('$product_name' , '$product_price'  , '$product_image' , '$product_description', '$category_id');";

    pdo_execute($sql);
}

function update_product($id, $tensp, $giasp, $mota, $hinh, $iddm)
{
    if ($hinh != "") {
        $sql = "UPDATE `product` SET `product_name` = '{$tensp}', `product_price` = '{$giasp}', `product_description` = '{$mota}',`product_image` = '{$hinh}', `category_id` = '{$iddm}' WHERE `product`.`product_id` = $id";
    } else {
        $sql = "UPDATE `product` SET `product_name` = '{$tensp}', `product_price` = '{$giasp}', `product_description` = '{$mota}', `category_id` = '{$iddm}' WHERE `product`.`product_id` = $id";
    }
    pdo_execute($sql);
}

// Câu truy vấn xóa cứng
function hard_delete_product($id)
{
    $sql = "DELETE FROM product WHERE product_id=" . $id;
    pdo_execute($sql);
}

// cÂU TRUY VẤN XÓA MỀM
function soft_delete($id)
{
    $sql = "UPDATE `product` SET `product_status` = 1 WHERE `product`.`product_id` = $id";
    pdo_execute($sql);
}