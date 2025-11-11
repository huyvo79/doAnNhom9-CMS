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
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                href="#tab-all">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-new">
                                <span class="text-dark" style="width: 130px;">New Arrivals</span>
                            </a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill"
                                href="#tab-featured">
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
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        // Truy vấn sản phẩm mới
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 8, // số sản phẩm hiển thị
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $loop_new = new WP_Query($args);

                        if ($loop_new->have_posts()):
                            $delay = 0.1; // dùng để tăng hiệu ứng wow delay
                            while ($loop_new->have_posts()):
                                $loop_new->the_post();
                                global $product;
                                ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                        <div class="product-item-inner border rounded">
                                            <div class="product-item-inner-item">
                                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        the_post_thumbnail('medium', ['class' => 'img-fluid w-100 rounded-top']);
                                                    } else {
                                                        echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" class="img-fluid w-100 rounded-top" alt="No image">';
                                                    }
                                                    ?>
                                                </a>

                                                <?php if ($product->is_on_sale()): ?>
                                                    <div class="product-sale">Sale</div>
                                                <?php elseif ($product->is_featured()): ?>
                                                    <div class="product-new">New</div>
                                                <?php endif; ?>

                                                <div class="product-details">
                                                    <a href="<?php echo esc_url(get_permalink()); ?>"><i
                                                            class="fa fa-eye fa-1x"></i></a>
                                                </div>
                                            </div>

                                            <div class="text-center rounded-bottom p-4">
                                                <a href="#" class="d-block mb-2">
                                                    <?php echo wp_kses_post(wc_get_product_category_list($product->get_id())); ?>
                                                </a>
                                                <a href="<?php echo esc_url(get_permalink()); ?>"
                                                    class="d-block h4"><?php the_title(); ?></a>
                                                <?php echo $product->get_price_html(); ?>
                                            </div>
                                        </div>

                                        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                            <?php woocommerce_template_loop_add_to_cart(); ?>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <?php
                                                    // Hiển thị 5 sao mặc định (tùy biến nếu cần)
                                                    $rating = $product->get_average_rating();
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        echo '<i class="fas fa-star ' . ($i <= round($rating) ? 'text-primary' : '') . '"></i>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-3">
                                                        <span class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-random"></i></span>
                                                    </a>
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-0">
                                                        <span class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-heart"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $delay += 0.2; // mỗi sản phẩm tăng 0.2s hiệu ứng
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<div class="col-12"><p>Không có sản phẩm nào.</p></div>';
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>