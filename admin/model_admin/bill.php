<?php
function count_bill()
{
    $sql= "SELECT * FROM `bill` ";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_bill($keyword,$start,$limit)
{
    $sql= "SELECT * FROM  `bill`  WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND bill_id LIKE '%$keyword%'";
    }
    $sql.= " order by `bill`.`bill_id` desc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function Loadone_bill($bill_id)
{
    $sql="SELECT * FROM `BILL`
    INNER JOIN `ORDER` ON `BILL`.`ORDER_ID`= `ORDER`.`ORDER_ID`
    -- INNER JOIN `ORDER_DETAIL` ON `ORDER_DETAIL`.`ORDER_ID`=`ORDER`.`ORDER_ID`
    -- INNER JOIN `PRODUCTS_DETAIL` ON `ORDER_DETAIL`.`PRODUCT_DETAIL_ID`=`PRODUCTS_DETAIL`.`PRODUCT_DETAIL_ID`
    -- INNER JOIN  `PRODUCTS`ON `PRODUCTS_DETAIL`.`PRODUCT_ID`=`PRODUCTS`.`PRODUCT_ID`
    WHERE `BILL`.`BILL_ID`= $bill_id";
    $loadone_bill=pdo_query_one($sql);
    return $loadone_bill;
}
function load_product_bill($order_id){
    $sql="SELECT * FROM `order_detail`
    INNER JOIN `products_detail` ON `order_detail`.`product_detail_id`=`products_detail`.`product_detail_id`
    INNER JOIN `products` ON `products_detail`.`product_id` = `products`.`product_id` 
    WHERE `order_detail`.`order_id`='$order_id'
    order by `products`.`product_id` asc";
    $list_product=pdo_query($sql);
    return $list_product;
}
?>