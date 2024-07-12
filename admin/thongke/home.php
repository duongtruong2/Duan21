<div class="content">
<div class="row">
    <div class="col-lg-5 col-md-12">
            <div class="card widget" style="width:100% ;">
                <div class="card-header">
                    <h5 class="card-title">Tổng quan</h5>
                </div>
                <div class="row g-4" style="width: 100%; display:flex ;" >
                    <div class="col-md-6" style="width: 50%;">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-truck text-secondary"></i>
                                </div>
                                <h6 class="my-3">Đang vận chuyển</h6>
                                <div class="text-muted"><?= $shiped ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="width: 50%;">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-receipt text-warning"></i>
                                </div>
                                <h6 class="my-3">Giao thành công</h6>
                                <div class="text-muted"><?= $delivered ?> đơn</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="width: 50%;">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-bar-chart text-info"></i>
                                </div>
                                <h6 class="my-3">Đơn hủy</h6>
                                <div class="text-muted"><?= $canceled ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="width: 50%;">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-cursor text-success"></i>
                                </div>
                                <h6 class="my-3">Đang xử lý</h6>
                                <div class="text-muted"><?= $pending ?> đơn</div>
                                <!-- <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-7">
        <div class="card widget">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Sản phẩm bán chạy</h5>
            </div>
            <div class="card-body" style="width:100% ;">
                <p class="text-muted">Top sản phẩm bán chạy</p>
                <div class="table-responsive">
                    <table class="table table-custom mb-0" id="recent-products">
                        <thead>    
                        <tr>
                            <th>
                                Top
                            </th>
                            <th>
                                ID
                            </th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Số lượng</th>
                            <th>Doanh thu</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; foreach ($selling_pro as $pro) { $i++; ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <?= '#'.$pro['product_id'] ?>
                            </td>
                            <td>
                                <a href="#">
                                    <img src="../upload/<?= $pro['img_name'] ?>" class="rounded" width="40"
                                        alt="...">
                                </a>
                            </td>
                            <td><?= $pro['product_name'] ?></td>
                            <td>
                                <?= $pro['total_sold'] ?>
                            </td>
                            <td><?= number_format($pro['total_revenue'], 0, ',', '.') . ' đ' ?></td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
<div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex gap-4 align-items-center">
                                    <div class="d-none d-md-flex"> <H3>Đơn hàng ngày hôm nay</H3> </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom table-lg mb-0" id="products">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Người mua </th>
                                <th>Tổng tiền</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th class="text-end">Thông tin </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($list_order as $order){
                                        extract($order);
                                    $edit_order="index.php?act=order_detail&order_id=".$order_id;
                                    ?>
                                    <form action="index.php?act=update_order_today" method="post">
                                            <tr>
                                                <td>
                                                    <a href="#">#<?=$order_id?></a>
                                                </td>
                                                <td><?=$fullname?></td>
                                                <td><?=number_format($total, 0, ',', '.') . ' đ'?></td>
                                                <td><?=$created_at?></td>
                                                <?php if($status=="unpaid"){?>
                                                <td><button type="button" class="btn-primary">Chưa thanh toán</button></td>
                                                <input type="hidden" name="status" value="<?= $status ?>">
                                                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status=="pending"){?>
                                                <td><button type="button" class="btn-primary">Chờ xác nhận</button></td>
                                                <input type="hidden" name="status" value="<?= $status ?>">
                                                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                <td><button type="submit" class=" btn-danger" name="btn_cencel">Hủy Đơn</button>
                                                <button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button>
                                                </td>
                                                <?php } ?>
                                                <?php if($status== "processing"){?>
                                                    <td ><button type="button" class=" btn-success ">Đã xác nhận</button></td>
                                                    <input type="hidden" name="status" value="<?= $status ?>">
                                                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                    <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status== "canceled"){?>
                                                    <td ><button type="button" class=" btn-danger ">Đã hủy</button></td>
                                                    <td></td>
                                                <?php } ?>
                                                <?php if($status== "shiped"){?>
                                                    <td ><button type="button" class=" btn-info">Đang giao hàng</button></td>
                                                    <input type="hidden" name="status" value="<?= $status ?>">
                                                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                    <td><button type="submit" name="btn_update" class="btn-dark" >Cập nhật</button></td>
                                                <?php } ?>
                                                <?php if($status== "delivered"){?>
                                                    <td ><button type="button" class=" btn-success">Giao thành công</button></td>
                                                    <td></td>
                                                <?php } ?>
                                                
                                                <td><a href="<?=$edit_order?>" style="text-align:center ; display:block;"  >Chi tiết</a></td>
                                                    <!-- <a style="text-align:center ; display:block;" href="<?=$edit_order?>">Chi tiết  -->
                                            </tr>             
                                <?php
                                }
                                ?>
                                </form>
                                </tbody>
                            </table>
                        </div>
                        <nav class="mt-4" aria-label="Page navigation example">
                        </nav>
                    </div>
</div>


</div>
