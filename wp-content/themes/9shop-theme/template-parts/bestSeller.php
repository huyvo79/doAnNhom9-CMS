<?php
// 1. Lấy cài đặt từ Admin
$bs_title = get_theme_mod('bs_sec_title', 'Bestseller Products');
$bs_desc  = get_theme_mod('bs_sec_desc', 'Những sản phẩm được khách hàng yêu thích và mua nhiều nhất.');
$bs_limit = get_theme_mod('bs_limit', 6);
$bs_mode  = get_theme_mod('bs_mode', 'sales'); // sales, featured, random
?>

<div class="container-fluid products pb-5">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
                <?php echo esc_html($bs_title); ?>
            </h4>
            <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">
                <?php echo esc_html($bs_desc); ?>
            </p>
        </div>

        <div class="row g-4">
            <?php
            // 2. Xây dựng Query dựa trên chế độ đã chọn
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => $bs_limit,
                'post_status'    => 'publish',
            ];

            // Logic chuyển đổi chế độ
            if ($bs_mode == 'sales') {
                // Lấy theo bán chạy (Mặc định cũ)
                $args['meta_key'] = 'total_sales';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
            } elseif ($bs_mode == 'featured') {
                // Lấy sản phẩm được đánh dấu SAO (Featured)
                $args['tax_query'] = [[
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                ]];
            } elseif ($bs_mode == 'random') {
                // Lấy ngẫu nhiên (cho đỡ nhàm chán)
                $args['orderby'] = 'rand';
            }

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                $delay = 0.1;
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                        <div class="products-mini-item border rounded h-100"> <div class="row g-0 h-100">
                                <div class="col-5">
                                    <div class="products-mini-img border-end h-100 position-relative overflow-hidden">
                                        <a href="<?php the_permalink(); ?>" class="d-block h-100">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100 object-fit-cover', 'alt' => get_the_title()]); ?>
                                            <?php else: ?>
                                                <img src="<?php echo wc_placeholder_img_src(); ?>" class="img-fluid w-100 h-100 object-fit-cover" alt="No image">
                                            <?php endif; ?>
                                        </a>
                                        <div class="products-mini-icon rounded-circle bg-primary">
                                            <a href="<?php the_permalink(); ?>"><i class="fa fa-eye fa-1x text-white"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="products-mini-content p-3 h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="d-block mb-2 text-muted small text-uppercase">
                                                <?php echo wc_get_product_category_list($product->get_id(), ', '); ?>
                                            </a>
                                            <a href="<?php the_permalink(); ?>" class="d-block h5 text-truncate mb-3"><?php the_title(); ?></a>

                                            <div class="mb-3">
                                                <?php echo $product->get_price_html(); ?>
                                            </div>
                                        </div>

                                        <div class="products-mini-add">
                                            <a href="?add-to-cart=<?php echo $product->get_id(); ?>"
                                               class="btn btn-primary border-secondary rounded-pill py-2 px-3 btn-sm w-100 ajax_add_to_cart"
                                               data-product_id="<?php echo $product->get_id(); ?>">
                                                <i class="fas fa-shopping-cart me-2"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $delay += 0.1;
                endwhile;
                wp_reset_postdata();
            else:
                ?>
                <div class="col-12 text-center py-5">
                    <p>Chưa có dữ liệu hiển thị. Hãy thử đổi chế độ sang "Nổi bật" hoặc "Ngẫu nhiên" trong Admin.</p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</div>