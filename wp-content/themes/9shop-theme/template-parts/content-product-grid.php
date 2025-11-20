    <!-- Banner đầu trang -->
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

    <!-- Bộ lọc tìm kiếm và sort -->
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

    <!-- Danh sách sản phẩm -->
    <div class="tab-content">
        <div id="tab-5" class="tab-pane fade show active p-0">
            <div class="row g-4 product">
                <?php
                if (woocommerce_product_loop()) {

                    // Bắt đầu vòng lặp sản phẩm của WooCommerce
                    woocommerce_product_loop_start();

                    if (wc_get_loop_prop('total')) {
                        while (have_posts()) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             * Dùng để tương thích với các plugin khác nếu cần.
                             */
                            do_action('woocommerce_shop_loop');

                            // Lấy các biến cần thiết
                            global $product;
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

                                            <?php if ($product->is_on_sale()): ?>
                                                <div class="product-new">Sale</div>
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
                                            <?php if ($product->get_regular_price() && $product->get_sale_price()): ?>
                                                <del class="me-2 fs-5"><?php echo wc_price($product->get_regular_price()); ?></del>
                                            <?php endif; ?>
                                            <span class="text-primary fs-5"><?php echo wp_kses_post($price_html); ?></span>
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
                <?php
                        }
                    }

                    woocommerce_product_loop_end();

                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action('woocommerce_no_products_found');
                }
                ?>
            </div>

            <?php
            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
            ?>
        </div>
    </div>

<?php

?>