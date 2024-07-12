<main>
	<div id="carousel-home">
		<div class="owl-carousel owl-theme">
			<div class="owl-slide cover" style="background-image: url(upload/banner1.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-end">
							<div class="col-lg-6 static">
								<div class="slide-text text-end white">
									<h2 class="owl-slide-animated owl-slide-title">NIKE<br>AIR FORCE 1 LOW</h2>
									<p class="owl-slide-animated owl-slide-subtitle">

									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="index.php?act=spchitiet&id=1" role="button">Mua ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
			<div class="owl-slide cover" style="background-image: url(upload/banner2.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6 static">
								<div class="slide-text white">
									<h2 class="owl-slide-animated owl-slide-title">ADIDAS<br>RUN FALCON 2.0</h2>
									<p class="owl-slide-animated owl-slide-subtitle">

									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="index.php?act=spchitiet&id=9" role="button">Mua ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
			<div class="owl-slide cover" style="background-image: url(upload/banner3.png);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center black">
									<h2 class="owl-slide-animated owl-slide-title">Khám phá</h2>
									<p class="owl-slide-animated owl-slide-subtitle">
										Những sản phẩm Hot nhất năm 2023
									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="index.php?act=sanpham" role="button">Khám phá ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
			</div>
		</div>
		<div id="icon_drag_mobile"></div>
	</div>
	<!--/carousel-->

	<ul id="banners_grid" class="clearfix">
		<li>
			<a href="index.php?act=sanpham&iddm=2" class="img_container">
				<img src="upload/logonike.jpg" data-src="upload/logonike.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Nike</h3>
					<div><span class="btn_1">Xem ngay</span></div>
				</div>
			</a>
		</li>
		<li>
			<a href="index.php?act=sanpham&iddm=3" class="img_container">
				<img src="upload/logoadidas.jpg" data-src="upload/logoadidas.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Adidas</h3>
					<div><span class="btn_1">Xem ngay</span></div>
				</div>
			</a>
		</li>
		<li>
			<a href="index.php?act=sanpham&iddm=4" class="img_container">
				<img src="upload/logojordan.jpg" data-src="upload/logojordan.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Jordan</h3>
					<div><span class="btn_1">Xem ngay</span></div>
				</div>
			</a>
		</li>
	</ul>
	<!--/banners_grid -->

	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Sản phẩm bán chạy</h2>
			<span>Products</span>
			<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
		</div>
		<div class="row small-gutters">
			<?php foreach ($selling_products as $ps) : ?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">Hot</span>
							<a href="index.php?act=spchitiet&id=<?= $ps['product_id'] ?>">
								<img class="img-fluid lazy" src="upload/<?= $ps['img_name'] ?>" data-src="upload/<?= $ps['img_name'] ?>" alt="">
								<img class="img-fluid lazy" src="upload/<?= $ps['img_name'] ?>" data-src="upload/<?= $ps['img_name'] ?>" alt="">
							</a>
						</figure>
						<div class="rating">
							<?php
							if (empty($ps['rating'])) {
								echo "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
							} else {
								for ($i = 1; $i <= 5; $i++) {
									$class = ($i <= $ps['rating']) ? 'icon-star voted' : 'icon-star';
									echo '<i class="' . $class . '"></i>';
								}
							}
							?>
						</div>
						<a href="index.php?act=spchitiet&id=<?= $ps['product_id'] ?>">
							<h3><?= $ps['product_name'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?= number_format($ps['product_price'], 0, ',', '.') . ' đ' ?></span>
							<span class="old_price"><?= number_format($ps['discounted_price'], 0, ',', '.') . ' đ' ?></span>
						</div>
						<ul>
							<li><a href="index.php?act=spchitiet&id=<?= $ps['product_id'] ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
			<?php endforeach; ?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->

	<div class="featured lazy" data-bg="url(upload/banner3.png)">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
			<div class="container margin_60">
				<div class="row justify-content-center justify-content-md-start">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<p>Cuộc sống có nhiều lựa chọn</p>
						<h3>Cảm ơn bạn đã chọn chúng tôi</h3>
						<a class="btn_1 mt-3" href="#" role="button">Nhận khuyến mãi</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /featured -->

	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Sản phẩm nổi bật</h2>
			<span>Products</span>
			<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
		</div>
		<div class="owl-carousel owl-theme products_carousel">

			<?php foreach ($feature_products as $fp) : ?>
				<div class="item">
					<div class="grid_item">
						<span class="ribbon off">Hot</span>
						<figure>
							<a href="index.php?act=spchitiet&id=<?= $fp['product_id'] ?>">
								<img class="owl-lazy" src="upload/<?= $fp['img_name'] ?>" data-src="upload/<?= $fp['img_name'] ?>" alt="">
							</a>
						</figure>
						<div class="rating">
							<?php
							if (empty($fp['rating'])) {
								echo "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
							} else {
								for ($i = 1; $i <= 5; $i++) {
									$class = ($i <= $fp['rating']) ? 'icon-star voted' : 'icon-star';
									echo '<i class="' . $class . '"></i>';
								}
							}
							?>
						</div>
						<a href="index.php?act=spchitiet&id=<?= $fp['product_id'] ?>">
							<h3><?= $fp['product_name'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?= number_format($fp['product_price'], 0, ',', '.') . ' đ' ?></span>
						</div>
						<ul>
							<li><a href="index.php?act=spchitiet&id=<?= $fp['product_id'] ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
			<?php endforeach; ?>
		</div>
		<!-- /products_carousel -->
	</div>

	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Sản phẩm mới</h2>
			<span>NEW</span>
			<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			<?php foreach ($new_products as $np) : ?>

				<div class="item">
					<div class="grid_item">
						<span class="ribbon hot">New</span>
						<figure>
							<a href="index.php?act=spchitiet&id=<?= $np['product_id'] ?>">
								<img class="owl-lazy" src="upload/<?= $np['img_name'] ?>" data-src="upload/<?= $np['img_name'] ?>" alt="">
							</a>
						</figure>
						<div class="rating">
							<?php
							if (empty($np['rating'])) {
								echo "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
							} else {
								for ($i = 1; $i <= 5; $i++) {
									$class = ($i <= $np['rating']) ? 'icon-star voted' : 'icon-star';
									echo '<i class="' . $class . '"></i>';
								}
							}
							?>
						</div>
						<a href="index.php?act=spchitiet&id=<?= $np['product_id'] ?>">
							<h3><?= $np['product_name'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?= number_format($np['product_price'], 0, ',', '.') . ' đ' ?></span>
						</div>
						<ul>
							<li><a href="index.php?act=spchitiet&id=<?= $np['product_id'] ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
			<?php endforeach; ?>
		</div>
		<!-- /products_carousel -->
	</div>
	<!-- /container -->

	<div class="bg_gray">
		<div class="container margin_30">
			<div id="brands" class="owl-carousel owl-theme">
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
				<div class="item">
					<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
				</div><!-- /item -->
			</div><!-- /carousel -->
		</div><!-- /container -->
	</div>
	<!-- /bg_gray -->

	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Bài viết mới nhất</h2>
			<span>Blog</span>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<a class="box_news" href="#">
					<figure>
						<img src="upload/post4.jpg" data-src="upload/post4.jpg" alt="" width="400" height="266" class="lazy">
						<!-- <figcaption><strong>28</strong>Dec</figcaption> -->
					</figure>
					<ul>
						<li>By Văn Khải</li>
						<li>01.12.2023</li>
					</ul>
					<h4>Phối đồ mọi phong cách với mẫu giày Nike Air Force 1 White Trắng</h4>
					<p> Nike Air Force 1 Trắng Full White là “đôi giày quốc dân” đối với giới trẻ.Sở hữu kiểu dáng thông dụng, đi kèm sắc trắng tinh khôi có thể kết hợp với mọi kiểu quần áo . </p>
				</a>
			</div>
			<!-- /box_news -->
			<div class="col-lg-6">
				<a class="box_news" href="#">
					<figure>
						<img src="upload/post2.jpg" data-src="upload/post2.jpg" alt="" width="400" height="266" class="lazy">
						<!-- <figcaption><strong>28</strong>Dec</figcaption> -->
					</figure>
					<ul>
						<li>By Thành Luân</li>
						<li>30.12.2023</li>
					</ul>
					<h4>Giày Replica là gì? Cách phân biệt các loại giày Fake</h4>
					<p>Thuật ngữ replica được sử dụng rất thường xuyên, vậy giày replica là gì? Cùng mình định nghĩa và phân loại các chât lượng giày fake khác nhau nhé</p>
				</a>
			</div>
			<!-- /box_news -->
			<div class="col-lg-6">
				<a class="box_news" href="#">
					<figure>
						<img src="upload/post3.jpg" data-src="upload/post3.jpg" alt="" width="400" height="266" class="lazy">
						<!-- <figcaption><strong>28</strong>Dec</figcaption> -->
					</figure>
					<ul>
						<li>By Xuân Đạt</li>
						<li>29.12.2023</li>
					</ul>
					<h4>TOP 10++ MẪU GIÀY SNEAKER HOT NHẤT 2023 ĐÁNG SỞ HỮU</h4>
					<p>Trong bài viết này hãy cùng mình ngắm trọn bộ top những đôi giày sneaker hot trend nhất năm 2023 mà nhất định bạn không được bỏ qua nhé!</p>
				</a>
			</div>
			<!-- /box_news -->
			<div class="col-lg-6">
				<a class="box_news" href="#">
					<figure>
						<img src="upload/post1.jpg" data-src="upload/post1.jpg" alt="" width="400" height="266" class="lazy">
						<!-- <figcaption><strong>28</strong>Dec</figcaption> -->
					</figure>
					<ul>
						<li>By Văn Khải</li>
						<li>28.12.2023</li>
					</ul>
					<h4>Các mẫu giày sáng tạo nhà Nike Air Force 1</h4>
					<p>Với thiết kế đột phá và sáng tạo, Nike Air Force 1 đã trở thành cái tên huyền thoại của làng thời trang thể thao thế giới. Air Force 1 vẫn đang chứng minh sức hấp dẫn của mình bằng những mẫu giày cực chất, cực lạ.</p>
				</a>
			</div>
			<!-- /box_news -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>
<!-- /main -->