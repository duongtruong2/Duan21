<?php
    if(is_array($list_category)){
        extract($list_category);
    }
?>
<div class="col-1">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Tìm Kiếm</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <form action="index.php?act=list_product" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="......" name="search_product">
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
        <div class="filter">
            <div class="price">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                            aria-expanded="true" data-bs-target="#priceCollapseExample" role="button">
                        <div>Price</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                        <div class="collapse show mt-4" id="priceCollapseExample">
                            <form action="index.php?act=list_product" method="post">
                                <input type="text" id="price_filter" name="price_product"  class="form-control">
                                <input type="submit" name="filter_price" class="search" value="Lọc">
                            </form>
                        </div>
                </div>
            </div>
            </div>
            <div class="category">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button">
                        <div>Danh Mục</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="categoriesCollapseExample">
                        <div class="d-flex flex-column gap-3">
                            <div class="form-check">
                                <form action="index.php?act=list_product" method="post">
                                    <select name="category" id="" class="form-control">
                                    <?php 
                                        foreach($list_category as $ct){
                                            extract($ct);
                                    ?>
                                        <option value="<?=$category_id?>"<?php echo 'selected'?>><?=$category_name?></option>
                                         
                                    <?php
                                        }
                                    ?>
                                    </select>
                                        <input type="submit" name="filter_category" class="search" value="Lọc">
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
        </div>
            
                  
<div class="content ">
            <!-- <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#colorsCollapseExample" role="button">
                        <div>Colors</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="colorsCollapseExample">
                        <div class="color-filter-group d-flex gap-3">
                            <input class="form-check-input" type="checkbox" value="#1fa0c6" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="green" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c61faa" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#1fc662" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#9dc61f" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c67b1f" aria-label="...">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-none d-md-flex">All Products</div>
                        <a href="index.php?act=product_delete">thùng rác</a>
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
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thời gian đăng</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach($list_pro as $pd){
                            extract($pd);
                            $product_image=load_image($product_id);
                            extract($product_image);
                            $edit_product="index.php?act=edit_product&product_id=".$product_id;
                            $delete_product="index.php?act=delete_product&product_id=".$product_id;
                            $show_detail="index.php?act=product_detail&product_id=".$product_id;
                            $image="../upload/".$image_name;    
                            ?>
                                    <tr>
                                        <td>
                                            <a href="#">#<?=$product_id?></a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img src="<?=$image?>" class="rounded" width="40" alt="">
                                            </a>
                                        </td>
                                        <td><?=$product_name;?></td>
                                            <td><h6>Khuyến mãi: <?=number_format($discounted_price,0,'.','.').'đ' ; ?></h6><br>
                                                <?=number_format($product_price,0,'.','.').'đ' ; ?></td>
                                            <td><?=$date_add?></td>
                                            <td class="text-end"><a href="<?=$edit_product?>"><button>Sửa</button></a>
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa không ?')" href="<?=$delete_product?>"><button>Xóa</button></a>
                                            <a href="<?= $show_detail?>"><button>Biến thể</button></a>
                                            </td>
                                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
               
                    
                    
                   
                
            </div>
            <form action="index.php?act=list_product" method="post">
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
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

        </div>
    </div>
</div>
<style>
    .col{
        margin-top: -50px;
    }
    .col-1{
        width: 100%;
        
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