<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">

        <div class="col-12 col-lg-7 col-xl-9">
            <div class="header-carousel owl-carousel bg-light py-5">
                <?php
                // 1. Lấy Slug từ cài đặt
                $slider_slug = get_theme_mod('carousel_cat_slug', '');

                // 2. Thiết lập Query
                $args = array(
                    'status' => 'publish',
                    'limit' => 5,
                );

                if (!empty($slider_slug)) {
                    // Nếu có nhập Slug -> Lấy theo danh mục đó
                    $args['category'] = array($slider_slug);
                } else {
                    // Nếu để trống -> Lấy sản phẩm nổi bật (Mặc định cũ)
                    $args['featured'] = true;
                }

                $featured_products = wc_get_products($args);

                if (!empty($featured_products)):
                    foreach ($featured_products as $index => $product):
                        $title = $product->get_name();
                        $price = $product->get_price_html();
                        $link = $product->get_permalink();
                        // Lấy ảnh: Ưu tiên ảnh sản phẩm, nếu ko có dùng placeholder
                        $img_id = $product->get_image_id();
                        $img = $img_id ? wp_get_attachment_image_url($img_id, 'large') : wc_placeholder_img_src();
                        ?>
                        <div class="row g-0 header-carousel-item align-items-center">
                            <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                                <img src="<?php echo esc_url($img); ?>" class="image-in-caousel"
                                    style="max-height: 400px; object-fit: contain;" alt="<?php echo esc_attr($title); ?>">
                            </div>
                            <div class="col-xl-6 carousel-content p-4">
                                <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s"
                                    style="letter-spacing: 3px;">
                                    <?php echo wp_kses_post($price); ?>
                                </h4>
                                <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">
                                    <?php echo esc_html($title); ?>
                                </h1>
                                <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">
                                    <?php echo esc_html(wp_trim_words($product->get_short_description(), 20)); ?>
                                </p>
                                <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s"
                                    href="<?php echo esc_url($link); ?>">
                                    Xem ngay
                                </a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                else:
                    echo '<p class="p-5">Chưa có sản phẩm nào trong danh mục slider.</p>';
                endif;
                ?>
            </div>
        </div>

        <?php
        // 1. Lấy dữ liệu từ Customizer
        $banner_pid   = get_theme_mod('banner_product_id', ''); 
        $custom_link  = get_theme_mod('banner_custom_link', '');
        $manual_img   = get_theme_mod('banner_bg_image', ''); // Lấy ảnh thủ công (nếu có)
        $offer_text   = get_theme_mod('banner_offer_text', 'Save $48.00');
        $offer_label  = get_theme_mod('banner_offer_label', 'Special Offer');
        
        // 2. Thiết lập mặc định (Fallback)
        $b_title = 'Apple iPad Mini';
        $b_price = '$1,050.00';
        $b_del   = '$1,250.00';
        $b_link  = '#';
        // Ảnh mặc định nếu không chọn gì cả
        $final_img = get_template_directory_uri() . '/assets/img/header-img.jpg'; 

        // 3. Xử lý Logic lấy dữ liệu từ Sản phẩm thật
        if (!empty($banner_pid) && function_exists('wc_get_product')) {
            $b_product = wc_get_product($banner_pid);
            if ($b_product) {
                $b_title = $b_product->get_name();
                $b_price = $b_product->get_price_html();
                $b_link  = $b_product->get_permalink();
                $b_del   = ''; 

                // LOGIC MỚI: Tự động lấy ảnh sản phẩm nếu chưa up ảnh nền
                if (empty($manual_img)) {
                    $prod_img_id = $b_product->get_image_id();
                    if ($prod_img_id) {
                        // Lấy ảnh kích thước lớn nhất
                        $final_img = wp_get_attachment_image_url($prod_img_id, 'full');
                    }
                }
            }
        }

        // 4. Ưu tiên Ảnh thủ công (Nếu Admin cố tình up đè lên)
        if (!empty($manual_img)) {
            $final_img = $manual_img;
        }

        // 5. Link tùy chỉnh
        if (!empty($custom_link)) {
            $b_link = $custom_link;
        }
        ?>

        <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
            <div class="carousel-header-banner h-100 position-relative">
                <img src="<?php echo esc_url($final_img); ?>" 
                     class="img-fluid w-100 h-100" style="object-fit: cover;" alt="<?php echo esc_attr($b_title); ?>">
                
                <div class="carousel-banner-offer">
                    <p class="bg-primary text-white rounded fs-5 py-2 px-4 mb-0 me-3"><?php echo esc_html($offer_text); ?></p>
                    <p class="text-primary fs-5 fw-bold mb-0"><?php echo esc_html($offer_label); ?></p>
                </div>

                <div class="carousel-banner">
                    <div class="carousel-banner-content text-center p-4">
                        <a href="<?php echo esc_url($b_link); ?>" class="d-block mb-2 text-white">Sản phẩm HOT</a>
                        
                        <a href="<?php echo esc_url($b_link); ?>" class="d-block text-white fs-3 fw-bold mb-3">
                            <?php echo esc_html($b_title); ?>
                        </a>
                        
                        <div class="text-white fs-5 banner-price-custom">
                            <?php 
                            if(empty($banner_pid)) {
                                echo '<del class="me-2">' . $b_del . '</del>';
                                echo '<span class="text-primary">' . $b_price . '</span>';
                            } else {
                                echo $b_price; 
                            }
                            ?>
                        </div>
                    </div>
                    
                    <a href="<?php echo esc_url($b_link); ?>" class="btn btn-primary rounded-pill py-2 px-4">
                        <i class="fas fa-shopping-cart me-2"></i> Mua Ngay
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>