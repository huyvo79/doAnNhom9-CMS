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

function custom_single_blog_styles() {
    if ( (is_single() && 'post' === get_post_type()) || is_home() || is_archive() || is_page_template('template-blog.php') ) {
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
function myshop_register_order_template( $templates ) {
    $templates['page-order.php'] = 'Trang Đơn Hàng (9shop Orders)';
    return $templates;
}
add_filter( 'theme_page_templates', 'myshop_register_order_template' );

/**
 * template page-coupon
 */
function myshop_register_custom_templates( $templates ) {
    $templates['page-order.php'] = 'Trang Đơn Hàng (9shop Orders)'; // Giữ lại template cũ
    $templates['page-coupon.php'] = 'Trang Mã Giảm Giá (9shop Coupons)'; // Thêm template mới
    $templates['page-9shop.php'] = 'Home'; // Thêm template mới
    $templates['blog.php'] = 'Blog'; // Thêm template mới
    return $templates;
}
add_filter( 'theme_page_templates', 'myshop_register_custom_templates' );

function get_product_sale_percentage($product) {
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

 