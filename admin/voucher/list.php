<div class="content">
    <div class="filter">
    <div class="tel">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                    <div>Tìm Kiếm</div>
                    <div class="bi bi-chevron-down"></div>
                </div>
                <div class="collapse show mt-4" id="keywordsCollapseExample" >
                    <form action="index.php?act=list_voucher" method="post">
                        <div class="input" style="display:flex ;">
                            <input type="text" class="form" placeholder="mã giảm giá" name="search_voucher">
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
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="d-none d-md-flex"> <H3>Mã giảm giá</H3> </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-lg mb-0" id="products">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Loại mã</th>
                        <th>Giá Trị</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($list_voucher as $voucher){
                                extract($voucher);
                                $delete="index.php?act=delete_voucher&voucher_id=".$voucher_id;
                            
                            ?>
                                    <tr>
                                        <td><?=$voucher_id?></td>
                                        <td><?=$code?></td>
                                        <td><?=$category_code?></td>
                                        <td>
                                            <?php if($value<100){
                                                echo "$value%";
                                            }else{
                                                echo "-$value đ";
                                            }
                                            ?></td>
                                        <td><?=$date_start?></td>
                                        <td><?=$date_end?></td>
                                        <td><?=$quantity?></td>
                                        <td><a href="<?=$delete?>"><button type="submit">Xóa</button></a></td>
                                    </tr>             
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <nav class="mt-4" aria-label="Page navigation example">
                </nav>
            </div>
        </div>
    </div>
    <form action="index.php?act=list_voucher" method="post">
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination ">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li> -->
                    <!-- <li class="page-item"><input type="submit" name="number"  class="page" value="1"></a></li>
                    <li class="page-item"><input type="submit" name="number"  class="page" value="2"></a></li>
                    <li class="page-item"><input type="submit" name="number" class="page" value="3"></a></li> -->
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li> -->
                    <?php
                        for ($i=0; $i < $count; $i++) { 
                    ?>
                        <input type="submit" name="number" class="page"value="<?=$i+1?>">
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            </form>
</div>
<style>
    button{
        background-color: #ff6e40;
        color:#fff;
        border: solid 1px #ff6e40;
        border-radius: 5px;
    }
    input{
        width: 30px;
        height: 30px;
        margin: 5px;
        color:#ff6e40 ;
        border:solid 1px #ff6e40 ;
        background-color: #fff;
        border-radius: 10px;
    }
    .keyword{
    background-color:#ff6e40 ;
    color: #fff;
    border: 1px solid #ff6e40;
    width: 70px;
    height: 50px;
    border-radius: 5px;
}
.form{
    width: 90%;
    height: 50px;
}
</style>