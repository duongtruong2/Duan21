<?php 
function loadall_account()
{
    $sql="SELECT * FROM `user`" ;
    $list_account=pdo_query($sql);
    return $list_account;
}
function loadone_account($user_id)
{
    $sql= "SELECT * FROM `user` WHERE user_id = $user_id";
    $list_account=pdo_query_one($sql);
    return $list_account;
}
function delete_account($user_id)
{
    $sql= "DELETE FROM user WHERE `user`.`user_id`=$user_id";
    pdo_execute($sql);
}
function count_account($keyword,$role)
{
    $sql= "SELECT * FROM `user` WHERE 1 " ;
    if($keyword!=""){
        $sql.= " AND tel LIKE '%$keyword%'";
    }
    if($role!=""){
        $sql.="AND role LIKE '%$role%'";
    }
    $pro=pdo_query($sql);
    $i=0;
    foreach($pro as $row){
        $i++;
    }
    $number=ceil($i/10);
    return $number;
}
function load_page_account($keyword,$role,$start,$limit)
{
    $sql= "SELECT * FROM  user WHERE 1 ";
    if($keyword!=""){
        $sql.= " AND tel LIKE '%$keyword%'";
    }
    if($role!=""){
        $sql.="AND role LIKE '%$role%'";
    }
    $sql.= " order by user.user_id desc limit $start,$limit";
    $pro=pdo_query($sql);
    return $pro;
}
function update_account( $username, $fullname, $email,$tel, $address,$role, $file_name,$user_id)
{
    if($file_name ==""){
        $sql="UPDATE `user` SET `username` = '$username',
        `fullname` = '$fullname', `email` = '$email',
        `tel` = '$tel', `address` = '$address', 
        `role` = '$role' WHERE `user`.`user_id` = $user_id";
    }
    else{
        $sql="UPDATE `user` SET `username` = '$username',
         `fullname` = '$fullname', `email` = '$email',
         `tel` = '$tel', `address` = '$address', 
         `avatar` = '$file_name', `role` = '$role' WHERE `user`.`user_id` = $user_id";
    }
    pdo_execute($sql);
}
function checkuser($username,$password)
{
    $sql= "SELECT * FROM user WHERE username = '$username' AND password = '$password'";;
    // login user chỉ theo thông tin uesr or name k kèm theo pass 
    //
    return pdo_query_one($sql);
}
function insert_account($username,$password,$fullname,$email,$tel,$address,$file_name,$role){
    $sql="INSERT INTO `user` ( `username`, `fullname`, `email`, `password`, `tel`, `address`, `avatar`, `role`) 
    VALUES ('$username', '$fullname', '$email', '$password', '$tel', '$address', '$file_name', '$role')";
    pdo_execute($sql);
}

function get_user($id){
    $sql = "select * from user where user_id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
?>