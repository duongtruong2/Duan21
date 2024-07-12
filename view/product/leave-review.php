
	<main>	
	<div class="container margin_60_35">
	
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="write_review">
						<h1>Viết đánh giá cho sản phẩm <?= $sp['product_name'] ?></h1>
						<form action="index.php?act=danhgia" method="post">
						<div class="rating_submit">
							<div class="form-group">
							<label class="d-block">Số sao</label>
							<span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating-input" value="5" checked><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating-input" value="4"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating-input" value="3"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating-input" value="2"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating-input" value="1"><label for="1_star" class="rating-star"></label>
							</span>
							</div>
						</div>
						<!-- /rating_submit -->
						<!-- <div class="form-group">
							<label>Title of your review</label>
							<input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
						</div> -->
						<div class="form-group">
							<label>Đánh giá của bạn</label>
							<textarea required name="review" class="form-control" style="height: 180px;" placeholder="Viết đánh giá của bạn để người khác biết thêm về sản phẩm này"></textarea>
						</div>
						<input type="hidden" name="idsp" value="<?= $sp['product_id'] ?>">
						<button type="submit" class="btn_1">Gửi đánh giá</button>
						</form>
					</div>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->