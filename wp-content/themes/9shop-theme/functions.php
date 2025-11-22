<?php
if (!defined('ABSPATH'))
    exit; // Ngăn truy cập trực tiếp

/**
 * ==============================
 * 1. Thiết lập theme cơ bản
 * ==============================
 */
function myshop_theme_setup()
{

    // Tự động quản lý <title> trong <head>
    add_theme_support('title-tag');

    // Hỗ trợ ảnh đại diện (featured image)
    add_theme_support('post-thumbnails');

    // Hỗ trợ HTML5 cho các phần tử form/comment/gallery
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    // Hỗ trợ logo tùy chỉnh
    add_theme_support('custom-logo', [
        'height' => 60,
        'width' => 200,
        'flex-width' => true,
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
function myshop_enqueue_assets()
{
    // --- CSS ---    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap', [], null);

    // Font Awesome & Bootstrap Icons
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', [], '5.15.4');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css', [], '1.4.1');

    // Thư viện CSS
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css', [], null);
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css', [], null);

    // Bootstrap CSS (tải từ file của theme)
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '5.0.0');

    // CSS chính của theme
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', ['bootstrap'], '1.0.0');
    wp_enqueue_style('woocommerce-custom', get_template_directory_uri() . '/assets/css/woocommerce-custom.css', ['woocommerce-general'], null);

    // Tải file CSS tùy chỉnh chung
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', ['main-style'], '1.0.1');

    // Chỉ tải file CSS cho phân trang trên trang chủ, trang lưu trữ hoặc trang tìm kiếm
    if (is_home() || is_archive() || is_search() || is_page_template('template-blog.php')) {
        wp_enqueue_style('9shop-custom-pagination', get_template_directory_uri() . '/assets/css/custom-pagination.css', ['main-style'], '1.0.1');
    }

    // Stylesheet gốc của theme (style.css) - nên tải cuối cùng
    wp_enqueue_style('myshop-style', get_stylesheet_uri(), ['main-style'], wp_get_theme()->get('Version'));


    // --- JS ---
    wp_enqueue_script('jquery');
    // Bootstrap JS - Rất quan trọng: khai báo 'jquery' là phụ thuộc
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.0.0', true);
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
function myshop_customize_register($wp_customize)
{

    // Tạo section Header
    $wp_customize->add_section('myshop_header', [
        'title' => __('Header', 'myshop'),
        'priority' => 30,
    ]);

    // Thêm setting và control cho logo
    $wp_customize->add_setting('myshop_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'myshop_logo', [
        'label' => __('Logo', 'myshop'),
        'section' => 'myshop_header',
        'settings' => 'myshop_logo',
    ]));
}
add_action('customize_register', 'myshop_customize_register');

/**
 * ==============================
 * 4. Đăng ký Sidebar cho Shop
 * ==============================
 */
