<?php
if(is_array($product)){
    extract($product);
    }
    $show_detail="index.php?act=product_detail&product_id=".$product_id;
// if(is_array($product_image)){
//     var_dump($product_image);
     
// }
?>
<h1>THÔNG TIN SẢN PHẨM</h1>
<div class="content">
    <form action="index.php?act=update_product" method="post" enctype="multipart/form-data">
    <div class="update">
        <div class="information">
                <?php
                    foreach($product_image as $image){
                        extract($image);
                        $delete="index.php?act=delete_image&image_id=".$image_id;
                ?>
                <div class="product_image">
                <img src="../upload/<?php echo $image_name?>" alt=""><br>
                </div>
                <input type="hidden" name="image_id" value="<?= $image_id ?>">
                <input  type="file" name="product_image" id="product_image" >
                <button class="btn btn-primary" ><a href="<?=$delete?>">Xóa</a></button> <br>
                <!-- <input type="submit" value="Xóa" name="delete_image"  class="btn btn-primary"> -->
                <?php } ?>
                <div class="mb-3">
                    <h5>Ảnh Sản Phẩm</h5> 
                    <input class="form-control" type="file" id="formFileMultiple"  name="image[]" multiple accept="image/*" value="<?php if(isset($file_name)){echo $file_name ;}?>">
                    </div>
                </div>
            <div class="information">
                <h5>ID Sản Phẩm</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_id"  value="<?=$product_id?>" readonly>

                <h5>Danh Mục</h5> 
                <select class="form-select" aria-label="Default select example" name="category">
                <?php
                        foreach($list_category as $ct){
                        ?>
                            <option <?php if($ct['category_id'] == $category_id) echo "selected"; ?> value="<?php echo $ct['category_id']?>"><?php echo $ct['category_name']?></option>
                        <?php
                        }
                        ?>
                </select>  <br>
                <h5>Tên Sản Phẩm</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_name"  value="<?=$product_name?>">

                <h5>Giá Gốc</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="product_price"  value="<?=$product_price?>">
                
                <h5>Giá Khuyến Mãi</h5> 
                <input class="form-control" type="text"  aria-label="default input example"  name="discounted_price"  value="<?=$discounted_price?>">
                <h5>Mô Tả</h5>
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="product_describe" id="product_describe" style="height: 230px" ><?php echo $product_describe?></textarea>
                <h5>Trạng Thái</h5>
                <select class="form-select mb-3" aria-label="Default select example" name="product_status">
                        <option value="0" <?php if($status == 0) echo "selected" ?>>Ẩn</option>
                        <option value="1" <?php if($status == 1) echo "selected" ?>>Hoạt động</option>
                </select> 

                <h5>Ngày Đăng</h5> 
                
                <input class="form-control" type="text"  aria-label="default input example"  name="date_add"  value="<?=$date_add?>" readonly>
                <br>
                <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                <input type="hidden" name="imgae_id" value="<?php echo $image_id?>">
                <input type="submit" class="btn btn-primary" name="btn_update" value="Lưu thay đổi">
                <button class="btn btn-primary" ><a href="<?=$show_detail?>">Sửa biến thể</a></button> <br>
                <br>
                <button class="btn btn-primary"><a href="index.php?act=list_product">Danh Sách Sản Phẩm</a></button>
            </div>
        </div>
    </div>
       
    </form>
</div>
<style>
.content{
    width: 100%;
}
.update{
    display:flex;
    width: 100%;
}
.information{
    width: 45%;
    margin: 10px;
}
.product_image{
    display: flex;
}
.product_image img{
    margin-top: 10px;
    width: 250px;
    height: 170px;
    border-radius:10px;
}
a{
    color:#fff;
}
    </style>