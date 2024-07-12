
<div class="content col-1">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Tìm Kiếm</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <form action="index.php?act=list_bill" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="id hóa đơn" name="search_bill">
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
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="d-none d-md-flex"> <h5>Danh Sách Hóa Đơn</h5> </div>
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
                        <th>ID_Bill</th>
                        <th>ID_Đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach($list_bill as $bill){
                                extract($bill);
                            
                            $edit_bill="index.php?act=bill_detail&bill_id='".$bill_id."'&order_id=".$order_id;
                            ?>
                            <!-- <form action="index.php?act=list_order" method="post"> -->
                                    <tr>
                                        <td>
                                            <a href="#">#<?=$bill_id?></a>
                                        </td>
                                        <td><?=$order_id?></td>
                                        <td><?= number_format($sotien, 0, ',', '.') . ' đ' ?></td>
                                        <td><?=$time?></td>
                                        <td><a href="<?=$edit_bill?>" style="text-align:center ; display:block;"  >Chi tiết</a></td>
                                            <!-- <a style="text-align:center ; display:block;" href="<?=$edit_order?>">Chi tiết  -->
                                    </tr>        
                                    </form>     
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
               
                    
                    
                   
                
            </div>
            <form action="index.php?act=list_bill" method="post">
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