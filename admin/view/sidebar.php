<div class="menu">
    <div class="menu-header">
        <a href="home.php" class="menu-header-logo">
            <img src="https://vetra.laborasyon.com/assets/images/logo.svg" alt="logo">
        </a>
        <a href="home.php" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                    <img src="./assets/images/user/man_avatar3.jpg"
                         class="rounded-circle" alt="image">
                </div>
                <div>
                    <div class="fw-bold"><?= $user['username'] ?></div>
                    <small class="text-muted"><?= $user['role'] ?></small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-person dropdown-item-icon"></i> Thông tin tài khoản
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                </a>
                <a href="login.php" class="dropdown-item d-flex align-items-center text-danger"
                   target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Đăng xuất
                </a>
            </div>
        </div>
        <ul>
            <li class="menu-divider">E-Commerce</li>
            <li>
                <a  class="active"
                    href="home.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>
                <ul>
                    <li>
                        <a  href="orders.php">List</a>
                    </li>
                    <li>
                        <a  href="order-detail.php">Detail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-truck"></i>
                    </span>
                    <span>Products</span>
                </a>
                <ul>
                    <li>
                        <a  href="product-list.php">List
                            View</a>
                    </li>
                    <li>
                        <a  href="product-detail.php">Product Detail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="customers.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span>Customers</span>
                </a>
            </li>
            
            <!-- <li class="menu-divider">Apps</li>
            <li>
                <a  href="chats.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-chat-square"></i>
                    </span>
                    <span>Chats</span>
                    <span class="badge bg-success rounded-circle ms-auto">2</span>
                </a>
            </li>
            <li>
                <a href="email.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span>Email</span>
                </a>
                <ul>
                    <li>
                        <a  href="email.php">
                            <span>Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a  href="email-detail.php">
                            <span>Detail</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="email-template.php">
                            <span>Email Template</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li>
                <a href="todo-list.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <span>Todo App</span>
                </a>
                <ul>
                    <li>
                        <a  href="todo-list.php">
                            <span>List</span>
                        </a>
                    </li>
                    <li>
                        <a  href="todo-detail.php">
                            <span>Details</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="menu-divider">Trang</li>
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-person"></i>
                    </span>
                    <span>Profile</span>
                </a>
                <ul>
                    <li>
                        <a  href="profile-posts.php">Post</a>
                    </li>
                    <li>
                        <a  href="profile-connections.php">Connections</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-person-circle"></i>
                    </span>
                    <span>Users</span>
                </a>
                <ul>
                    <li><a  href="user-list.php">List View</a></li>
                    <li><a  href="user-grid.php">Grid View</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-lock"></i>
                    </span>
                    <span>Authentication</span>
                </a>
                <ul>
                    <li>
                        <a href="login.php" target="_blank">Login</a>
                    </li>
                    <li>
                        <a href="register.php" target="_blank">Register</a>
                    </li>
                    <li>
                        <a href="reset-password.php" target="_blank">Reset Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="settings.php">
                    <span class="nav-link-icon">
                        <i class="bi bi-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>        
        </ul>
    </div>
</div>