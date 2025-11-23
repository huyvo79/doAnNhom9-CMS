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

function custom_archive_products_query($query)
{
    // Chỉ áp dụng cho truy vấn chính trên Frontend (không phải trong Admin)
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Chỉ áp dụng cho trang lưu trữ sản phẩm/danh mục của WooCommerce
    if ($query->is_post_type_archive('product') || $query->is_tax('product_cat')) {

        // 1. Đặt lại số sản phẩm mỗi trang
        $query->set('posts_per_page', 9);

        // 2. [TÙY CHỌN] Nếu bạn muốn sắp xếp khác mặc định (Date DESC)
        // $query->set( 'orderby', 'price' );
        // $query->set( 'order', 'ASC' );

        // 3. [TUYỆT ĐỐI KHÔNG] sử dụng offset ở đây.
    }
}
add_action('pre_get_posts', 'custom_archive_products_query');




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
function shop9_product_tabs_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_product_tabs_settings', array(
        'title'    => __('Cài đặt Tab Sản phẩm', '9shop-theme'),
        'priority' => 50,
    ));

    // 2. Tiêu đề lớn (Our Products)
    $wp_customize->add_setting('prod_tab_main_title', array('default' => 'Our Products'));
    $wp_customize->add_control('prod_tab_main_title', array(
        'label'    => 'Tiêu đề chính',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'text',
    ));

    // 3. Số lượng sản phẩm hiển thị
    $wp_customize->add_setting('prod_tab_count', array('default' => 8));
    $wp_customize->add_control('prod_tab_count', array(
        'label'    => 'Số lượng sản phẩm mỗi Tab',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'number',
    ));

    // --- CẤU HÌNH CÁC TAB ---
    
    // TAB 1: ALL PRODUCTS
    $wp_customize->add_setting('enable_tab_all', array('default' => true));
    $wp_customize->add_control('enable_tab_all', array(
        'label'    => 'Bật Tab: Tất cả sản phẩm',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('label_tab_all', array('default' => 'All Products'));
    $wp_customize->add_control('label_tab_all', array(
        'label'    => 'Tên Tab: Tất cả',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'text',
    ));

    // TAB 2: NEW ARRIVALS
    $wp_customize->add_setting('enable_tab_new', array('default' => true));
    $wp_customize->add_control('enable_tab_new', array(
        'label'    => 'Bật Tab: Hàng mới',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('label_tab_new', array('default' => 'New Arrivals'));
    $wp_customize->add_control('label_tab_new', array(
        'label'    => 'Tên Tab: Hàng mới',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'text',
    ));

    // TAB 3: FEATURED
    $wp_customize->add_setting('enable_tab_featured', array('default' => true));
    $wp_customize->add_control('enable_tab_featured', array(
        'label'    => 'Bật Tab: Nổi bật',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('label_tab_featured', array('default' => 'Featured'));
    $wp_customize->add_control('label_tab_featured', array(
        'label'    => 'Tên Tab: Nổi bật',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'text',
    ));

    // TAB 4: TOP SELLING
    $wp_customize->add_setting('enable_tab_top', array('default' => true));
    $wp_customize->add_control('enable_tab_top', array(
        'label'    => 'Bật Tab: Bán chạy',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('label_tab_top', array('default' => 'Top Selling'));
    $wp_customize->add_control('label_tab_top', array(
        'label'    => 'Tên Tab: Bán chạy',
        'section'  => 'home_product_tabs_settings',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'shop9_product_tabs_customizer');

// 1. Đăng ký 3 vị trí Menu cho Footer
function shop9_register_footer_menus() {
    register_nav_menus(array(
        'footer_service' => __('Footer 1 - Customer Service', '9shop-theme'),
        'footer_info'    => __('Footer 2 - Information', '9shop-theme'),
        'footer_extras'  => __('Footer 3 - Extras', '9shop-theme'),
    ));
}
add_action('init', 'shop9_register_footer_menus');

// 2. Tự động thêm icon mũi tên (>) vào trước link trong Footer
function add_arrow_icon_to_footer_menu($title, $item, $args, $depth) {
    // Chỉ áp dụng cho 3 vị trí footer này
    if (in_array($args->theme_location, ['footer_service', 'footer_info', 'footer_extras'])) {
        return '<i class="fas fa-angle-right me-2"></i>' . $title;
    }
    return $title;
}
add_filter('nav_menu_item_title', 'add_arrow_icon_to_footer_menu', 10, 4);

// 3. Tạo các ô nhập liệu: Địa chỉ, Email, Phone, Newsletter
function shop9_footer_customizer($wp_customize) {
    $wp_customize->add_section('shop9_footer_settings', array(
        'title'    => __('Cài đặt Chân trang (Footer)', '9shop-theme'),
        'priority' => 60,
    ));

    // --- CỘT 1: THÔNG TIN LIÊN HỆ ---
    $wp_customize->add_setting('footer_address', array('default' => '123 Street Ho Chi Minh city, Vietnam'));
    $wp_customize->add_control('footer_address', array('label' => 'Địa chỉ', 'section' => 'shop9_footer_settings', 'type' => 'textarea'));

    $wp_customize->add_setting('footer_email', array('default' => 'admin@gmail.com'));
    $wp_customize->add_control('footer_email', array('label' => 'Email', 'section' => 'shop9_footer_settings', 'type' => 'text'));

    $wp_customize->add_setting('footer_phone', array('default' => '(+84) 3456 7890'));
    $wp_customize->add_control('footer_phone', array('label' => 'Số điện thoại', 'section' => 'shop9_footer_settings', 'type' => 'text'));
    
    $wp_customize->add_setting('footer_website', array('default' => 'www.9shop.com'));
    $wp_customize->add_control('footer_website', array('label' => 'Website', 'section' => 'shop9_footer_settings', 'type' => 'text'));

    // --- CỘT 2: NEWSLETTER ---
    $wp_customize->add_setting('footer_news_title', array('default' => 'Newsletter'));
    $wp_customize->add_control('footer_news_title', array('label' => 'Tiêu đề Newsletter', 'section' => 'shop9_footer_settings', 'type' => 'text'));
    
    $wp_customize->add_setting('footer_news_desc', array('default' => 'Đừng bỏ lỡ những xu hướng công nghệ mới nhất...'));
    $wp_customize->add_control('footer_news_desc', array('label' => 'Mô tả Newsletter', 'section' => 'shop9_footer_settings', 'type' => 'textarea'));
}
add_action('customize_register', 'shop9_footer_customizer');

// nút zalo
function shop9_floating_zalo_customizer($wp_customize) {
    // 1. Tạo Section Mới
    $wp_customize->add_section('shop9_floating_section', array(
        'title'    => __('Nút Chat Zalo / Hotline', '9shop-theme'),
        'priority' => 70,
    ));

    // 2. Ô nhập số Zalo
    $wp_customize->add_setting('floating_zalo_number', array('default' => ''));
    $wp_customize->add_control('floating_zalo_number', array(
        'label'       => 'Số điện thoại Zalo',
        'description' => 'Nhập số điện thoại (VD: 0912345678). Để trống sẽ ẩn nút.',
        'section'     => 'shop9_floating_section',
        'type'        => 'text',
    ));

    // 3. Tùy chọn vị trí (Trái hoặc Phải)
    $wp_customize->add_setting('floating_position', array('default' => 'right'));
    $wp_customize->add_control('floating_position', array(
        'label'       => 'Vị trí hiển thị',
        'section'     => 'shop9_floating_section',
        'type'        => 'select',
        'choices'     => array(
            'left'  => 'Góc Trái',
            'right' => 'Góc Phải'
        )
    ));

    
}
add_action('customize_register', 'shop9_floating_zalo_customizer');

function shop9_color_customizer($wp_customize) {
    $wp_customize->add_section('shop9_colors', array(
        'title'    => __('Màu sắc giao diện (Colors)', '9shop-theme'),
        'priority' => 20,
    ));

    // 1. Màu Chính (Primary Color - Đang là màu Cam)
    $wp_customize->add_setting('primary_color', array('default' => '#ffc107')); // Mã màu cam mặc định
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Màu Chính (Primary)', '9shop-theme'),
        'section'  => 'shop9_colors',
    )));

    // 2. Màu Phụ (Secondary Color - Đang là màu Đen/Xám)
    $wp_customize->add_setting('secondary_color', array('default' => '#333333'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Màu Phụ (Secondary)', '9shop-theme'),
        'section'  => 'shop9_colors',
    )));
}
add_action('customize_register', 'shop9_color_customizer');

// HÀM XUẤT CSS RA HEADER (Quan trọng)
function shop9_customizer_css() {
    $primary   = get_theme_mod('primary_color', '#ffc107');
    $secondary = get_theme_mod('secondary_color', '#333333');
    ?>
    <style type="text/css">
        :root {
            --bs-primary: <?php echo $primary; ?>;
            --bs-secondary: <?php echo $secondary; ?>;
        }
        .text-primary { color: <?php echo $primary; ?> !important; }
        .bg-primary { background-color: <?php echo $primary; ?> !important; }
        .btn-primary { 
            background-color: <?php echo $primary; ?> !important; 
            border-color: <?php echo $primary; ?> !important;
        }
        .text-secondary { color: <?php echo $secondary; ?> !important; }
        .bg-secondary { background-color: <?php echo $secondary; ?> !important; }
        
        /* Màu hover cho link/button */
        a:hover { color: <?php echo $secondary; ?>; }
    </style>
    <?php
}
add_action('wp_head', 'shop9_customizer_css');

function shop9_preloader_customizer($wp_customize) {
    $wp_customize->add_section('shop9_preloader', array(
        'title'    => __('Màn hình chờ (Preloader)', '9shop-theme'),
        'priority' => 25,
    ));

    // Bật/Tắt
    $wp_customize->add_setting('enable_preloader', array('default' => true));
    $wp_customize->add_control('enable_preloader', array(
        'label'    => 'Bật hiệu ứng Loading khi tải trang',
        'section'  => 'shop9_preloader',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'shop9_preloader_customizer');

function shop9_breadcrumb_customizer($wp_customize) {
    $wp_customize->add_section('shop9_breadcrumb', array(
        'title'    => __('Banner Trang con (Breadcrumb)', '9shop-theme'),
        'priority' => 80,
    ));

    // Upload ảnh nền
    $wp_customize->add_setting('breadcrumb_bg');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'breadcrumb_bg', array(
        'label'    => 'Ảnh nền Header các trang con',
        'section'  => 'shop9_breadcrumb',
    )));
}
add_action('customize_register', 'shop9_breadcrumb_customizer');

function shop9_bestseller_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_bestseller_settings', array(
        'title'    => __('Cài đặt Mục Bán chạy (Bestseller)', '9shop-theme'),
        'priority' => 60,
    ));

    // 2. Tiêu đề
    $wp_customize->add_setting('bs_sec_title', array('default' => 'Bestseller Products'));
    $wp_customize->add_control('bs_sec_title', array(
        'label'   => 'Tiêu đề mục',
        'section' => 'home_bestseller_settings',
        'type'    => 'text',
    ));

    // 3. Mô tả
    $wp_customize->add_setting('bs_sec_desc', array('default' => 'Những sản phẩm được khách hàng yêu thích và mua nhiều nhất.'));
    $wp_customize->add_control('bs_sec_desc', array(
        'label'   => 'Mô tả ngắn',
        'section' => 'home_bestseller_settings',
        'type'    => 'textarea',
    ));

    // 4. Số lượng sản phẩm
    $wp_customize->add_setting('bs_limit', array('default' => 6));
    $wp_customize->add_control('bs_limit', array(
        'label'   => 'Số lượng hiển thị',
        'section' => 'home_bestseller_settings',
        'type'    => 'number',
    ));

    // 5. Chế độ hiển thị (Quan trọng cho Shop mới)
    $wp_customize->add_setting('bs_mode', array('default' => 'sales'));
    $wp_customize->add_control('bs_mode', array(
        'label'       => 'Chế độ lấy sản phẩm',
        'description' => 'Nếu web mới chưa có đơn hàng, hãy chọn "Nổi bật" để không bị trống.',
        'section'     => 'home_bestseller_settings',
        'type'        => 'select',
        'choices'     => array(
            'sales'    => 'Theo Doanh số (Bán chạy nhất)',
            'featured' => 'Theo Nổi bật (Featured)',
            'random'   => 'Ngẫu nhiên (Random)'
        )
    ));
}
add_action('customize_register', 'shop9_bestseller_customizer');

function shop9_product_list_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('home_prod_list_settings', array(
        'title'    => __('Cài đặt List tất cả sản phẩm', '9shop-theme'),
        'priority' => 58, // Nằm gần cuối
    ));

    // 2. Tiêu đề nhỏ (Products)
    $wp_customize->add_setting('prod_list_small_title', array('default' => 'Products'));
    $wp_customize->add_control('prod_list_small_title', array(
        'label'   => 'Tiêu đề nhỏ',
        'section' => 'home_prod_list_settings',
        'type'    => 'text',
    ));

    // 3. Tiêu đề lớn (All Product Items)
    $wp_customize->add_setting('prod_list_main_title', array('default' => 'All Product Items'));
    $wp_customize->add_control('prod_list_main_title', array(
        'label'   => 'Tiêu đề lớn',
        'section' => 'home_prod_list_settings',
        'type'    => 'text',
    ));

    // 4. Chọn Danh mục
    $cat_choices = array('' => '-- Tất cả sản phẩm --');
    if (taxonomy_exists('product_cat')) {
        $categories = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $cat_choices[$category->slug] = $category->name;
            }
        }
    }

    $wp_customize->add_setting('prod_list_cat', array('default' => ''));
    $wp_customize->add_control('prod_list_cat', array(
        'label'       => 'Lọc theo Danh mục',
        'section'     => 'home_prod_list_settings',
        'type'        => 'select',
        'choices'     => $cat_choices,
    ));
}
add_action('customize_register', 'shop9_product_list_customizer');

