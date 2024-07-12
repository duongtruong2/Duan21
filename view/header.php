<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Shop giày nhóm 3</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="css/home_1.css" rel="stylesheet">
	<link href="css/listing.css" rel="stylesheet">
	<link href="css/product_page.css" rel="stylesheet">
	<link href="css/leave_review.css" rel="stylesheet">
	<link href="css/cart.css" rel="stylesheet">
	<link href="css/checkout.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

</head>

<body>
	<div id="page">
		<header class="version_2">
			<div class="layer"></div><!-- Mobile menu overlay mask -->
			<div class="main_header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index.php"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<!-- Mobile menu button -->
							<div class="main-menu">
								<div id="header_menu">
									<a href="index.php"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
									<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li class="megamenu">
										<a href="index.php" class="show-submenu">Trang chủ</a>
										<!-- <ul>
										<li><a href="index.html">Slider</a></li>
										<li><a href="index-2.html">Video Background</a></li>
										<li><a href="index-3.html">Vertical Slider</a></li>
										<li><a href="index-4.html">GDPR Cookie Bar</a></li>
									</ul> -->
									</li>
									<li class="megamenu">
										<a href="index.php" class="show-submenu">Giới thiệu</a>
										<!-- <ul>
										<li><a href="index.html">Slider</a></li>
										<li><a href="index-2.html">Video Background</a></li>
										<li><a href="index-3.html">Vertical Slider</a></li>
										<li><a href="index-4.html">GDPR Cookie Bar</a></li>
									</ul> -->
									</li>
									<li class="megamenu">
										<a href="index.php?act=sanpham" class="show-submenu-mega">Sản phẩm</a>
									</li>
									<!-- <li class="megamenu">
									<a href="index.php?act=sanpham&iddm=2" class="show-submenu-mega">Nike</a>
								</li>
								<li class="megamenu">
									<a href="index.php?act=sanpham&iddm=3" class="show-submenu-mega">Adidas</a>
								</li> -->
									<li>
										<a href="#">Blog</a>
									</li>
									<li>
										<a href="#">Liên hệ</a>
									</li>
								</ul>
							</div>
							<!--/main-menu -->
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<a class="phone_top" href="tel://19001009"><strong><span>Cần hỗ trợ?</span>+1900 1009</strong></a>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<!-- /main_header -->

			<div class="main_nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li><span>
											<a href="#">
												<span class="hamburger hamburger--spin">
													<span class="hamburger-box">
														<span class="hamburger-inner"></span>
													</span>
												</span>
												Danh mục sản phẩm
											</a>
										</span>
										<div id="menu">
											<ul>
												<?php
												foreach ($danhmuc as $dm) : ?>
													<li><span><a href="index.php?act=sanpham&iddm=<?= $dm['category_id'] ?>"><?= $dm['category_name'] ?></a></span></li>
												<?php endforeach; ?>
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<form action="index.php" method="GET">
								<div class="custom-search-input">
									<input type="hidden" name="act" value="sanpham">
									<input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
									<button type="submit"><i class="header-icon_search_custom"></i></button>
								</div>
							</form>
						</div>
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top_tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="index.php?act=cart" class="cart_bt"><strong><?php if(isset($total) && $total != ""){ echo $total['soluong']; }else{echo "";} ?></strong></a>
										<?php if(isset($_SESSION['user'])){ ?>
										<div class="dropdown-menu">
											<ul>
												<?php foreach ($cart_info as $ci) : ?>
													<li>
														<a href="index.php?act=spchitiet&id=<?= $ci['product_id'] ?>">
															<figure><img src="upload/<?= $ci['img_name'] ?>" data-src="upload/<?= $ci['img_name'] ?>" alt="" width="50" height="50" class="lazy"></figure>
															<strong><span><?= $ci['product_name'] ?></span><?= number_format($ci['product_price'], 0, ',', '.') . ' đ' ?></strong>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
											<div class="total_drop">
												<div class="clearfix total_c"><strong>Tổng tiền</strong><span>
													<?php
													if(isset($total) && $total != ""){
														$tt = number_format($total['tongtien'], 0, ',', '.') . ' đ';
														echo "$tt";
													}else{
														echo "";
													}
												 	?>
												 </span>
												</div>
												<a href="index.php?act=cart" class="btn_1 outline">Xem giỏ hàng</a>
											</div>
										</div>
										<?php } ?>
									</div>
									<!-- /dropdown-cart-->
								</li>
								
								<!-- <li>
									<a href="#0" class="wishlist"><span>Wishlist</span></a>
								</li> -->
								<li>
									<div class="dropdown dropdown-access">
										<a href="#" class="access_link"><span>Tài khoản</span></a>
										<div class="dropdown-menu">
											<?php
											if (!isset($_SESSION['user'])) {
												echo "<a href='index.php?act=dangnhap' class='btn_1'>Đăng nhập / Đăng ký</a>";
											}
											?>

											<ul>
												<li>
													<a href="index.php?act=profile"><i class="ti-user"></i>Tài khoản của tôi</a>
												</li>
												<li>
													<a href="index.php?act=myorder"><i class="ti-package"></i>Đơn hàng</a>
												</li>
												<?php
												if (isset($_SESSION['user']) && $_SESSION['role'] == "admin") {
													echo "<li><a href='admin/index.php'><i class='ti-headphone-alt'></i>Trang admin</a></li>";
												}
												?>

												<?php
												if (isset($_SESSION['user'])) {
													echo "<li><a href='index.php?act=dangxuat'><i class='ti-power-off'></i>Đăng xuất</a></li>";
												}
												?>
											</ul>
										</div>
									</div>
									<!-- /dropdown-access-->
								</li>
								<!-- <li>
									<a href="javascript:void(0);" class="btn_search_mob"><span>Tìm kiếm</span></a>
								</li> -->
								<!-- <li>
									<a href="#menu" class="btn_cat_mob">
										<div class="hamburger hamburger--spin" id="hamburger">
											<div class="hamburger-box">
												<div class="hamburger-inner"></div>
											</div>
										</div>
										Danh mục
									</a>
								</li> -->
							</ul>
						</div>
					</div>
					<!-- /row -->
				</div>
				<div class="search_mob_wp">
					<input type="text" class="form-control" placeholder="Search over 10.000 products">
					<input type="submit" class="btn_1 full-width" value="Search">
				</div>
				<!-- /search_mobile -->
			</div>
			<!-- /main_nav -->
		</header>
		<!-- /header -->