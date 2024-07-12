<h1>THÊM SẢN PHẨM</h1>
<div class="content">
    <div class="form_product">
    <form action="index.php?act=add_product" method="post" enctype="multipart/form-data">
            <h5>Danh Mục</h5> 
            <select class="form-select mb-3" aria-label="Default select example" name="category">
                        <?php
                        foreach($list_category as $ct){
                            extract($ct);
                            echo' <option value='.$category_id.'>'.$category_name.'</option>';
                        }
                        ?>
            </select> 
            <h5>Tên Sản Phẩm</h5> 
            <input class="form-control" type="text" placeholder="Tên sản phẩm" aria-label="default input example"  name="product_name"  value="<?php if(isset($product_name)){echo $product_name ;}?>">
            <div class="warring"> <p><?php if(isset($warring['product_name'])){echo $warring['product_name'];}?></p></div>
           
            <h5>Giá Gốc</h5> 
            <input class="form-control" type="text" placeholder="Giá Gốc" aria-label="default input example"  name="product_price"  value="<?php if(isset($product_price)){echo $product_price ;}?>">
            <div class="warring"><?php if(isset($warring['product_price'])){echo $warring['product_price'];}?></p></div>
        
            <h5>Giá Khuyến Mãi</h5> 
            <input class="form-control" type="text" placeholder="Giá Khuyến Mãi" aria-label="default input example"  name="discounted_price"  value="<?php if(isset($discounted_price)){echo $discounted_price ;}?>">
            <div class="warring"><p><?php if(isset($warring['discounted_price'])){echo $warring['discounted_price'];}?></p></div>
           
            
                <div class="mb-3">
                    <h5>Ảnh Sản Phẩm</h5> 
                    <input class="form-control" type="file" id="formFileMultiple"  name="product_image[]" multiple accept="image/*" value="<?php if(isset($file_name)){echo $file_name ;}?>">
                </div>
                <div class="warring"><p><?php if(isset($warring['file_name'])){echo $warring['file_name'];}?></p></div>
    
    
            
            <div class="mb-3">
                <h5>Mô Tả</h5> 
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_describe"><?php if(isset($product_describe)){echo $product_describe ;}?></textarea>
            </div>
                <div class="warring"> <p><?php if(isset($warring['product_describe'])){echo $warring['product_describe'];}?></p></div>
        </div>
        <div class="product_detail">
                <h5>Trạng Thái</h5> 
                <select class="form-select" aria-label="Default select example" name="product_status">
                        <option value="0">Ẩn</option>
                        <option value="1" selected>Hoạt động</option>
            </select> 
                <div class="warring"> <p><?php if(isset($warring['product_name'])){echo $warring['product_name'];}?></p></div>
    
    
        <div id="variants-container" >
            <div class="variant">
                <label for="size"><h5>Kích Thước</h5></label>
                <input class="form-control mb-3" type="text"  aria-label="default input example" placeholder="size"  name="size[]" required >
                <!-- <input type="text" name="size[]" required><br><br> -->

                <label for="variantQuantity"><h5>Số Lượng</h5></label>
                <input class="form-control" type="text"  aria-label="default input example" placeholder="quantity"  name="variantQuantity[]" required > <br> 
                <!-- <input type="number" name="variantQuantity[]" required><br><br> -->
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="add-variant">Thêm biến thể</button> <br><br><br>
        <!-- <button type="button" id="add-variant">Thêm biến thể</button><br><br> -->
      
            <div>
            <input class="btn btn-success" type="submit" name="add_product" value="Thêm">
            <a class="btn btn-secondary" href="index.php?act=list_product">Danh Sách Sản Phẩm</a> <br>
        </div>   
        </div>
    
</div>
<div class="warring" style="color:red;">
   <h1> <?php 
        if(isset($warring['all'])){
            echo ''.$warring['all'].'';
        }
        ?>
        </h1>
    </div>
</form>

<script>
    document.getElementById("add-variant").addEventListener("click", function() {
        var variantsContainer = document.getElementById("variants-container");
        var newVariant = document.querySelector(".variant").cloneNode(true);
        variantsContainer.appendChild(newVariant);
    });
</script>
<style>
    .content{
        width: 100%;
        display: flex;
    }
    .form_product{
        width: 45%;
    }
    .product_detail{
        margin-left: 20px;
        width: 45%;
    }
</style>
