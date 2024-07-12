<?php
ob_start();
session_start();
include "model/pdo.php";
include "function.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/cart.php";
include "model/taikhoan.php";
include "model/order.php";
include "model/checkout.php";

include "global.php";

$danhmuc = loadall_danhmuc();
$selling_products = get_selling_products();
$feature_products = get_feature_products();
$new_products = get_new_product();

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user_id'];
    $user_cart = get_user_cart($user_id);

    if ($user_cart == "") {
        create_cart($user_id);
        $user_cart = get_user_cart($user_id);
    }
    $cart_info = get_cart($user_cart);
    $total = get_total_cart($user_cart);
}

include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

            // Sản phẩm
        case "sanpham":
            // sản phẩm theo danh mục
            if (isset($_GET['search']) && ($_GET['search'] != "")) {
                $search_info = $_GET['search'];
                $dk = " sp.product_name like '%$search_info%' ";
                $dk1 = "&search=$search_info";
            } else {
                $search_info = "";
                $dk = "";
                $dk1 = "";
            }

            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
                $dk = " sp.category_id = $iddm ";
                $dk1 = "&iddm=$iddm";
            } else {
                $iddm = "";
            }

            $num_pro = get_num_pro($iddm, $search_info);
            $total_row = $num_pro;
            $num_per_page = 9;

            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $num_per_page;

            $num_page = ceil($total_row / $num_per_page);

            $pagging = get_pagging($num_page, $page, "index.php?act=sanpham$dk1");
            $listsp = get_record($start, $num_per_page, $dk);
            // $listsp = loadall_sanpham($kyw, $iddm);

            include "view/product/list-products.php";
            break;

        case "filter":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $brand = $_POST['brandInput'];
                $price = $_POST['priceInput'];

                if (!empty($price)) {
                    $arrPr = explode(",", $price);
                } else {
                    $arrPr = [];
                }

                $listsp = get_filter($brand, $arrPr);
            } else {
                header("location: index.php?act=sanpham");
            }

            include "view/product/list-products.php";
            break;

        case "spchitiet":
            if (isset($_GET['id'])) {
                $idsp = $_GET['id'];
                $sp = get_product_detail($idsp);

                if ($sp) {
                    $iddm = $sp['category_id'];
                    $size = get_product_sizes($idsp);

                    $reviews = get_review($idsp);
                    $check_buy = check_buy($_SESSION['user_id'],$idsp);

                    $total_review = get_total_review($idsp);

                    // Tách chuỗi thành mảng dựa trên dấu phẩy
                    $pairs = explode(", ", $size['sizes_and_quantities']);

                    // Tạo mảng để lưu trữ size và số lượng
                    $sizeAndQuantity = [];

                    // Duyệt qua từng cặp số và lưu vào mảng
                    foreach ($pairs as $pair) {
                        // Tách cặp số thành mảng dựa trên dấu hai chấm
                        $numbers = explode(":", $pair);

                        // Lưu size và số lượng vào mảng
                        $sizeAndQuantity[] = [
                            'sku' => $numbers[0],
                            'size' => $numbers[1],
                            'quantity' => $numbers[2]
                        ];
                    }

                    $splienquan = get_related_product($iddm, $idsp);
                    include "view/product/product-detail.php";
                } else {
                    header("location: index.php");
                }
            } else {
                header("location: index.php");
            }
            break;

        case "danhgia":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $idsp = $_POST['idsp'];
                $rating = $_POST['rating-input'];
                $review = $_POST['review'];
                $user_id = $_SESSION['user_id'];

                add_review($idsp, $rating, $review, $user_id);
                header("location: index.php?act=spchitiet&id=$idsp");
            } else {
                if (isset($_GET['id'])) {
                    $idsp = $_GET['id'];

                    if (!isset($_SESSION['user'])) {
                        header("location: index.php?act=spchitiet&id=$idsp");
                    }

                    $sp = get_product_detail($idsp);
                } else {
                    header("location: index.php");
                }
            }
            include "view/product/leave-review.php";
            break;

            // giỏ hàng
        case "themsp":
            // if (isset($_SESSION['user'])) {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $sku = $_POST['sku'];
                    $size = $_POST['size'];
                    $quantity = $_POST['quantity_1'];
                    $price = $_POST['price'];

                    // Kiểm tra sản phẩm đã có trong sản phẩm hay chưa
                    $check = check_exist($user_cart, $sku);

                    if ($check == 1) {
                        // Nếu đã có thì tăng số lượng
                        $total = $price * $quantity;
                        update_quantity($user_cart, $sku, $quantity, $total);
                    } else {
                        // Nếu chưa có, thêm mới vào giỏ hàng
                        $total = $price * $quantity;
                        add_to_cart($user_cart, $sku, $quantity, $total, $size);
                    }

                    $data = "1";
                    echo $data;
                    // header("location: index.php?act=cart");
                // }
            } 
            // else {
            //     header("location: index.php?act=dangnhap");
            // }

            break;

        case "cart":
            if (!isset($_SESSION['user'])) {
                header("location: index.php?act=dangnhap");
            }

            include "view/cart/cart.php";
            break;

        case "xoasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_cart($id);
                header("location: index.php?act=cart");
            } else {
                header("location: index.php?act=cart");
            }

            break;

        case "checkout":
            if (isset($_POST['btn-cart'])) {
                $listPro = get_items_from_cart($user_cart);

                $subtotal = 0;

                $_SESSION['buy_product'] = $listPro;

                foreach ($listPro as $value) {
                    $subtotal += $value['subtotal'];
                }

                $_SESSION['subtotal'] = $subtotal;
            }

            if (empty($listPro)) {
                $listPro = $_SESSION['buy_product'];
                $subtotal = $_SESSION['subtotal'];
            }

            if (isset($_POST['checkout'])) {
                $fullname = $_POST['fullname'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $payment = $_POST['payment'];
                $code = $_POST['code'];
                $voucher = $_POST['voucher'];
                $totalBill = $_POST['totalbill'];

                if (empty($note)) {
                    $note = "null";
                }

                if (empty($code)) {
                    $voucher = 0;
                }

                $errors = [];
                if (!empty($email)) {
                    if (!preg_match('/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$)/', $email)) {
                        $errors['email'] = "Email không đúng định dạng";
                    }
                }

                if (!preg_match('/^0[0-9]{9}$/', $tel)) {
                    $errors['tel'] = "Số điện thoại không đúng định dạng";
                }

                if (empty($errors)) {

                    $new_order = create_order($user_id, $fullname, $email, $tel, $address, $subtotal, $payment, $note, $voucher, $totalBill);

                    foreach ($listPro as $pro) {
                        $pd = $pro['product_detail_id'];
                        $pr = $pro['product_price'];
                        $qt = $pro['product_quantity'];

                        create_order_detail($new_order, $pd, $pr, $qt);
                        update_quantity_pro($pd, $qt);
                    }

                    update_cart($user_cart);

                    if ($voucher) {
                        update_voucher($code);
                    }

                    $_SESSION['id_order'] = $new_order;
                    $_SESSION['total_order'] = $totalBill;

                    if ($payment == "banking") {
                        update_status($new_order, "unpaid");
                        header("location: vnpay_php/vnpay_create_payment.php");
                    } else {
                        if(!empty($email)){
                            sendOrder($fullname,$email,$tel,$address,$note,$listPro,$payment);
                        }
                        
                        header("location: index.php?act=confirm&id=$new_order");
                    }
                }
            }

            $user = get_user($_SESSION['user_id']);
            include "view/cart/checkout.php";
            break;

        case "confirm":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                unset($_SESSION['buy_product']);
                unset($_SESSION['subtotal']);
            }
            include "view/cart/confirm.php";
            break;

        case "checkfail":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            include "view/cart/checkfail.php";
            break;

            // Tài khoản

        case "profile":
            if (!isset($_SESSION['user'])) {
                header("location: index.php?act=dangnhap");
            }

            // lấy thông tin user
            $user = get_user($_SESSION['user_id']);

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $id = $_SESSION['user_id'];

                $errors = [];

                if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)) {
                    $errors['email'] = "Không đúng định dạng Email";
                }

                $pattern = '/^(0|\+84|\+841|\+849|\+8498)([2-9]\d{8})$/';
                if (!preg_match($pattern, $tel)) {
                    $errors['tel'] = "Số điện thoại không hợp lệ";
                }

                $img = $_FILES['img']['name'];

                $file_type = array('png', 'jpg', 'gif', 'jpeg', 'webp');

                $type = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

                $check = true;

                if($img != ""){
                    if (!in_array(strtolower($type), $file_type)) {
                        $errors['type'] = 'Ảnh không đúng định dạng';
                        $check = false;
                    }
                }
                

                if ($img != "" && $check == true) {
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                }

                if (empty($errors)) {
                    $message = update_user($id, $email, $fullname, $address, $tel, $img);
                    $user = get_user($_SESSION['user_id']);
                }
            }

            include "view/account/profile.php";
            break;

        case "repass":
            if (!isset($_SESSION['user'])) {
                header("location: index.php?act=dangnhap");
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $errors = [];

                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $repass = $_POST['repass'];

                $taikhoan = check_pass($_SESSION['user'], $old_pass);

                if (!$taikhoan) {
                    $errors['old_pass'] = "Mật khẩu cũ không chính xác";
                }

                if ($repass != $new_pass) {
                    $errors['repass'] = "Mật khẩu nhập lại không trùng khớp";
                }

                if (empty($errors)) {
                    update_pass($_SESSION['user_id'], $new_pass);
                    $thongbao = "Đổi mật khẩu thành công";
                }
            }
            $user = get_user($_SESSION['user_id']);
            include "view/account/repass.php";
            break;


        case "dangnhap":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $taikhoan = dangnhap($user, $pass);

                if (is_array($taikhoan)) {
                    $_SESSION['user_id'] = $taikhoan['user_id'];
                    $_SESSION['user'] = $taikhoan['username'];
                    $_SESSION['role'] = $taikhoan['role'];
                    header("location: index.php");
                } else {
                    $mess = "<span class='error'>Tên đăng nhập hoặc mật khẩu không chính xác</span>";
                }
            }
            include "view/account/login.php";
            break;

        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky'] != "") {
                $email = $_POST['email'];
                $name = $_POST['username'];
                $pass = $_POST['password'];

                $errors = [];

                // check email đã tồn tại chưa
                if (check_email($email)) {
                    $errors['email'] = "Email đã tồn tại trên hệ thống";
                }

                // check username đã có hay chưa
                if (strlen($name) < 6) {
                    $errors['username'] = "Tên đăng nhập phải ít nhất 6 kí tự";
                } else {
                    if (check_user($name)) {
                        $errors['username'] = "Tên đăng nhập đã tồn tại trên hệ thống";
                    }
                }

                if (strlen($pass) < 6) {
                    $errors['password'] = "Mật khẩu phải ít nhất 6 kí tự";
                }

                if (empty($errors)) {
                    add_taikhoan($email, $name, $pass);
                    $mess = "Đăng ký thành công";
                    include "view/account/login.php";
                    exit();
                }
            }
            include "view/account/register.php";
            break;

        case "dangxuat":
            dangxuat();
            header("location: index.php");
            break;
        case "quenmk":
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];

                $taikhoan = check_email($email);

                if ($taikhoan != false) {
                    sendMail($email, $taikhoan['username'], $taikhoan['password']);

                    $sendMailMess = "<span class='d-block text-success mt-2'>Gửi email thành công</span>";
                } else {
                    $sendMailMess = "<span class='error'>Email bạn nhập không có trong hệ thống</span>";
                }
            }
            include "view/account/forgotpass.php";
            break;

        case "order_detail":
            if (!isset($_SESSION['user'])) {
                header("location: index.php?act=dangnhap");
            }

            $user = get_user($_SESSION['user_id']);
            $order_id = $_GET['id'];
            $order_detail = get_order_detail($order_id);

            switch ($order_detail['status']) {
                case 'unpaid':
                    $status = "Chưa thanh toán";
                    $color = "bg-warning";
                    break;
                case 'pending':
                    $status = "Chờ duyệt";
                    $color = "bg-warning";
                    break;
                case 'processing':
                    $status = "Đang xử lý";
                    $color = "bg-success";
                    break;

                case 'shiped':
                    $status = "Đang giao hàng";
                    $color = "bg-warning";
                    break;


                case 'delivered':
                    $status = "Đã giao thành công";
                    $color = "bg-success";
                    break;


                case 'canceled':
                    $status = "Đã hủy";
                    $color = "bg-danger";
                    break;
            }

            $order_items = get_order_items($order_id);

            include "view/account/order_detail.php";
            break;

        case "myorder":
            if (!isset($_SESSION['user'])) {
                header("location: index.php?act=dangnhap");
            }

            // lấy thông tin user
            $user = get_user($_SESSION['user_id']);

            $user_order = get_user_order($user['user_id']);

            $list_order = "";

            foreach ($user_order as $v) {
                $order_id = $v['order_id'];

                $order_detail = get_order_items($order_id);

                $total = number_format($v['total'], 0, ',', '.') . ' đ';

                switch ($v['status']) {
                    case 'unpaid':
                        $status = "Chưa thanh toán";
                        $color = "bg-warning";
                        $btn = "<a class='btn btn-gray border-dark m-3 cancelOrder' id='cancelOrder' href='index.php?act=cancel_order&id=$order_id'>Hủy đơn hàng</a>";
                        $btn1 = "<a class='btn btn-warning text-white m-3' id='cancelOrder' href='index.php?act=pay&id=$order_id'>Thanh toán</a>";
                        break;
                    case 'pending':
                        $status = "Chờ duyệt";
                        $color = "bg-warning";
                        $btn = "<a class='btn btn-gray border-dark m-3 cancelOrder' id='cancelOrder' href='index.php?act=cancel_order&id=$order_id'>Hủy đơn hàng</a>";
                        $btn1 = "";
                        break;
                    case 'processing':
                        $status = "Đang xử lý";
                        $color = "bg-success";
                        $btn = "";
                        $btn1 = "";
                        break;

                    case 'shiped':
                        $status = "Đang giao hàng";
                        $color = "bg-warning";
                        $btn = "";
                        $btn1 = "";
                        break;

                    case 'delivered':
                        $status = "Đã giao thành công";
                        $color = "bg-success";
                        $btn = "";
                        $btn1 = "";
                        break;


                    case 'canceled':
                        $status = "Đã hủy";
                        $color = "bg-danger";
                        $btn = "";
                        $btn1 = "";
                        break;
                }

                $list_order .=
                    "
                    <div class='card mb-4'>
                    <div class='card-body'>
                        <div class='mb-4 d-flex align-items-center justify-content-between'>
                            <span>Mã đơn hàng : <a href='#'>$order_id</a></span>
                            <span class='badge $color'>$status</span>
                        </div>
                        <div class='d-flex gap-4 align-items-center' data-bs-toggle='collapse' aria-expanded='false' data-bs-target='#myOrders$order_id' role='button'>
                        <div><strong>Ngày đặt</strong>: {$v['created_at']}</div>
                        <div>{$v['total_items']} món</div>
                        <div><strong>Tổng tiền</strong>: $total </div>
                        <div class='bi bi-chevron-down ms-auto'></div>
                        </div>
                    ";

                $list_order .= "<div class='collapse show mt-4' id='myOrders$order_id'>
                    <hr class='mb-0'>
                    <div class='table-responsive'>
                        <table class='table table-custom mb-0'>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>";

                foreach ($order_detail as $od) {
                    $link_sp = "index.php?act=spchitiet&id=" . $od['product_id'];
                    $price = number_format($od['price'], 0, ',', '.');
                    $subtotal = number_format($od['subtotal'], 0, ',', '.');
                    $list_order .= "
                        <tr>
                            <td>
                                <a href='#'>
                                    <img src='upload/{$od['image']}' class='rounded' width='40' alt='...'>
                                </a>
                            </td>
                            <td><a href='$link_sp'>{$od['product_name']}</a></td>
                            <td>{$od['product_size']}</td>
                            <td>{$od['quantity']}</td>
                            <td>$price</td>
                            <td>$subtotal</td>
                        </tr>             
                        ";
                }

                $list_order .= "</tbody>
                    </table>
                </div>
                <div class='text-end'>
                    $btn
                    $btn1
                    <a class='btn btn-primary m-3' href='index.php?act=order_detail&id=$order_id'>Xem chi tiết</a>
                </div>
            </div></div>
            </div>";
            }

            include "view/account/order.php";
            break;
        case "cancel_order":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                cancel_order($id);

                $cancel_item = get_cancel_items($id);

                foreach ($cancel_item as $item) {
                    $idsp = $item['product_detail_id'];
                    $qty = $item['quantity'];

                    restore_quantity($idsp, $qty);
                }

                header("location: index.php?act=order_detail&id=$id");
            } else {
                header("location: index.php?act=myorder");
            }
            break;

        case "pay":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $order = get_order_detail($id);

                $_SESSION['id_order'] = $id;
                $_SESSION['total_order'] = $order['total'];

                header("location: vnpay_php/vnpay_create_payment.php");
            }

            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
