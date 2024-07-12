<?php
    if(is_array($account)){
        extract($account);
    }
?>
<h1>THÔNG TIN TÀI KHOẢN</h1>
<div class="content">
    <form action="index.php?act=update_account" method="post" enctype="multipart/form-data">
        <div class="information">
            <div class="information_item">
                <img src="../upload/<?=$avatar?>" alt=""> <br>
                <input class="form-control" type="file"  name="avatar" ><?=$avatar?>
            </div>

            <div class="information_item">
                <h5>Tên đăng nhập</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="username"  value="<?=$username?>" readonly>

                <h5>Họ và tên</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="fullname"  value="<?=$fullname?>">

                <h5>Số điện thoại</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="tel"  value="<?=$tel?>">

                <h5>Địa Chỉ</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="address"  value="<?=$address?>">

                <h5>Email</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="email"  value="<?=$email?>">

                <h5>Trạng Thái</h5> 
                <select class="form-select" aria-label="Default select example" name="role">
                    <option value="admin" <?php if($role == "admin") echo "selected"?> >Admin</option>
                    <option value="customer" <?php if($role == "customer") echo "selected"?> >Customer</option>
                </select>  <br>
                <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                <input type="submit" class="btn btn-primary" name="btn_update"></button>
               
                
            </div>
        </div>

                
    </form>
</div>
<style>
.content{
        width: 100%;
}
.information{
    display:flex;
}
.information_item{
    width: 45%;
    margin: 10px;
}
.information_item img{
    border-radius:10px ;
    width: 390px;
    height: 490px;
}
</style>