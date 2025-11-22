<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            // 1. Lấy ID từ Customizer
            $id1 = get_theme_mod('offer_prod_1', '');
            $id2 = get_theme_mod('offer_prod_2', '');
            
            // Lọc bỏ giá trị rỗng
            $manual_ids = array_filter(array($id1, $id2));

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 2,
            );

            // 2. Logic Query
            if (!empty($manual_ids)) {
                // A. Nếu Admin CÓ chọn sản phẩm -> Lấy theo ID đã chọn
                $args['post__in'] = $manual_ids;
                $args['orderby']  = 'post__in'; // Giữ đúng thứ tự đã chọn
            } else {
                // B. Nếu Admin KHÔNG chọn -> Lấy tự động sản phẩm đang Sale (Logic cũ)
                $args['meta_query'] = WC()->query->get_meta_query();
                $args['post__in']   = wc_get_product_ids_on_sale();
            }

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a href="<?php the_permalink(); ?>" class="d-flex align-items-center justify-content-between border bg-white rounded p-4 position-relative overflow-hidden text-decoration-none" style="min-height: 200px;">
                            
                            <div style="z-index: 2; max-width: 60%;">
                                <p class="text-muted mb-2 text-uppercase fw-bold small">Ưu đãi đặc biệt!</p>
                                <h4 class="text-dark mb-3 fw-bold text-truncate"><?php the_title(); ?></h4>

                                <?php if ($product->is_on_sale() && $product->get_regular_price() > 0) : ?>
                                    <div class="d-flex align-items-baseline">
                                        <h1 class="display-4 text-primary mb-0 fw-bold">
                                            <?php 
                                            // Tính % giảm giá
                                            echo round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100); 
                                            ?>%
                                        </h1>
                                        <span class="text-secondary ms-2 fw-bold fs-5">OFF</span>
                                    </div>
                                <?php else: ?>
                                    <h3 class="text-primary"><?php echo $product->get_price_html(); ?></h3>
                                <?php endif; ?>
                            </div>

                            <div class="position-relative" style="width: 150px; height: 150px;">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100 object-fit-contain']); ?>
                                <?php else: ?>
                                    <img src="<?php echo wc_placeholder_img_src(); ?>" class="img-fluid w-100 h-100 object-fit-contain" alt="No image">
                                <?php endif; ?>
                            </div>

                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback nếu không tìm thấy SP nào
                if(current_user_can('administrator')){
                    echo '<p class="text-center w-100">Admin ơi, chưa có sản phẩm nào được chọn hoặc đang giảm giá.</p>';
                }
            endif;
            ?>
        </div>
    </div>
</div>