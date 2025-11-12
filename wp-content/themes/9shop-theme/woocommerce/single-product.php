<?php
/**
 * Template hiển thị chi tiết sản phẩm (Single Product)
 *
 * @package MyShop
 */

if (!defined('ABSPATH')) {
    exit; // Ngăn truy cập trực tiếp
}

get_header();

global $product;
?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>
<!-- Single Product Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">

                <!-- Search -->
                <div class="input-group w-100 mx-auto d-flex mb-4">
                    <input type="search" class="form-control p-3" placeholder="Search products..." name="s"
                        value="<?php echo get_search_query(); ?>">
                    <button class="input-group-text p-3"><i class="fa fa-search"></i></button>
                </div>

                <!-- Categories -->
                <div class="product-categories mb-4">
                    <h4 class="fw-bold mb-3">Product Categories</h4>
                    <ul class="list-unstyled">
                        <?php
                        wp_list_categories([
                            'taxonomy' => 'product_cat',
                            'title_li' => '',
                            'show_count' => true,
                        ]);
                        ?>
                    </ul>
                </div>

                <!-- Filter by Color (demo) -->
                <div class="mb-4">
                    <h4 class="fw-bold mb-3">Select by Color</h4>
                    <?php
                    $colors = ['Gold', 'Green', 'White'];
                    foreach ($colors as $color):
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color"
                                id="color-<?php echo strtolower($color); ?>">
                            <label class="form-check-label" for="color-<?php echo strtolower($color); ?>">
                                <?php echo esc_html($color); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Featured Products -->
                <div class="featured-product mb-4">
                    <h4 class="mb-3">Featured Products</h4>
                    <?php echo do_shortcode('[featured_products per_page="4" columns="1"]'); ?>

                    <div class="d-flex justify-content-center my-4">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                            class="btn btn-primary px-4 py-3 rounded-pill w-100">
                            View More
                        </a>
                    </div>
                </div>

                <!-- Sale Banner -->
                <div class="position-relative mb-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-banner-2.jpg"
                        class="img-fluid w-100 rounded" alt="Banner">
                    <div class="position-absolute text-center d-flex flex-column align-items-center justify-content-center rounded p-4"
                        style="width: 100%; height: 100%; top: 0; background: rgba(242, 139, 0, 0.4);">
                        <h5 class="display-6 text-primary">SALE</h5>
                        <h4 class="text-light">Up to 50% Off</h4>
                        <a href="<?php echo wc_get_page_permalink('shop'); ?>"
                            class="btn btn-primary rounded-pill px-4">Shop Now</a>
                    </div>
                </div>

                <!-- Tags -->
                <div class="product-tags">
                    <h4 class="fw-bold mb-3">Product Tags</h4>
                    <div class="product-tags-items bg-light rounded p-3">
                        <?php
                        $tags = get_terms('product_tag');
                        if ($tags && !is_wp_error($tags)):
                            foreach ($tags as $tag):
                                echo '<a href="' . get_term_link($tag) . '" class="border rounded py-1 px-2 mb-2 d-inline-block">' . esc_html($tag->name) . '</a>';
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <!-- Product Content -->
            <div class="col-lg-8 col-xl-9 wow fadeInUp" data-wow-delay="0.2s">
                <div class="row g-4 single-product">

                    <!-- Image Gallery -->
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            if ($attachment_ids):
                                foreach ($attachment_ids as $attachment_id):
                                    echo '<div class="single-item"><div class="single-inner bg-light rounded">';
                                    echo wp_get_attachment_image($attachment_id, 'large', false, ['class' => 'img-fluid rounded']);
                                    echo '</div></div>';
                                endforeach;
                            else:
                                echo wp_get_attachment_image($product->get_image_id(), 'large', false, ['class' => 'img-fluid rounded']);
                            endif;
                            ?>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3"><?php the_title(); ?></h4>
                        <p class="mb-3">Category: <?php echo wc_get_product_category_list(get_the_ID()); ?></p>
                        <h5 class="fw-bold mb-3"><?php echo $product->get_price_html(); ?></h5>

                        <div class="d-flex mb-4">
                            <?php woocommerce_template_single_rating(); ?>
                        </div>
                        <div class="mb-3">
                            <div class="btn btn-primary d-inline-block rounded text-white py-1 px-4 me-2"><i
                                    class="fab fa-facebook-f me-1"></i> Share</div>
                            <div class="btn btn-secondary d-inline-block rounded text-white py-1 px-4 ms-2"><i
                                    class="fab fa-twitter ms-1"></i> Share</div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <small>Product SKU: <?php echo $product->get_sku() ?: 'N/A'; ?></small>
                            <?php if ($product->is_in_stock()): ?>
                                <small>Available: <strong
                                        class="text-primary"><?php echo $product->get_stock_quantity() ?: 'In stock'; ?></strong></small>
                            <?php else: ?>
                                <small class="text-danger">Out of stock</small>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <?php the_content(); ?>
                        </div>

                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>

                    <!-- Tabs (Description, Reviews, etc.) -->
                    <div class="col-12 mt-4">
                        <?php woocommerce_output_product_data_tabs(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->

<!-- Related Products -->
<div class="container-fluid related-product py-5">
    <div class="container">
        <div class="mx-auto text-center pb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2">Related Products</h4>
            <p>Discover similar items that complement your purchase.</p>
        </div>
        <?php woocommerce_output_related_products(); ?>
    </div>
</div>

<?php get_footer(); ?>