<?php
if(is_array($load_detail)){
    extract($load_detail);
}
$product_image=load_image($product_id);
extract($product_image);
$image="../upload/".$image_name;
// $edit_detail="index.php?act=edit_detail&product_id=".$product_id;
?>
<style>
    .detail img{
        width: 390px;
        height: 290px;
    }
    .detail_information{
        display: flex;
        width: 100%;
    }
    .detail{
        width: 45%;
        margin: 10px;
    }
    .product_detail_item{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    
</style>
<div class="content">
    <div class="detail_information">
        <div class="detail">
            <img src="<?=$image?>" class="rounded" width="40" alt="">
        </div>
        <div class="detail">
            <h5>ID sản phẩm</h5>
            <input class="form-control" type="text"  aria-label="default input example"  name="product_id" value="<?=$product_id?>" readonly>
            <h5>Tên sản phẩm</h5> 
            <input class="form-control" type="text"  aria-label="default input example"  name="product_name"  value="<?=$product_name?>" readonly>
            <div class="product_detail">
                <?php 
                    foreach($product_detail as $detail){
                        extract($detail);
                        $edit_detail="index.php?act=edit_detail&product_detail_id=".$product_detail_id;
                ?> 
                <div class="product_detail_item">
                    <div>
                     <h6>Size</h6>
                     <input class="form-control" type="text"  value="<?=$product_size?>" style="width: 100px;">
                    </div>
                    <div>
                    <h6>Số lượng</h6>
                     <input class="form-control" type="text"  value="<?=$product_quantity?>">
                    </div>
                    <input type="hidden" name="product_id" value="<?=$product_detail_id?>">
                    <a href="<?=$edit_detail?>"><button class="btn btn-success" style="margin-top:25px ;">Sửa</button></a>
                </div>
                <?php }
                ?>  
            </div>
        </div>
    </div>
         
        <tr>
            <td>
                <a class="btn btn-success" href="index.php?act=list_product">Danh sách sản phẩm</a>
            </td>
            <td>
                <a class="btn btn-danger" href="index.php?act=add_detail&id=<?= $product_id ?>">Thêm biến thể</a>
            </td>
        </tr>
    </form>
</div>