function myshop_widgets_init()
{
    register_sidebar([
        'name' => __('Shop Sidebar', 'myshop'),
        'id' => 'shop-sidebar',
        'description' => __('Widget area for shop and product pages.', 'myshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="mb-3">',
        'after_title' => '</h4>',
    ]);
}
add_action('widgets_init', 'myshop_widgets_init');

add_action('wp_footer', 'my_custom_quantity_buttons_script');
function my_custom_quantity_buttons_script()
{
    // Chỉ chạy trên trang sản phẩm hoặc trang giỏ hàng
    if (!is_product() && !is_cart()) {
        return;
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            // Xử lý chung cho cả hai nút
            function handle_quantity_change($button, $input, direction) {
                var value = parseInt($input.val(), 10);
                // Đảm bảo step luôn là 1 nếu không được định nghĩa rõ
                var step = parseInt($input.attr('step'), 10) || 1;
                var min = parseInt($input.attr('min'), 10) || 0;
                var max_attr = $input.attr('max');
                var max = (max_attr !== '' && max_attr !== undefined) ? parseInt(max_attr, 10) : Infinity;
                var newValue = value;

                if (direction === 'plus') {
                    newValue = value + step;
                    if (newValue <= max) {
                        $input.val(newValue); // Chỉ thay đổi giá trị
                    }
                } else if (direction === 'minus') {
                    newValue = value - step;
                    if (newValue >= min) {
                        $input.val(newValue); // Chỉ thay đổi giá trị
                    }
                }

                // *** FIX LỖI Ở ĐÂY ***
                // Sau khi thay đổi giá trị, chúng ta gọi trigger('change')
                // để WooCommerce nhận biết sự thay đổi.
                // Tuy nhiên, việc này lại gây ra lỗi tăng 2.

                // Giải pháp: Thay vì dùng .trigger('change'), ta chỉ thay đổi giá trị.
                // Riêng trên trang giỏ hàng, ta cần kích hoạt sự kiện để nút "Update Cart" sáng lên.

                // Nếu đang ở trang giỏ hàng, kích hoạt sự kiện change để Woo nhận biết
                if ($('body').hasClass('woocommerce-cart')) {
                    $input.trigger('change');
                } else {
                    // Nếu đang ở trang sản phẩm đơn, cũng kích hoạt change để cập nhật giá (nếu có)
                    // và xử lý AJAX Add-to-Cart nếu cần.
                    // Nếu lỗi tăng 2 vẫn xảy ra, hãy thử xóa dòng này:
                    $input.trigger('change');
                }
            }

            // Click nút Plus
            $(document).on('click', '.btn-plus', function (e) {
                e.preventDefault();
                var $input = $(this).closest('.quantity').find('.qty');
                handle_quantity_change($(this), $input, 'plus');
            });

            // Click nút Minus
            $(document).on('click', '.btn-minus', function (e) {
                e.preventDefault();
                var $input = $(this).closest('.quantity').find('.qty');
                handle_quantity_change($(this), $input, 'minus');
            });

        });
    </script>
    <?php
}

add_filter('woocommerce_loop_add_to_cart_link', 'my_custom_loop_add_to_cart_link', 10, 3);
function my_custom_loop_add_to_cart_link($html, $product, $args)
{

    // Lấy tất cả các lớp (class) bạn cung cấp
    $custom_classes = 'btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary';

    // Icon của bạn
    $icon = '<i class="fa fa-shopping-bag me-2 text-white"></i> ';

    // Tạo lại thẻ <a> với các thuộc tính và lớp (class) của bạn
    $html = sprintf(
        '<a href="%s" data-quantity="%s" class="%s %s" %s>%s%s</a>',
        esc_url($product->add_to_cart_url()),
        esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
        esc_attr(isset($args['class']) ? $args['class'] : 'button'), // Giữ lại các lớp (class) mặc định (quan trọng cho AJAX)
        esc_attr($custom_classes), // Thêm các lớp (class) của bạn
        isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
        $icon, // Thêm icon
        esc_html($product->add_to_cart_text()) // Lấy text (ví dụ: "Add to cart", "Read more")
    );

    return $html;
}

/**
 * Gộp tab "Additional Information" vào chung tab "Description".
 * PHIÊN BẢN SỬA LỖI LẶP TIÊU ĐỀ
 */
add_filter('woocommerce_product_tabs', 'merge_description_and_additional_info', 99);

function merge_description_and_additional_info($tabs)
{

    // Kiểm tra xem cả hai tab có tồn tại không
    if (isset($tabs['description']) && isset($tabs['additional_information'])) {

        // 1. Gán hàm callback mới (hàm đã sửa lỗi)
        $tabs['description']['callback'] = 'display_merged_tab_content_fixed';

        // 2. Xóa tab 'additional_information' khỏi thanh điều hướng
        unset($tabs['additional_information']);
    }

    return $tabs;
}

/**
 * Hàm callback mới đã sửa lỗi.
 * Hàm này chỉ hiển thị NỘI DUNG của tab, không hiển thị tiêu đề H2 bị trùng.
 */
/**
 * Hàm callback mới đã sửa lỗi.
 * (Bản sửa này thêm lại H2 cho Description để đồng bộ)
 */
