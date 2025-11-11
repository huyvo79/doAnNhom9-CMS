<!-- Product List Start -->
<div class="container-fluid products productList overflow-hidden">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
                Products
            </h4>
            <h1 class="mb-0 display-3 wow fadeInUp" data-wow-delay="0.3s">All Product Items</h1>
        </div>

        <div class="productList-carousel owl-carousel pt-4 wow fadeInUp" data-wow-delay="0.3s">
            <?php
            // Query sản phẩm
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
            ];
            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="productImg-item products-mini-item border">
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
                                <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" 
                                   class="text-primary d-flex align-items-center justify-content-center me-3">
                                    <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                </a>
                                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                    <span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="text-center">No products found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Product List End -->
