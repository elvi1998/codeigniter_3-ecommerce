<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admins" class="brand-link">
        <img src="../assets/backend/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DivBlog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/backend/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="admins" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/admins'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/pages'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Pages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blog" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/categories'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/products'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/users'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/brands'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/images'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Images
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/payment_methods'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Payment Methods
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/delivery_methods'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Delivery Methods
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/orders'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/order_status'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Order Status
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backend/settings'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>