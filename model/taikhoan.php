<?php
function dangnhap($user,$pass) {
    $sql = "SELECT * FROM `user` WHERE `username` ='$user' and `password` ='$pass'";
    $taikhoan = pdo_query_one($sql);

    return $taikhoan;
}


function check_email($email) {
    $sql="SELECT * FROM user WHERE email = '$email'";
    $result = pdo_query_one($sql);

    if($result){
        return $result;
    }else{
        return false;
    }
}

function check_user($username) {
    $sql="SELECT * FROM user WHERE username='$username'";
    $result = pdo_query_one($sql);

    if($result){
        return true;
    }else{
        return false;
    }
}

function sendMail($email, $username, $pass) {
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
        $mail->Subject = 'Lấy lại mật khẩu';
        $mail->Body    = 'Mật khẩu của bạn là ' .$pass;

        $mail->send();
        } catch (Exception $e) {
            echo "Email gửi không thành công. Lỗi: {$mail->ErrorInfo}";
    }
}

function add_taikhoan($email,$user,$pass){
    $sql="INSERT INTO `user` ( `email`, `username`, `password`) VALUES ( '$email', '$user','$pass'); ";
    pdo_execute($sql);
}

function get_user($id){
    $sql = "select * from user where user_id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function update_user($id,$email,$fullname,$address,$tel,$img){
    if($img != ""){
        $sql = "update user set email = '$email', fullname= '$fullname' ,address = '$address', tel = '$tel', avatar='$img' where user_id = '$id'";
    }else{
        $sql = "update user set email = '$email', fullname= '$fullname' ,address = '$address', tel = '$tel' where user_id = '$id'";
    }
    pdo_execute($sql);
    return "Cập nhật thông tin thành công";
}

function check_pass($username,$pass){
    $sql="SELECT * FROM user WHERE username='$username' AND password ='$pass' ";
    $result = pdo_query_one($sql);

    if($result){
        return true;
    }else{
        return false;
    }
}

function update_pass($id,$pass){
    $sql = "UPDATE user SET password = '$pass' WHERE user_id = $id ";
    pdo_execute($sql);
}
?>