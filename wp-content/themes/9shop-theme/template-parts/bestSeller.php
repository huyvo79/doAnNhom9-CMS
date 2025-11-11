<!-- Bestseller Products Start -->
<div class="container-fluid products pb-5">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                data-wow-delay="0.1s">Bestseller Products</h4>
            <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">
                Những sản phẩm được khách hàng yêu thích và mua nhiều nhất.
            </p>
        </div>

        <div class="row g-4">
            <?php
            // Lấy sản phẩm bán chạy nhất
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => 6,
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC'
            ];
            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                $delay = 0.1;
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                        <div class="products-mini-item border">
                            <div class="row g-0">
                                <div class="col-5">
                                    <div class="products-mini-img border-end h-100 position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100', 'alt' => get_the_title()]); ?>
                                            <?php else: ?>
                                                <img src="<?php echo wc_placeholder_img_src(); ?>" class="img-fluid w-100 h-100" alt="No image">
                                            <?php endif; ?>
                                        </a>
                                        <div class="products-mini-icon rounded-circle bg-primary">
                                            <a href="<?php the_permalink(); ?>"><i class="fa fa-eye fa-1x text-white"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="products-mini-content p-3">
                                        <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="d-block mb-2">
                                            <?php echo wc_get_product_category_list($product->get_id()); ?>
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="d-block h4"><?php the_title(); ?></a>

                                        <?php if ($product->is_on_sale()): ?>
                                            <del class="me-2 fs-5"><?php echo wc_price($product->get_regular_price()); ?></del>
                                            <span class="text-primary fs-5"><?php echo wc_price($product->get_sale_price()); ?></span>
                                        <?php else: ?>
                                            <span class="text-primary fs-5"><?php echo wc_price($product->get_price()); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="products-mini-add border p-3">
                                <a href="?add-to-cart=<?php echo $product->get_id(); ?>"
                                   class="btn btn-primary border-secondary rounded-pill py-2 px-4 ajax_add_to_cart"
                                   data-product_id="<?php echo $product->get_id(); ?>">
                                    <i class="fas fa-shopping-cart me-2"></i> Add To Cart
                                </a>
                                <div class="d-flex">
                                    <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                                       class="text-primary d-flex align-items-center justify-content-center me-3">
                                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                    </a>
                                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $delay += 0.2; // tạo hiệu ứng delay khác nhau
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="text-center">Hiện chưa có sản phẩm bán chạy nào.</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Bestseller Products End -->
