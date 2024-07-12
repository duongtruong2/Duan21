<?php
function loadall_order()
{
    $sql="SELECT * FROM `order`";
    $list_order=pdo_query($sql);
    return $list_order;
}
function count_order($keyword,$search_code,$status_order)
{
    $sql= "SELECT * FROM `order` WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND tel LIKE '%$keyword%' AND `tel`='$keyword' ";
    }
    if($search_code!=""){
        $sql.= " AND order_id LIKE '%$search_code%'";
    }
    if($status_order!=""){
        $sql.= " AND status LIKE '%$status_order%'  AND `status`='$status_order' ";
    }
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_order($keyword,$search_code,$status_order,$start,$limit)
{
    $sql= "SELECT * FROM  `order`  WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND tel LIKE '%$keyword%' AND `tel`='$keyword' ";
    }
    if($search_code!=""){
        $sql.= " AND order_id LIKE '%$search_code%'";
    }
    if($status_order!=""){
        $sql.= " AND status LIKE '%$status_order%'  AND `status`='$status_order' ";
    }
    $sql.= " order by `order`.`created_at` desc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function load_page_order_today($keyword,$start,$limit,$date)
{
    $sql= "SELECT * FROM  `order`  WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND tel LIKE '%$keyword%'";
    }
    $sql.= " AND `created_at` LIKE '%$date%' order by `order`.`order_id` desc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function loadone_order($order_id)
{
    $sql="SELECT * FROM `order` 
    WHERE `order`.`order_id`='$order_id'";
    $list_order=pdo_query_one($sql);
    return $list_order;
}
function load_product($order_id){
    $sql="SELECT 
    order_detail.*, 
    MIN(pi.image_name) AS image,
    products.*,
    products_detail.product_size,
    (order_detail.price * order_detail.quantity) as total 
FROM 
    `order_detail`
INNER JOIN 
    `products_detail` ON `order_detail`.`product_detail_id` = `products_detail`.`product_detail_id`
INNER JOIN 
    `products` ON `products_detail`.`product_id` = `products`.`product_id`
INNER JOIN
    `products_image` AS pi ON `products`.`product_id` = pi.`product_id`
WHERE 
    `order_detail`.`order_id` = '$order_id'
GROUP BY 
    order_detail.order_id, 
    order_detail.product_detail_id  -- Assuming there's a primary key or unique identifier for product_detail
ORDER BY 
    `products`.`product_id` ASC;";
  
    $list_product=pdo_query($sql);
    return $list_product;
}
function order_update($order_id,$status)
{
    if($status=="unpaid")
    {
        $status="pending";
        $sql="UPDATE `order` SET `status`='$status' WHERE `order`.`order_id`='$order_id'";
    }
    else if($status=="pending")
    {
    $status="processing";
    $sql="UPDATE `order` SET `status`='$status' WHERE `order`.`order_id`='$order_id'";
    }
    else if($status=="processing")
    {
        $status="shiped";
        $sql="UPDATE `order` SET `status`='$status' WHERE `order`.`order_id`='$order_id'";
    }
    else if($status=="shiped")
    {
        $status="delivered";
        $sql="UPDATE `order` SET `status`='$status' WHERE `order`.`order_id`='$order_id'";
    }
    pdo_execute($sql);
}
function canceled_order($order_id,$status)
{   
    $status='canceled';
    $sql="UPDATE `order` SET `status`='$status' WHERE `order`.`order_id`='$order_id' ";
    pdo_execute($sql);
}
?>