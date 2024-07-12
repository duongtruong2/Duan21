<?php
function loadall_category()
{
    $sql="SELECT * FROM `categories` ";
    $list_category=pdo_query($sql);
    return $list_category;
}
function loadone_category($category_id)
{
    $sql= "SELECT * FROM `categories` WHERE category_id=$category_id";
    $list_category=pdo_query_one($sql);
    return $list_category;
}
function insert_category($category_name)
{
    $sql= "INSERT INTO categories(category_name) VALUES('$category_name')";
    pdo_execute($sql);
}
function update_category($category_id,$category_name)
{
    $sql= "UPDATE `categories` SET `category_name` = '$category_name' WHERE `categories`.`category_id` = $category_id";
    pdo_execute($sql);
}
function delete_category($category_id){
    $sql= " DELETE FROM categories WHERE `categories`.`category_id` = $category_id ";
    pdo_execute($sql);
}
function load_page_category($keyword,$start,$limit)
{
    $sql= "SELECT * FROM  categories WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND category_name LIKE '%$keyword%'";
    }
    $sql.= " order by categories.category_id desc limit $start,$limit";
    $pro=pdo_query($sql);
    return $pro;
}
function count_category(){
    $sql= "SELECT * FROM categories";
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}

function change_category($id){
    $sql = "UPDATE products SET category_id = 1 WHERE category_id = $id";
    pdo_execute($sql);
}
?>