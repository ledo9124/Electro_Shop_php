<?php
function loadall_comment($product_id)
{
    $sql = "
        SELECT comment.comment_content, client.user_name , comment.comment_rating , comment.comment_date
        FROM comment
        INNER JOIN client ON comment.client_id = client.client_id
        INNER JOIN product ON comment.product_id = product.product_id
        WHERE comment.product_id = $product_id
        ";
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