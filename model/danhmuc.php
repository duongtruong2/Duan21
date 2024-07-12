<?php
function loadall_danhmuc(){
    $sql = "SELECT c.category_id, c.category_name, COUNT(p.product_id) as product_count 
    FROM categories c 
    LEFT JOIN products p ON c.category_id = p.category_id 
    WHERE c.category_id <> 1
    GROUP BY c.category_id, c.category_name";
    $result = pdo_query($sql);
    return $result;
}

?>