function shop9_archive_product_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('shop9_product_card_settings', array(
        'title'    => __('Cài đặt Thẻ Sản phẩm (Product Card)', '9shop-theme'),
        'priority' => 50,
    ));

    // 2. Bật/Tắt nút "Thêm vào giỏ"
    $wp_customize->add_setting('card_show_cart', array('default' => true));
    $wp_customize->add_control('card_show_cart', array(
        'label'    => 'Hiển thị nút Thêm vào giỏ',
        'section'  => 'shop9_product_card_settings',
        'type'     => 'checkbox',
    ));

    // 3. Bật/Tắt Đánh giá sao
    $wp_customize->add_setting('card_show_rating', array('default' => true));
    $wp_customize->add_control('card_show_rating', array(
        'label'    => 'Hiển thị Đánh giá sao',
        'section'  => 'shop9_product_card_settings',
        'type'     => 'checkbox',
    ));

    // 4. Bật/Tắt Danh mục
    $wp_customize->add_setting('card_show_cat', array('default' => false));
    $wp_customize->add_control('card_show_cat', array(
        'label'    => 'Hiển thị Tên danh mục',
        'section'  => 'shop9_product_card_settings',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'shop9_archive_product_customizer');

function shop9_related_products_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('shop9_single_product_settings', array(
        'title'    => __('Cài đặt sản phẩm liên quan', '9shop-theme'),
        'priority' => 50,
    ));

    // 2. Tiêu đề mục Sản phẩm liên quan
    $wp_customize->add_setting('related_products_title', array('default' => 'Related Products'));
    $wp_customize->add_control('related_products_title', array(
        'label'   => 'Tiêu đề Sản phẩm liên quan',
        'section' => 'shop9_single_product_settings',
        'type'    => 'text',
    ));

    // 3. Số lượng sản phẩm hiển thị
    $wp_customize->add_setting('related_products_limit', array('default' => 4));
    $wp_customize->add_control('related_products_limit', array(
        'label'   => 'Số lượng hiển thị',
        'section' => 'shop9_single_product_settings',
        'type'    => 'number',
    ));
}
add_action('customize_register', 'shop9_related_products_customizer');

