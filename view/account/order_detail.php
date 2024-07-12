<main>
    <!-- layout-wrapper -->
    <div class="container margin_30">
        <div class="layout-wrapper">
            <!-- content -->
            <div class="content ">

                <div class="row flex-column-reverse flex-md-row">
                    <?php require "view/account/sidebar.php" ?>
                    <div class="col-md-9">
                        <div class="content ">

                            <h5 class="mb-3">Chi tiết đơn hàng</h5>

                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="card mb-4 bg-light">
                                        <div class="card-body">
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <span>Mã đơn hàng : <a href="#">#<?= $order_detail['order_id'] ?></a></span>
                                                <span class="badge <?= $color ?>"><?= $status ?></span>
                                            </div>
                                            <?php if($order_detail['status'] != "canceled" && $order_detail['status'] != "unpaid"){ ?>
                                            <div class="row mb-3">
                                                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <?php if($order_detail['status'] == "pending"){
                                                        echo "<div class='progress-bar bg-success' style='width: 25%'>25%</div>";
                                                    }
                                                    if($order_detail['status'] == "processing"){
                                                        echo "<div class='progress-bar bg-success' style='width: 50%'>50%</div>";
                                                    }
                                                    if($order_detail['status'] == "shiped"){
                                                        echo "<div class='progress-bar bg-success' style='width: 75%'>75%</div>";
                                                    }
                                                    if($order_detail['status'] == "delivered"){
                                                        echo "<div class='progress-bar bg-success' style='width: 100%'>100%</div>";
                                                    }
                                                    ?>
                                                
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p>Chờ xác nhận</p>
                                                    <p>Đã xác nhận</p>
                                                    <p>Đang vận chuyển</p>
                                                    <p>Giao thành công</p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row mb-3 g-4">
                                                <div class=""><strong>Thời gian đặt:</strong> <?= $order_detail['created_at'] ?> </div>
                                                <div class=""><strong>Phương thức thanh toán:</strong> <?= $order_detail['payment_method'] == "banking" ? "Thanh toán qua VNPay" : "Thanh toán khi nhận hàng" ?></div>
                                                <div class=""><strong>Ghi chú:</strong> <?= $order_detail['note'] ?></div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="card">
                                                        <div class="row card-body">
                                                            <div class="col-6">
                                                                <div class="d-flex justify-content-between">
                                                                    <h5 class="mb-3">Người nhận</h5>
                                                                    <!-- <a href="#">Edit</a> -->
                                                                </div>
                                                                <div class="mb-2"><strong>Tên:</strong> <?= $order_detail['fullname'] ?></div>
                                                                <div class="mb-2"><strong>Số điện thoại:</strong> <?= $order_detail['tel'] ?></div>
                                                                <div class="mb-2"><strong>Email:</strong> <?= $order_detail['email'] ?></div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="d-flex justify-content-between">
                                                                    <h5 class="mb-3">Địa chỉ nhận hàng</h5>
                                                                    <!-- <a href="#">Edit</a> -->
                                                                </div>
                                                                <div><?= $order_detail['address'] ?></div>
                                                            </div>
                                                            
                                                            <!-- <div>
                                                                <i class="bi bi-telephone me-2"></i> 408-963-7769
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body d-flex flex-column gap-3">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="mb-0">Địa chỉ nhận hàng</h5>
                                                            </div>
                                                            <div><?= $order_detail['address'] ?></div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card widget">
                                        <h5 class="card-header bg-primary text-white">Sản phẩm đã mua</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-custom mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Ảnh</th>
                                                            <th>Tên</th>
                                                            <th>Size</th>
                                                            <th>Số lượng</th>
                                                            <th>Giá</th>
                                                            <th>Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($order_items as $item) : ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="#">
                                                                        <img src="upload/<?= $item['image'] ?>" class="rounded" width="60" alt="...">
                                                                    </a>
                                                                </td>
                                                                <td><a href="index.php?act=spchitiet&id=<?= $item['product_id'] ?>"><?= $item['product_name'] ?></a></td>
                                                                <td><?= $item['product_size'] ?></td>
                                                                <td><?= $item['quantity'] ?></td>
                                                                <td><?= number_format($item['price'], 0, ',', '.') ?></td>
                                                                <td><?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h6 class="card-title mb-4">Giá</h6>
                                            <div class="row mb-3">
                                                <div class="col-6 text-end">Tiền sản phẩm :</div>
                                                <div class="col-6"><?= number_format($order_detail['total_price_pro'], 0, ',', '.') . ' đ' ?></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 text-end">Mã giảm giá :</div>
                                                <div class="col-6"><?= number_format($order_detail['discounted'], 0, ',', '.') . ' đ' ?></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 text-end">Phí ship :</div>
                                                <div class="col-6">Free</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 text-end">
                                                    <strong>Tổng : </strong>
                                                </div>
                                                <div class="col-6">
                                                    <strong><?= number_format($order_detail['total'], 0, ',', '.') . ' đ' ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title mb-4">Hành động</h6>
                                            
                                            <!-- <div class="mb-3">
                                                <button class="btn btn-outline-primary">Đánh giá</button>
                                            </div> -->
                                            <div class="mb-3">
                                                <?php if($order_detail['status'] == "unpaid"){ ?>
                                                    <a href="index.php?act=pay&id=<?= $order_id ?>" class="btn btn-outline-primary">Thanh toán</a>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <?php if($order_detail['status'] == "pending" || $order_detail['status'] == "unpaid"){ ?>
                                                    <a href="index.php?act=cancel_order&id=<?= $order_id ?>" class="btn btn-outline-primary cancelOrder">Hủy đơn hàng</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- ./ content -->
        </div>
    </div>
</main>