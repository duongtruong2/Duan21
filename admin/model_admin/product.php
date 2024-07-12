<?php
function loadall_product()
{
 $sql="SELECT * FROM `products` ";
 $list_product=pdo_query($sql);
 return $list_product;
}
function loadone_product($product_id)
{
    $sql= "SELECT * FROM `products` WHERE product_id=$product_id";
    $list_product=pdo_query_one($sql);
    return $list_product;
}
function count_product_delete()
{
    $sql= "SELECT * FROM products WHERE status =0 ";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_delete_product($keyword,$category_id,$price,$start,$limit)
{
    $sql= "SELECT * FROM  products  WHERE status=0 ";
    if($keyword!=""){
        $sql.= " AND product_name LIKE '%$keyword%'";
    }
    if($category_id>0){
        $sql.=" AND category_id ='".$category_id."'";
    }
    if($price!=""){
        $sql.= " AND product_price LIKE'%$price%'";
    }
    $sql.= " order by products.product_id asc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function khoiphuc($product_id){
    $sql= "UPDATE `products` SET `status` = '1' WHERE `products`.`product_id` = $product_id ";
    pdo_execute($sql);
}
function insert_product($category_id,$product_name, $product_price, $discounted_price, $product_describe, $product_status)
{
    $sql= "INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discounted_price`, `product_describe`, `category_id`, `status`) VALUES (NULL, '{$product_name}', '{$product_price}', '{$discounted_price}', '{$product_describe}', '{$category_id}', '{$product_status}')";
    return pdo_execute($sql);
}

function update_image($imgae_id,$product_id,$file_name){
    if($file_name== ""){
        $sql ="UPDATE `products_image` SET `product_id` = '{$product_id}' WHERE `products_image`.`image_id` = {$imgae_id}";
    }
    else{
    $sql ="UPDATE `products_image` SET `product_id` = '{$product_id}', `image_name` = '{$file_name}' WHERE `products_image`.`image_id` = {$imgae_id}";
    }
    return pdo_execute($sql);
}
function update_product($product_id,$category_id,$product_name,$product_price,$discounted_price,$product_describe,$product_status)
{   
    $sql= "UPDATE products SET product_name = '$product_name', product_price = '$product_price',
            discounted_price = '$discounted_price', product_describe = '$product_describe',
            category_id = '$category_id',
            status = '$product_status' WHERE products.product_id = $product_id";
    pdo_execute($sql);
}
function delete_product($product_id)
{
    $sql= "UPDATE `products` SET `status` = '0' WHERE `products`.`product_id` = $product_id ";
    pdo_execute($sql);
}
function count_product($keyword,$category_id,$price)
{
    $sql= "SELECT * FROM products WHERE status=1   ";
    if($keyword!=""){
        $sql.= " AND product_name LIKE '%$keyword%'";
    }
    if($category_id>0){
        $sql.=" AND category_id ='".$category_id."'";
    }
    if($price!=""){
        $sql.= " AND product_price LIKE'%$price%'";
    }
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_product($keyword,$category_id,$price,$start,$limit)
{
    $sql= "SELECT * FROM  products  WHERE status=1 ";
    if($keyword!=""){
        $sql.= " AND product_name LIKE '%$keyword%'";
    }
    if($category_id>0){
        $sql.=" AND category_id ='".$category_id."'";
    }
    if($price!=""){
        $sql.= " AND product_price LIKE'%$price%'";
    }
    $sql.= " order by products.product_id desc limit $start,$limit ";
    $pro=pdo_query($sql);
    return $pro;
}
function load_product_detai($product_id)
{
    $sql="SELECT * FROM products_detail WHERE product_id=$product_id ";
    $product_detail=pdo_query($sql);
    return $product_detail;
}
function load_detail_id($product_detail_id){
    $sql="SELECT * FROM products_detail WHERE product_detail_id=$product_detail_id";
    $product_detail_id=pdo_query_one($sql);
    return $product_detail_id;
}
function update_detail($product_size,$product_quantity,$product_detail_id){
    $sql="UPDATE `products_detail` SET `product_quantity` = '$product_quantity', 
    `product_size` = '$product_size' WHERE `products_detail`.`product_detail_id` = $product_detail_id";
    pdo_execute($sql);
}
// thêm size và số lượng khi thêm sản phẩm
function insert_detail($product_size,$product_quantity,$product_id_new)
{
    $sql= "INSERT INTO `products_detail` (`product_size`, `product_quantity`,`product_id`) VALUES ('$product_size', '$product_quantity','$product_id_new')";
    pdo_execute($sql);
}
// thêm size và số lượng khi đã có sản phẩm
function add_detail($product_id,$product_size,$product_quantity)
{
    $sql= "INSERT INTO `products_detail` (`product_id`, `product_quantity`, `product_size`) VALUES ( '$product_id', '$product_quantity', '$product_size')";
    pdo_execute($sql);
}
function load_image($product_id){
    $sql = "SELECT * FROM `products_image` WHERE product_id=$product_id";
    $list_image=pdo_query_one($sql);
    return $list_image;
}
function loadall_image($product_id){
    $sql = "SELECT * FROM `products_image` WHERE product_id=$product_id";
    $list_image=pdo_query($sql);
    return $list_image;
}

function add_variant($id,$size,$quantity){
    $sql = "INSERT INTO products_detail (product_id, product_size, product_quantity) VALUES ($id,$size,$quantity)";
    pdo_execute($sql);
}

function insert_image($product_id,$image_name){
    $sql="INSERT INTO `products_image` ( `product_id`, `image_name`) VALUES ( '$product_id', '$image_name')";
    pdo_execute($sql);
}
function product_day($date){
    $sql="SELECT * FROM products 
    WHERE `products`.`date_add` LIKE '%$date%'";
    $product_day=pdo_query($sql);
    return $product_day;
}
function delete_image($image_id)
{
    $sql="DELETE FROM products_image WHERE `products_image`.`image_id` = '$image_id'";
    pdo_execute($sql);
}
?>