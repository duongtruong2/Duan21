<h1>THÊM TÀI KHOẢN</h1>
<div class="content">
    <div class="content_item">
        <form action="index.php?act=add_account" method="post"enctype="multipart/form-data">
        
            <h5>Tên Đăng Nhập</h5> 
            <input class="form-control" type="text" placeholder="username" aria-label="default input example"  name="username"  value="<?php if(isset($username)){echo $username ;}?>">
            <div class="warring"> <p><?php if(isset($warring['username'])){echo $warring['username'];}?></p></div>
           
            <h5>Password</h5> 
            <input class="form-control" type="text" placeholder="password" aria-label="default input example"  name="password"  value="<?php if(isset($password)){echo $password;}?>">
            <div class="warring"> <p><?php if(isset($warring['password'])){echo $warring['password'];}?></p></div>
        
            <h5>Họ và Tên</h5> 
            <input class="form-control" type="text" placeholder="fullname" aria-label="default input example"  name="fullname"  value="<?php if(isset($fullname)){echo $fullname ;}?>">
            <div class="warring"><p><?php if(isset($warring['fullname'])){echo $warring['fullname'];}?></p></div>
        
            <h5>Email</h5> 
            <input class="form-control" type="text" placeholder="email" aria-label="default input example"  name="email"  value="<?php if(isset($email)){echo $email ;}?>">
            <div class="warring"> <p><?php if(isset($warring['email'])){echo $warring['email'];}?></p></div>

            <h5>Số Diện Thoại</h5> 
            <input class="form-control" type="text" placeholder="tel" aria-label="default input example"  name="tel"  value="<?php if(isset($tel)){echo $tel;}?>">
            <div class="warring"> <p><?php if(isset($warring['tel'])){echo $warring['tel'];}?></p></div>
    </div>

    <div class="content_item">
            
            

            <h5>Địa Chỉ</h5> 
            <input class="form-control" type="text" placeholder="address" aria-label="default input example"  name="address"  value="<?php if(isset($address)){echo $address;}?>">
            <div class="warring"> <p><?php if(isset($warring['address'])){echo $warring['address'];}?></p></div>

            <div class="mb-3">
                <h5>Ảnh </h5> 
                <input class="form-control" type="file" id="formFileMultiple"  name="avatar" value="<?php if(isset($file_name)){echo $file_name;}?>">
            </div>
            <div class="warring"><p><?php if(isset($warring['avatar'])){echo $warring['avatar'];}?> </p></div>

            <h5>Quyền</h5> 
            <select class="form-select" aria-label="Default select example" name="role">
                <option value="admin" selected>Admin</option>
                <option value="customer">Customer</option>
            </select> <br>
        <button type="submit" class="btn btn-primary" name="btn_add">THÊM</button>
        <button type="button" class="btn btn-primary" ><a href="index.php?act=list_account">Danh Sách Tài Khoản</a></button>
    </div>
        
</div>
<div class="warring" style="color:red;">
   <h1> <?php 
        if(isset($warring['all'])){
            echo $warring['all'];
        }
        ?>
        </h1>
    </div>
    </form>
<style>
    .content{
        width: 100%;
        display: flex;
    }
    .content_item{
        width: 45%;
        margin: 20px;
    }
    a{
        color:#fff;
    }
</style>
