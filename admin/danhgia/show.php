
<div class="content ">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex gap-4 align-items-center" style="display:flex ; justify-content: space-between;">
                            <div class="d-none d-md-flex"> <H3>Đánh giá từ khách hàng</H3> </div>
                            <div class="filter" style="width: 400px; display: flex;justify-content: space-between; border-radius: 20px;"  >
                                <form action="index.php?act=list_comment" method="post">
                                    <div class="product">
                                        <input type="text" name="product" placeholder="product_name" style="width:35% ; border: 1px solid black;color: black;">
                                        <input type="text" name="username" placeholder="username" style="width:35% ; border: 1px solid black; color: black;">
                                        <input type="submit" style="width:15% ; border: 1px solid #FFF;" value="search" name="keyword">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom table-lg mb-0" id="products">
                        <thead>
                        <tr>
                        <th>Sản phẩm / Khách hàng</th>
                        <th>Số sao</th>
                        <th>Nội dung</th>
                        <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($list_evaluation as $evaluation){
                                extract($evaluation);
                                $delete="index.php?act=delete_evaluation&evaluation_id=".$evaluation['evaluation_id'];
                            
                            ?>
                                    <tr>
                                        <td>
                                            ID: #<?=$product_id?> <br>
                                            TÊN: <?=$product_name?><br>

                                            ID: #<?=$user_id?> <br>
                                            TÊN: <?=$fullname?>
                                        </td>
                                        <td><?php if(is_array($list_star))
                                        {extract($list_star);}?>
                                        </div>
                                    <div class="d-flex justify-content-center gap-3 my-3">
                                        <?php 
                                        for($i=1;$i<= $number_stars;$i++){
                                        echo' <i class="bi bi-star-fill icon-lg text-warning"></i>';
                                        }
                                        for($j= $number_stars;$j<5;$j++){
                                            echo'<i class="bi bi-star-fill icon-lg text-muted"></i> ';
                                        }?></td>
                                        <td><?=$content?></td>
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
    <form action="index.php?act=list_comment" method="post">
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
</style>