// 4. Hook để thay đổi số lượng sản phẩm liên quan (Quan trọng)
function shop9_change_related_products_limit( $args ) {
    $limit = get_theme_mod('related_products_limit', 4);
    $args['posts_per_page'] = $limit; // Số lượng
    $args['columns'] = 4; // Số cột (Mặc định 4)
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'shop9_change_related_products_limit', 20 );

function shop9_sidebar_customizer($wp_customize) {
    // 1. Tạo Section
    $wp_customize->add_section('shop9_sidebar_settings', array(
        'title'    => __('Cài đặt Sidebar Cửa hàng', '9shop-theme'),
        'priority' => 55,
    ));

    // ====================================
    // A. CẤU HÌNH DANH MỤC (CATEGORIES)
    // ====================================
    $wp_customize->add_setting('sidebar_enable_cat', array('default' => true));
    $wp_customize->add_control('sidebar_enable_cat', array(
        'label'    => 'Hiện Danh mục sản phẩm',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('sidebar_title_cat', array('default' => 'Product Categories'));
    $wp_customize->add_control('sidebar_title_cat', array(
        'label'    => 'Tiêu đề Danh mục',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'text',
    ));

    // ====================================
    // B. CẤU HÌNH LỌC GIÁ (PRICE)
    // ====================================
    $wp_customize->add_setting('sidebar_enable_price', array('default' => true));
    $wp_customize->add_control('sidebar_enable_price', array(
        'label'    => 'Hiện Lọc giá',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('sidebar_title_price', array('default' => 'Price'));
    $wp_customize->add_control('sidebar_title_price', array(
        'label'    => 'Tiêu đề Lọc giá',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'text',
    ));

    // ====================================
    // C. CẤU HÌNH SẢN PHẨM NỔI BẬT
    // ====================================
    $wp_customize->add_setting('sidebar_enable_featured', array('default' => true));
    $wp_customize->add_control('sidebar_enable_featured', array(
        'label'    => 'Hiện Sản phẩm Nổi bật',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_setting('sidebar_title_featured', array('default' => 'Featured Products'));
    $wp_customize->add_control('sidebar_title_featured', array(
        'label'    => 'Tiêu đề Nổi bật',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('sidebar_limit_featured', array('default' => 3));
    $wp_customize->add_control('sidebar_limit_featured', array(
        'label'    => 'Số lượng hiển thị',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'number',
    ));

    // ====================================
    // D. CẤU HÌNH BANNER QUẢNG CÁO
    // ====================================
    $wp_customize->add_setting('sidebar_enable_banner', array('default' => true));
    $wp_customize->add_control('sidebar_enable_banner', array(
        'label'    => 'Hiện Banner Quảng cáo',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'checkbox',
    ));
    
    // Ảnh Banner
    $wp_customize->add_setting('sidebar_banner_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sidebar_banner_img', array(
        'label'    => 'Ảnh Banner Sidebar',
        'section'  => 'shop9_sidebar_settings',
    )));

    // Text Banner
    $wp_customize->add_setting('sidebar_banner_text_1', array('default' => 'SALE'));
    $wp_customize->add_control('sidebar_banner_text_1', array(
        'label'    => 'Dòng chữ nhỏ (VD: SALE)',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('sidebar_banner_text_2', array('default' => 'Get UP To 50% Off'));
    $wp_customize->add_control('sidebar_banner_text_2', array(
        'label'    => 'Dòng chữ lớn (VD: 50% Off)',
        'section'  => 'shop9_sidebar_settings',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'shop9_sidebar_customizer');

function shop9_404_customizer($wp_customize) {
    // 1. Tạo Section 404
    $wp_customize->add_section('shop9_404_settings', array(
        'title'    => __('Cài đặt Trang 404 (Lỗi)', '9shop-theme'),
        'priority' => 90,
    ));

    // 2. Ảnh minh họa (Thay cho icon dấu than)
    $wp_customize->add_setting('error_404_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'error_404_image', array(
        'label'       => 'Ảnh minh họa 404',
        'description' => 'Upload ảnh vui nhộn (Robot, Mèo...). Nếu không có sẽ hiện Icon mặc định.',
        'section'     => 'shop9_404_settings',
    )));

    // 3. Tiêu đề chính (Page Not Found)
    $wp_customize->add_setting('error_404_title', array('default' => 'Không tìm thấy trang!'));
    $wp_customize->add_control('error_404_title', array(
        'label'   => 'Tiêu đề chính',
        'section' => 'shop9_404_settings',
        'type'    => 'text',
    ));

    // 4. Nội dung mô tả
    $wp_customize->add_setting('error_404_desc', array('default' => 'Rất tiếc, trang bạn tìm kiếm không tồn tại hoặc đã bị xóa.'));
    $wp_customize->add_control('error_404_desc', array(
        'label'   => 'Lời nhắn xin lỗi',
        'section' => 'shop9_404_settings',
        'type'    => 'textarea',
    ));

    // 5. Chữ trên nút
    $wp_customize->add_setting('error_404_btn', array('default' => 'Quay về Trang chủ'));
    $wp_customize->add_control('error_404_btn', array(
        'label'   => 'Chữ trên nút',
        'section' => 'shop9_404_settings',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'shop9_404_customizer');



// 1. KIỂM TRA & FIX YITH PLUGIN (BẮT BUỘC)
add_action('init', 'debug_yith_wishlist_status');
function debug_yith_wishlist_status() {
    if (!class_exists('YITH_WCWL')) {
        error_log('YITH WooCommerce Wishlist: PLUGIN KHÔNG ACTIVE HOẶC LỖI!');
        return;
    }
    error_log('YITH Wishlist: ACTIVE & READY');
}

// 2. ENQUEUE SCRIPTS + FIX AJAX URL (TRÁNH LOCALHOST)
add_action('wp_enqueue_scripts', 'enhanced_yith_wishlist_setup');
function enhanced_yith_wishlist_setup() {
    if (!class_exists('YITH_WCWL')) return;

    // Load YITH scripts đúng cách
    wp_enqueue_script('yith-wcwl-main', YITH_WCWL_URL . '/assets/js/jquery.yith-wcwl.js', ['jquery'], YITH_WCWL_VERSION, true);
    wp_localize_script('yith-wcwl-main', 'yith_wcwl_l10n', [
        'ajax_url' => admin_url('admin-ajax.php'),  // ÉP ĐÚNG URL, KHÔNG LOCALHOST
        'redirect_to_cart' => false,
        'is_wishlist_responsive' => true,
        'time_to_close_prettyphoto' => 3000,
        'fragments_index' => 'div.fragments',
        'is_user_logged_in' => is_user_logged_in(),
        'nonce' => wp_create_nonce('yith_wcwl_nonce'),
    ]);

    // Custom JS cho AJAX mượt + hiệu ứng (KHÔNG CONFLICT)
    wp_add_inline_script('yith-wcwl-main', '
        jQuery(document).ready(function($) {
            $(document).on("click", ".add_to_wishlist", function(e) {
                e.preventDefault();
                var $this = $(this);
                var product_id = $this.data("product-id");
                
                console.log("Wishlist Click Debug: Product ID = " + product_id);  // DEBUG LOG
                
                $.ajax({
                    type: "POST",
                    url: yith_wcwl_l10n.ajax_url,
                    data: {
                        action: "add_to_wishlist",
                        add_to_wishlist: product_id,
                        product_type: "simple",  // Hoặc lấy từ data
                        nonce: yith_wcwl_l10n.nonce
                    },
                    beforeSend: function() {
                        $this.addClass("loading").html("<i class=\'fas fa-spinner fa-spin\'></i> Đang thêm...");
                    },
                    success: function(data) {
                        console.log("Wishlist AJAX Success:", data);  // DEBUG LOG
                        
                        if (data && data.result === "true") {
                            $this.removeClass("loading").addClass("added");
                            $this.find("i").removeClass("fa-heart").addClass("fa-heart text-danger");
                            $this.find(".wishlist-text").text("Đã yêu thích");
                            
                            // Toast notification đẹp
                            if (!$(".wishlist-toast").length) {
                                $("body").append(\'<div class="wishlist-toast alert alert-success position-fixed" style="top:20px;right:20px;z-index:9999;">Đã thêm vào yêu thích! <i class="fas fa-check ms-2"></i></div>\');
                            }
                            $(".wishlist-toast").fadeIn().delay(2000).fadeOut();
                            
                            // Trigger YITH event
                            $(document.body).trigger("added_to_wishlist", [product_id, 0, data]);
                        } else {
                            alert("Lỗi thêm wishlist: " + (data.error || "Unknown"));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Wishlist AJAX Error:", error);  // DEBUG LOG
                        alert("Lỗi kết nối: " + error);
                    }
                });
            });
            
            // Remove from wishlist
            $(document).on("click", ".remove_from_wishlist", function(e) {
                e.preventDefault();
                var $this = $(this);
                var product_id = $this.data("product-id");
                
                $.ajax({
                    type: "POST",
                    url: yith_wcwl_l10n.ajax_url,
                    data: {
                        action: "remove_from_wishlist",
                        remove_from_wishlist: product_id,
                        nonce: yith_wcwl_l10n.nonce
                    },
                    beforeSend: function() {
                        $this.addClass("loading");
                    },
                    success: function(data) {
                        if (data && data.result === "true") {
                            $this.removeClass("added loading");
                            $this.find("i").removeClass("fa-heart text-danger").addClass("fa-heart");
                            $this.find(".wishlist-text").text("Yêu thích");
                            
                            $(".wishlist-toast").removeClass("alert-success").addClass("alert-info").text("Đã xóa khỏi yêu thích!").fadeIn().delay(2000).fadeOut();
                        }
                    }
                });
            });
        });
    ');
}

// 3. TẮT REDIRECT HOÀN TOÀN (KHÔNG LOCALHOST NỮA)
add_filter('yith_wcwl_redirect_to_wishlist_page', '__return_false');
add_filter('yith_wcwl_added_to_wishlist_redirect', '__return_false');
add_filter('yith_wcwl_removed_from_wishlist_redirect', '__return_false');

// 4. NÚT WISHLIST ĐẸP CHO LOOP & SINGLE (CÓ CHECK IN WISHLIST)
add_action('woocommerce_after_shop_loop_item', 'enhanced_wishlist_button_loop', 15);
function enhanced_wishlist_button_loop() {
    if (!class_exists('YITH_WCWL')) return;
    global $product;
    $product_id = $product->get_id();
    $wishlist_url = add_query_arg('add_to_wishlist', $product_id, wc_get_page_permalink('shop'));  // Fallback URL
    $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);

    echo '<div class="wishlist-btn mt-2 text-center">';
    echo '<a href="' . esc_url($wishlist_url) . '" 
              class="add_to_wishlist btn-wishlist ' . ($in_wishlist ? 'added' : '') . '" 
              data-product-id="' . $product_id . '" 
              rel="nofollow">
            <i class="fas ' . ($in_wishlist ? 'fa-heart text-danger' : 'fa-heart') . '"></i>
            <span class="wishlist-text ms-1">' . ($in_wishlist ? 'Đã yêu thích' : 'Yêu thích') . '</span>
          </a>';
    echo '</div>';
}

add_action('woocommerce_single_product_summary', 'enhanced_wishlist_button_single', 35);
function enhanced_wishlist_button_single() {
    if (!class_exists('YITH_WCWL')) return;
    global $product;
    $product_id = $product->get_id();
    $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);

    echo '<div class="single-wishlist-btn mt-4 d-flex align-items-center">';
    echo '<a href="#" class="add_to_wishlist btn-wishlist ' . ($in_wishlist ? 'added remove_from_wishlist' : '') . '" 
              data-product-id="' . $product_id . '">
            <i class="fas ' . ($in_wishlist ? 'fa-heart text-danger' : 'fa-heart') . ' fa-lg me-2"></i>
            <span>' . ($in_wishlist ? 'Xóa khỏi yêu thích' : 'Thêm vào yêu thích') . '</span>
          </a>';
    echo '</div>';
}

/* ========================================
   ĐẾM + HIỂN THỊ LƯỢT XEM SẢN PHẨM (VIEW COUNT)
   Hoạt động mượt, không duplicate, đẹp
======================================== */

function update_product_view_count() {
    if (!wp_verify_nonce($_POST['nonce'], 'view_count_nonce')) {
        wp_die('Bảo mật lỗi!');
    }

    $product_id = intval($_POST['product_id']);
    if (!$product_id || get_post_type($product_id) !== 'product') {
        wp_die('Sản phẩm không hợp lệ');
    }

    // Tránh đếm trùng: dùng cookie 24h
    $cookie_name = 'viewed_product_' . $product_id;
    if (!isset($_COOKIE[$cookie_name])) {
        $views = get_post_meta($product_id, 'product_views_count', true);
        $views = $views ? intval($views) + 1 : 1;
        update_post_meta($product_id, 'product_views_count', $views);

        // Đặt cookie 24h để không đếm lại
        setcookie($cookie_name, '1', time() + 86400, '/');
    }

    // Trả về số lượt xem mới nhất
    $current_views = get_post_meta($product_id, 'product_views_count', true);
    wp_send_json_success(array('views' => number_format_i18n($current_views)));
}
add_action('wp_ajax_update_product_view_count', 'update_product_view_count');
add_action('wp_ajax_nopriv_update_product_view_count', 'update_product_view_count');


// Hiển thị lượt xem trong trang chi tiết sản phẩm
function display_product_view_count() {
    global $product;
    if (!is_a($product, 'WC_Product')) return;

    $views = get_post_meta($product->get_id(), 'product_views_count', true);
    $views = $views ? intval($views) : 0;
    $views_formatted = number_format_i18n($views);

    echo '<div class="product-view-count mb-3 text-muted">
            <i class="fas fa-eye me-2 text-primary"></i>
            <strong>' . $views_formatted . ' lượt xem</strong>
          </div>';
}
add_action('woocommerce_single_product_summary', 'display_product_view_count', 15);


// Gửi AJAX khi vào trang sản phẩm để tăng lượt xem
function trigger_view_count_script() {
    if (!is_singular('product')) return;

    global $post;
    $nonce = wp_create_nonce('view_count_nonce');
    ?>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Chỉ chạy 1 lần duy nhất
        if (sessionStorage.getItem('view_count_sent_<?php echo $post->ID; ?>')) return;
        sessionStorage.setItem('view_count_sent_<?php echo $post->ID; ?>', '1');

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'update_product_view_count',
                product_id: '<?php echo $post->ID; ?>',
                nonce: '<?php echo $nonce; ?>'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const viewElement = document.querySelector('.product-view-count strong');
                if (viewElement) {
                    viewElement.textContent = data.data.views + ' lượt xem';
                }
            }
        })
        .catch(err => console.log('View count error:', err));
    });
    </script>
    <?php
}

// Chèn nút Share vào trang Single Product của WooCommerce
add_action('woocommerce_share', 'add_addtoany_sharing_buttons', 10);
// Hoặc chèn dưới nút Add to cart:
// add_action( 'woocommerce_after_add_to_cart_button', 'add_addtoany_sharing_buttons', 10 );

function add_addtoany_sharing_buttons()
{
    if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {
        echo '<div class="custom-social-share" style="margin-top: 20px;">';
        echo '<p style="margin-bottom:5px; font-weight:bold;">Chia sẻ ngay:</p>';
        ADDTOANY_SHARE_SAVE_KIT(); // Hàm gọi nút share ra
        echo '</div>';
    }
}

add_action('wp_footer', 'trigger_view_count_script');


/**
 * ========================================
 * ĐẾM LƯỢT XEM SẢN PHẨM - PHIÊN BẢN HOÀN CHỈNH & AN TOÀN
 * ========================================
 */

// 1. AJAX Handler - Tăng lượt xem (cả khách vãng lai và đăng nhập)
function myshop_increase_product_views() {
    // Kiểm tra nonce bắt buộc
    if (!wp_verify_nonce($_POST['nonce'], 'myshop_viewcount_nonce')) {
        wp_send_json_error(['message' => 'Nonce không hợp lệ']);
    }

    $product_id = absint($_POST['product_id']);
    if (!$product_id || get_post_type($product_id) !== 'product') {
        wp_send_json_error(['message' => 'ID sản phẩm không hợp lệ']);
    }

    // Lấy lượt xem hiện tại
    $views = get_post_meta($product_id, '_product_views', true);
    $views = $views ? intval($views) : 0;
    $views++;

    // Cập nhật lại
    update_post_meta($product_id, '_product_views', $views);

    // Trả về lượt xem mới (để hiển thị realtime nếu cần)
    wp_send_json_success([
        'views' => $views,
        'formatted' => number_format_i18n($views) . ' lượt xem'
    ]);
}
add_action('wp_ajax_myshop_increase_views', 'myshop_increase_product_views');
add_action('wp_ajax_nopriv_myshop_increase_views', 'myshop_increase_product_views');


// 2. HIỂN THỊ LƯỢT XEM - BẢN FIX HIỆN 100% (có thêm fallback vị trí)
function myshop_show_product_views() {
    if (!is_singular('product')) return;
    
    global $post;
    $views = (int) get_post_meta($post->ID, '_product_views', true);

    // Định dạng đẹp
    if ($views >= 1000000) {
        $formatted = round($views / 1000000, 1) . 'M';
    } elseif ($views >= 1000) {
        $formatted = round($views / 1000, 1) . 'k';
    } else {
        $formatted = number_format_i18n($views);
    }

    echo '<div class="myshop-product-views text-center my-4" style="font-size: 15px;">
            <i class="fas fa-eye text-primary me-2"></i>
            <strong style="color: #212529;">' . esc_html($formatted) . ' lượt xem</strong>
          </div>';
}
// Dùng 2 hook để chắc chắn hiện ra (một trong hai sẽ chạy)
add_action('woocommerce_single_product_summary', 'myshop_show_product_views', 25);
add_action('woocommerce_before_add_to_cart_button', 'myshop_show_product_views', 5); // fallback

// 3. Gọi AJAX khi vào trang chi tiết sản phẩm (chỉ chạy 1 lần/ngày cho mỗi sản phẩm)
function myshop_trigger_view_count_script() {
    if (!is_singular('product')) return;

    global $post;
    $product_id = $post->ID;
    $nonce = wp_create_nonce('myshop_viewcount_nonce');
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const viewedKey = "viewed_product_<?php echo $product_id; ?>";
        
        // Chỉ tăng view nếu chưa xem trong 24h (dùng localStorage)
        if (localStorage.getItem(viewedKey)) return;

        // Đánh dấu đã xem trong 24h
        localStorage.setItem(viewedKey, Date.now());

        // Gửi AJAX tăng lượt xem
        fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
            method: "POST",
            credentials: 'same-origin',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
                action: "myshop_increase_views",
                product_id: "<?php echo $product_id; ?>",
                nonce: "<?php echo $nonce; ?>"
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const viewsEl = document.querySelector('.myshop-product-views strong');
                if (viewsEl) {
                    viewsEl.innerHTML = data.data.formatted;
                }
            }
        })
        .catch(err => console.log("View count error:", err));
    });
    </script>
    <?php
}
add_action('wp_footer', 'myshop_trigger_view_count_script');
