<?php
// 1. Lấy cài đặt
$small_title = get_theme_mod('prod_list_small_title', 'Products');
$main_title  = get_theme_mod('prod_list_main_title', 'All Product Items');
$cat_slug    = get_theme_mod('prod_list_cat', '');
?>

<div class="container-fluid products productList overflow-hidden">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
                <?php echo esc_html($small_title); ?>
            </h4>
            <h1 class="mb-0 display-3 wow fadeInUp" data-wow-delay="0.3s">
                <?php echo esc_html($main_title); ?>
            </h1>
        </div>

        <div class="productList-carousel owl-carousel pt-4 wow fadeInUp" data-wow-delay="0.3s">
            <?php
            // 2. Xây dựng Query
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ];

            // Nếu có chọn danh mục thì lọc theo danh mục đó
            if (!empty($cat_slug)) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $cat_slug,
                    ]
                ];
            }

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="productImg-item products-mini-item border rounded h-100"> <div class="row g-0 h-100">
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
                                        <a href="<?php the_permalink(); ?>" class="d-block h5 text-truncate mb-2"><?php the_title(); ?></a>

                                        <?php echo $product->get_price_html(); ?>
                                    </div>

                                    <div class="products-mini-add mt-3">
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
                <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="text-center">Chưa có sản phẩm nào.</p>';
            endif;
            ?>
        </div>
    </div>
</div>