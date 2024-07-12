<?php
function category_count()
{
    $sql="SELECT COUNT(product_id) FROM products WHERE product_id > 0";
    $category_count=pdo_query_one($sql);
    return $category_count;
}
function loadall_thongke(){
    $sql = "SELECT CATEGORIES.CATEGORY_ID AS CATEGORY_ID, CATEGORIES.CATEGORY_NAME AS CATEGORY_NAME, COUNT(PRODUCTS.PRODUCT_ID) AS COUNTPRODUCT, MIN(PRODUCTS.PRODUCT_PRICE) AS MINPRICE, MAX(PRODUCTS.PRODUCT_PRICE) AS MAXPRICE, AVG(PRODUCTS.PRODUCT_PRICE) AS AVGPRICE FROM PRODUCTS LEFT JOIN CATEGORIES ON PRODUCTS.CATEGORY_ID = CATEGORIES.CATEGORY_ID GROUP BY CATEGORIES.CATEGORY_ID ORDER BY CATEGORIES.CATEGORY_ID DESC  ";
    $listtk=pdo_query($sql);
    return $listtk;
}

function all_doanhthu()
{
    $sql="SELECT SUM(`total`) AS `total` FROM `order` WHERE `status`='delivered' order by total " ;
    $all_doanhthu=pdo_query_one($sql);
    return $all_doanhthu;
}
function month_doanhthu($month, $years)
{
    // $month=date('m');
    // $years=date('Y');
    // $sql="SELECT DATE(`date_add`) AS `ngay` , SUM(`total`) AS `total_month`  FROM `order` 
    // WHERE MONTH(`created_at`)='$month' AND YEAR(`created_at`) = '$years' AND `status` = 'delivered' 
    // GROUP BY ngay ";
    // $moth_total=pdo_query($sql);
    // return $moth_total;

    $sql="SELECT  SUM(`total`) AS `total_month`  FROM `order` WHERE 1";
    if($month=="" && $years==""){
       $month=date('m');
        $years=date('Y');
        $sql.=" AND MONTH(`created_at`)='$month' AND YEAR(`created_at`) = '$years' AND `status` = 'delivered' ";
    }
    if($month!="" && $years==""){
        $years=date('Y');
        $sql.=" AND MONTH(`created_at`)='$month' AND YEAR(`created_at`) = '$years' AND `status` = 'delivered' ";
    }
    if($month=="" && $years!=""){
        $month=date('m');
        $sql.=" AND MONTH(`created_at`)='$month' AND YEAR(`created_at`) = '$years' AND `status` = 'delivered' ";
    }
    if($month!="" &&  $years!=""){
        $sql.=" AND MONTH(`created_at`)='$month' AND YEAR(`created_at`) = '$years' AND `status` = 'delivered' ";
    }
    $moth_total=pdo_query($sql);
    return $moth_total;
}

function get_selling_products()
{
    $sql = "SELECT 
    sp.*,
    MIN(img.image_name) AS img_name,
    ROUND(AVG(evaluation.number_stars), 0) AS rating,
    total_sold, total_revenue
FROM 
    (
        SELECT 
    sp.product_id,
    COALESCE(SUM(od.quantity), 0) AS total_sold,
    COALESCE(SUM(od.quantity * od.price), 0) AS total_revenue
FROM 
    products sp 
    JOIN products_detail pd ON pd.product_id = sp.product_id 
    JOIN order_detail od ON od.product_detail_id = pd.product_detail_id 
    LEFT JOIN `order` o ON od.order_id = o.order_id
    WHERE o.status = 'delivered'
GROUP BY 
    sp.product_id 
ORDER BY 
    total_sold DESC 
LIMIT 0, 5
    ) sold_products
JOIN 
    products sp ON sold_products.product_id = sp.product_id
JOIN 
    products_image img ON img.product_id = sp.product_id
LEFT JOIN 
    evaluation ON sp.product_id = evaluation.product_id WHERE sp.status = 1  
GROUP BY 
    sp.product_id order BY total_sold desc;";

    return pdo_query($sql);
}

function get_revenue(){
    $sql = "SELECT sum(total) as total_revenue FROM `order` WHERE `status` = 'delivered';";
    $result = pdo_query_one($sql);
    return $result['total_revenue'];
}

// function get_order_status($status){
//     $sql = "SELECT 
//     status,
//     COUNT(*) AS total_count
// FROM 
//     `order`
//     WHERE `status` = '$status' 
// GROUP BY 
//     status;
// ";
//     $result = pdo_query_one($sql);
//     // return $result;
//     return $result['total_count'];
// }

function get_pending_status(){
    $sql = "SELECT 
    SUM(CASE WHEN `status` = 'pending' OR `status` = 'processing' THEN 1 ELSE 0 END) AS total_pending
FROM 
    `order`;";
    $result = pdo_query_one($sql);
    return $result['total_pending'];
}


?>
