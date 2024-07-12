<?php
function get_user_cart($id){
    $sql = "SELECT cart_id FROM cart where user_id = $id";
    $result = pdo_query_one($sql);
    
    if($result){
        return $result['cart_id'];
    }else{
        return "";
    }
}

function create_cart($id){
    $sql = "INSERT INTO cart(user_id) VALUES($id)";
    pdo_execute($sql);
}

function get_cart($cart_id){
    $sql = "SELECT cd.cart_detail_id,sp.product_id,sp.product_name,sp.product_price,sp.discounted_price, MIN(img.image_name) AS img_name, cd.product_quantity, cd.product_detail_id, cd.cart_id, cd.product_size, cd.total, prod.product_quantity as stock 
    FROM cart c 
    JOIN cart_detail cd ON cd.cart_id = c.cart_id
    JOIN products_detail prod ON cd.product_detail_id = prod.product_detail_id
    JOIN products sp ON prod.product_id = sp.product_id
    JOIN products_image img ON img.product_id = sp.product_id
    WHERE c.cart_id = $cart_id GROUP BY cd.cart_detail_id";

    return pdo_query($sql);
}

function get_total_cart($cart_id){
    $sql = "SELECT SUM(total) AS tongtien, COUNT(total) as soluong FROM cart_detail WHERE cart_id = $cart_id GROUP BY cart_detail.cart_id";

    $result = pdo_query_one($sql);

    if($result){
        return $result;
    }else{
        return "";
    }
}

function check_exist($cart_id,$product_detail_id){
    $sql = "SELECT 1 FROM cart_detail WHERE cart_id = $cart_id AND product_detail_id = $product_detail_id";
    $result = pdo_query_one($sql);

    if($result){
        return 1;
    }else{
        return 0;
    }
}

function update_quantity($cart_id,$product_detail_id,$quantity,$total){
    $sql =  "UPDATE cart_detail SET product_quantity = product_quantity + $quantity, total = total + $total WHERE cart_id = $cart_id AND product_detail_id = $product_detail_id";
    pdo_execute($sql);
}

function add_to_cart($cart_id,$product_detail_id,$quantity,$total,$size){
    $sql = "INSERT INTO cart_detail (cart_id, product_detail_id, product_quantity,total,product_size) VALUES ($cart_id, $product_detail_id, $quantity,$total,$size)";
    pdo_execute($sql);
}

function delete_cart($id){
    $sql = "DELETE FROM cart_detail WHERE cart_detail_id = $id";
    pdo_execute($sql);
}

function update_total($user_cart,$id,$sub_total,$qty){
    $sql = "UPDATE cart_detail SET product_quantity = $qty, total = $sub_total where cart_id = $user_cart and product_detail_id = $id";

    pdo_execute($sql);
}
?>