function display_merged_tab_content_fixed()
{
    global $product;

    if (!$product) {
        return;
    }

    // 1. THÊM LẠI: Tiêu đề "Description"
    echo '<h2>' . esc_html__('Description', 'woocommerce') . '</h2>';

    // 2. Hiển thị nội dung "Description"
    $description = $product->get_description();
    if (empty($description)) {
        // Nếu không có mô tả dài, lấy mô tả ngắn
        $description = $product->get_short_description();
    }

    if ($description) {
        // Dùng wpautop để giữ định dạng
        echo wp_kses_post(wpautop($description));
    }

    // 3. Hiển thị tiêu đề "Additional Information"
    // (Thêm class mt-4 để tạo khoảng cách)
    echo '<h2 class="mt-4">' . esc_html__('Additional information', 'woocommerce') . '</h2>';

    // 4. Hiển thị bảng nội dung "Additional Information"
    do_action('woocommerce_product_additional_information', $product);
}

function enqueue_fontawesome_icons()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_fontawesome_icons');

function custom_blog_sidebar()
{
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'before_widget' => '<div class="widget blog-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'custom_blog_sidebar');

function custom_single_blog_styles()
{
    if ((is_single() && 'post' === get_post_type()) || is_home() || is_archive() || is_page_template('template-blog.php')) {
        wp_enqueue_style(
            'single-blog-style',
            get_template_directory_uri() . '/assets/css/single-blog.css',
            array(),
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'custom_single_blog_styles');


/**
 * template page-order
 */
function myshop_register_order_template($templates)
{
    $templates['page-order.php'] = 'Trang Đơn Hàng (9shop Orders)';
    return $templates;
}
add_filter('theme_page_templates', 'myshop_register_order_template');

/**
 * template page-coupon
 */
function myshop_register_custom_templates($templates)
{
    $templates['page-order.php'] = 'Trang Đơn Hàng (9shop Orders)'; // Giữ lại template cũ
    $templates['page-coupon.php'] = 'Trang Mã Giảm Giá (9shop Coupons)'; // Thêm template mới
    $templates['page-9shop.php'] = 'Home'; // Thêm template mới
    $templates['blog.php'] = 'Blog'; // Thêm template mới
    return $templates;
}
add_filter('theme_page_templates', 'myshop_register_custom_templates');

function get_product_sale_percentage($product)
{
    if (!$product->is_on_sale()) {
        return '';
    }

    $regular_price = (float) $product->get_regular_price();
    $sale_price = (float) $product->get_sale_price();

    // Nếu là sản phẩm Biến thể, lấy giá trị thấp nhất
    if ($product->is_type('variable')) {
        $regular_price = (float) $product->get_variation_regular_price('min', true);
        $sale_price = (float) $product->get_variation_sale_price('min', true);
    }

    // Nếu giá không hợp lệ, trả về rỗng
    if ($regular_price <= 0 || $regular_price <= $sale_price) {
        return '';
    }

    $discount = $regular_price - $sale_price;
    $percentage = round(($discount / $regular_price) * 100);

    return $percentage . '%';
}

function custom_archive_products_query($query) {
    // Chỉ áp dụng cho truy vấn chính trên Frontend (không phải trong Admin)
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    // Chỉ áp dụng cho trang lưu trữ sản phẩm/danh mục của WooCommerce
    if ( $query->is_post_type_archive( 'product' ) || $query->is_tax( 'product_cat' ) ) {
        
        // 1. Đặt lại số sản phẩm mỗi trang
        $query->set( 'posts_per_page', 9 );

        // 2. [TÙY CHỌN] Nếu bạn muốn sắp xếp khác mặc định (Date DESC)
        // $query->set( 'orderby', 'price' );
        // $query->set( 'order', 'ASC' );
        
        // 3. [TUYỆT ĐỐI KHÔNG] sử dụng offset ở đây.
    }
}
add_action( 'pre_get_posts', 'custom_archive_products_query' );



 
function myshop_register_category_menu()
{
    register_nav_menus(array(
        'all_categories' => __('All Categories Menu (Danh mục Header)', 'myshop'),
    ));
}
add_action('after_setup_theme', 'myshop_register_category_menu');

/**
 * Custom Walker: Item là thẻ <a> trực tiếp, không dùng div bao ngoài
 */
class MyShop_Category_Walker extends Walker_Nav_Menu
{

    // 1. Mở thẻ <ul> cho menu con (Giữ nguyên)
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul class="dropdown-menu custom-sub-menu">';
    }

    // 2. Mở thẻ <li> và nội dung bên trong
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Kiểm tra xem item này có con không
        $has_children = in_array('menu-item-has-children', $classes);

        // Thêm class 'dropdown' cho li nếu có con
        if ($has_children) {
            $classes[] = 'dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        // --- XỬ LÝ THẺ A (Thay đổi từ đây) ---

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        // QUAN TRỌNG: Chuyển class style từ thẻ div cũ vào thẳng thẻ a
        // Thêm class 'text-body' hoặc class màu chữ của bạn nếu cần để giữ màu
        $atts['class'] = 'categories-bars-item d-flex justify-content-between align-items-center text-dark'; // Thêm text-dark hoặc text-reset

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        // Mở thẻ a
        $output .= '<a' . $attributes . '>';

        // 1. In tiêu đề
        $output .= $title;

        // 2. In icon (Nằm TRONG thẻ a để Flexbox đẩy sang phải)
        if ($has_children) {
            $output .= '<i class="fa fa-angle-right ms-2 text-muted" style="font-size: 0.8rem;"></i>';
        }

        // Đóng thẻ a
        $output .= '</a>';
    }
}
/**
 * 1. Đăng ký các vị trí Menu
 */
function shop9_register_menus() {
    register_nav_menus(
        array(
            'primary_menu'   => __( 'Menu Chính (Ngang)', '9shop-theme' ),
            'all_categories' => __( 'Menu Danh mục (Dọc)', '9shop-theme' ),
            'top_bar_menu'   => __( 'Menu Top Bar (Nhỏ)', '9shop-theme' ),
        )
    );
}
add_action( 'init', 'shop9_register_menus' );

/**
 * 2. Hỗ trợ Custom Logo
 */
function shop9_theme_support() {
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'shop9_theme_support' );

/**
 * 3. Tạo ô nhập Hotline trong Admin > Appearance > Customize
 */
function shop9_customize_register( $wp_customize ) {
    // Tạo Section mới tên là "Thông tin Cửa hàng"
    $wp_customize->add_section('shop_info_settings', array(
        'title'    => __('Số điện thoại hỗ trợ', '9shop-theme'),
        'priority' => 30,
    ));

    // Tạo Setting Hotline
    $wp_customize->add_setting('shop_hotline', array(
        'default'   => '(+84) 123 456 7890',
        'transport' => 'refresh', // refresh để thấy thay đổi ngay
    ));

    // Tạo Control (Ô nhập liệu)
    $wp_customize->add_control('shop_hotline', array(
        'label'    => __('Số điện thoại Hotline', '9shop-theme'),
        'section'  => 'shop_info_settings',
        'type'     => 'text',
        'description' => 'Số này sẽ hiện ở Top Bar và nút cạnh Menu.',
    ));
}
add_action('customize_register', 'shop9_customize_register');

function shop9_carousel_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_carousel_settings', array(
        'title'    => __('Cài đặt Carousel Trang chủ', '9shop-theme'),
        'priority' => 35,
    ));

    // ====================================================
    // A. LẤY DỮ LIỆU CHO CÁC Ô CHỌN (SELECT)
    // ====================================================
    
    // 1. Lấy danh sách Danh mục (Cho Slider trái)
    $cat_choices = array('' => '-- Mặc định: Nổi bật --');
    if (taxonomy_exists('product_cat')) {
        $categories = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $cat_choices[$category->slug] = $category->name;
            }
        }
    }

    // 2. Lấy danh sách Sản phẩm (Cho Banner phải)
    // Lưu ý: Mình giới hạn lấy 50 sản phẩm mới nhất để web đỡ nặng
    $prod_choices = array('' => '-- Chọn sản phẩm để quảng cáo --');
    $products = get_posts(array(
        'post_type' => 'product', 
        'numberposts' => 50, 
        'post_status' => 'publish'
    ));
    if ($products) {
        foreach ($products as $prod) {
            $prod_choices[$prod->ID] = $prod->post_title;
        }
    }

    // ====================================================
    // B. CÀI ĐẶT SLIDER (TRÁI) - GIỮ NGUYÊN
    // ====================================================
    $wp_customize->add_setting('carousel_cat_slug', array('default' => ''));
    $wp_customize->add_control('carousel_cat_slug', array(
        'label'       => __('Chọn Danh mục cho Slider', '9shop-theme'),
        'section'     => 'home_carousel_settings',
        'type'        => 'select',
        'choices'     => $cat_choices,
    ));

    // ====================================================
    // C. CÀI ĐẶT BANNER (PHẢI) - NÂNG CẤP
    // ====================================================

    // 1. Chọn sản phẩm (Thay vì nhập ID)
    $wp_customize->add_setting('banner_product_id', array('default' => ''));
    $wp_customize->add_control('banner_product_id', array(
        'label'       => __('Chọn Sản phẩm Banner', '9shop-theme'),
        'description' => __('Chọn sản phẩm để tự động lấy tên, giá và hình ảnh.', '9shop-theme'),
        'section'     => 'home_carousel_settings',
        'type'        => 'select', // <--- Đã đổi thành Select
        'choices'     => $prod_choices,
    ));

    // 2. Link tùy chỉnh (Nếu muốn dẫn đi chỗ khác)
    $wp_customize->add_setting('banner_custom_link', array('default' => ''));
    $wp_customize->add_control('banner_custom_link', array(
        'label'       => __('Link tùy chỉnh (Tùy chọn)', '9shop-theme'),
        'description' => __('Nếu điền ô này, web sẽ ưu tiên dùng link này thay vì link sản phẩm.', '9shop-theme'),
        'section'     => 'home_carousel_settings',
        'type'        => 'url',
    ));

    // 3. Ảnh nền Banner
    $wp_customize->add_setting('banner_bg_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_bg_image', array(
        'label'    => __('Ảnh nền Banner', '9shop-theme'),
        'section'  => 'home_carousel_settings',
    )));

    // 4. Dòng chữ Offer
    $wp_customize->add_setting('banner_offer_text', array('default' => 'Save $48.00'));
    $wp_customize->add_control('banner_offer_text', array(
        'label'    => __('Badge giảm giá (nhỏ)', '9shop-theme'),
        'section'  => 'home_carousel_settings',
        'type'     => 'text',
    ));

    // 5. Tiêu đề Offer
    $wp_customize->add_setting('banner_offer_label', array('default' => 'Special Offer'));
    $wp_customize->add_control('banner_offer_label', array(
        'label'    => __('Tiêu đề Offer (vàng)', '9shop-theme'),
        'section'  => 'home_carousel_settings',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'shop9_carousel_customizer');
add_action('customize_register', 'shop9_carousel_customizer');
function add_bootstrap_classes_to_nav_menu( $atts, $item, $args ) {
    // Kiểm tra nếu là Menu Chính (primary_menu)
    if ( property_exists($args, 'theme_location') && $args->theme_location == 'primary_menu' ) {
        // Thêm class 'nav-item nav-link' vào thẻ <a>
        $class = "nav-item nav-link";
        
        // Nếu là trang hiện tại thì thêm class 'active' để sáng lên
        if (in_array('current-menu-item', $item->classes)) {
            $class .= " active";
        }
        
        // Gộp vào các class cũ (nếu có)
        $atts['class'] = (isset($atts['class']) ? $atts['class'] . ' ' : '') . $class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_bootstrap_classes_to_nav_menu', 10, 3 );

function shop9_service_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_service_settings', array(
        'title'    => __('Cài đặt Dịch vụ (Services)', '9shop-theme'),
        'priority' => 40, // Nằm dưới phần Carousel
    ));

    // 2. Danh sách dữ liệu mặc định (để không bị trống khi mới cài)
    $defaults = array(
        1 => array('icon' => 'fa fa-sync-alt',       'title' => 'Free Return',        'desc' => '30 days money back guarantee!'),
        2 => array('icon' => 'fab fa-telegram-plane', 'title' => 'Free Shipping',      'desc' => 'Free shipping on all order'),
        3 => array('icon' => 'fas fa-life-ring',      'title' => 'Support 24/7',       'desc' => 'We support online 24 hrs a day'),
        4 => array('icon' => 'fas fa-credit-card',    'title' => 'Receive Gift Card',  'desc' => 'Recieve gift all over oder $50'),
        5 => array('icon' => 'fas fa-lock',           'title' => 'Secure Payment',     'desc' => 'We Value Your Security'),
        6 => array('icon' => 'fas fa-blog',           'title' => 'Online Service',     'desc' => 'Free return products in 30 days'),
    );

    // 3. Dùng vòng lặp tạo 6 bộ cài đặt
    for ($i = 1; $i <= 6; $i++) {
        
        // --- TIÊU ĐỀ PHÂN CÁCH ---
        $wp_customize->add_setting("service_header_$i", array('default' => ''));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, "service_header_$i", array(
            'label'    => "=== DỊCH VỤ SỐ $i ===",
            'section'  => 'home_service_settings',
            'settings' => "service_header_$i", // Dummy setting
            'type'     => 'hidden' 
        )));

        // 1. Icon (Nhập class FontAwesome)
        $wp_customize->add_setting("service_icon_$i", array('default' => $defaults[$i]['icon']));
        $wp_customize->add_control("service_icon_$i", array(
            'label'       => "Icon số $i (Class)",
            'description' => 'Ví dụ: fas fa-home, fab fa-facebook',
            'section'     => 'home_service_settings',
            'type'        => 'text',
        ));

        // 2. Tiêu đề
        $wp_customize->add_setting("service_title_$i", array('default' => $defaults[$i]['title']));
        $wp_customize->add_control("service_title_$i", array(
            'label'       => "Tiêu đề số $i",
            'section'     => 'home_service_settings',
            'type'        => 'text',
        ));

        // 3. Mô tả
        $wp_customize->add_setting("service_desc_$i", array('default' => $defaults[$i]['desc']));
        $wp_customize->add_control("service_desc_$i", array(
            'label'       => "Mô tả số $i",
            'section'     => 'home_service_settings',
            'type'        => 'text',
        ));
    }
}
add_action('customize_register', 'shop9_service_customizer');

