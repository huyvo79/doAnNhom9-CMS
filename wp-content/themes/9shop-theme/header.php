<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
</head>

<body>

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid px-5 d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2"> Help</a><small> / </small>
                    <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                    <a href="#" class="text-muted ms-2"> Contact</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Call Us:</small>
                <a href="#" class="text-muted">(+84) 1234 567890</a>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown">
                            <small>
                                <i class="fa fa-user me-2"></i> 
                                <?php 
                                // Nếu đã đăng nhập thì hiện tên, chưa thì hiện chữ My Account
                                if ( is_user_logged_in() ) {
                                    $current_user = wp_get_current_user();
                                    echo 'Hi, ' . $current_user->display_name;
                                } else {
                                    echo 'My Account';
                                }
                                ?>
                            </small>
                        </a>
                        <div class="dropdown-menu rounded">
                            <?php if ( is_user_logged_in() ) : ?>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="dropdown-item">Dashboard</a>
                                <a href="<?php echo wc_get_account_endpoint_url( 'orders' ); ?>" class="dropdown-item">Đơn hàng của tôi</a>
                                <a href="<?php echo wc_get_account_endpoint_url( 'edit-account' ); ?>" class="dropdown-item">Cài đặt tài khoản</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="dropdown-item text-danger">Đăng xuất (Log Out)</a>
                            <?php else : ?>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="dropdown-item">Đăng nhập / Đăng ký</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="<?php echo home_url(); ?>" class="navbar-brand p-0">
                        <h1 class="display-5 text-primary m-0"><i class="fas fa-shopping-bag text-secondary me-2"></i>9Shop</h1>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center">
                <div class="position-relative ps-4">
                    <form role="search" method="get" class="d-flex border rounded-pill" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="hidden" name="post_type" value="product" />
                        <input class="form-control border-0 rounded-pill w-100 py-3" type="text" name="s" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="text-muted d-flex align-items-center justify-content-center">
                        <span class="rounded-circle btn-md-square border"><i class="fas fa-shopping-cart"></i></span>
                        <span class="text-dark ms-2">
                            <?php echo WC()->cart->get_cart_total(); ?> 
                            <small>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</small>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <li><div class="categories-bars-item"><a href="#">Ví dụ danh mục 1</a></div></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="<?php echo home_url(); ?>" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="<?php echo home_url(); ?>" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="nav-item nav-link">Shop</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0">
                                    <a href="<?php echo wc_get_cart_url(); ?>" class="dropdown-item">Giỏ hàng (Cart)</a>
                                    <a href="<?php echo wc_get_checkout_url(); ?>" class="dropdown-item">Thanh toán (Checkout)</a>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="dropdown-item">Tài khoản</a>
                                </div>
                            </div>
                            <a href="#" class="nav-item nav-link me-2">Contact</a>
                        </div>
                        <div class="d-none d-lg-block">
                             <a href="#" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i class="fa fa-mobile-alt me-2"></i> +84 123 456 7890</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    ```