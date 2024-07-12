<div class="content">
<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
		<div id="logo">
			<a href="index.php"><img src="../img/logo_black.svg" alt="" width="100" height="35"></a>
		</div>
		</div>
    <h4 style="text-align:center;">Hóa Đơn Mua Hàng</h4>
    <div class="information">
        <div class="information_bill">
            <h6>Thông tin Hóa đơn</h6>
            <?php 
                if(isset($loadone_bill)){
                    extract($loadone_bill);
                }
            ?>
            <table>
                <tr>
                    <td>ID_Hóa Đơn :</td>
                    <td># <?=$bill_id?></td>
                </tr>
                <?php 
                    if($payment_method=="banking"){
                ?>
                <tr>
                    <td>Mã giao dịch :</td>
                    <td> <?=$magiaodich?></td>
                </tr>
                <tr>
                    <td>Mã ngân hàng :</td>
                    <td> <?=$manganhang?></td>
                </tr>
                <?php }?>
                
                <tr>
                    <td>Date :</td>
                    <td> <?=$time?></td>
                </tr>
            </table>
        </div>
        <div class="information_order">
                <h6>Thông tin người mua</h6>
                <table>
                <tr>
                    <td>ID_Đơn Hàng :</td>
                    <td>#<?=$order_id?></td>
                </tr>
                <tr>
                    <td>ID_Khách Hàng :</td>
                    <td> <?=$user_id?></td>
                </tr>
                <tr>
                    <td>Họ và Tên :</td>
                    <td> <?=$fullname?></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td> <?=$email?></td>
                </tr>
                <tr>
                    <td>Địa Chỉ :</td>
                    <td> <?=$address?></td>
                </tr>
                <tr>
                    <td>Số Điện Thoại :</td>
                    <td> <?=$tel?></td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="product_bill">
        <div class="table" >
            <table class="table table-custom table-lg mb-0" id="products" style="width: 100%;">
                <thead>
                <tr>
                <th>ID_Sản Phẩm</th>
                <th>Tên</th>
                <th>Số lượng</th>
                <th>Kích thước</th>
                <th>Tiền</th>
                </tr>
                </thead>
                <tbody>
                    

                <?php 
                    foreach($list_product as $product){?>
                    <tr>
                        <td>#<?=$product['product_id']?></td>
                        <td><?=$product['product_name']?></td>
                        <td><?=$product['quantity']?></td>
                        <td><?=$product['product_size']?></td>
                        <td><?=number_format($product['product_price'],0,'.','.').'đ'?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>  
        </div>
        <hr>
    </div>
        <h5 style="text-align: end; padding-right:20px ;" >Tổng tiền: <?=number_format($sotien,0,'.','.').'đ'?></h5>
    </div>
    
</div>
<style>
    .content{
        margin-bottom: 20px;
        width: 95%;
        border: solid 1px black;
        align-items: center;
    }
    .information{
        width: 100%;
        padding: 20px;
        display: flex;
        justify-content: space-between;
    }
    .product_bill{
        padding: 20px;
    }
</style>