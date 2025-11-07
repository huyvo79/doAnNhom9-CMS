<?php
/**
 * Template part for displaying product tabs section (All / New / Featured / Top Selling)
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Products</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-new">
                                <span class="text-dark" style="width: 130px;">New Arrivals</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-featured">
                                <span class="text-dark" style="width: 130px;">Featured</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-top">
                                <span class="text-dark" style="width: 130px;">Top Selling</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">

                <!-- ✅ Tab ALL PRODUCTS -->
                <div id="tab-all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        $args = [
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                        ];
                        $loop = new WP_Query($args);

                        if ($loop->have_posts()):
                            while ($loop->have_posts()):
                                $loop->the_post();
                                global $product;
                        ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-item rounded">
                                    <div class="product-item-inner border rounded">
                                        <div class="product-item-inner-item">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('medium', ['class' => 'w-100 rounded-top custom-product-img']);
                                                } else {
                                                    echo '<img src="' . wc_placeholder_img_src() . '" class="w-100 rounded-top custom-product-img" alt="No image">';
                                                }
                                                ?>
                                            </a>

                                            <?php if ($product->is_on_sale()): ?>
                                                <div class="product-sale">Sale</div>
                                            <?php elseif ($product->is_featured()): ?>
                                                <div class="product-new">New</div>
                                            <?php endif; ?>

                                            <div class="product-details">
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-eye fa-1x"></i></a>
                                            </div>
                                        </div>

                                        <div class="text-center rounded-bottom p-4">
                                            <a href="#" class="d-block mb-2"><?php echo wc_get_product_category_list($product->get_id()); ?></a>
                                            <a href="<?php the_permalink(); ?>" class="d-block h4"><?php the_title(); ?></a>
                                            <?php echo $product->get_price_html(); ?>
                                        </div>
                                    </div>

                                    <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                        <?php woocommerce_template_loop_add_to_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>Không có sản phẩm nào.</p>';
                        endif;
                        ?>
                    </div>
                </div>

                <!-- ✅ Tab NEW ARRIVALS -->
                <div id="tab-new" class="tab-pane fade p-0">
                    <div class="row g-4">
                        <?php
                        $args_new = [
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ];
                        $loop_new = new WP_Query($args_new);

                        if ($loop_new->have_posts()):
                            while ($loop_new->have_posts()):
                                $loop_new->the_post();
                                global $product;
                                wc_get_template_part('content', 'product');
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>Không có sản phẩm mới.</p>';
                        endif;
                        ?>
                    </div>
                </div>

                <!-- ✅ Tab FEATURED -->
                <div id="tab-featured" class="tab-pane fade p-0">
                    <div class="row g-4">
                        <?php
                        $args_featured = [
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product_visibility',
                                    'field' => 'name',
                                    'terms' => 'featured',
                                    'operator' => 'IN',
                                ],
                            ],
                        ];
                        $loop_featured = new WP_Query($args_featured);

                        if ($loop_featured->have_posts()):
                            while ($loop_featured->have_posts()):
                                $loop_featured->the_post();
                                global $product;
                                wc_get_template_part('content', 'product');
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>Không có sản phẩm nổi bật.</p>';
                        endif;
                        ?>
                    </div>
                </div>

                <!-- ✅ Tab TOP SELLING -->
                <div id="tab-top" class="tab-pane fade p-0">
                    <div class="row g-4">
                        <?php
                        $args_top = [
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                        ];
                        $loop_top = new WP_Query($args_top);

                        if ($loop_top->have_posts()):
                            while ($loop_top->have_posts()):
                                $loop_top->the_post();
                                global $product;
                                wc_get_template_part('content', 'product');
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>Không có sản phẩm bán chạy.</p>';
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
