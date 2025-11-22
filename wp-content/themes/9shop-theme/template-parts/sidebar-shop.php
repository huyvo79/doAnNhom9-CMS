<?php
/**
 * WooCommerce Sidebar Shop (Customized)
 */

// Lấy các cài đặt từ Admin
$show_cat      = get_theme_mod('sidebar_enable_cat', true);
$show_price    = get_theme_mod('sidebar_enable_price', true);
$show_color    = get_theme_mod('sidebar_enable_color', true); // Nếu có làm phần color
$show_featured = get_theme_mod('sidebar_enable_featured', true);
$show_banner   = get_theme_mod('sidebar_enable_banner', true);
$show_tags     = get_theme_mod('sidebar_enable_tags', true); // Nếu có làm phần tag
?>

<div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">

    <?php if ($show_cat) : ?>
    <div class="product-categories mb-4">
        <h4><?php echo get_theme_mod('sidebar_title_cat', 'Product Categories'); ?></h4>
        <ul class="list-unstyled">
            <?php
            $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ));
            if (!empty($categories) && !is_wp_error($categories)) :
                foreach ($categories as $cat) :
                    $count = $cat->count;
                    $link = get_term_link($cat);
            ?>
                <li>
                    <div class="categories-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo esc_url($link); ?>" class="text-dark">
                            <i class="fas fa-mobile-alt text-secondary me-2"></i>
                            <?php echo esc_html($cat->name); ?>
                        </a>
                        <span>(<?php echo $count; ?>)</span>
                    </div>
                </li>
            <?php 
                endforeach; 
            endif;
            ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if ($show_price) : ?>
    <div class="price mb-4">
        <h4 class="mb-2"><?php echo get_theme_mod('sidebar_title_price', 'Price'); ?></h4>
        <form method="get" action="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
            <input type="range" class="form-range w-100" id="rangeInput" name="max_price" min="0" max="50000000" step="500000" 
                   value="<?php echo isset($_GET['max_price']) ? esc_attr($_GET['max_price']) : 0; ?>" 
                   oninput="amount.value=formatVND(rangeInput.value)">
            
            <output id="amount" name="amount" for="rangeInput" class="fw-bold text-primary">
                <?php echo isset($_GET['max_price']) ? number_format($_GET['max_price'], 0, ',', '.') . '₫' : '0₫'; ?>
            </output>
            
            <script>
                function formatVND(val) {
                    val = parseInt(val);
                    if (isNaN(val)) return '0₫';
                    return val.toLocaleString('vi-VN') + '₫';
                }
            </script>
            <button type="submit" class="btn btn-primary btn-sm mt-2 w-100 rounded-pill">Lọc giá</button>
        </form>
    </div>
    <?php endif; ?>

    <?php 
    if (taxonomy_exists('pa_color')) : 
        $colors = get_terms(array('taxonomy' => 'pa_color', 'hide_empty' => true));
        if ($colors && !is_wp_error($colors)) :
    ?>
        <div class="product-color mb-3">
            <h4 class="mb-2">Màu sắc</h4>
            <ul class="list-unstyled">
                <?php foreach ($colors as $color) : 
                    $link = get_term_link($color); 
                ?>
                    <li>
                        <div class="product-color-item d-flex justify-content-between align-items-center">
                            <a href="<?php echo esc_url($link); ?>" class="text-dark">
                                <i class="fas fa-circle me-2" style="color: <?php echo $color->slug; ?>;"></i>
                                <?php echo esc_html($color->name); ?>
                            </a>
                            <span>(<?php echo $color->count; ?>)</span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php 
        endif;
    endif; 
    ?>

    <?php if ($show_featured) : ?>
    <div class="featured-product mb-4">
        <h4 class="mb-3"><?php echo get_theme_mod('sidebar_title_featured', 'Featured Products'); ?></h4>
        <?php
        $limit_featured = get_theme_mod('sidebar_limit_featured', 3);
        $featured = wc_get_products(array(
            'limit'    => $limit_featured,
            'featured' => true,
            'status'   => 'publish',
        ));

        if ($featured) :
            foreach ($featured as $product) :
                $img_id = $product->get_image_id();
                $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'thumbnail') : wc_placeholder_img_src();
        ?>
            <div class="featured-product-item d-flex mb-3 align-items-center">
                <div class="rounded me-3" style="width: 80px; height: 80px; flex-shrink: 0;">
                    <img src="<?php echo esc_url($img_url); ?>" class="img-fluid rounded w-100 h-100 object-fit-cover" alt="<?php echo esc_attr($product->get_name()); ?>">
                </div>
                <div>
                    <h6 class="mb-1 text-truncate" style="max-width: 150px;">
                        <a href="<?php echo get_permalink($product->get_id()); ?>" class="text-dark text-decoration-none">
                            <?php echo esc_html($product->get_name()); ?>
                        </a>
                    </h6>
                    <div class="d-flex mb-1 text-warning small">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                    <div class="fw-bold text-primary">
                        <?php echo $product->get_price_html(); ?>
                    </div>
                </div>
            </div>
        <?php 
            endforeach;
        else:
            echo '<p class="small text-muted">Chưa có sản phẩm nổi bật.</p>';
        endif;
        ?>
    </div>
    <?php endif; ?>

    <?php 
    if ($show_banner) : 
        // Lấy ảnh Banner từ Admin
        $default_banner = get_template_directory_uri() . '/assets/img/product-banner-2.jpg';
        $banner_img = get_theme_mod('sidebar_banner_img', $default_banner);
        $text_1 = get_theme_mod('sidebar_banner_text_1', 'SALE');
        $text_2 = get_theme_mod('sidebar_banner_text_2', 'Get UP To 50% Off');
    ?>
    <div class="position-relative mb-4 overflow-hidden rounded">
        <img src="<?php echo esc_url($banner_img); ?>" class="img-fluid w-100" alt="Banner">
        <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center p-4"
            style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(0, 0, 0, 0.4);"> <h5 class="display-6 text-warning fw-bold mb-1"><?php echo esc_html($text_1); ?></h5>
            <h4 class="text-white mb-3"><?php echo esc_html($text_2); ?></h4>
            
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary rounded-pill px-4 btn-sm">Shop Now</a>
        </div>
    </div>
    <?php endif; ?>

    <div class="product-tags py-4">
        <h4 class="mb-3">Tags</h4>
        <div class="product-tags-items bg-light rounded p-3">
            <?php
            $tags = get_terms(array(
                'taxonomy'   => 'product_tag',
                'hide_empty' => true,
                'number'     => 15,
            ));
            if ($tags && !is_wp_error($tags)) :
                foreach ($tags as $tag) :
                    $link = get_term_link($tag);
            ?>
                <a href="<?php echo esc_url($link); ?>" class="border rounded py-1 px-2 mb-2 d-inline-block text-decoration-none text-secondary bg-white small">
                    <?php echo esc_html($tag->name); ?>
                </a>
            <?php
                endforeach;
            else:
                echo '<span class="small text-muted">Chưa có tag nào.</span>';
            endif;
            ?>
        </div>
    </div>

</div>