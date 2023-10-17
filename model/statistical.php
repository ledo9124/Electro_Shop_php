<?php 

function load_statistical_category_product($category_name = '') {
    $sql = "SELECT category.category_id , category_name , count(*) as 'quantity', min(product_price) as 'smallest_price',
            max(product_price) as 'biggest_price' , avg(product_price) as 'average_price'
            FROM category INNER JOIN product ON category.category_id = product.category_id WHERE 1";
    
    if ($category_name != '') {
        $sql .= " and category_name like '%". $category_name ."%'";
    }

    $sql .= " GROUP BY category.category_id , category_name ORDER BY quantity DESC";

    $result = pdo_query($sql);

    return $result;
}

?>