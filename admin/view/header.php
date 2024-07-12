<!doctype html>
<html lang="en">

<!-- Mirrored from vetra.laborasyon.com/demos/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 15:04:23 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin  </title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.png"/>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="./dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="./dist/css/bootstrap-docs.css" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="./libs/slick/slick.css" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="./dist/css/app.min.css" type="text/css">
    <style>
        .item-action-buttons{
            display:none !important;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- preloader -->
<!-- <div class="preloader">
    <img src="https://vetra.laborasyon.com/assets/images/logo.svg" alt="logo">
    <div class="preloader-icon"></div>
</div> -->
<!-- ./ preloader -->

<!-- sidebars -->

<!-- search sidebar -->
<div class="sidebar" id="search">
    <div class="sidebar-header">
        Search
        <button data-sidebar-close>
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
    <div class="sidebar-content">
        <form class="mb-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-describedby="button-search-addon">
                <button class="btn btn-outline-light" type="button" id="button-search-addon">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <h6 class="mb-3">Last searched</h6>
        <div class="mb-4">
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Reports for 2021</a>
                <a href="#" class="btn text-danger btn-sm" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Current users</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Meeting notes</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </div>
        <h6 class="mb-3">Recently viewed</h6>
        <div class="mb-4">
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-secondary avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-check-circle"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Todo list</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-warning avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-wallet2"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Pricing table</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-info avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-gear"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Settings</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                <a href="#" class="avatar avatar-success avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-person-circle"></i>
                        </span>
                </a>
                <a href="#" class="flex-fill">Users</a>
                <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-action">
        <a href="#" class="btn btn-danger">All Clear</a>
    </div>
</div>
<!-- ./ search sidebar -->

<!-- ./ sidebars -->

<!-- menu -->
<div class="menu">
    <div class="menu-header">
        <a href="index.php" class="menu-header-logo">
            <img src="../img/logo_black.svg" alt="logo">
        </a>
        <a href="../index.php" class="btn btn-success">
            <i class="bi bi-house-door-fill"></i></i>
        </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <?php 
                if ($user['avatar'] != '') {
                    $img_path = "../upload/{$user['avatar']}";
                } else {
                    $img_path = "../img/avatar.jpg";
                } ?>
                <div class="avatar me-3">
                    <img src="<?= $img_path ?>"
                         class="rounded-circle" alt="image">
                </div>
                <div>
                    <div class="fw-bold"><?= $user['username'] ?></div>
                    <small class="text-muted"><?= $user['role'] ?></small>
                </div>
            </a>
            <!-- <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-person dropdown-item-icon"></i> Thông tin tài khoản
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                </a>
                <a href="login.html" class="dropdown-item d-flex align-items-center text-danger"
                   target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Đăng xuất
                </a>
            </div> -->
        </div>
        <ul>
            <!-- <li class="menu-divider">E-Commerce</li> -->
            <!-- <li>
                <a  class="active"
                    href="home.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li> -->
            <li>
                <a href="index.php">
                    <span class="nav-link-icon">
                    <i class="bi bi-house-door-fill"></i></i>
                    </span>
                    <span>Trang Chủ</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Danh Mục</span>
                </a>
                <ul>
                    <li>
                        <a  href="index.php?act=add_category">Thêm Danh Mục</a>
                    </li>
                    <li>
                        <a  href="index.php?act=list_category">Danh Sách Danh Mục</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>
                <ul>
                    <li>
                        <a  href="orders.html">List</a>
                    </li>
                    <li>
                        <a  href="order-detail.html">Detail</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                       <img src="../upload/menu-icon.png" alt="">
                    </span>
                    <span>Sản Phẩm</span>
                </a>
                <ul>
                    <li>
                        <a  href="index.php?act=add_product">Thêm Sản Phẩm</a>
                    </li>
                    <li>
                        <a  href="index.php?act=list_product">Danh Sách Sản Phẩm</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a  href="customers.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span>Customers</span>
                </a>
            </li> -->
            
            <!-- <li class="menu-divider">Apps</li>
            <li>
                <a  href="chats.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-chat-square"></i>
                    </span>
                    <span>Chats</span>
                    <span class="badge bg-success rounded-circle ms-auto">2</span>
                </a>
            </li>
            <li>
                <a href="email.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span>Email</span>
                </a>
                <ul>
                    <li>
                        <a  href="email.html">
                            <span>Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a  href="email-detail.html">
                            <span>Detail</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="email-template.html">
                            <span>Email Template</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li>
                <a href="todo-list.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <span>Todo App</span>
                </a>
                <ul>
                    <li>
                        <a  href="todo-list.html">
                            <span>List</span>
                        </a>
                    </li>
                    <li>
                        <a  href="todo-detail.html">
                            <span>Details</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="menu-divider">Trang</li> -->
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-person"></i>
                    </span>
                    <span>Profile</span>
                </a>
                <ul>
                    <li>
                        <a  href="profile-posts.html">Post</a>
                    </li>
                    <li>
                        <a  href="profile-connections.html">Connections</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <span>Tài Khoản</span>
                </a>
                <ul>
                    <li><a  href="index.php?act=list_account">Danh Sách Tài Khoản</a></li>
                    <li><a href="index.php?act=add_account">Thêm Tài Khoản</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php?act=list_order">
                    <span class="nav-link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                    </svg>
                    </span>
                    <span>Đơn Hàng</span>
                </a>
            </li>
            <li>
                <a href="index.php?act=list_thongke">
                    <span class="nav-link-icon">
                    <i class="bi bi-bar-chart-fill"></i></i>
                    </span>
                    <span>Thống kê</span>
                </a>
            </li>
            <li>
                <a href="index.php?act=list_comment">
                    <span class="nav-link-icon">
                    <i class="bi bi-star-fill"></i>
                    </span>
                    <span>Đánh giá</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                    <img src="../upload/ticket-solid.svg" alt="">
                    </span>
                    <span>Voucher</span>
                </a>
                <ul>
                    <li><a  href="index.php?act=list_voucher">Danh Sách Voucher</a></li>
                    <li><a href="index.php?act=add_voucher">Thêm Voucher</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php?act=list_bill">
                    <span class="nav-link-icon">
                    <img src="../upload/bill.png" alt="">
                    </span>
                    <span>Bill</span>
                </a>
            </li>
            
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-lock"></i>
                    </span>
                    <span>Authentication</span>
                </a>
                <ul>
                    <li>
                        <a href="login.html" target="_blank">Login</a>
                    </li>
                    <li>
                        <a href="register.html" target="_blank">Register</a>
                    </li>
                    <li>
                        <a href="reset-password.html" target="_blank">Reset Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="settings.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>         -->
        </ul>
    </div>
</div>
<!-- ./  menu -->

<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    <div class="header">
    <div class="menu-toggle-btn"> <!-- Menu close button for mobile devices -->
        <a href="#">
            <i class="bi bi-list"></i>
        </a>
    </div>
    <!-- Logo -->
    <a href="index-2.html" class="logo">
        <img width="100" src="https://vetra.laborasyon.com/assets/images/logo.svg" alt="logo">
    </a>
    <!-- ./ Logo -->
    <!-- <div class="page-title">Overview</div> -->
    <!-- <form class="search-form">
        <div class="input-group">
            <button class="btn btn-outline-light" type="button" id="button-addon1">
                <i class="bi bi-search"></i>
            </button>
            <input type="text" class="form-control" placeholder="Search..."
                   aria-label="Example text with button addon" aria-describedby="button-addon1">
            <a href="#" class="btn btn-outline-light close-header-search-bar">
                <i class="bi bi-x"></i>
            </a>
        </div>
    </form> -->
    
    <!-- Header mobile buttons -->
    <div class="header-mobile-buttons">
        <a href="#" class="search-bar-btn">
            <i class="bi bi-search"></i>
        </a>
        <a href="#" class="actions-btn">
            <i class="bi bi-three-dots"></i>
        </a>
    </div>
    <!-- ./ Header mobile buttons -->
</div>
    <!-- ./ header -->