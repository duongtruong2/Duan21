
<div class="content col-1">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Tìm Kiếm</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <form action="index.php?act=list_order" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="số điện thoại" name="search_order">
                            <!-- <button class="btn btn-outline-light" name="keyword" type="submit">
                                <i class="bi bi-search"></i>
                            </button> -->
                            <input type="submit" name="keyword" class="keyword" value="Search">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</div>          
    <div class="row content">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <style>
                        .list{
                            width: 100%;
                            display: flex;
                            justify-content: space-between;
                        }
                        .content-list,
                            .search_code{
                                width: 50%;
                        }
                        .filter_code{
                            display:flex;
                            justify-content: space-between;
                        }
                        .select_code{
                            display:flex;
                        }
                    </style>
                    <div class="list" >
                        <div class="content-list" style="margin-top:10px ;"> <h5>Danh sách đơn hàng</h5> </div>
                            <div class="filter_code">
                                <div class="search_code">
                                    <form action="index.php?act=list_order" method="post">
                                    <div class="input-group" style="border:solid 1px black; border-radius:20px ;">
                                        <input type="text" class="form-control" placeholder="mã đơn" name="search_code" style="border:solid 1px #fff ; border-radius:20px ;">
                                        <input class="btn" type="submit" name="btn_search" value="Tìm kiếm">
                                            
                                    </div>
                                    </form>
                            
                            </div>
                           
                            <div class="select_code" style="border:solid 1px black ; height: 45px; border-radius: 20px; padding: 3px; width: 180px;" >
                                <form action="index.php?act=list_order" method="post">
                                <select  name="status" style="border:solid 1px #fff; border-radius:20px ;">
                                    <option value="Pending">Chờ xác nhận</option>
                                    <option value="processing">Đang xử lý</option>
                                    <option value="shiped">Đang giao</option>
                                    <option value="canceled">Đã hủy</option>
                                    <option value="delivered">Giao thành công</option>
                                </select>
                               <input type="submit" value="Lọc" name="filter_status" style="width: 70px; height: 35px; border-radius: 10px; border: solid 1px #fff; background-color: #fff;">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table" >
                <table class="table table-custom table-lg mb-0" id="products" style="width: 100%;">
                    <thead>
                    <tr>
                        <!-- <th>
                            <input class="form-check-input select-all" type="checkbox"
                                   data-select-all-target="#products" id="defaultCheck1">
                        </th> -->
                        <th>ID</th>
                        <!-- <th>Người mua</th> -->
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Cập nhật</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach($list_order as $order){
                                extract($order);
                            
                            $edit_order="index.php?act=order_detail&order_id=".$order_id;
                            ?>
                            <form action="index.php?act=list_order" method="post">
                                    <tr>
                                        <td>
                                            <a href="#">#<?=$order_id?></a>
                                        </td>
                                        <td><?=$tel?></td>
                                        <td><?= number_format($total, 0, ',', '.') . ' đ' ?></td>
                                        <td><?=$created_at?></td>
                                        <?php if($status=="unpaid"){?>
                                           <td><button type="button" class="btn-primary">Chưa thanh toán</button></td>
                                           <input type="hidden" name="status" value="<?= $status ?>">
                                           <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                           <td><button type="submit" class="btn-dark" name="btn_update">Cập Nhật</button></td>
                                           <?php } ?>
                                           
                                        <?php if($status=="pending"){?>
                                           <td><button type="button" class="btn-primary">Chờ xác nhận</button></td>
                                           <input type="hidden" name="status" value="<?= $status ?>">
                                           <td><button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>
                                           <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                           <button type="submit" class="btn-dark" name="btn_update">Cập Nhật</button></td>
                                           <?php } ?>
                                        <?php if($status== "processing"){?>
                                            <td ><button type="button" class=" btn-success ">Đã xác nhận</button></td>
                                            <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                            <input type="hidden" name="status" value="<?= $status ?>">
                                            <td><button type="submit" class="btn-dark" name="btn_update">Cập Nhật</button> 
                                            </td>
                                            
                                        <?php } ?>
                                        <?php if($status== "canceled"){?>
                                            <td ><button type="button" class=" btn-danger ">Đã hủy</button></td>
                                            <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                            <input type="hidden" name="status" value="<?= $status ?>">
                                            <td></td>
                                        <?php } ?>
                                        <?php if($status== "shiped"){?>
                                            <td ><button type="button" class=" btn-info">Đang giao hàng</button></td>
                                            <input type="hidden" name="status" value="<?= $status ?>">
                                            <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                            <td><button type="submit" class="btn-dark" name="btn_update">Cập Nhật</button></td>
                                            
                                        <?php } ?>
                                        <?php if($status== "delivered"){?>
                                            <td ><button type="button" class=" btn-success">Giao thành công</button></td>
                                            <td></td>
                                        <?php } ?>
                                        <td><a href="<?=$edit_order?>" style="text-align:center ; display:block;"  >Chi tiết</a></td>
                                            <!-- <a style="text-align:center ; display:block;" href="<?=$edit_order?>">Chi tiết  -->
                                    </tr>        
                                    </form>     
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
               
                    
                    
                   
                
            </div>
            <form action="index.php?act=list_order" method="post">
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination ">
                    <?php
                        for ($i=0; $i < $count; $i++) { 
                    ?>
                            <input type="submit" name="number" class="page" value="<?=$i+1?>">
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            </form>
        </div>

        </div>
    </div>
</div>
<style>
    .col{
        margin-top: -20px;
    }
    .col-1{
        width: 99%;
        
    }
    .keyword{
        background-color:#ff6e40 ;
        color: #fff;
        border: 1px solid #ff6e40;
        width: 70px;
        height: 50px;
        border-radius: 5px;
    }
    .search{
        margin-left: -40px;
        background-color:#ff6e40 ;
        color: #fff;
        border: 1px solid #ff6e40;
        border-radius: 10px;
        width: 100px;
        height: 50px;
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
        width: 100%;
        display: flex;
    }
    .filter .price{
        width: 50%;
        align-items: start;
    }
    .filter .category{
        width: 50%;
        align-items: end;
    }
    form {
       display: flex;
    }
    button{
        background-color: #ff6e40;
        color:#fff;
        border: solid 1px #ff6e40;
        border-radius: 5px;
    }
</style>