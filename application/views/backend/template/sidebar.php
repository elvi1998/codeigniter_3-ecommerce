<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('backend/dashboard'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>assets/backend/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>assets/backend/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('backend/admins'); ?>" class="d-block"><?= $this->session->userdata('admin')->fullname ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <style>
                .dropdown-toggle::after {
                    content: none;
                }
            </style>
            <div class=" dropdown show nav nav-pills nav-sidebar flex-column ">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <!-- <li class="nav-item menu-open">
                        <a href="<?= base_url('backend/dashboard/index'); ?>" class="nav-link active">
                            <i class="nav-icon fa-sharp fa-solid fa-chart-line"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>
                    </li> -->
                    <a class="btn btn-secondary dropdown-toggle " href="<?= base_url('backend/dashboard/index'); ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">Dashboard






                    </a>
                    <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuLink">

                        <li class="nav-item">
                            <a href="<?= base_url('backend/admins/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-lock"></i>
                                <p>
                                    Admins
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/products/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <!-- <i class="nav-icon fa-solid fa-truck-front"></i> -->

                                <i class="nav-icon fa-sharp fa-solid fa-box"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/users/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/brands/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <!-- <i class="nav-icon fa-brands fa-jenkins"></i> -->
                                <i class="nav-icon fa-solid fa-city"></i>
                                <p>
                                    Brands
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/categories/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-list-ul"></i> -->
                                <i class="nav-icon fa-solid fa-window-restore"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/images/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-images"></i>
                                <p>
                                    Images
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/payment_methods/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <!-- <i class="nav-icon fa-solid fa-cart-shopping"></i> -->
                                <i class="nav-icon fa-solid fa-money-bill"></i>
                                <p>
                                    Payment Methods
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/delivery_methods/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-truck-fast"></i>
                                <p>
                                    Delivery Methods
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/orders/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>
                                    Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/order_status/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-users"></i> -->
                                <i class="nav-icon fa-solid fa-list-check"></i>
                                <p>
                                    Order Status
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('backend/blogs/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    Blogs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/pages/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>


                                <p>
                                    Pages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('backend/settings/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?= base_url('backend/website_logo/index'); ?>" class="nav-link">
                                <!-- <i class="nav-icon fas fa-cog"></i> -->
                                <i class="nav-icon fa-sharp fa-solid fa-basket-shopping"></i>
                                <p>
                                    Website logo
                                </p>
                            </a>
                        </li>
                    </div>

                </ul>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>