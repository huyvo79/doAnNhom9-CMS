<!-- Products Offer Start -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            // Lấy sản phẩm đang giảm giá (on sale)
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 2,
                'meta_query' => WC()->query->get_meta_query(),
                'post__in' => wc_get_product_ids_on_sale(), // chỉ lấy sản phẩm đang sale
            );
            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a href="<?php the_permalink(); ?>" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                            <div>
                                <p class="text-muted mb-3">Ưu đãi đặc biệt!</p>
                                <h3 class="text-primary"><?php the_title(); ?></h3>

                                <?php if ($product->is_on_sale()) : ?>
                                    <h1 class="display-3 text-secondary mb-0">
                                        <?php echo round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100); ?>%
                                        <span class="text-primary fw-normal">Off</span>
                                    </h1>
                                <?php endif; ?>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'products-offer-img']); ?>
                            <?php else: ?>
                                <img src="<?php echo wc_placeholder_img_src(); ?>" class="products-offer-img" alt="No image">
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>Không có sản phẩm khuyến mãi nào.</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Products Offer End -->
