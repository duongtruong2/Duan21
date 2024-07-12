<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/cart.php";
include "model/checkout.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['act'])) {
    $id =  intval($_POST['id']);
    $qty = intval($_POST['qty']);
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
        $user_cart = get_user_cart($user_id);

        $price = get_product_price($id);

        $total_price = $price * $qty;

        update_total($user_cart, $id, $total_price, $qty);

        $cart_info = get_cart($user_cart);
        $total = get_total_cart($user_cart);
    }

    $sub_total = number_format($total_price, 0, ',', '.') . ' đ';
    $total = number_format($total['tongtien'], 0, ',', '.') . ' đ';

    $data = "$sub_total, $total";

    echo $data;
}

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
        $user_cart = get_user_cart($user_id);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $sku = $_POST['sku'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];
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

            $cart_info = get_cart($user_cart);
            $total = get_total_cart($user_cart);

            $total_pr = number_format($total['tongtien'], 0, ',', '.') . ' đ';

            $data = "{$total['soluong']},$total_pr";
            echo $data;
            // header("location: index.php?act=cart");
        }
    } else {
        header("location: index.php?act=dangnhap");
    }
}

if (isset($_POST['voucherCode'])) {
    $code = $_POST['voucherCode'];
    $totalBill = $_POST['subtotal'];

    // Kiểm tra loại mã
    $check = check_voucher($code);

    if ($check) {
        $type = $check['category_code'];
        $value = $check['value'];
        $startDate = $check['date_start'];
        $endDate = $check['date_end'];
        $quantity = $check['quantity'];

        $currentDate = date('Y-m-d');
        $discounted = 0;

        if ($currentDate >= $startDate && $currentDate <= $endDate && $quantity > 0) {
            if($type == 0){
                $discounted = $value;
                $totalBill = $totalBill - $value;
            }else{
                $discounted = ($value/100) * $totalBill;
                $totalBill -= ($value/100) * $totalBill;   
            }
    
            $data = array('result' => $totalBill,'discounted' => $discounted);
        } else {
            $data = null;
        }
    } else {
        $data = null;
    }

    echo json_encode($data);
}
