<?php get_header(); ?>

<main>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <?php
        // Lấy đối tượng truy vấn hiện tại
        $current_term = get_queried_object();
        $page_title = 'Shop Page'; // Tiêu đề mặc định
        
        // 1. Kiểm tra nếu đang ở trang Lưu trữ Danh mục Sản phẩm (Product Category Archive)
        if ($current_term && is_a($current_term, 'WP_Term') && $current_term->taxonomy == 'product_cat') {
            $page_title = $current_term->name;

        }
        // 2. Kiểm tra nếu đang ở trang Cửa hàng (Shop Page) chính của WooCommerce
        elseif (is_shop()) {
            // Lấy tiêu đề trang Shop được cấu hình trong WooCommerce
            $page_title = woocommerce_page_title(false);

        }
        // 3. Nếu là các trang khác, giữ nguyên logic bạn muốn (ví dụ: is_page(), is_search())
        
        ?>
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">
            <?php echo esc_html($page_title); ?>
        </h1>

        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

            <?php if ($current_term && is_a($current_term, 'WP_Term')): // Nếu đang ở trang Danh mục/Tag ?>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop</a>
                </li>
                <li class="breadcrumb-item active text-white"><?php echo esc_html($current_term->name); ?></li>
            <?php else: // Nếu là trang Shop chính ?>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            <?php endif; ?>

        </ol>
    </div>
    <?php get_template_part('template-parts/service'); ?>

    <!-- Single Page Header End -->

    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <?php get_template_part('template-parts/sidebar-shop'); ?>


                <!-- Product Grid -->
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-center">
                        <?php get_template_part('template-parts/content-product-grid'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/products-offer'); ?>
    <?php get_template_part('template-parts/bestSeller'); ?>
</main>

<?php get_footer(); ?>