<?php
if(is_array( $detail_id)){
    extract( $detail_id);}
// var_dump($product_detail_id);
?> 
<form action="index.php?act=update_detail" method="post">
   
            <h5>Size</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_size"  value="<?=$product_size?>">
        
            <h5>Số Lượng</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_quantity"  value="<?=$product_quantity?>">
        
       
            <input type="hidden" name="product_detail_id" value="<?=$product_detail_id?>">
            <input type="hidden" name="product_id" value="<?=$product_id?>">
            <br>
            <input type="submit" class="btn btn-primary" name="btn_update" value="Lưu thay đổi">
            <button class="btn btn-success"><a href="index.php?act=add_detail">Danh sách biến thể</a></button>
        
</form>
<style>
    a{
        color:#fff;
    }
</style>