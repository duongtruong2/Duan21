	<main class="bg_gray">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-md-5">
	                <div id="confirm">
	                    <img width="200" height="200" src="upload/meme.jpg" alt="">
	                    <h2 class="mt-2">Thanh toán không thành công</h2>
	                    <p>Quá trình thanh toán chưa hoàn tất, vui lòng thanh toán lại để hoàn tất đơn hàng!</p>
	                    <a href="index.php?act=pay&id=<?= $id ?>" class="btn btn-outline-danger m-2">Thanh toán ngay</a>
	                    <a href="index.php?act=order_detail&id=<?= $id ?>" class="btn btn-outline-info">Xem đơn hàng</a>
	                </div>
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!--/main-->