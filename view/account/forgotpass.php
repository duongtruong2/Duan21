<main class="bg_gray">
		<div id="track_order" class="mb-5 mt-5">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<img src="img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
						<p>Nhập Email để lấy lại mật khẩu</p>
						<form class="mb-5" method="post" action="index.php?act=quenmk">
							<div class="search_bar">
								<input type="email" class="form-control" name="email" placeholder="Email của bạn" required>
                                <p><?php if(!empty($sendMailMess)) echo $sendMailMess ?></p>
                                <button type="submit" class="btn btn-primary mt-3 mb-5">Gửi</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /track_order -->
    </main>