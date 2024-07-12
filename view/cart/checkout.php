	<main class="bg_gray">


		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="index.php?act=cart">Giỏ hàng</a></li>
						<li>Thanh toán</li>
					</ul>
				</div>
			</div>
			<!-- /page_header -->
			<form action="index.php?act=checkout" method="post">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="step first">
						<h3>1. Thông tin nhận hàng</h3>
						<div class="tab-content checkout p-0">
							<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
								<div class="form-group">
									<label for="" class="form-label">Họ và tên</label>
									<input type="text" name="fullname" class="form-control" value="<?= isset($fullname) ? $fullname : $user['fullname'] ?>" placeholder="" required>
								</div>
								<div class="form-group">
									<label for="" class="form-label">Email</label>
									<input type="email" value="<?= isset($email) ? $email : $user['email'] ?>" name="email" class="form-control" placeholder="">
									<span class="error"><?php if(!empty($errors['email'])) echo $errors['email'] ?></span>
								</div>
								<div class="form-group">
									<label for="" class="form-label">Số điện thoại</label>
									<input type="text" value="<?= isset($tel) ? $tel : $user['tel'] ?>" name="tel" class="form-control" placeholder="" required>
									<span class="error"><?php if(!empty($errors['tel'])) echo $errors['tel'] ?></span>
								</div>

								<div class="form-group">
									<label for="" class="form-label">Địa chỉ nhận hàng</label>
									<input type="text" name="address" class="form-control" value="<?= isset($address) ? $address : $user['address'] ?>" placeholder="Địa chỉ cụ thể" required>
								</div>
								<div class="form-group">
									<label for="" class="form-label">Lưu ý cho đơn hàng</label>
									<input type="text" name="note" value="<?= isset($note) ? $note : "" ?>" class="form-control" placeholder="Lưu ý cho người bán">
								</div>
							</div>
							<!-- /tab_1 -->
						</div>
					</div>
					<div class="step middle payments">
						<h3>2. Phương thức thanh toán</h3>
						<ul>
							<li>
								<label class="container_radio">Thanh toán khi nhận hàng<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
									<input type="radio" name="payment" value="cod" checked>
									<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_radio">Thanh toán qua VN Pay<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
									<input type="radio" value="banking" name="payment" >
									<span class="checkmark"></span>
								</label>
							</li>
						</ul>
					</div>
					<!-- /step -->
				</div>
				
				<div class="col-lg-6 col-md-6">
					<div class="step last">
						<h3>3. Tổng quan đơn hàng</h3>
						<div class="box_general summary">
							<ul>
								<?php foreach ($listPro as $pr) : ?>
									<li class="clearfix"><em><?= $pr['product_quantity'] ?>x <?= $pr['product_name'] ?> - Size <?= $pr['product_size'] ?></em> <span><?= number_format($pr['subtotal'], 0, ',', '.') . ' đ' ?></span></li>
								<?php endforeach; ?>
							</ul>
							<div class="input-group mb-3">
							<input type="text" value="" id="voucherCode" name="code" class="form-control" placeholder="Mã giảm giá" aria-label="Mã giảm giá" aria-describedby="applyVoucher">
							<button class="btn btn-primary" type="button" id="applyVoucher">Áp dụng</button>
							</div>
							<ul>
								<li class="clearfix"><em><strong>Tổng tiền</strong></em> <span><?= number_format($subtotal, 0, ',', '.') . ' đ' ?></span></li>
								<li class="clearfix"><em><strong>Giảm giá</strong></em> <span id="discounted">0</span></li>
								<li class="clearfix"><em><strong>Phí vận chuyển</strong></em> <span>Miễn phí</span></li>
							</ul>
							<div class="total clearfix">Thành tiền <span id="subtotal"><?= number_format($subtotal, 0, ',', '.') . ' đ' ?></span></div>
							<input type="hidden" value="1" name="checkout">
							<input type="hidden" value="0" name="voucher" id="voucher">
							<input type="hidden" value="<?= $subtotal ?>" name="totalbill" id="totalbill">
							<button type="submit" class="btn_1 full-width">Đặt hàng</button>
						</div>
						<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->