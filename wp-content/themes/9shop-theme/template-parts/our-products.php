<?php
/**
 * Template part for displaying product tabs section
 */
if (!defined('ABSPATH')) {
    exit;
}

// 1. Lấy dữ liệu cấu hình từ Customizer
$main_title = get_theme_mod('prod_tab_main_title', 'Our Products');
$limit      = get_theme_mod('prod_tab_count', 8);

// 2. Xây dựng danh sách Tab dựa trên cài đặt Bật/Tắt
$tabs = [];

// Tab All
if (get_theme_mod('enable_tab_all', true)) {
    $tabs['tab-all'] = [
        'label' => get_theme_mod('label_tab_all', 'All Products'),
        'args'  => [
            'post_type'      => 'product',
            'posts_per_page' => $limit,
        ]
    ];
}

// Tab New
if (get_theme_mod('enable_tab_new', true)) {
    $tabs['tab-new'] = [
        'label' => get_theme_mod('label_tab_new', 'New Arrivals'),
        'args'  => [
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'orderby'        => 'date',
            'order'          => 'DESC'
        ]
    ];
}

// Tab Featured
if (get_theme_mod('enable_tab_featured', true)) {
    $tabs['tab-featured'] = [
        'label' => get_theme_mod('label_tab_featured', 'Featured'),
        'args'  => [
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'tax_query'      => [
                [
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN'
                ]
            ]
        ]
    ];
}

// Tab Top Selling
if (get_theme_mod('enable_tab_top', true)) {
    $tabs['tab-top'] = [
        'label' => get_theme_mod('label_tab_top', 'Top Selling'),
        'args'  => [
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'meta_key'       => 'total_sales',
            'orderby'        => 'meta_value_num'
        ]
    ];
}
?>

<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1><?php echo esc_html($main_title); ?></h1>
                </div>
                
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <?php 
                        $is_first = true;
                        foreach ($tabs as $key => $data) : 
                        ?>
                            <li class="nav-item mb-4">
                                <a class="d-flex mx-2 py-2 bg-light rounded-pill <?php echo $is_first ? 'active' : ''; ?>" 
                                   data-bs-toggle="pill" 
                                   href="#<?php echo esc_attr($key); ?>">
                                    <span class="text-dark" style="width: 130px;">
                                        <?php echo esc_html($data['label']); ?>
                                    </span>
                                </a>
                            </li>
                        <?php 
                            $is_first = false;
                        endforeach; 
                        ?>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <?php
                $is_first = true;
                foreach ($tabs as $id => $tab):
                ?>
                    <div id="<?php echo esc_attr($id); ?>"
                        class="tab-pane fade <?php echo $is_first ? 'show active' : ''; ?> p-0">
                        <div class="row g-4">
                            <?php
                            $loop = new WP_Query($tab['args']);
                            if ($loop->have_posts()):
                                $delay = 0.1;
                                while ($loop->have_posts()):
                                    $loop->the_post();
                                    global $product;
                                    
                                    // Tính % giảm giá
                                    $percentage = '';
                                    if ($product->is_on_sale() && $product->get_regular_price() > 0) {
                                        $percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100) . '%';
                                    }
                                    ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item">
                                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="d-block overflow-hidden position-relative" style="height: 250px;">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100 object-fit-contain rounded-top']);
                                                        } else {
                                                            echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" class="img-fluid w-100 h-100 object-fit-contain rounded-top" alt="No image">';
                                                        }
                                                        ?>
                                                    </a>

                                                    <?php if ($percentage): ?>
                                                        <div class="product-new"><?php echo esc_html($percentage); ?></div>
                                                    <?php else: ?>
                                                        <?php if (strtotime($product->get_date_created()) > strtotime('-7 days')) : ?>
                                                            <div class="product-new">New</div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <div class="product-details">
                                                        <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-eye fa-1x"></i></a>
                                                    </div>
                                                </div>

                                                <div class="text-center rounded-bottom p-4">
                                                    <a href="#" class="d-block mb-2 small text-muted text-uppercase">
                                                        <?php echo wp_kses_post(wc_get_product_category_list($product->get_id(), ', ')); ?>
                                                    </a>
                                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="d-block h5 fw-bold text-truncate mb-2">
                                                        <?php the_title(); ?>
                                                    </a>
                                                    <div class="text-primary fw-bold">
                                                        <?php echo $product->get_price_html(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                                <div class="mb-3">
                                                     <?php woocommerce_template_loop_add_to_cart(); ?>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex text-warning small">
                                                        <?php
                                                        $rating = $product->get_average_rating();
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo '<i class="fas fa-star ' . ($i <= round($rating) ? '' : 'text-muted') . '"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#" class="text-primary me-3"><i class="fas fa-random"></i></a>
                                                        <a href="#" class="text-primary"><i class="fas fa-heart"></i></a>
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
                                echo '<div class="col-12 py-5 text-center"><p>Chưa có sản phẩm nào trong mục này.</p></div>';
                            endif;
                            ?>
                        </div>
                    </div>
                <?php
                    $is_first = false;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>