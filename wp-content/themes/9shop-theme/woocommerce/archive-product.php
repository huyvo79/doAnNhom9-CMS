<?php get_header(); ?>

<main>
    <div class="container-fluid page-header py-3 py-lg-5">
        <?php
        $current_term = get_queried_object();
        $page_title = 'Shop Page';
        
        if ($current_term && is_a($current_term, 'WP_Term') && $current_term->taxonomy == 'product_cat') {
            $page_title = $current_term->name;
        } elseif (is_shop()) {
            $page_title = woocommerce_page_title(false);
        }
        ?>
        
        <h1 class="text-center text-white fs-2 display-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <?php echo esc_html($page_title); ?>
        </h1>

        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

            <?php if ($current_term && is_a($current_term, 'WP_Term')): ?>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop</a></li>
                <li class="breadcrumb-item active text-white"><?php echo esc_html($current_term->name); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            <?php endif; ?>
        </ol>
    </div>
    
    <?php get_template_part('template-parts/service'); ?>
    <div class="container-fluid shop py-3 py-lg-5">
        <div class="container py-3 py-lg-5">
            <div class="row g-4 flex-column-reverse flex-lg-row">
                
                <?php get_template_part('template-parts/sidebar-shop'); ?>


                <div class="col-lg-9">
                    <div class="d-block d-lg-none mb-3">
                        <a href="#sidebar-area" class="btn btn-outline-primary w-100" onclick="document.querySelector('.sidebar-shop').scrollIntoView({behavior: 'smooth'}); return false;">
                            <i class="fa fa-filter me-2"></i>Tìm kiếm & Lọc sản phẩm
                        </a>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <?php get_template_part('template-parts/content-product-grid'); ?>
                    </div>          
                </div>

            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/products-offer'); ?>
    <?php get_template_part('template-parts/bestSeller'); ?>
</main>

<?php get_footer(); ?>