<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>
<body>

    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2"> Help</a><small> / </small>
                    <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
                        class="text-muted ms-2"> Contact</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Call Vn:</small>
                <a href="#" class="text-muted">(+84) 1234 567890</a>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-muted" data-bs-toggle="dropdown">
                            <small>
                                <i class="fa fa-user me-2"></i>
                                <?php
                                // Nếu đã đăng nhập thì hiện tên, chưa thì hiện chữ My Account
                                if (is_user_logged_in()) {
                                    $current_user = wp_get_current_user();
                                    echo 'Hi, ' . $current_user->display_name;
                                } else {
                                    echo 'My Account';
                                }
                                ?>
                            </small>
                        </a>
                        <div class="dropdown-menu m-0 rounded">
                            <?php if (is_user_logged_in()): ?>
                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                    class="dropdown-item">Dashboard</a>
                                <a href="<?php echo wc_get_account_endpoint_url('orders'); ?>" class="dropdown-item">Đơn
                                    hàng của tôi</a>
                                <a href="<?php echo wc_get_account_endpoint_url('edit-account'); ?>"
                                    class="dropdown-item">Cài đặt tài khoản</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo wp_logout_url(home_url()); ?>" class="dropdown-item text-danger">Đăng
                                    xuất (Log Out)</a>
                            <?php else: ?>
                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                    class="dropdown-item">Đăng nhập / Đăng ký</a>
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
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                        if (has_custom_logo()) {
                            // Render ảnh thủ công với Inline Style cứng để ép kích thước
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" style="height: 80px !important; width: auto !important; max-width: 100%;">';
                        } else {
                            // Fallback text
                            echo '<h1 class="display-5 text-primary m-0">';
                            echo '<i class="fas fa-shopping-bag text-secondary me-2"></i>';
                            echo get_bloginfo('name');
                            echo '</h1>';
                        }
                        ?>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center">
                <div class="position-relative ps-4">
                    <?php echo do_shortcode('[aws_search_form]'); ?>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="<?php echo wc_get_cart_url(); ?>"
                        class="text-muted d-flex align-items-center justify-content-center">
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
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <li>
                                    <div class="categories-bars-item"><a href="#">Ví dụ danh mục 1</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="<?php echo home_url(); ?>" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i class="fas fa-shopping-bag text-white me-2"></i>
                        </h1>
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="<?php echo home_url(); ?>" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                                class="nav-item nav-link">Shop</a>
                            <?php
                            // Tìm trang sử dụng template 'template-blog.php'
                            $blog_pages = get_pages(array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'template-blog.php',
                                'hierarchical' => 0
                            ));
                            $blog_page_url = '#'; // URL dự phòng
                            if (!empty($blog_pages)) {
                                $blog_page_url = get_permalink($blog_pages[0]->ID);
                            }
                            ?>
                            <a href="<?php echo esc_url($blog_page_url); ?>" class="nav-item nav-link">News</a>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0">
                                    <a href="<?php echo wc_get_cart_url(); ?>" class="dropdown-item">Giỏ hàng (Cart)</a>
                                    <a href="<?php echo wc_get_checkout_url(); ?>" class="dropdown-item">Thanh toán
                                        (Checkout)</a>
                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                        class="dropdown-item">Tài khoản</a>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
                                class="nav-item nav-link me-2">Contact</a>
                        </div>
                        <div class="d-none d-lg-block">
                            <a href="#" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                    class="fa fa-mobile-alt me-2"></i> +84 123 456 7890</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>