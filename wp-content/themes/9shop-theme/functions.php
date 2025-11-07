<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Ngăn truy cập trực tiếp

/**
 * ==============================
 * 1. Thiết lập theme cơ bản
 * ==============================
 */
function myshop_theme_setup() {

    // Tự động quản lý <title> trong <head>
    add_theme_support('title-tag');

    // Hỗ trợ ảnh đại diện (featured image)
    add_theme_support('post-thumbnails');

    // Hỗ trợ HTML5 cho các phần tử form/comment/gallery
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    // Hỗ trợ logo tùy chỉnh
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Hỗ trợ background tùy chỉnh
    add_theme_support('custom-background');

    // Hỗ trợ feed tự động
    add_theme_support('automatic-feed-links');

    // Hỗ trợ WooCommerce và các tính năng gallery
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Khai báo menu
    register_nav_menus([
        'primary' => __('Primary Menu', 'myshop'),
    ]);

    // Kích thước ảnh sản phẩm
    add_image_size('product-thumb', 400, 400, true);
}
add_action('after_setup_theme', 'myshop_theme_setup');



/**
 * ==============================
 * 2. Gọi CSS & JS cho theme
 * ==============================
 */
function myshop_enqueue_assets() {
    // --- CSS ---
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '5.3.0');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css', [], null);
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css', [], null);
    wp_enqueue_style('owltheme', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.theme.default.min.css', [], null);
    wp_enqueue_style('myshop-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', ['bootstrap'], null);

    // --- JS ---
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '5.3.0', true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', ['jquery'], null, true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/lib/waypoints/waypoints.min.js', ['jquery'], null, true);
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/lib/counterup/counterup.min.js', ['jquery'], null, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', ['jquery'], null, true);
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', ['jquery'], null, true);
    wp_enqueue_script('myshop-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'owlcarousel', 'wow'], null, true);
}
add_action('wp_enqueue_scripts', 'myshop_enqueue_assets');



/**
 * ==============================
 * 3. Customizer (Logo / Header)
 * ==============================
 */
function myshop_customize_register($wp_customize){

    // Tạo section Header
    $wp_customize->add_section('myshop_header', [
        'title' => __('Header', 'myshop'),
        'priority' => 30,
    ]);

    // Thêm setting và control cho logo
    $wp_customize->add_setting('myshop_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'myshop_logo', [
        'label'    => __('Logo', 'myshop'),
        'section'  => 'myshop_header',
        'settings' => 'myshop_logo',
    ]));
}
add_action('customize_register', 'myshop_customize_register');





