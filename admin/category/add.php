<div class="content">
    <h1>THÊM DANH MỤC</h1>
    <form action="index.php?act=add_category" method="post" >
        <h5>Tên Danh Mục</h5> 
        <input class="form-control" type="text" placeholder="Tên sản phẩm" aria-label="default input example"  name="category_name"  value="<?php if(isset($category_name)){echo $category_name;}?>">
        <div class="warring"> <p><?php if(isset($warring['category'])){ echo $warring['category'] ;}?></p></div>
        <button type="submit" class="btn btn-primary" name="add_category">THÊM</button>
        <button type="button" class="btn btn-primary" ><a href="index.php?act=list_category">Danh Sách Danh Mục</a></button>
    </form>
    <?php if(isset($warring['all'])){
    echo $warring['all'];
}?>
</div>

<style>
    .warring{
        color:red;
    }
    button a {
        color:#fff;
    }
</style>