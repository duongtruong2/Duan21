<h1>THÊM VOUCHER</h1>
<div class="content bg-white">
    <div class="content_item">
        <form action="index.php?act=add_voucher" method="post">
        
            <h5>Mã Giảm Giá</h5> 
            <input class="form-control" type="text" placeholder="mã giảm giá" aria-label="default input example"  name="code"  value="<?php if(isset($code)){echo $code ;}?>">
            <div class="warring"> <p><?php if(isset($warring['code'])){echo $warring['code'];}?></p></div>
            
            <h5>Loại Mã Giảm Giá</h5> 
            <select class="form-select mb-3" aria-label="Default select example" name="category_code">
                <option value="0" selected>Tiền</option>
                <option value="1">Phần Trăm</option>
            </select>

            <h5>Giá trị</h5> 
            <input class="form-control" type="number" placeholder="số lượng giảm" aria-label="default input example"  name="value"  value="<?php if(isset($value)){echo $value;}?>">
            <div class="warring"> <p><?php if(isset($warring['value'])){echo $warring['value'];}?></p></div>

           
    </div>
        

    <div class="content_item">
            
            <h5>Ngày Bắt Đầu</h5> 
            <input class="form-control" type="datetime-local" placeholder="address" aria-label="default input example"  name="date_start"  value="<?php if(isset($date_start)){echo $date_start;}?>">
            <div class="warring"> <p><?php if(isset($warring['date_start'])){echo $warring['date_start'];}?></p></div>

            <h5>Ngày Kết Thúc </h5> 
            <input class="form-control" type="datetime-local" id="formFileMultiple"  name="date_end" value="<?php if(isset($date_end)){echo $date_end;}?>">
            <div class="warring"> <p><?php if(isset($warring['date_end'])){echo $warring['date_end'];}?></p></div>

            <h5>Số Lượng Mã</h5> 
            <input class="form-control" type="number" placeholder="Số lượng phát hàng" aria-label="default input example"  name="quantity"  value="<?php if(isset($quantity)){echo $quantity ;}?>">
            <div class="warring"><p><?php if(isset($warring['quantity'])){echo $warring['quantity'];}?></p></div>
       
            <button type="submit" class="btn btn-primary" name="btn_add">THÊM</button>
             <button type="button" class="btn btn-primary" ><a href="index.php?act=list_voucher">Danh Sách Voucher</a></button>
    </div>
        
        </form>
        
        
</div>
        <div class="warring" style="color:red;">
    <?php 
        if(isset($warring['all'])){
            echo ''.$warring['all'].'';
        } ?>
    </div>
        


<style>
    .content{
        width: 90%;
        display: flex;
    }
    .content_item{
        width: 45%;
        margin: 20px;
    }
    p{
        color:black
    }
    a{
        color:#FFF;
    }
</style>