<?php
/**
 * WooCommerce Sidebar Shop
 * Hiển thị sidebar bên trang cửa hàng (archive-product)
 * Gồm: Danh mục, lọc giá, màu sắc, sản phẩm nổi bật, banner, tag
 */
?>

<div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">

    <!-- 🔹 Product Categories -->
    <div class="product-categories mb-4">
        <h4>Products Categories</h4>
        <ul class="list-unstyled">
            <?php
            $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ));
            foreach ($categories as $cat) :
                $count = $cat->count;
                $link = get_term_link($cat);
            ?>
                <li>
                    <div class="categories-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo esc_url($link); ?>" class="text-dark">
                            <i class="fas fa-apple-alt text-secondary me-2"></i>
                            <?php echo esc_html($cat->name); ?>
                        </a>
                        <span>(<?php echo $count; ?>)</span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- 🔹 Price Filter -->
    <div class="price mb-4">
        <h4 class="mb-2">Price</h4>
        <form method="get" action="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
            <input type="range" class="form-range w-100" id="rangeInput" name="max_price" min="0" max="1000" value="<?php echo isset($_GET['max_price']) ? esc_attr($_GET['max_price']) : 0; ?>" oninput="amount.value=rangeInput.value">
            <output id="amount" name="amount" for="rangeInput"><?php echo isset($_GET['max_price']) ? esc_html($_GET['max_price']) : 0; ?></output>
            <button type="submit" class="btn btn-primary btn-sm mt-2 w-100">Filter</button>
        </form>
    </div>

    <!-- 🔹 Color Attribute Filter -->
    <div class="product-color mb-3">
        <h4>Select By Color</h4>
        <ul class="list-unstyled">
            <?php
            $colors = get_terms(array(
                'taxonomy'   => 'pa_color',
                'hide_empty' => true,
            ));
            if ($colors && !is_wp_error($colors)) :
                foreach ($colors as $color) :
                    $link = get_term_link($color);
            ?>
                    <li>
                        <div class="product-color-item d-flex justify-content-between align-items-center">
                            <a href="<?php echo esc_url($link); ?>" class="text-dark">
                                <i class="fas fa-apple-alt text-secondary me-2"></i>
                                <?php echo esc_html($color->name); ?>
                            </a>
                            <span>(<?php echo $color->count; ?>)</span>
                        </div>
                    </li>
            <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>

    <!-- 🔹 Featured Products -->
    <div class="featured-product mb-4">
        <h4 class="mb-3">Featured products</h4>
        <?php
        $featured = wc_get_products(array(
            'limit'    => 3,
            'featured' => true,
            'status'   => 'publish',
        ));

        foreach ($featured as $product) :
            $img = wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0] ?? wc_placeholder_img_src();
        ?>
            <div class="featured-product-item d-flex mb-3">
                <div class="rounded me-4" style="width: 100px; height: 100px;">
                    <img src="<?php echo esc_url($img); ?>" class="img-fluid rounded" alt="<?php echo esc_attr($product->get_name()); ?>">
                </div>
                <div>
                    <h6 class="mb-2"><?php echo esc_html($product->get_name()); ?></h6>
                    <div class="d-flex mb-2 text-warning">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="fw-bold me-2"><?php echo wp_kses_post($product->get_price_html()); ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="d-flex justify-content-center my-4">
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary px-4 py-3 rounded-pill w-100">View More</a>
        </div>
    </div>

    <!-- 🔹 Banner -->
    <a href="#">
        <div class="position-relative mb-4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                <h5 class="display-6 text-primary">SALE</h5>
                <h4 class="text-secondary">Get UP To 50% Off</h4>
                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
            </div>
        </div>
    </a>

    <!-- 🔹 Product Tags -->
    <div class="product-tags py-4">
        <h4 class="mb-3">PRODUCT TAGS</h4>
        <div class="product-tags-items bg-light rounded p-3">
            <?php
            $tags = get_terms(array(
                'taxonomy'   => 'product_tag',
                'hide_empty' => true,
                'number'     => 10,
            ));
            if ($tags && !is_wp_error($tags)) :
                foreach ($tags as $tag) :
                    $link = get_term_link($tag);
            ?>
                    <a href="<?php echo esc_url($link); ?>" class="border rounded py-1 px-2 mb-2 d-inline-block">
                        <?php echo esc_html($tag->name); ?>
                    </a>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>
