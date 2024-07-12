<?php
if (is_array($list_order)) {
    extract($list_order);
}
?>

<div class="content bg-white">
    <h1>THÔNG TIN ĐƠN HÀNG</h1>
    <div class="header-1">
        <form action="index.php?act=update_order" method="post">
            <label for="">ID Đơn hàng : #<?= $order_id ?> </label>
    </div>
    <div class="order">
        <label for="">Trạng thái Đơn hàng : </label>
        <?php if ($status == "processing") { ?>
            <button type="button" class=" btn-success  ">Xác nhận thành công</button>
            <input type="hidden" name="status" value="<?= $status ?>">
            <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
        <?php } ?>
        <?php if ($status == "unpaid") { ?>
            <button type="button" class=" btn-primary  ">Chưa thanh toán</button>
            <input type="hidden" name="status" value="<?= $status ?>">
            <!-- <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button> -->
            <!-- <div class="order"> -->
            <button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>


        <?php } ?>
        <?php if ($status == "canceled") { ?>
            <button type="button" class=" btn-danger ">Đã hủy</button>
            <input type="hidden" name="status" value="<?= $status ?>">
        <?php } ?>
        <?php if ($status == "shiped") { ?>
            <button type="button" class=" btn-info">Đang giao hàng</button>
            <input type="hidden" name="status" value="<?= $status ?>">
            <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
        <?php } ?>
        <?php if ($status == "delivered") { ?>
            <button type="button" class=" btn-success">Giao thành công</button>
            <input type="hidden" name="status" value="<?= $status ?>">
        <?php } ?>

        <?php if ($status == "pending") { ?>
            <button type="button" class="btn-primary">Chờ xác nhận</button>
            <input type="hidden" name="status" value="<?= $status ?>">

            <!-- <div class="order"> -->
            <button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>
            <button type="submit" class="btn-dark" name="btn_update">Cập Nhật Đơn Hàng</button>
        <?php } ?>
        <input type="hidden" name="order_id" value="<?= $order_id ?>">
        </form>
    </div>
<br>
<hr>

<div class="information">
    <div class="information_item">
        <h5>Thông tin khách hàng</h5>
        <label for="">ID khách hàng : #<?= $user_id ?></label> <br>
        <label for="">Họ và tên : <?= $fullname ?></label><br>
        <label for="">Email : <?= $email ?> </label><br>
        <label for="">Số Điện Thoại : <?= $tel ?> </label><br>
        <h6>Địa Chỉ : <?= $address ?></h6>
        <h6>Ghi chú : <?= $note ?></h6>
    </div>
    <div class="information_item">
        <label for="">Phương thức thanh toán: <br> <?php if ($payment_method == "cod") {
                                                        echo "Thanh toán khi nhận hàng";
                                                    } else {
                                                        echo $payment_method;
                                                    } ?></label> <br>
        <label for="">Ngày đặt : <br> <?= $created_at ?></label>
    </div>
    <div class="information_item">
        <div class="row mb-3">
            <div class="col-6 text-end">Tiền sản phẩm :</div>
            <div class="col-6"><?= number_format($total_price_pro, 0, ',', '.') . ' đ' ?></div>

        </div>
        <div class="row mb-3">
            <div class="col-6 text-end">Mã giảm giá   :</div>
            <div class="col-6"><?= number_format($discounted, 0, ',', '.') . ' đ' ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6 text-end">Phí ship :</div>
            <div class="col-6">Free</div>
        </div>
        <div class="row">
            <div class="col-6 text-end">
                <strong>Thành tiền : </strong>
            </div>
            <div class="col-6">
                <strong><?= number_format($total, 0, ',', '.') . ' đ' ?></strong>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="product">


    <div class="card widget">
        <!-- <h5 class="card-header">Order Items</h5> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_product as $product) {

                        ?>
                            <tr>
                                <td>
                                    <!-- <a href="#">
                                        <img src="../assets/images/products/3.jpg" class="rounded" width="60" alt="...">
                                    </a> -->
                                    #<?= $product['product_id'] ?>
                                </td>
                                <td>

                                    <img src="../upload/<?= $product['image'] ?>" class="rounded" width="60" alt="...">


                                </td>
                                <td><?= $product['product_name'] ?></td>
                                <td><?= $product['product_size'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td><?= number_format($product['price'], 0, ',', '.') . ' đ' ?></td>
                                <td><?= number_format($product['total'], 0, ',', '.') . ' đ' ?></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
<style>
    .content {
        width: 90%;
        height: 700px;
        /* border: solid 1px black; */
    }

    .header-1 {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-between;
    }

    .information {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-between;
        /* justify-content: space-between; */
    }

    .product_detail {
        width: 100%;
        display: flex;
        justify-content: space-between;
        border-bottom: solid 1px black;
        margin-top: 10px;
        padding: 10px;
        border-radius: 10px;
        background-color: #C8E2B1;
        /* border-radius: 5px; */
    }

    .product_detail_item {

        width: 30%;
        height: auto;
    }

    .total {
        display: flex;
        justify-content: flex-end;
    }

    .describe {
        width: 50%;
    }

    .all {
        width: 30%;
    }
</style>