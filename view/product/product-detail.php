	<?php
	extract($sp);
	$list_img = explode(",", $anh);
	?>
	<main>
		<div class="container margin_30">
			<!-- <div class="layer"></div>
			<div class="top_panel">
				<div class="container header_panel">
					<a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
					<label>1 product added to cart</label>
				</div>
				
				<div class="item">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="item_panel">
									<figure>
										<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/1.jpg" class="lazy" alt="">
									</figure>
									<h4>1x Armor Air X Fear</h4>
									<div class="price_panel"><span class="new_price">$148.00</span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
								</div>
							</div>
							<div class="col-md-5 btn_panel">
								<a href="cart.html" class="btn_1 outline">View cart</a> <a href="checkout.html" class="btn_1">Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /add_cart_panel -->
			
			<div class="row">
				<div class="col-md-6">
					<div class="all">
						<div class="slider">
							<div class="owl-carousel owl-theme main">
								<?php foreach ($list_img as $img) : ?>
									<div style="background-image: url(upload/<?= $img ?>);" class="item-box"></div>
								<?php endforeach; ?>
							</div>
							<div class="left nonl"><i class="ti-angle-left"></i></div>
							<div class="right"><i class="ti-angle-right"></i></div>
						</div>
						<div class="slider-two">
							<div class="owl-carousel owl-theme thumbs">
								<?php foreach ($list_img as $img) : ?>
									<div style="background-image: url(upload/<?= $img ?>);" class="item active"></div>
								<?php endforeach; ?>
							</div>
							<div class="left-t nonl-t"></div>
							<div class="right-t"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li><a href="index.php?act=sanpham&iddm=<?= $category_id ?>"><?= $category_name ?></a></li>
							<li><?= $product_name ?></li>
						</ul>
					</div>
					<!-- /page_header -->
					<div class="prod_info">
						<form action="index.php?act=themsp" method="post">
							<h1><?= $product_name ?></h1>
							<span class="rating">
								<?php
								if (empty($total_review)) {
									echo "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
								} else {
									for ($i = 1; $i <= 5; $i++) {
										$class = ($i <= $total_review['average_rating']) ? 'icon-star voted' : 'icon-star';
										echo '<i class="' . $class . '"></i>';
									}
								}
								?> <em> <?= empty($total_review) ? "0" : $total_review['total_reviews'] ?> đánh giá</em>
							</span>
							<p><small id="sku">SKU: <?= $sizeAndQuantity[0]['sku'] ?></small><br></p>
							<div class="prod_options">
								<div class="row">
									<label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Size</strong></label>
									<div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
										<ul>
											<?php
											$i = 0;
											foreach ($sizeAndQuantity as $s) :
												$i++ ?>
												<li>
													<input type="radio" value="<?= $s['size'] ?>" datasku="<?= $s['sku'] ?>" dataquantity="<?= $s['quantity'] ?>" class="btn-check" name="size" id="option<?= $i ?>" <?php if ($i == 1) echo "checked" ?> <?php if ($s['quantity'] == 0) echo "disabled" ?>>
													<label class="btn" for="option<?= $i ?>"><?= $s['size'] ?></label>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<div class="row mt-3">
									<label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Số lượng</strong></label>
									<div class="col-xl-4 col-lg-5 col-md-6 col-6">
										<div class="numbers-row">
											<input type="number" min="1" max="<?= $sizeAndQuantity[0]['quantity'] ?>" value="1" id="quantity_1" class="qty2" name="quantity_1" readonly>
											<div class="inc inc_btn">+</div>
											<div class="dec inc_btn">-</div>
										</div>
										<p class="mt-2" id="inventory">Còn <?= $sizeAndQuantity[0]['quantity'] ?> sản phẩm</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 col-md-6">
									<div class="price_main"><span class="new_price"><?= number_format($product_price, 0, ',', '.') . ' đ' ?></span><span class="old_price"><?= number_format($discounted_price, 0, ',', '.') . ' đ' ?></span></div>
								</div>
								<div class="col-lg-4 col-md-6">
									<input type="hidden" name="price" value="<?= $product_price ?>">
									<input type="hidden" value="<?= $sizeAndQuantity[0]['sku'] ?>" name="sku" id="sku_1">
									<div class="btn_add_to_cart"><a class="btn_1">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</form>
					</div>
					<!-- /prod_info -->
					<div class="product_actions">
						<ul>
							<li>
								<a href="#"><i class="ti-heart"></i><span>Thêm vào sản phẩm yêu thích</span></a>
							</li>
							<li>
								<a href="#"><i class="ti-control-shuffle"></i><span>Thêm vào so sánh</span></a>
							</li>
						</ul>
					</div>
					<!-- /product_actions -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="tabs_product">
			<div class="container">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Mô tả</a>
					</li>
					<li class="nav-item">
						<a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Đánh giá</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /tabs_product -->
		<div class="tab_content_wrapper">
			<div class="container">
				<div class="tab-content" role="tablist">
					<div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
						<div class="card-header" role="tab" id="heading-A">
							<h5 class="mb-0">
								<a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
									Mô tả
								</a>
							</h5>
						</div>
						<div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
							<div class="card-body">
								<div class="row justify-content-between">
									<div class="col-lg-12">
										<p><?= $product_describe ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /TAB A -->
					<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
						<div class="card-header" role="tab" id="heading-B">
							<h5 class="mb-0">
								<a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
									Đánh giá
								</a>
							</h5>
						</div>
						<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
							<div class="card-body">
								<div class="row justify-content-between">
									<?php foreach ($reviews as $rv) : ?>
										<div class="col-lg-6">
											<div class="review_content">
												<div class="clearfix add_bottom_10">
													<span class="rating"><?= str_repeat("<i class='icon-star'></i>", $rv['number_stars']); ?></span>
													<!-- <em>Published 54 minutes ago</em> -->
												</div>
												
												<h4><?= $rv['username'] ?></h4>
												<p><?= $rv['content'] ?></p>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
								<!-- /row -->
								<?php if ($check_buy == 1) { ?>
									<p class="text-end"><a href="index.php?act=danhgia&id=<?= $product_id ?>" class="btn_1">Đánh giá</a></p>
								<?php } else { ?>
									<p class="text-end">Bạn cần mua hàng để đánh giá sản phẩm</p>
								<?php } ?>

							</div>
							<!-- /card-body -->
						</div>
					</div>
					<!-- /tab B -->
				</div>
				<!-- /tab-content -->
			</div>
			<!-- /container -->
		</div>
		<!-- /tab_content_wrapper -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Sản phẩm liên quan</h2>
				<span>Products</span>
				<p>Những sản phẩm bạn cũng có thể thích</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				<?php foreach ($splienquan as $v) : ?>
					<div class="item">
						<div class="grid_item">
							<!-- <span class="ribbon new">New</span> -->
							<figure>
								<a href="index.php?act=spchitiet&id=<?= $v['product_id'] ?>">
									<img class="owl-lazy" src="upload/<?= $v['img_name'] ?>" data-src="upload/<?= $v['img_name'] ?>" alt="">
								</a>
							</figure>
							<div class="rating">
								<?php
								if (empty($v['rating'])) {
									echo "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
								} else {
									for ($i = 1; $i <= 5; $i++) {
										$class = ($i <= $v['rating']) ? 'icon-star voted' : 'icon-star';
										echo '<i class="' . $class . '"></i>';
									}
								}
								?>
							</div>
							<a href="index.php?act=spchitiet&id=<?= $v['product_id'] ?>">
								<h3><?= $v['product_name'] ?></h3>
							</a>
							<div class="price_box">
								<span class="new_price"><?= number_format($v['product_price'], 0, ',', '.') . ' đ' ?></span>
							</div>
							<ul>
								<li><a href="index.php?act=spchitiet&id=<?= $v['product_id'] ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
				<?php endforeach; ?>
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->

		<div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Miễn phí vận chuyển</h3>
								<p>Cho đơn hàng trên 3 triệu</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Thanh toán bảo mật</h3>
								<p>100% bảo mật thanh toán</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>Hỗ trợ 24/7</h3>
								<p>Hỗ trợ nhiệt tình, nhanh chóng</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- <script>
        	var isLoggedIn = <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
    	</script> -->
		<!--/feat-->
	</main>
	<!-- /main -->