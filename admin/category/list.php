<div class="content ">
            <div class="card mb-4" style="width: 100%;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                         aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Search Category</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <div class="input-group">
                            <form action="index.php?act=list_category" method="post">
                            <input type="text" class="form-control" name="search_category" placeholder="search category">
                            <button class="btn" type="submit" name="btn_search">
                                <i class="bi bi-search"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                form{
                    width: 100%;
                    display: flex;
                }
                form .form-control{
                    width: 100%;
                }
                .btn {
                    margin-left: -58px;
                }
                .card,.table-responsive{
                    width: 850px;
                }
                .mt-4{
                    align-items: center;
                }
            </style>
    <div class="row" style="width: 100%;">
        <div class="col-md-8" style="width: 100%;">
            <div class="card" style="width: 100%;">
                <div class="card-body" style="width: 100%;">
                    <div class="d-md-flex">
                        <div class="d-none d-md-flex">All Category</div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" style="width: 100%;">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <!-- <th>
                            <input class="form-check-input select-all" type="checkbox"
                                   data-select-all-target="#products" id="defaultCheck1">
                        </th> -->
                        <th>ID</th>
                        <th>Name</th>
                        <th> Actions</th>
                        <!-- <th class="text-end">Actions</th> -->
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                         foreach($list_pro as $ct){
                            extract($ct);
                            $edit_category="index.php?act=edit_category&category_id=".$category_id;
                            $delete_category="index.php?act=delete_category&category_id=".$category_id;
                            ?>
                            <tr>
                                <td>
                                    <a href="#">#<?=$category_id?></a>
                                </td>
                                <td><?=$category_name?></td>
                                <td> <a href="<?=$edit_category?>"><button>EDIT</button></a>  <a onclick="return confirm('Bạn có chắc là muốn xóa ?')" href="<?=$delete_category?>"><button>DELETE</button></a>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <form action="index.php?act=list_category" method="POST">
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
    <style>
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
    button{
        background-color: #ff6e40;
        color:#fff;
        border: solid 1px #ff6e40;
        border-radius: 5px;
    }
</style>