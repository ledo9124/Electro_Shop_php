<?php
function loadall_comment($product_id=0 , $user_name='')
{
    $sql = "
        SELECT comment.comment_id , comment.product_id , comment.comment_content, client.user_name , comment.comment_rating , comment.comment_date
        FROM comment
        INNER JOIN client ON comment.client_id = client.client_id
        INNER JOIN product ON comment.product_id = product.product_id
        WHERE 1
        ";

    if ($product_id > 0 ) {
        $sql .= ' and comment.product_id ='. $product_id;
    }

    if ($user_name) {
        $sql .= " and client.user_name like '%" . $user_name . "%'";
    }

    $sql .= " ORDER BY comment.comment_date DESC";
    
    $result = pdo_query($sql);
    return $result ? $result : null;
}
function insert_comment($idpro, $noidung)
{
    $date = date('Y-m-d');
    $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','2','$idpro','$date');
        ";
    //echo $sql;
    //die;
    pdo_execute($sql);
}

?>