function shop9_offer_section_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_offer_section_settings', array(
        'title'    => __('Cài đặt Box Ưu đãi (Offer)', '9shop-theme'),
        'priority' => 45, // Nằm dưới phần Service
    ));

    // 2. Lấy danh sách Sản phẩm cho Dropdown (Giới hạn 50 SP mới nhất)
    $prod_choices = array('' => '-- Tự động lấy SP đang Sale --');
    
    // Chỉ chạy khi có WooCommerce
    if (class_exists('WooCommerce')) {
        $products = get_posts(array(
            'post_type'   => 'product', 
            'numberposts' => 50, 
            'post_status' => 'publish'
        ));
        if ($products) {
            foreach ($products as $prod) {
                $prod_choices[$prod->ID] = $prod->post_title;
            }
        }
    }

    // --- CÀI ĐẶT SẢN PHẨM 1 ---
    $wp_customize->add_setting('offer_prod_1', array('default' => ''));
    $wp_customize->add_control('offer_prod_1', array(
        'label'       => __('Chọn Sản phẩm Ưu đãi #1', '9shop-theme'),
        'section'     => 'home_offer_section_settings',
        'type'        => 'select',
        'choices'     => $prod_choices,
    ));

    // --- CÀI ĐẶT SẢN PHẨM 2 ---
    $wp_customize->add_setting('offer_prod_2', array('default' => ''));
    $wp_customize->add_control('offer_prod_2', array(
        'label'       => __('Chọn Sản phẩm Ưu đãi #2', '9shop-theme'),
        'section'     => 'home_offer_section_settings',
        'type'        => 'select',
        'choices'     => $prod_choices,
    ));
}
add_action('customize_register', 'shop9_offer_section_customizer');

