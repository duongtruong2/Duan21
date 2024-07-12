<?php
function get_record($start, $num_per_page, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE sp.status = 1 AND $where";
    }else{
        $where = "WHERE sp.status = 1 ";
    }
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name 
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id $where 
    GROUP BY sp.product_id LIMIT $start,$num_per_page ";
    $list_record = pdo_query($sql);
    return $list_record;
}

function get_num_pro($iddm = "", $search_info = "")
{
    $where = "";
    if ($search_info != "") {
        $where = "WHERE `product_name` like '%$search_info%'";
    }

    if ($iddm != "") {
        $where = "WHERE `category_id` in ($iddm)";
    }

    $result = pdo_query_one("SELECT count(*) as sl FROM `products` $where");
    return $result['sl'];
}

function get_filter($brand = "", $price = [])
{
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name 
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id WHERE sp.status = 1 AND ";

    // Thêm điều kiện về danh mục ( nếu có )
    if (!empty($brand)) {
        $brands = implode("','", explode(",", $brand)); // Chuyển chuỗi thành mảng và nối lại với dấu '
        $sql .= "category_id IN ('$brands') AND ";
    }

    // Thêm điều kiện về giá nếu có
    if (!empty($price)) {
        $priceConditions = [];

        foreach ($price as $value) {
            switch ($value) {
                case 1:
                    $priceConditions[] = "product_price < 1000000";
                    break;
                case 2:
                    $priceConditions[] = "product_price BETWEEN 1000000 AND 2000000";
                    break;
                case 3:
                    $priceConditions[] = "product_price BETWEEN 2000000 AND 3000000";
                    break;
                case 4:
                    $priceConditions[] = "product_price > 3000000";
                    break;
            }
        }

        $sql .= "(" . implode(" OR ", $priceConditions) . ") AND ";
    }

    // Loại bỏ "AND" cuối cùng nếu có
    $sql = rtrim($sql, "AND ");

    $sql = rtrim($sql, "WHERE ");

    $sql .= " GROUP BY sp.product_id ";

    if (!empty($brand) || !empty($price)) {
        $sql .= " ORDER BY sp.product_price";
    }

    return pdo_query($sql);
}

function get_product_detail($id)
{
    $sql = "SELECT products.*, categories.category_name ,GROUP_CONCAT(products_image.image_name) AS anh FROM `products` 
    JOIN products_image on products.product_id = products_image.product_id 
    JOIN categories on products.category_id = categories.category_id
    WHERE products.product_id = $id  
    GROUP BY products.product_id";

    return pdo_query_one($sql);
}

function get_product_price($id){
    $sql = "SELECT p.product_price FROM `products_detail` pd JOIN products p ON pd.product_id = p.product_id WHERE pd.product_detail_id = $id";
    $result = pdo_query_one($sql);
    return $result['product_price'];
}

function get_related_product($iddm, $idsp)
{
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name, ROUND(AVG(evaluation.number_stars), 0) AS rating
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id
    LEFT JOIN evaluation ON sp.product_id = evaluation.product_id
    WHERE sp.category_id = $iddm and sp.product_id <> $idsp 
    GROUP BY sp.product_id";

    return pdo_query($sql);
}

function get_product_sizes($id)
{
    $sql = "SELECT products_detail.product_id,GROUP_CONCAT(CONCAT(products_detail.product_detail_id, ':',products_detail.product_size, ':', products_detail.product_quantity) SEPARATOR ', ') AS sizes_and_quantities
    FROM products 
    JOIN products_detail ON products.product_id = products_detail.product_id 
    WHERE products.product_id = $id and products_detail.product_quantity > 0 
    GROUP BY products.product_id";

    return pdo_query_one($sql);
}

function add_review($idsp, $rating, $review, $user)
{
    $sql = "INSERT INTO evaluation(content,number_stars,product_id,user_id) values ('$review',$rating,$idsp,$user)";

    pdo_execute($sql);
}

function get_review($id)
{
    $sql = "SELECT rv.*, user.username 
FROM 
    evaluation rv
JOIN 
    user ON user.user_id = rv.user_id 
WHERE 
    rv.product_id = $id GROUP BY rv.evaluation_id;";

    return pdo_query($sql);
}

function get_total_review($id)
{
    $sql = "SELECT evaluation.product_id ,COUNT(DISTINCT evaluation.evaluation_id) AS total_reviews,ROUND((SELECT AVG(number_stars) FROM `evaluation` WHERE product_id = $id), 0) AS average_rating 
    FROM `evaluation` WHERE product_id = $id GROUP BY evaluation.product_id";

    return pdo_query_one($sql);
}

function get_selling_products()
{
    $sql = "SELECT 
    sp.*,
    MIN(img.image_name) AS img_name,
    ROUND(AVG(evaluation.number_stars), 0) AS rating
FROM 
    (
       SELECT 
    sp.product_id,
    COALESCE(SUM(od.quantity), 0) AS total_sold
FROM 
    products sp JOIN 
    products_detail pd ON pd.product_id = sp.product_id JOIN 
    order_detail od ON od.product_detail_id = pd.product_detail_id JOIN 
    `order` o ON od.order_id = o.order_id AND (o.status = 'delivered' OR o.status IS NULL)
GROUP BY 
    sp.product_id order BY total_sold DESC LIMIT 0,8 
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

function get_feature_products()
{
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name, ROUND(AVG(evaluation.number_stars), 0) AS rating
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id
    LEFT JOIN evaluation ON sp.product_id = evaluation.product_id 
    WHERE sp.highlight = 1 AND sp.status = 1 
    GROUP BY sp.product_id";
    return pdo_query($sql);
}

function get_new_product()
{
    $sql = "SELECT sp.*, MIN(img.image_name) AS img_name, ROUND(AVG(evaluation.number_stars), 0) AS rating
    FROM products sp JOIN products_image img ON img.product_id = sp.product_id
    LEFT JOIN evaluation ON sp.product_id = evaluation.product_id 
    WHERE sp.status = 1
    GROUP BY sp.product_id  
    ORDER BY sp.date_add DESC LIMIT 0,8";
    return pdo_query($sql);
}

function check_buy($id,$product_id){
    $sql = "SELECT 1 AS kq 
    FROM 
        `order` o
    JOIN `user` u ON u.user_id = o.user_id
    JOIN order_detail od ON o.order_id = od.order_id  -- Sửa đường liên kết tại đây
    JOIN products_detail pd ON od.product_detail_id = pd.product_detail_id
    JOIN products p ON p.product_id = pd.product_id 
    WHERE o.user_id = $id AND o.status = 'delivered' AND p.product_id = $product_id;";
    $result = pdo_query_one($sql);

    if(!empty($result)){
        return 1;
    }else{
        return 0;
    }
}
