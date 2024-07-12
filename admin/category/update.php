<?php
    if(is_array( $category)){
        extract( $category);
    }
?>
<div class="content_update" >
    <h1>THÔN TIN DANH MỤC</h1>
    <br>
    <form action="index.php?act=update_category" method="post">
       
            <h5>ID Danh Mục</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="category_id"  value="<?php if(isset($category_id) && ($category_id!="")) echo $category_id?>" readonly>
            <br>
            <h5>Tên Danh Mục</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="category_name"  value="<?php if(isset($category_name) && ($category_name!="")) echo $category_name?>">
            <br>
       
        <input type="hidden" name="id_category" value="<?php if(isset($category_id) && ($category_id>0)) echo $category_id?>">
        <button type="submit" class="btn btn-primary" name="btn_update">Lưu thay đổi</button><a href="index.php?act=list_category"> <button type="submit" class="btn btn-primary">Danh sách danh mục</button></a>

       
    </form>
</div>
<style>
    .content_update{
        width: 90%;
    }
</style>
