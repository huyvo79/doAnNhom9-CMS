<?php
/**
 * Template Part: WooCommerce Product Grid
 * Hiển thị danh sách sản phẩm dạng grid và list (tabbed interface).
 */

if (!class_exists('WooCommerce')) {
    echo '<p>WooCommerce chưa được kích hoạt.</p>';
    return;
}

// --- 1. Logic Truy Vấn Sản Phẩm (Giữ nguyên) ---

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    'paged' => $paged, // Dùng biến $paged đã được kiểm tra cẩn thận
    'suppress_filters' => true, // Tùy chọn, để đảm bảo không bị ảnh hưởng bởi các filter khác
);

$current_term = get_queried_object();
$category_title = '';

if ($current_term && is_a($current_term, 'WP_Term') && $current_term->taxonomy == 'product_cat') {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $current_term->slug,
        ),
    );
    $category_title = $current_term->name;
}

$query = new WP_Query($args);


if ($query->have_posts()):
    ?>
    <style>
        .product-item.list-view .product-new.list-view-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
            background-color: orange;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
        }
    </style>
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
        <!-- Search bar và Catalog Ordering giữ nguyên -->
        <div class="col-xl-7">
            <div class="input-group w-100 mx-auto d-flex">
                <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
            </div>
        </div>
        <div class="col-xl-3 text-end">
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <!-- Nút chuyển đổi (Tabs Triggers) giữ nguyên -->
        <div class="col-lg-4 col-xl-2">
            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                <li class="nav-item me-4">
                    <a class="bg-light active" data-bs-toggle="pill" href="#tab-5">
                        <i class="fas fa-th fa-3x text-primary"></i> <!-- Grid Icon -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                        <i class="fas fa-bars fa-3x text-primary"></i> <!-- List Icon -->
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- 2. Bắt đầu Tab Content -->
    <div class="tab-content">

        <!-- TAB 5: GRID VIEW (Bố cục 3 cột) -->
        <div id="tab-5" class="tab-pane fade show active p-0">
            <div class="row g-4 product">
                <?php while ($query->have_posts()):
                    $query->the_post();
                    global $product;
                    $percentage = function_exists('get_product_sale_percentage') ? get_product_sale_percentage($product) : null;
                    $img = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] ?? wc_placeholder_img_src();
                    $rating = wc_get_rating_html($product->get_average_rating());
                    $cat_list = wc_get_product_category_list($product->get_id(), ', ');
                    ?>
                    <!-- THAY ĐỔI: Dùng col-lg-4 để có 3 sản phẩm trên 1 hàng (Grid) -->
                    <div class="col-lg-4">
                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item-inner border rounded">
                                <div class="product-item-inner-item position-relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($img); ?>" class="img-fluid w-100 rounded-top"
                                            alt="<?php the_title(); ?>">
                                    </a>

                                    <?php if ($product->is_on_sale() && $percentage): ?>
                                        <!-- Grid View: Class product-new (định vị absolute trong CSS theme của bạn) -->
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

                                    <?php echo $product->get_price_html(); ?>
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
        </div>

        <!-- TAB 6: LIST VIEW (Bố cục Danh sách 1 cột) -->
        <div id="tab-6" class="tab-pane fade p-0">
            <div class="row g-4 product">
                <?php $query->rewind_posts(); // Quay lại đầu truy vấn để lặp lại ?>
                <?php while ($query->have_posts()):
                    $query->the_post();
                    global $product;
                    $percentage = function_exists('get_product_sale_percentage') ? get_product_sale_percentage($product) : null;
                    $img = wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0] ?? wc_placeholder_img_src(); // Dùng thumbnail cho list view
                    $rating = wc_get_rating_html($product->get_average_rating());
                    $cat_list = wc_get_product_category_list($product->get_id(), ', ');
                    ?>
                    <!-- THAY ĐỔI: Dùng col-12 để có 1 sản phẩm trên 1 hàng (List) -->
                    <div class="col-12">
                        <div class="product-item list-view rounded border p-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row align-items-center">
                                <!-- Cột ảnh (col-md-3) -->
                                <div class="col-md-3">
                                    <!-- THAY ĐỔI: Thêm class position-relative vào đây để badge có thể định vị tuyệt đối -->
                                    <div class="position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url($img); ?>" class="img-fluid w-100 rounded"
                                                alt="<?php the_title(); ?>">
                                        </a>
                                        <?php if ($product->is_on_sale() && $percentage): ?>
                                            <!-- List View: Sử dụng class product-new để giữ nguyên CSS cho badge -->
                                            <div class="product-new list-view-badge"><?php echo esc_html($percentage); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Cột Thông tin (col-md-6) -->
                                <div class="col-md-6 text-start py-3 py-md-0">
                                    <a href="<?php the_permalink(); ?>"
                                        class="d-block mb-1 text-muted small"><?php echo wp_kses_post($cat_list); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="d-block h5"><?php the_title(); ?></a>

                                    <!-- Mô tả ngắn -->
                                    <div class="mb-2"><?php the_excerpt(); ?></div>

                                    <!-- Đánh giá -->
                                    <div class="d-flex mb-2">
                                        <?php echo $rating ?: '<i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star"></i>'; ?>
                                    </div>
                                </div>

                                <!-- Cột Giá & Mua hàng (col-md-3) -->
                                <div class="col-md-3 text-center">
                                    <div class="my-3 my-md-0">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    <?php woocommerce_template_loop_add_to_cart(array('class' => 'btn btn-primary border-secondary rounded-pill py-2 px-3')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Kết thúc Tab Content -->

        <?php
        // Điều chỉnh logic phân trang (chỉ cần đặt 1 lần sau tab-content)
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

    <?php
else:
    echo '<p>Không có sản phẩm nào được tìm thấy.</p>';
endif;

wp_reset_postdata();
?>