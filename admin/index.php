<?php
ob_start();
session_start();

if(!isset($_SESSION['user']) || $_SESSION['role'] != "admin"){
    header("location: ../index.php");
}
include("../model/pdo.php");
include("../admin/model_admin/category.php");
include("../admin/model_admin/product.php");
include("../admin/model_admin/order.php");
include("../admin/model_admin/account.php");
include("../admin/model_admin/thongke.php");
include("../admin/model_admin/danhgia.php");
include("../admin/model_admin/voucher.php");
include("../admin/model_admin/bill.php");
// include("home.php");
$user = get_user($_SESSION['user_id']);
include("../admin/view/header.php");
$warring=[];
$date_end=date('Y-m-d');
// delete_voucher_date_end($date_end);
if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch($act){
        //start category//
    case'add_category':
        if(isset($_POST['add_category'])){
            $category_name=$_POST['category_name'];
            if(!empty($category_name)){
                if(is_numeric($category_name)){
                    $warring['category']="Trường này chỉ nhận chuỗi";
                }
                if(!empty($warring)){
                }
                else{
                    insert_category($category_name);
                    $warring['all']="Thêm Thành công";
                }
            }
            else{
                $warring['category']= 'Bạn cần nhập đầy đủ thông';
            }
        };
        include('../admin/category/add.php');
        break;
    case'list_category':
        if(isset($_POST['btn_search'])){
            $keyword=$_POST['search_category'];
        }else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword,$start,$limit);
        $list_category=count_category();
        include '../admin/category/list.php';
        break;
    case 'edit_category':
        if(isset($_GET['category_id'])&&($_GET['category_id']>0)){
            $category=loadone_category($_GET['category_id']);
        }
        include ('../admin/category/update.php');
        break;
    case 'update_category':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $category_id=$_POST['category_id'];
            $category_name=$_POST['category_name'];
            update_category($category_id,$category_name);
            $warring="Update successful";
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword='',$start,$limit);
        include "../admin/category/list.php";
        break;
    case'delete_category':
        if(isset($_GET['category_id'])&&($_GET['category_id']>0)){

            change_category($_GET['category_id']);
            delete_category($_GET['category_id']);
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_category();
        $list_pro=load_page_category($keyword='',$start,$limit);
        $list_category=loadall_category();
        include ('../admin/category/list.php');
        break;
        // end category//

        // start product//
    case 'add_product':
        if(isset($_POST['add_product'])){
            $category_id=$_POST['category'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $discounted_price=$_POST['discounted_price'];
            $product_describe=$_POST['product_describe'];
            $product_status=$_POST['product_status'];
            
            // ảnh
            $images = $_FILES['product_image'];

            // Biến thể
            $sizes = $_POST['size'];
            $variantQuantities = $_POST['variantQuantity'];

            if(!empty( $product_name && $product_price && $discounted_price && $product_describe && $product_status)){
                if(is_numeric($product_name)){
                    $warring['product_name']="Trường này chỉ nhận  dữ liệu chuỗi";
                }
                if(is_numeric($product_describe)){
                    $warring['product_describe']="Trường này chỉ nhận  dữ liệu chuỗi";
                }
                
                if(!is_numeric($product_price)){
                    $warring['product_price']="Trường này chỉ nhận  dữ liệu Số";
                }
                if(!is_numeric($discounted_price)){
                    $warring['discounted_price']="Trường này chỉ nhận  dữ liệu Số";
                }
            if(!empty($warring)){
            }
            else{
                $idsp = insert_product($category_id,$product_name, $product_price, $discounted_price, $product_describe, $product_status);

                if (!empty($images['name'][0])) {
                    // $images = $_FILES['product_image'];
                    // $uploadedImages = [];
            
                    for ($i = 0; $i < count($images['name']); $i++) {
                        $imageName = $images['name'][$i];
                        $tmpName = $images['tmp_name'][$i];
            
                        $uploadPath = '../upload/' . $imageName;
            
                        move_uploaded_file($tmpName, $uploadPath);

                        insert_image($idsp,$imageName);
                        // $uploadedImages[] = $uploadPath;
                    }
                }   
                if (!empty($sizes) && !empty($variantQuantities)) {
                    foreach ($sizes as $key => $size) {
                        $variantQuantity = $variantQuantities[$key];
                        add_variant($idsp,$size,$variantQuantity);
                    }
                }
                
                $warring['all']="Thêm Thành công";
            }
        }
            else{
                $warring['all']="Bạn cần nhập đầy đủ thông tin";
            }
        }
        $list_category=loadall_category();
        include('../admin/product/add.php');
        break;

    case "add_detail":
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $idsp = $_POST['idsp'];

            $sizes = $_POST['size'];
            $variantQuantities = $_POST['variantQuantity'];

            if (!empty($sizes) && !empty($variantQuantities)) {
                foreach ($sizes as $key => $size) {
                    $variantQuantity = $variantQuantities[$key];
                    add_variant($idsp,$size,$variantQuantity);
                }

                header("location: index.php?act=product_detail&product_id=$idsp");
            }
        }
        
        $id = $_GET['id'];
        include('../admin/product/add_detail.php');
        break;
    case 'list_product':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_product'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_category'])&&($_POST['filter_category'])){
            $category_id=$_POST['category'];
        }
        else{
            $category_id= 0;
        }
        if(isset($_POST['filter_price'])&&($_POST['filter_price'])){
            $price=$_POST['price_product'];
        }
        else{
            $price= "";
        }
        
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product($keyword,$category_id,$price);
        $list_pro= load_page_product($keyword,$category_id,$price,$start,$limit);
        $list_product=count_product($keyword,$category_id,$price);
        $list_category=loadall_category();
        include '../admin/product/list.php';
        break;
    case'product_delete':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_product'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_category'])&&($_POST['filter_category'])){
            $category_id=$_POST['category'];
        }
        else{
            $category_id= 0;
        }
        if(isset($_POST['filter_price'])&&($_POST['filter_price'])){
            $price=$_POST['price_product'];
        }
        else{
            $price= "";
        }

        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count= count_product_delete();
        $list_pro=  load_delete_product($keyword,$category_id,$price,$start,$limit);
        $list_product=count_product_delete();
        $list_category=loadall_category();
        include '../admin/product/product_delete.php';
        break;
    case'khoiphuc':
        if(isset($_GET['product_id'])&&($_GET['product_id']> 0)){
           khoiphuc($_GET['product_id']);
        }

        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_product'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_category'])&&($_POST['filter_category'])){
            $category_id=$_POST['category'];
        }
        else{
            $category_id= 0;
        }
        if(isset($_POST['filter_price'])&&($_POST['filter_price'])){
            $price=$_POST['price_product'];
        }
        else{
            $price= "";
        }

        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product($keyword,$category_id,$price);
        $list_pro= load_page_product($keyword,$category_id,$price,$start,$limit);
        $list_product=count_product($keyword,$category_id,$price);
        $list_category=loadall_category();
        include '../admin/product/list.php';
        break;
    case'edit_product':
        if(isset($_GET['product_id'])&&($_GET['product_id']> 0)){
            $product=loadone_product($_GET['product_id']);
            $product_image=loadall_image($_GET['product_id']);
        }
        $list_category=loadall_category();
        include ('../admin/product/update.php');
        break;
    
    case'update_product':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $product_id=$_POST['product_id'];
            $image_id=$_POST['imgae_id'];
            $category_id=$_POST['category'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $discounted_price=$_POST['discounted_price'];
            $product_describe=$_POST['product_describe'];
            $product_status=$_POST['product_status'];
            $images = $_FILES['image'];
            $file_name=$_FILES['product_image']['name'];
            $target_dir="../upload/";
            $target_file=$target_dir . basename($_FILES["product_image"]["name"]);
            move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
            update_product($product_id,$category_id,$product_name,$product_price,$discounted_price,$product_describe,$product_status);
            update_image($image_id,$product_id,$file_name);
            if (!empty($images['name'][0])) {
                // $images = $_FILES['product_image'];
                // $uploadedImages = [];
        
                for ($i = 0; $i < count($images['name']); $i++) {
                    $imageName = $images['name'][$i];
                    $tmpName = $images['tmp_name'][$i];
        
                    $uploadPath = '../upload/' . $imageName;
        
                    move_uploaded_file($tmpName, $uploadPath);

                    insert_image($product_id,$imageName);
                    // $uploadedImages[] = $uploadPath;
                }
            }   
            $warring= 'Sửa Thành Công';
        }
        $list_category=loadall_category();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        // $count=count_product($keyword,$category_id,$price);
        // $product_image=load_image($product_id);
        $list_pro= load_page_product($keyword="",$category_id="",$price="",$start,$limit);
        include '../admin/product/list.php';
        break;
    case"product_detail":
        if(isset($_GET['product_id'])&&($_GET['product_id']> 0)){
            $load_detail=loadone_product($_GET['product_id']);
            $product_detail=load_product_detai($_GET['product_id']);
        }
        
        include "../admin/product/product_detail.php";
        break;
    case"edit_detail":
            if(isset($_GET['product_detail_id'])&&($_GET['product_detail_id']> 0)){
                $detail_id= load_detail_id($_GET['product_detail_id']);
            }
            include "../admin/product/update_detail.php";
            break;
    case"update_detail":
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $product_id=$_POST['product_id'];
            $product_detail_id=$_POST['product_detail_id'];
            $product_size=$_POST['product_size'];
            $product_quantity=$_POST['product_quantity'];
            update_detail($product_size,$product_quantity,$product_detail_id);
        }
        $load_detail=loadone_product($product_id);
        $product_detail=load_product_detai($product_id);
        include '../admin/product/product_detail.php';
        break;
    case 'delete_product':
        if(isset($_GET['product_id'])&&($_GET['product_id'])){
            delete_product($_GET['product_id']);
        }

        header("location: index.php?act=list_product");
        $list_product=loadall_product();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_product($keyword,$category_id,$price);
        $list_pro= load_page_product($keyword="",$category_id="",$price="",$start,$limit);
        include ('../admin/product/list.php');
        break;
    case 'delete_image':
        if(isset($_GET['image_id'])&&($_GET['image_id']>0)){
            delete_image($_GET['image_id']);
        }
        header("location: index.php?act=list_product");
        // include ('../admin/product/list.php');
        break;
    case 'add_account':
        if(isset($_POST['btn_add'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];
            $address=$_POST['address'];
            $file_name=$_FILES['avatar']['name'];
            $target_dir="../upload/";
            $target_file=$target_dir . basename($_FILES["avatar"]["name"]);
            move_uploaded_file($_FILES['avatar']['tmp_name'],$target_file);
            $role=$_POST['role'];
            $pattern = '/^(0|\+84|\+841|\+849|\+8498)([2-9]\d{8})$/';
            if(!empty($username&&$password&&$fullname&&$email&&$tel&&$role&&$file_name)){
                if(strlen($username)<6){
                    $warring['username']="Tên đăng nhập phải lớn hơn 6 kí tự";
                }
                if(strlen($password)<6){
                    $warring['password']="Mật khẩu phải lớn hơn 6 kí tự";
                }
                if(is_numeric($fullname)){
                    $warring['fullname']="Trường này chỉ nhận dữ liệu chuỗi";
                }
                if(is_numeric($address)){
                    $warring['address']="Trường này chỉ nhận dữ liệu chuỗi";
                }
                if(!preg_match($pattern,$tel)){
                    $warring['tel']="Số điện thoại không đúng định dạng";
                }
                if(!preg_match('/^\\S+@\\S+\\.\\S+$/',$email)){
                    $errors['email'] = "Không đúng định dạng Email";
                }
                if(is_numeric($role)){
                    $warring['role']="Trường này chỉ nhận dữ liệu chuỗi";
                }
                if(!empty($warring)){
                }else{
                    insert_account($username,$password,$fullname,$email,$tel,$address,$file_name,$role);
                    $warring['all']="Thêm Thành công";
                }
            }
            else{
                $warring['all']="Bạn cần nhập đầy đủ dữ liệu";
            }
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_account'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_account'])&&($_POST['filter_account'])){
            $role=$_POST['account'];
        }
        else{
            $role= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account($keyword="",$role="");
        $list_account=load_page_account($keyword="",$role="",$start,$limit);
        include ('../admin/account/add.php');
        break;
    case 'list_account':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_account'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_account'])&&($_POST['filter_account'])){
            $role=$_POST['account'];
        }
        else{
            $role= '';
        }

        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account($keyword,$role);
        $list_account=load_page_account($keyword,$role,$start,$limit);
        $account=count_account($keyword,$role);
        include ('../admin/account/list.php');
        break;
    case'edit_account':
        if(isset($_GET['user_id'])&&($_GET['user_id']> 0)){
            $account=loadone_account($_GET['user_id']);
            $list_account=loadall_account();
        }
        include ('../admin/account/update.php');
        break;
    case'update_account':
        if(isset($_POST['btn_update'])&&($_POST['btn_update'])){
            $user_id=$_POST['user_id'];
            $username=$_POST['username'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];
            $address=$_POST['address'];
            $role=$_POST['role'];
            $file_name=$_FILES['avatar']['name'];
            $folder='../upload/';
            move_uploaded_file($_FILES['avatar']['tmp_name'], $folder . $file_name);
            update_account( $username, $fullname, $email,$tel, $address,$role, $file_name,$user_id);
            $warring='thành công';
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_account'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_account'])&&($_POST['filter_account'])){
            $role=$_POST['account'];
        }
        else{
            $role= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account($keyword,$role);
        $list_account=load_page_account($keyword,$role,$start,$limit);
        include ('../admin/account/list.php');
        break;
    case'delete_account':
        if(isset($_GET['user_id'])&&($_GET['user_id']>0)){
            delete_account($_GET['user_id']);
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_account'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['filter_account'])&&($_POST['filter_account'])){
            $role=$_POST['account'];
        }
        else{
            $role= '';
        }
        $list_account=loadall_account();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_account($keyword,$role);
        $list_account=load_page_account($keyword="",$role="",$start,$limit);
        include ('../admin/account/list.php');
        break;
    case 'list_order':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_order'];
        }
        else{
            $keyword= '';
        }
        if(isset($_POST['btn_search'])&&($_POST['btn_search'])){
            $search_code=$_POST['search_code'];
        }
        else{
            $search_code="";
        }
        if(isset($_POST['filter_status'])&&($_POST['filter_status'])){
            $status_order=$_POST['status'];
        }
        else{
            $status_order="";
        }
        if(isset($_POST['btn_cencel'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            canceled_order($order_id,$status);
        } if(isset($_POST['btn_update'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            order_update($order_id, $status);
            header("location: index.php?act=list_order&order_id=$order_id");
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_order($keyword,$search_code,$status_order);
        $list_order=load_page_order($keyword,$search_code,$status_order,$start,$limit);
        $order=count_order($keyword,$search_code,$status_order);
        // $list_order=loadall_order();
        include '../admin/order/list.php';
        break;
    case'order_detail':
        if(isset($_GET['order_id'])){
            $list_order=loadone_order($_GET['order_id']);
            $list_product=load_product($_GET['order_id']);
        }
        include '../admin/order/show.php';
        break;
    case 'update_order':
        if(isset($_POST['btn_cencel'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            canceled_order($order_id,$status);
        } if(isset($_POST['btn_update'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            order_update($order_id, $status);
            header("location: index.php?act=order_detail&order_id=$order_id");
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_order'];
        }
        else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_order($keyword,$search_code,$status_order);
        $list_order=load_page_order($keyword,$search_code,$status,$start,$limit);
        $order=count_order($keyword,$search_code,$status_order);
        include '../admin/order/list.php';
        break;
    case 'update_order_today':
        if(isset($_POST['btn_cencel'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            canceled_order($order_id,$status);
        } if(isset($_POST['btn_update'])){
            $status=$_POST['status'];
            $order_id=$_POST['order_id'];
            order_update($order_id, $status);
        }
        $date = date("Y-m-d",time());
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_order($keyword="",$search_code="",$status_order="");
        $list_order=load_page_order_today($keyword="",$start,$limit,$date);
        $order=count_order($keyword="",$search_code="",$status_order="");
        include('../admin/thongke/home.php');
        break;
    case'list_thongke':
        $date = date("Y-m-d",time());
        $load_category=loadall_category();
        $list_account=loadall_account();
        $load_order=loadall_order();
        $load_product=loadall_product();
        $list_evaluation=loadall_danhgia();
        if(isset($_POST['search_year'])){
            if($_POST['year']!=""){
                $years=$_POST['year'];
            }
            if ($_POST['month']!=""){
            $month=$_POST['month'];
            }}
            else{
                $years="";
                $month="";
            }
        // $month_total=month_doanhthu($month, $years);
        $product_day=product_day($date);
        $list_star=load_star();
        $all_doanhthu=all_doanhthu();
        $load_tk=loadall_thongke();
        $selling_pro = get_selling_products();
        $revenue = get_revenue();
        $pending = get_pending_status();
        // $delivered = get_order_status("delivered");
        // $shiped= get_order_status("shiped");
        // $canceled= get_order_status("canceled");

        include('../admin/thongke/view.php');
        break;
    
    case'list_comment':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $product_name=$_POST['product'];
            $user_name=$_POST['username'];
        }
        else{
            $product_name="";
            $user_name="";
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_evaluation();
        $list_evaluation=load_page_evaluation($product_name,$user_name,$start,$limit);
        $order=count_evaluation();
        $list_star=load_star();
        // $list_evaluation=loadall_danhgia();
        include "../admin/danhgia/show.php";
        break;
    case'delete_evaluation':
        if(isset($_GET['evaluation_id'])){
            delete_evaluation($_GET['evaluation_id']);
        }
        $list_evaluation=loadall_danhgia();
        include "../admin/danhgia/show.php";
        break;
    case'list_voucher':
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_voucher'];
        }
        else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_voucher();
        $list_voucher=load_page_voucher($keyword,$start,$limit);
        $voucher=count_voucher();
        // $list_evaluation=loadall_danhgia();
        include "../admin/voucher/list.php";
        break;
    case 'delete_voucher':
        if(isset($_GET['voucher_id'])&&($_GET['voucher_id']>0)){
            delete_voucher($_GET['voucher_id']);
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_voucher'];
        }
        else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_voucher();
        $list_voucher=load_page_voucher($keyword,$start,$limit);
        $voucher=count_voucher();
        include ('../admin/voucher/list.php');
        break;

    case 'add_voucher':
        if(isset($_POST['btn_add'])){
            $code=$_POST['code'];
            $category_code=$_POST['category_code'];
            $value=$_POST['value'];
            $date_start=$_POST['date_start'];
            $date_end=$_POST['date_end'];
            $quantity=$_POST['quantity'];
            if(!empty($code&&$category_code&&$value&&$date_start&&$date_end&&$quantity)){
                if(strlen($code)< 6 && strlen($code) >10 ){
                    $warring['code']="mã giảm giá phải lớn hơn 6 và nhỏ hơn 10 kí tự";
                }
                // if(!is_numeric($category_code)){
                //     $warring['category_code']="Trường này chỉ nhận dữ liệu số";
                // }
                if($category_code==1 && $value>=100 ){
                    $warring['value']="loại mã giảm giá chỉ nhận max là 100 và min là 1";
                }
                if($date_start>$date_end){
                    $warring['date_start']="ngày bắt đầu phải thấp hơn ngày kết thúc";
                }
                if(($date_end<$date_start)){
                    $warring['date_end']="ngày kết thúc phải lớn hơn ngày bắt đầu";
                }
                if(!empty($warring)){
                }
                else{
                    insert_voucher($code,$category_code,$value,$date_start,$date_end,$quantity);
                    $warring['all']="Thêm Thành công";
                }
            }
            else{
                $warring['all']="Bạn cần nhập đầy đủ dữ liệu";
            }
        }
        if(isset($_POST['keyword'])&&($_POST['keyword'])){
            $keyword=$_POST['search_voucher'];
        }
        else{
            $keyword= '';
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_voucher();
        $list_voucher=load_page_voucher($keyword,$start,$limit);
        $voucher=count_voucher();
        include ('../admin/voucher/add.php');
        break;
    case 'list_bill':
        if(isset($_POST['keyword'])){
            $keyword=$_POST['search_bill'];
        }
        else{
            $keyword="";
        }
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_bill();
        $list_bill=load_page_bill($keyword,$start,$limit);
        $bill=count_voucher();
        include("../admin/bill/list.php");
        break;
    case'bill_detail':
        if(isset($_GET['bill_id'])&&($_GET['order_id'])){
           $loadone_bill=Loadone_bill($_GET['bill_id']);
           $list_product=load_product_bill($_GET['order_id']);
        }
        include('../admin/bill/show.php');
        break;
    case 'show_bill':
        include('../admin/bill/show.php');
        break;
    default:
    $date = date("Y-m-d",time());
        // $date=getdate();
        $limit=10;  
        if(isset($_POST['number'])){
            $number=$_POST['number'];   
            $start=($number-1)*$limit;
        }else{
            $start= 0;
        }
        $count=count_order($keyword="",$search_code="",$status_order="");
        $list_order=load_page_order_today($keyword="",$start,$limit,$date);
        $order=count_order($keyword="",$search_code="",$status_order="");
        include('../admin/thongke/home.php');
    // include('../admin/view/home.php');
    break;
    }
    
}
else{
    $date = date("Y-m-d",time());
    // $date=getdate();
   
    $limit=10;  
    if(isset($_POST['number'])){
        $number=$_POST['number'];   
        $start=($number-1)*$limit;
    }else{
        $start= 0;
    }
    $selling_pro = get_selling_products();
    $revenue = get_revenue();
    $pending = get_pending_status();
    $delivered = get_order_status("delivered");
    $shiped= get_order_status("shiped");
    $canceled= get_order_status("canceled");
    $count=count_order($keyword="",$search_code="",$status_order="");
    $list_order=load_page_order_today($keyword="",$start,$limit,$date);
    $order=count_order($keyword="",$search_code="",$status_order="");
    include('../admin/thongke/home.php');
}
include("../admin/view/footer.php");
?>
