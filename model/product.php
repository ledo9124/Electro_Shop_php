<?php
function loadall_product_shop(){
    $sql="select * from product where 1 order by product_id desc";
    $listproduct=pdo_query($sql);
    return  $listproduct;
}
function loadall_product_top($quantity){
    $sql="select * from product where 1 order by product_view desc limit 0,".$quantity;
    $listproduct=pdo_query($sql);
    return $listproduct;
}
function loadall_product_new($quantity){
    $sql="select * from product where 1 order by product_id desc limit 0,".$quantity;
    $listproduct=pdo_query($sql);
    return $listproduct;
}
function loadall_product($iddm=0){
    $sql="select * from product where 1";
    // where 1 tức là nó đúng

    if($iddm>0){
        $sql.=" and category_id ='".$iddm."'";
    }
    $sql.=" order by product_id desc";
    $listproduct=pdo_query($sql);
    return  $listproduct;
}

// 
function loadone_product($product_id){
    $sql = "select * from product where product_id = $product_id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_product_related($product_id, $category_id){
    $sql = "select * from product where category_id = $category_id and product_id <> $product_id limit 0,4";
    $result = pdo_query($sql);
    return $result;
}