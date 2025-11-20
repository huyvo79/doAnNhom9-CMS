<?php
/**
 * Template Part: WooCommerce Product Grid
 * Hiển thị danh sách sản phẩm dạng grid (giữ nguyên HTML cũ)
 */

if (!class_exists('WooCommerce')) {
    echo '<p>WooCommerce chưa được kích hoạt.</p>';
    return;
}

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// --- Bắt đầu: Logic Lọc theo Danh mục Sản phẩm (Đã Thay Đổi) ---

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    'paged' => $paged,
);

// Lấy thông tin về trang hiện tại (nếu là trang lưu trữ danh mục/tag)
$current_term = get_queried_object();
$category_title = ''; // Khởi tạo biến lưu tiêu đề

// Kiểm tra xem trang hiện tại có phải là trang lưu trữ danh mục sản phẩm (product_cat) hay không
if ($current_term && is_a($current_term, 'WP_Term') && $current_term->taxonomy == 'product_cat') {

    // Nếu là trang danh mục, thêm điều kiện tax_query vào $args để lọc sản phẩm
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug', // Lọc theo slug của danh mục
            'terms' => $current_term->slug, // Slug của danh mục hiện tại
        ),
    );

    // Lấy tiêu đề danh mục để hiển thị
    $category_title = $current_term->name;
}

// --- Kết thúc: Logic Lọc theo Danh mục Sản phẩm ---

// Sử dụng new WP_Query với $args đã cập nhật
$query = new WP_Query($args);

if ($query->have_posts()):
    ?>
    <div class="rounded mb-4 position-relative">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-banner-3.jpg"
            class="img-fluid rounded w-100" style="height: 250px;" alt="Image">
        <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
            <h4 class="display-5 text-primary">SALE</h4>
            <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
            <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
        </div>
    </div>


    <div class="row g-4 align-items-center mb-4">
        <div class="col-xl-7">
            <?php get_product_search_form(); ?>
        </div>
        <div class="col-xl-3 text-end">
            <?php woocommerce_catalog_ordering(); ?>
        </div>
        <div class="col-lg-4 col-xl-2">
            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                <li class="nav-item me-4">
                    <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                        <i class="fas fa-th fa-3x text-primary"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                        <i class="fas fa-bars fa-3x text-primary"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div id="tab-5" class="tab-pane fade show active p-0">
            <div class="row g-4 product">
                <?php while ($query->have_posts()):
                    $query->the_post();
                    global $product;
                    $percentage = get_product_sale_percentage($product);

                    $img = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] ?? wc_placeholder_img_src();
                    $rating = wc_get_rating_html($product->get_average_rating());
                    $price_html = $product->get_price_html();
                    $cat_list = wc_get_product_category_list($product->get_id(), ', ');

                    $img = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] ?? wc_placeholder_img_src();
                    $rating = wc_get_rating_html($product->get_average_rating());
                    $price_html = $product->get_price_html();
                    $cat_list = wc_get_product_category_list($product->get_id(), ', ');
                    ?>
                    <div class="col-lg-4">
                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item-inner border rounded">
                                <div class="product-item-inner-item position-relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($img); ?>" class="img-fluid w-100 rounded-top"
                                            alt="<?php the_title(); ?>">
                                    </a>

                                    <?php if ($product->is_on_sale() && $percentage): ?>
                                        <div class="product-new"><?php echo esc_html($percentage); ?></div>
                                    <?php else: ?>
                                        <div class="product-new">New</div>
                                    <?php endif; ?>

                                    <div class="product-details">
                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-eye fa-1x"></i></a>
                                    </div>
                                </div>

                                <div class="text-center rounded-bottom p-4">
                                    <a href="<?php the_permalink(); ?>"
                                        class="d-block mb-2"><?php echo wp_kses_post($cat_list); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="d-block h4"><?php the_title(); ?></a>

                                    <?php
                                    if ($product->is_on_sale()) {
                                        // 1. Hiển thị Giá Gạch ngang (Giá thường)
                                        $regular_price = $product->get_regular_price();

                                        // 2. Hiển thị Giá khuyến mãi/Giá hiện tại (sử dụng get_price_html để lấy giá đã được làm đẹp, nhưng đã loại bỏ phần gạch ngang)
                                        echo '<span class="text-primary fs-5">' . $product->get_price_html() . '</span>';
                                    } else {
                                        // Nếu KHÔNG có khuyến mãi, chỉ hiển thị 1 Giá duy nhất (Giá hiện tại)
                                        echo '<span class="text-primary fs-5">' . $product->get_price_html() . '</span>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                <?php woocommerce_template_loop_add_to_cart(array('class' => 'btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4')); ?>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <?php echo $rating ?: '<i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star"></i>'; ?>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                            <span class="rounded-circle btn-sm-square border"><i
                                                    class="fas fa-random"></i></span>
                                        </a>
                                        <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                            <span class="rounded-circle btn-sm-square border"><i
                                                    class="fas fa-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php
            // Điều chỉnh logic phân trang
            $total_pages = $query->max_num_pages;
            $current_page = max(1, get_query_var('paged'));

            if ($total_pages > 1): ?>
                <div class="pagination d-flex justify-content-center mt-5">

                    <a class="rounded <?= $current_page == 1 ? 'disabled' : '' ?>"
                        href="<?= $current_page == 1 ? '#' : get_pagenum_link($current_page - 1); ?>">
                        &laquo;
                    </a>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="<?= get_pagenum_link($i) ?>" class="rounded <?= $i == $current_page ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <a class="rounded <?= $current_page == $total_pages ? 'disabled' : '' ?>"
                        href="<?= $current_page == $total_pages ? '#' : get_pagenum_link($current_page + 1); ?>">
                        &raquo;
                    </a>

                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php
else:
    echo '<p>Không có sản phẩm nào được tìm thấy.</p>';
endif;

// Quan trọng: Đặt lại dữ liệu bài viết sau khi sử dụng WP_Query tùy chỉnh
wp_reset_postdata();
?>