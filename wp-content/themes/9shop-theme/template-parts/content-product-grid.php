<?php
/**
 * Template Part: WooCommerce Product Grid
 * Hiển thị danh sách sản phẩm dạng grid và list (tabbed interface).
 * SỬ DỤNG TRUY VẤN CHÍNH (MAIN QUERY) ĐÃ ĐƯỢC CHỈNH SỬA BỞI functions.php
 */

if (!class_exists('WooCommerce')) {
    echo '<p>WooCommerce chưa được kích hoạt.</p>';
    return;
}

// KHÔNG CẦN: Logic Truy Vấn Sản Phẩm (Đã chuyển sang functions.php)
// KHÔNG CẦN: $paged = ...
// KHÔNG CẦN: $args = ...
// KHÔNG CẦN: $query = new WP_Query($args);

// Dữ liệu danh mục vẫn lấy từ truy vấn chính
$current_term = get_queried_object();
$category_title = '';

if ($current_term && is_a($current_term, 'WP_Term') && $current_term->taxonomy == 'product_cat') {
    $category_title = $current_term->name;
}

// Bắt đầu kiểm tra Truy vấn Chính
if (have_posts()):
    ?>
    <style>
        /* ... CSS giữ nguyên ... */
        .product-item.list-view .product-new.list-view-badge {
            position: absolute;
            top: 0;
            left: 10px;
            z-index: 10;
            background-color: orange;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CSS cho paginate_links để trông giống giao diện Bootstrap */
        .pagination-links a,
        .pagination-links span {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 4px;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            text-decoration: none;
            color: #0d6efd;
        }

        .pagination-links .current {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .pagination-links .disabled {
            color: #6c757d;
            pointer-events: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
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
        <div class="col-xl-7">
            <form method="get" class="input-group w-100 mx-auto d-flex" action="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">
                <input type="search" class="form-control p-3" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>" placeholder="Tìm sản phẩm..." aria-describedby="search-icon-1">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="input-group-text p-3" id="search-icon-1"><i class="fa fa-search"></i></button>
            </form>
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
                <?php
                // Sử dụng vòng lặp truy vấn chính
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        global $product;
                        $percentage = function_exists('get_product_sale_percentage') ? get_product_sale_percentage($product) : null;
                        $img = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] ?? wc_placeholder_img_src();
                        $rating = wc_get_rating_html($product->get_average_rating());
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
                    <?php endwhile; endif; // Kết thúc vòng lặp truy vấn chính ?>
            </div>
        </div>

        <div id="tab-6" class="tab-pane fade show p-0">
            <div class="row g-4 product">
                <?php
                // Cần reset_postdata() để vòng lặp mới hiển thị từ đầu trang (chỉ khi có 2 vòng lặp liên tiếp)
                rewind_posts();

                // Sử dụng vòng lặp truy vấn chính lần thứ hai cho List View
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        global $product;
                        $percentage = function_exists('get_product_sale_percentage') ? get_product_sale_percentage($product) : null;
                        $img = wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0] ?? wc_placeholder_img_src();
                        $rating = wc_get_rating_html($product->get_average_rating());
                        $cat_list = wc_get_product_category_list($product->get_id(), ', ');
                        ?>
                        <div class="col-12">
                            <div class="product-item list-view rounded border p-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="position-relative">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($img); ?>" class="img-fluid w-100 rounded"
                                                    alt="<?php the_title(); ?>">
                                            </a>
                                            <?php if ($product->is_on_sale() && $percentage): ?>
                                                <div class="product-new list-view-badge"><?php echo esc_html($percentage); ?></div>
                                                <?php else: ?>
                                                <div class="product-new list-view-badge">New</div>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-start py-3 py-md-0">
                                        <a href="<?php the_permalink(); ?>"
                                            class="d-block mb-1 text-muted small"><?php echo wp_kses_post($cat_list); ?></a>
                                        <a href="<?php the_permalink(); ?>" class="d-block h5"><?php the_title(); ?></a>

                                        <div class="mb-2"><?php the_excerpt(); ?></div>

                                        <div class="d-flex mb-2">
                                            <?php echo $rating ?: '<i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star text-primary"></i><i class="fas fa-star"></i>'; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3 text-center">
                                        <div class="my-3 my-md-0">
                                            <?php echo $product->get_price_html(); ?>
                                        </div>
                                        <?php woocommerce_template_loop_add_to_cart(array('class' => 'btn btn-primary border-secondary rounded-pill py-2 px-3')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; // Kết thúc vòng lặp truy vấn chính thứ hai ?>
            </div>
        </div>
        <?php

        // =======================================================
        // PHÂN TRANG: SỬ DỤNG paginate_links() VỚI TRUY VẤN CHÍNH
        // =======================================================
    
        // Trong truy vấn chính, $wp_query đã có sẵn và chứa thông tin tổng số trang chính xác.
        global $wp_query;

        if ($wp_query->max_num_pages > 1):
            $big = 999999999;
            $paged = max(1, get_query_var('paged'));

            $pagination_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => $paged,
                'total' => $wp_query->max_num_pages, // Sử dụng max_num_pages của $wp_query
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'type' => 'plain',
            ));

            if ($pagination_links) {
                echo '<div class="pagination d-flex justify-content-center mt-5">';
                echo '<div class="pagination-links">';
                echo $pagination_links;
                echo '</div>';
                echo '</div>';
            }
        endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
else:
    echo '<p>Không có sản phẩm nào được tìm thấy.</p>';
endif;

// KHÔNG CẦN wp_reset_postdata() hay wp_reset_query() vì ta đang sử dụng truy vấn chính.
?>