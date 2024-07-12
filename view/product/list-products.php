<main>
	<!-- <div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Category</a></li>
						<li>Page active</li>
					</ul>
				</div>
				<h1>Shoes - Grid listing</h1>
			</div>
		</div>
		<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
	</div> -->
	<!-- /top_banner -->
	<!-- <div id="stick_here"></div>
	<div class="toolbox elemento_stick">
		<div class="container">
			<ul class="clearfix">
				<li>
					<div class="sort_select">
						<select name="sort" id="sort">
							<option value="popularity" selected="selected">Sort by popularity</option>
							<option value="rating">Sort by average rating</option>
							<option value="date">Sort by newness</option>
							<option value="price">Sort by price: low to high</option>
							<option value="price-desc">Sort by price: high to
						</select>
					</div>
				</li>
				<li>
					<a href="#0"><i class="ti-view-grid"></i></a>
					<a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
				</li>
				<li>
					<a href="#0" class="open_filters">
						<i class="ti-filter"></i><span>Filters</span>
					</a>
				</li>
			</ul>
		</div>
	</div> -->
	<!-- /toolbox -->

	<div class="container margin_30">

		<div class="row">
			<aside class="col-lg-3" id="sidebar_fixed">
				<form id="filterForm" method="post" action="index.php?act=filter">
				<div class="filter_col">
					<div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
					<div class="filter_type version_2">
						<h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Thương hiệu</a></h4>
						<div class="collapse show" id="filter_1">
							<ul>
								<?php foreach ($danhmuc as $dm) { ?>
									<li>
									<label class="container_check"><?= $dm['category_name'] ?> <small><?= $dm['product_count'] ?></small>
										<input name="thuong_hieu" type="checkbox" value="<?= $dm['category_id'] ?>">
										<span class="checkmark"></span>
									</label>
								</li>
								<?php } ?>
							</ul>
						</div>
						<!-- /filter_type -->
					</div>
					
					<div class="filter_type version_2">
						<h4><a href="#filter_4" data-bs-toggle="collapse" class="opened">Giá</a></h4>
						<div class="collapse show" id="filter_4">
							<ul>
								<li>
									<label class="container_check">Dưới 1 triệu<small></small>
										<input name="gia" type="checkbox" value="1">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check" >Từ 1 - 2 triệu<small></small>
										<input name="gia" type="checkbox" value="2">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Từ 2 - 3 triệu<small></small>
										<input name="gia" type="checkbox" value="3">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Trên 3 triệu<small></small>
										<input name="gia" type="checkbox" value="4">
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<!-- /filter_type -->
					<input type="hidden" id="brandInput" name="brandInput">
					<input type="hidden" id="priceInput" name="priceInput">
					<div class="buttons">
						<button id="filterButton" type="submit" class="btn_1">Lọc</button>
						<button class="btn_1 gray" type="reset">Bỏ chọn</button>
					</div>
				</div>
			</form>
			</aside>
			<!-- /col -->
			<div class="col-lg-9">
				<div class="row small-gutters">
					<?php foreach ($listsp as $sp) { 
						extract($sp) ?>
						<div class="col-6 col-md-4">
							<div class="grid_item">
								<span class="<?= $highlight == 1 ? 'ribbon off' : '' ?>"><?= $highlight == 1 ? 'Hot' : '' ?></span>
								<figure>
									<a href="index.php?act=spchitiet&id=<?= $product_id ?>">
										<img class="img-fluid lazy" src="upload/<?= $img_name ?>" data-src="upload/<?= $img_name ?>" alt="">
									</a>
									
								</figure>
								<a href="index.php?act=spchitiet&id=<?= $product_id ?>">
									<h3><?= $product_name ?></h3>
								</a>
								<div class="price_box">
									<span class="new_price"><?= number_format($product_price, 0, ',', '.') . ' đ' ?></span>
									<span class="old_price"><?= $discounted_price ?></span>
								</div>
								<ul>
									<!-- <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li> -->
									<!-- <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->
									<li><a href="index.php?act=spchitiet&id=<?= $product_id ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
								</ul>
							</div>
							<!-- /grid_item -->
						</div>
						<!-- /col -->

					<?php } ?>

				</div>
				<!-- /row -->
				<div class="pagination__wrapper">
					<?php if(!empty($pagging)) echo $pagging ?>
				</div>
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->

	</div>
	<!-- /container -->
	
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện khi nút "Lọc" được nhấn
    var filterButton = document.getElementById('filterButton');
    filterButton.addEventListener('click', function() {
      // Gọi hàm để lấy thông tin và truyền vào các input
      filterResults();
    });
  });

  function filterResults() {
	var filterForm = document.getElementById('filterForm');
    filterForm.addEventListener('submit', function(event) {
      // Chặn việc submit mặc định của form
      event.preventDefault();
	})
    // Lấy thông tin từ các ô checkbox được chọn
    var selectedBrands = document.querySelectorAll('input[name="thuong_hieu"]:checked');
    var selectedPrices = document.querySelectorAll('input[name="gia"]:checked');

	console.log(selectedBrands);
	console.log(selectedPrices);

    // Xử lý thông tin và truyền vào input
    var brandInput = document.getElementById('brandInput');
    var priceInput = document.getElementById('priceInput');

    // Lấy thông tin thương hiệu
    var brandValues = Array.from(selectedBrands).map(function(checkbox) {
      return checkbox.value;
    });

    // Lấy thông tin giá
    var priceValues = Array.from(selectedPrices).map(function(checkbox) {
      return checkbox.value;
    });

    // Truyền thông tin vào input
    brandInput.value = brandValues.join(', ');
    priceInput.value = priceValues.join(', ');

    // Submit form
	filterForm.submit();
  }
</script>
</main>
<!-- /main -->
