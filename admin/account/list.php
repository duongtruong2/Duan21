
<div class="col">
    <div class="filter">
    <div class="tel">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                    <div>Tìm Kiếm</div>
                    <div class="bi bi-chevron-down"></div>
                </div>
                <div class="collapse show mt-4" id="keywordsCollapseExample">
                    <form action="index.php?act=list_account" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="số điện thoại" name="search_account">
                            <input type="submit" name="keyword" value="search" class="keyword">
                            <!-- <button class="btn btn-outline-light" type="sumbit" name="keyword">
                                <i class="bi bi-search"></i>
                            </button> -->
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
    
    </div>
</div>



<div class="content ">
    <div class="col">
        <div class="row">
            <div class="col-md-8">
                <div class="filter-2">
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="d-none d-md-flex"><h2 style="margin-top:20px ;">All Accounts</h2></div>
</div>
    <div class="role">
           
                <div class="card">
                     <!-- <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button"> 
                         <div>Quyền</div> 
                         <div class="bi bi-chevron-down"></div> 
                    </div> -->
                    <div class="collapse show mt-4" id="categoriesCollapseExample">
                        <div class="d-flex flex-column gap-3">
                            <form action="index.php?act=list_account" method="post">
                                <div class="filter_role">
                                    <select name="account" id="" style="width:100px ; height: 30px ; border-radius: 10px;">
                                        <option value="Admin">Admin</option>
                                        <option value="Customer">Customer</option>
                                    </select>
                                <!-- <input class="forminput" type="radio" name="account" value="Admin">
                                <label class="formlabel" for="accountCheck1">Admin</label> <br>
                                <input class="forminput" type="radio" name="account" value="Customer">
                                <label class="formlabel" for="accountCheck1">Customer</label> <br> -->
                                </div>
                                <div class="filter_role_submit">
                                <input type="submit" name="filter_account" class="search" value="Lọc" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
    </div>
    
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-lg mb-0" id="products">
                        <thead>
                        <tr>
                            <!-- <th>
                                <input class="form-check-input select-all" type="checkbox"
                                    data-select-all-target="#products" id="defaultCheck1">
                            </th> -->
                            <th>ID</th>
                            <th>Photo</th>
                            <!-- <th>User</th> -->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tel</th>
                            <!-- <th>Address</th> -->
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($list_account as $user){
                            extract($user);
                            $edit_user="index.php?act=edit_account&user_id=".$user_id;
                            $delete_user="index.php?act=delete_account&user_id=".$user_id;
                            ?>
                            <tr>
                            <td>
                                <a href="#"><?=$user_id?></a>
                            </td>
                            <td>
                                <a href="<?=$edit_user?>">
                                    <img src="<?= "../upload/" . $avatar?>" class="rounded" width="40" alt="">
                                </a>
                            </td>
                            <!-- <td><?=$username?></td> -->
                            <td>
                                <span class="text-success"><?=$fullname?></span>
                            </td>
                            <td><?=$email?></td>
                            <td><?=$role?></td>
                            <td><?=$tel?></td>
                            <!-- <td><?=$address?></td> -->
                            <td class="text-end"><a href="<?=$edit_user?>"><button type="submit" >Sửa</button></a> 
                            <?php if($_SESSION['user_id'] != $user_id){ ?>
                            <a  onclick="return confirm('Bạn có chắc là muốn xóa ?')" href="<?=$delete_user?>"><button type="submit" >Xóa</button></a>
                            <?php  } ?>
                        </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <nav class="mt-4" aria-label="Page navigation example">
                    <form action="index.php?act=list_account" method="post">
                        <?php 
                        for($i= 0;$i<$count;$i++){
                        ?>
                        <input type="submit" name="number" class="page" value="<?=$i+1?>">
                        <?php
                        }?>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</div>
<style>
 .keyword{
    background-color:#ff6e40 ;
    color: #fff;
    border: 1px solid #ff6e40;
    width: 70px;
    height: 50px;
    border-radius: 5px;
}
.search{
    /* margin-top: -20px; */
    background-color:#ff6e40 ;
    color: #fff;
    border: 1px solid #ff6e40;
    border-radius: 10px;
    width: 100px;
    height: 30px;
                                    
}
.col-md-8 {
    width: 100%;
}
.page{
    width: 30px;
    height: 30px;
    margin: 5px;
    color:#ff6e40 ;
    border:solid 1px #ff6e40 ;
    background-color: #fff;
    border-radius: 10px;
}
.page:hover{
    background-color:#ff6e40;
    color: #fff;
}
.filter{
    display: flex;
}
.tel{
    width: 100%;
}
form{
    display: flex;
}
.filter_role{
    width: 50%;
}
.filter_role_submit{
    width: 50%;
}
.filter-2{
    width: 100%;
    height: 100px;
    border-radius: 20px;
    padding: 20px;
    display:flex;
    justify-content: space-between;
    background-color: #fff;
}
button{
        background-color: #ff6e40;
        color:#fff;
        border: solid 1px #ff6e40;
        border-radius: 5px;
    }
</style>