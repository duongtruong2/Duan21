<?php
function get_items_from_cart($cart_id){
    $sql = "SELECT
    MIN(pi.image_name) AS image,
    p.product_id,
    p.product_name,
    pd.product_size,
    pd.product_detail_id,
    cd.product_quantity,
    p.product_price,
    cd.product_quantity * p.product_price AS subtotal
FROM cart_detail cd
JOIN cart ON cart.cart_id = cd.cart_id
JOIN
    products_detail pd ON cd.product_detail_id = pd.product_detail_id
JOIN
    products p ON pd.product_id = p.product_id
JOIN
    products_image pi ON p.product_id = pi.product_id WHERE cart.cart_id = $cart_id 
    GROUP BY cd.cart_detail_id;";

    return pdo_query($sql);
}

function create_order($user_id,$fullname,$email,$tel,$address,$payment,$note,$voucher,$totalBill){
    $sql ="INSERT INTO `order`(user_id,fullname,email,tel,address,payment_method,note,total) VALUES ($user_id,'$fullname','$email','$tel','$address','cod','$note',$totalBill)";
    return pdo_execute($sql);
}

function create_order_detail($order_id,$product_detail_id,$price,$quantity){
    $sql ="INSERT INTO order_detail(order_id,product_detail_id,price,quantity) VALUES ($order_id,$product_detail_id,$price,$quantity)";
    pdo_execute($sql);
}

function update_cart($user_cart){
    $sql = "DELETE FROM cart_detail
    WHERE cart_id = $user_cart;
    ";
    pdo_execute($sql);
}

function update_quantity_pro($id,$qty){
    $sql = "UPDATE products_detail SET product_quantity = product_quantity - $qty WHERE product_detail_id = $id";
    pdo_execute($sql);
}

function check_voucher($code){
    $sql = "SELECT * FROM voucher WHERE code = '$code'";
    return pdo_query_one($sql);
}

function update_voucher($code){
    $sql = "UPDATE voucher SET quantity = quantity - 1 WHERE code = '$code'";
    pdo_execute($sql);
}

function create_bill($order_id,$sotien,$note,$magiaodich,$manganhang){
    $sotien = $sotien / 100;
    $sql = "INSERT INTO bill(order_id,sotien,note,magiaodich,manganhang) VALUES ($order_id,$sotien,'$note',$magiaodich,'$manganhang')";
    pdo_execute($sql);
}

function update_status($id,$status){
    $sql = "UPDATE `order` SET `status` = '$status' WHERE order_id = $id";
    pdo_execute($sql);
}

function sendOrder($fullname, $email, $tel,$address,$note,$sp,$payment) {
    if(is_array($sp)){
        $listsp = "";
        foreach ($sp as $s) {
            $listsp .= "<tr>
            <td>{$s['product_name']}</td>
            <td>{$s['product_size']}</td>
            <td>{$s['product_quantity']}</td>
            <td>{$s['product_price']}</td>
        </tr>";
        }
    }

    $total = number_format($_SESSION['total_order'], 0, ',', '.') . ' đ';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
            //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'khaitestmail.unitop@gmail.com';                     //SMTP username
        $mail->Password   = 'cwazstpxfuhqwsdb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('khaitestmail.unitop@gmail.com', 'khaimvph33123');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thông tin đơn hàng';
        $mail->Body    = "
        <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #dddddd;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Thông Tin Đơn Hàng</h2>

        <div>
            <p><strong>Họ Tên:</strong> $fullname </p>
            <p><strong>Số Điện Thoại:</strong> $tel </p>
            <p><strong>Email:</strong> $email </p>
            <p><strong>Địa Chỉ Nhận Hàng:</strong> $address </p>
            <p><strong>Phương thức thanh toán:</strong> $payment </p>
            <p><strong>Ghi Chú Đơn Hàng:</strong> $note </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Size</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                $listsp
            </tbody>
        </table>
        <div class='footer'>
            <p>Tổng số tiền: $total</p>
            <p>Cảm ơn bạn đã mua hàng!</p>
        </div>
    </div>
</body>
</html>

        ";

        $mail->send();
        } catch (Exception $e) {
            echo "Email gửi không thành công. Lỗi: {$mail->ErrorInfo}";
    }
}
?>