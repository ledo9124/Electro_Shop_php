<?php
function loadall_comment($product_id=0 , $user_name='' , $comment_id=0 , $client_id = 0)
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
    if ($client_id > 0 ) {
        $sql .= ' and comment.client_id ='. $client_id;
    }
    if ($comment_id > 0 ) {
        $sql .= ' and comment.comment_id ='. $comment_id;
    }

    if ($user_name != '') {
        $sql .= " and client.user_name like '%" . $user_name . "%'";
    }

    $sql .= " ORDER BY comment.comment_date DESC";
    
    $result = pdo_query($sql);
    return $result ? $result : null;
}
function insert_comment($comment_content, $product_id , $client_id , $comment_rating)
{
    $comment_date = date('F d, Y');
    $sql = "
            INSERT INTO `comment`(`comment_content`, `product_id`, `client_id`, `comment_date` , `comment_rating`) 
            VALUES ('$comment_content','$product_id','$client_id','$comment_date','$comment_rating');
        ";
    pdo_execute($sql);
}

function hard_delete_comment($comment_id=0 , $client_id=0 , $product_id= 0)
{
    $sql = "DELETE FROM comment WHERE 1";

    if ($comment_id > 0 ) {
        $sql .= ' and comment.comment_id ='. $comment_id;
    }
    
    if ($product_id > 0 ) {
        $sql .= ' and comment.product_id ='. $product_id;
    }

    if ($client_id > 0 ) {
        $sql .= ' and comment.client_id ='. $client_id;
    }

    pdo_execute($sql);
}

?>