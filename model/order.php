<?php
function get_user_order($user_id){
    $sql = "SELECT
    o.order_id,
    o.created_at,
    o.status,
    COUNT(od.product_detail_id) AS total_items,
    o.total
FROM
    `order` o
JOIN
    order_detail od ON o.order_id = od.order_id
WHERE
    o.user_id = $user_id GROUP BY o.order_id order by o.created_at desc;";

return pdo_query($sql);
}

function get_order_items($order_id){
    $sql = "SELECT
    MIN(pi.image_name) AS image,
    p.product_id,
    p.product_name,
    pd.product_size,
    od.quantity,
    od.price,
    od.quantity * od.price AS subtotal
FROM order_detail od
JOIN
    products_detail pd ON od.product_detail_id = pd.product_detail_id
JOIN
    products p ON pd.product_id = p.product_id
JOIN
    products_image pi ON p.product_id = pi.product_id
    WHERE od.order_id = $order_id GROUP BY od.product_detail_id;";
    return pdo_query($sql);
}

function get_order_detail($order_id){
    $sql = "SELECT * FROM `order` WHERE order_id = $order_id";

    return pdo_query_one($sql);
}

function cancel_order($id){
    $sql = "UPDATE `order` SET status = 'canceled' WHERE order_id = $id";
    pdo_execute($sql);
}

function get_cancel_items($id){
    $sql = "SELECT od.product_detail_id, od.quantity FROM order_detail od WHERE od.order_id = $id";
    return pdo_query($sql);
}

function restore_quantity($id,$quantity){
    $sql = "UPDATE products_detail SET product_quantity = product_quantity + $quantity WHERE product_detail_id = $id";
    pdo_execute($sql);
}
?>