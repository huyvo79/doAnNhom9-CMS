<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php $shop_hotline = get_theme_mod('shop_hotline', '(+84) 123 456 7890'); ?>

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="container-fluid d-none border-bottom d-lg-block bg-dark">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <?php
                    if (has_nav_menu('top_bar_menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'top_bar_menu',
                            'container'      => false,
                            'menu_class'     => 'd-inline-flex list-unstyled m-0 text-white-50 top-bar-menu', // CSS class tùy chỉnh
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                    } else {
                        // Fallback nếu chưa tạo menu: Hiện link tĩnh mẫu
                        echo '<small class="text-white-50 me-2">Cài đặt Menu tại Appearance > Menus > Top Bar</small>';
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-white-50 me-2">Hotline:</small>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $shop_hotline)); ?>" class="text-white-50">
                    <?php echo esc_html($shop_hotline); ?>
                </a>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="nav-item dropdown hover-dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white-50" data-bs-toggle="dropdown">
                            <small>
                                <i class="fa fa-user me-2"></i>
                                <?php
                                if (is_user_logged_in()) {
                                    $current_user = wp_get_current_user();
                                    echo 'Hi, ' . esc_html($current_user->display_name);
                                } else {
                                    echo 'My Account';
                                }
                                ?>
                            </small>
                        </a>
                        <div class="dropdown-menu m-0 rounded">
                            <?php if (is_user_logged_in()): ?>
                                <?php if (function_exists('wc_get_page_id')) : ?>
                                    <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="dropdown-item">Tài khoản</a>
                                    <a href="<?php echo wc_get_account_endpoint_url('orders'); ?>" class="dropdown-item">Đơn hàng</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo wp_logout_url(home_url()); ?>" class="dropdown-item text-danger">Đăng xuất</a>
                            <?php else: ?>
                                <?php if (function_exists('wc_get_page_id')) : ?>
                                    <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="dropdown-item">Đăng nhập / Đăng ký</a>
                                <?php else: ?>
                                    <a href="<?php echo wp_login_url(); ?>" class="dropdown-item">Đăng nhập</a>
                                <?php endif; ?>
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
                        if (has_custom_logo()) {
                            // Lấy URL ảnh logo
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            if ($logo) {
                                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" style="height: 80px !important; width: auto !important;">';
                            }
                        } else {
                            // Fallback Text Logo
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
                <div class="position-relative w-100 premium-search-wrap">
                    <?php 
                    if (shortcode_exists('aws_search_form')) {
                        echo do_shortcode('[aws_search_form]'); 
                    } else {
                        get_search_form(); // Fallback tìm kiếm mặc định nếu plugin bị tắt
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="text-muted d-flex align-items-center justify-content-center">
                            <span class="rounded-circle btn-md-square border position-relative">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span class="text-dark ms-2 text-start">
                                <div class="fw-bold"><?php echo WC()->cart->get_cart_total(); ?></div>
                                <small class="text-muted">(<?php echo WC()->cart->get_cart_contents_count(); ?> items)</small>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative hover-open" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start text-white" type="button" data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0 text-white"><i class="fa fa-bars me-2"></i>Danh mục</h4>
                    </button>

                    <div class="collapse navbar-collapse rounded-bottom bg-white position-absolute w-100" id="allCat" style="z-index: 999; top: 100%; border: 1px solid #ddd;">
                        <div class="navbar-nav ms-auto py-0 w-100">
                            <?php
                            if (has_nav_menu('all_categories')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'all_categories',
                                    'container'      => false,
                                    'menu_class'     => 'list-unstyled categories-bars w-100',
                                    'fallback_cb'    => false,
                                    'depth'          => 3,
                                    // Giữ lại Walker của bạn nếu bạn đã định nghĩa class này
                                    'walker'         => class_exists('MyShop_Category_Walker') ? new MyShop_Category_Walker() : '', 
                                ));
                            } else {
                                echo '<p class="p-3 text-dark">Vui lòng gán menu vào vị trí "Menu Danh mục"</p>';
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                    <a href="<?php echo home_url(); ?>" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i class="fas fa-shopping-bag text-white me-2"></i></h1>
                    </a>
                    
                    <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x text-white"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <?php
                            if (has_nav_menu('primary_menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_menu',
                                    'container'      => false,
                                    'menu_class'     => 'navbar-nav ms-auto py-0 d-flex', // CSS Class
                                    'fallback_cb'    => false,
                                    'items_wrap'     => '%3$s', // Bỏ thẻ UL để hòa nhập với Bootstrap nếu cần
                                    'depth'          => 2,
                                    // Gợi ý: Để menu Bootstrap chuẩn, bạn nên dùng "WP Bootstrap Navwalker"
                                    // Nếu không, menu sẽ hiện ra dạng list <li>, bạn cần CSS lại một chút.
                                ));
                            } else {
                                echo '<a href="' . home_url() . '" class="nav-item nav-link active">Trang chủ</a>';
                                echo '<a href="#" class="nav-item nav-link">Gán Menu đi bạn ơi</a>';
                            }
                            ?>
                        </div>

                        <div class="d-none d-lg-block ms-3">
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $shop_hotline)); ?>" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3">
                                <i class="fa fa-mobile-alt me-2"></i> <?php echo esc_html($shop_hotline); ?>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>