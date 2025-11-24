<?php
/**
 * Template hiển thị chi tiết sản phẩm (Single Product)
 * Optimized for Mobile by Gemini
 */

if (!defined('ABSPATH')) {
    exit; // Ngăn truy cập trực tiếp
}

get_header();

global $product;
?>

<div class="container-fluid page-header py-3 py-lg-5">
    <h1 class="text-center text-white fs-2 display-lg-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp d-none d-md-flex" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>

<div class="container-fluid shop py-3 py-lg-5"> <div class="container py-3 py-lg-5">
        <div class="row g-4">
            
            <div class="col-lg-4 col-xl-3 order-2 order-lg-1 wow fadeInUp" data-wow-delay="0.1s">
                
                <div class="sidebar-wrapper mt-4 mt-lg-0">
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

                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Recently Viewed</h4>
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field' => 'name',
                                    'terms' => 'featured',
                                ),
                            ),
                        );

                        $featured_query = new WP_Query($args);

                        if ($featured_query->have_posts()):
                            echo '<ul class="custom-featured-list list-unstyled">'; // Thêm list-unstyled để bỏ chấm đầu dòng mặc định
                            while ($featured_query->have_posts()):
                                $featured_query->the_post();
                                global $product;
                                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail')[0];
                                if (!$image_url) {
                                    $image_url = wc_placeholder_img_src('thumbnail');
                                }
                                ?>
                                <li class="product-list-item d-flex align-items-center mb-3"> <a href="<?php echo esc_url(get_permalink()); ?>" class="product-image-link me-3" style="width: 60px; flex-shrink: 0;">
                                        <img src="<?php echo esc_url($image_url); ?>" class="img-fluid rounded"
                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                    </a>

                                    <div class="product-content">
                                        <h6 class="product-title mb-1" style="font-size: 0.9rem;">
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none text-dark">
                                                <?php echo esc_html(get_the_title()); ?>
                                            </a>
                                        </h6>
                                        <?php echo do_shortcode('[cusrev_reviews_rating color_stars="#FFBC00" product="' . $product->get_id() . '"]'); ?>
                                        <span class="price fw-bold text-primary"><?php echo $product->get_price_html(); ?></span>
                                    </div>
                                </li>
                                <?php
                            endwhile;
                            echo '</ul>';
                        else:
                            echo '<p class="text-muted">Không tìm thấy sản phẩm nổi bật nào.</p>';
                        endif;
                        wp_reset_postdata();
                        ?>

                        <div class="d-flex justify-content-center my-4">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                                class="btn btn-primary px-4 py-3 rounded-pill w-100">
                                View More
                            </a>
                        </div>
                    </div>

                    <div class="position-relative mb-4 d-none d-md-block"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-banner-2.jpg"
                            class="img-fluid w-100 rounded" alt="Banner">
                        <div class="position-absolute text-center d-flex flex-column align-items-center justify-content-center rounded p-4"
                            style="width: 100%; height: 100%; top: 0; background: rgba(242, 139, 0, 0.4);">
                            <h5 class="display-6 text-primary">SALE</h5>
                            <h4 class="text-light">Up to 50% Off</h4>
                            <a href="<?php echo wc_get_page_permalink('shop'); ?>"
                                class="btn btn-primary rounded-pill px-4">Shop Now</a>
                        </div>
                    </div>

                    <div class="product-tags">
                        <h4 class="fw-bold mb-3">Product Tags</h4>
                        <div class="product-tags-items bg-light rounded p-3">
                            <?php
                            $tags = get_terms('product_tag');
                            if ($tags && !is_wp_error($tags)):
                                foreach ($tags as $tag):
                                    echo '<a href="' . get_term_link($tag) . '" class="border rounded py-1 px-2 mb-2 d-inline-block text-decoration-none text-secondary" style="font-size: 0.85rem;">' . esc_html($tag->name) . '</a> ';
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div> </div>

            <div class="col-lg-8 col-xl-9 order-1 order-lg-2 wow fadeInUp" data-wow-delay="0.2s">
                <div class="row g-4 single-product">

                    <div class="col-md-6 col-xl-6 mb-4 mb-md-0"> <div class="single-carousel owl-carousel">
                            <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            // Thêm ảnh đại diện vào đầu mảng gallery nếu muốn carousel mượt mà
                            array_unshift($attachment_ids, $product->get_image_id()); 
                            
                            if ($attachment_ids):
                                foreach (array_unique($attachment_ids) as $attachment_id): // Dùng array_unique đề phòng trùng
                                    echo '<div class="single-item"><div class="single-inner bg-light rounded overflow-hidden">'; // overflow-hidden để bo góc chuẩn
                                    echo wp_get_attachment_image($attachment_id, 'large', false, ['class' => 'img-fluid w-100']); // w-100 để ảnh full chiều rộng
                                    echo '</div></div>';
                                endforeach;
                            else:
                                echo '<div class="single-item"><div class="single-inner bg-light rounded overflow-hidden">';
                                echo wp_get_attachment_image($product->get_image_id(), 'large', false, ['class' => 'img-fluid w-100']);
                                echo '</div></div>';
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-6">
                        <h4 class="fw-bold mb-2 fs-3"><?php the_title(); ?></h4> <p class="mb-3 text-muted">Category: <?php echo wc_get_product_category_list(get_the_ID()); ?></p>
                        
                        <h5 class="fw-bold mb-3 text-primary fs-2"><?php echo $product->get_price_html(); ?></h5>

                        <div class="d-flex align-items-center mb-4">
                            <?php echo do_shortcode('[cusrev_reviews_rating color_stars="#FFBC00" product=""]'); ?>
                        </div>
                        
                        <div class="mb-3">
                            <p style="margin-bottom:5px; font-weight:bold;">Share now:</p>
                            <?php
                            if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {
                                ADDTOANY_SHARE_SAVE_KIT();
                            }
                            ?>
                        </div>
                        
                        <div class="d-flex flex-column mb-4 p-3 bg-light rounded">
                            <small class="mb-1">Product SKU: <strong><?php echo $product->get_sku() ?: 'N/A'; ?></strong></small>
                            <?php if ($product->is_in_stock()): ?>
                                <small>Available: <strong class="text-success"><?php echo $product->get_stock_quantity(); ?> In stock</strong></small>
                            <?php else: ?>
                                <small class="text-danger fw-bold">Out of stock</small>
                            <?php endif; ?>
                        </div>

                        <div class="product-actions mb-3">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                        
                        <?php
                        if (function_exists('YITH_WCWL')) {
                            echo '<div class="mt-2">' . do_shortcode('[yith_wcwl_add_to_wishlist]') . '</div>';
                        }
                        ?>
                    </div>

                    <div class="col-12 mt-4 mt-lg-5">
                        <div class="woocommerce-tabs-wrapper">
                            <?php woocommerce_output_product_data_tabs(); ?>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-4">
                        <?php get_template_part('template-parts/related'); ?>
                    </div>
                    
                    <div class="col-12 bg-light p-3 p-lg-4 rounded shadow-sm mb-5 mt-5">
                        <h4 class="mb-4 text-center section-title-highlight">Latest product</h4>
                        <?php echo do_shortcode('[sp_wpcarousel id="360"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>