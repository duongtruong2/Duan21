	
	<main class="bg_gray">
		
        <div class="container margin_30">
            <!-- <div class="page_header text-center">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Đăng nhập/Đăng ký</a></li>
                        <li>Page active</li>
                    </ul>
            </div>
            <h1>Đăng nhập</h1> -->
        </div>
        <!-- /page_header -->
                <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Đăng nhập</h3>
                        <div class="form_container">
                            <form action="index.php?act=dangnhap" method="post">
                            <div class="row no-gutters">
                                <div class="col-lg-6 pr-lg-1">
                                    <a href="#0" class="social_bt facebook">Đăng nhập với Facebook</a>
                                </div>
                                <div class="col-lg-6 pl-lg-1">
                                    <a href="#0" class="social_bt google">Đăng nhập với Google</a>
                                </div>
                            </div>
                            <div class="divider"><span>Hoặc</span></div>
                            <div class="form-group">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password_in" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password_in" value="" placeholder="">
                                <span><?php if(!empty($mess)) echo $mess ?></span>
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Ghi nhớ mật khẩu
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="index.php?act=quenmk">Quên mật khẩu</a></div>
                            </div>
                            <div class="text-center"><input type="submit" value="Đăng nhập" class="btn_1 full-width"></div>
                            </form>
                        </div>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                    <div class="row text-center mt-4 mb-5">
                        <p>Bạn chưa có tài khoản ? <a href="index.php?act=dangky">Đăng ký ngay</a></p>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /row -->
            </div>
            <!-- /container -->
        </main>
        <!--/main-->