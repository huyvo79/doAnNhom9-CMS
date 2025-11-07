<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">
        <!-- Cột bên trái carousel hiển thị sản phẩm nổi bật -->
        <div class="col-12 col-lg-7 col-xl-9">
            <div class="header-carousel owl-carousel bg-light py-5">
                <?php
                $args = array(
                    'status' => 'publish',
                    'limit' => 5,
                    'featured' => true,
                );
                $featured_products = wc_get_products($args);

                if (!empty($featured_products)):
                    foreach ($featured_products as $index => $product):
                        // Lấy dữ liệu cần
                        $title = $product->get_name();
                        $price = $product->get_price_html();
                        $link = $product->get_permalink();
                        $img = wp_get_attachment_image_url($product->get_image_id(), 'large');
                        if (!$img) {
                            $img = get_template_directory_uri() . '/assets/img/default.png';
                        }
                        ?>
                        <div class="row g-0 header-carousel-item align-items-center">
                            <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                                <img src="<?php echo esc_url($img); ?>" class="img-fluid w-100"
                                    alt="<?php echo esc_attr($title); ?>">
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
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <!-- cột bên phải carousel -->
        <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
            <div class="carousel-header-banner h-100">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-img.jpg"
                    class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">
                <div class="carousel-banner-offer">
                    <p class="bg-primary text-white rounded fs-5 py-2 px-4 mb-0 me-3">Save $48.00</p>
                    <p class="text-primary fs-5 fw-bold mb-0">Special Offer</p>
                </div>
                <div class="carousel-banner">
                    <div class="carousel-banner-content text-center p-4">
                        <a href="#" class="d-block mb-2">SmartPhone</a>
                        <a href="#" class="d-block text-white fs-3">Apple iPad Mini <br> G2356</a>
                        <del class="me-2 text-white fs-5">$1,250.00</del>
                        <span class="text-primary fs-5">$1,050.00</span>
                    </div>
                    <a href="#" class="btn btn-primary rounded-pill py-2 px-4"><i class="fas fa-shopping-cart me-2"></i>
                        Add To
                        Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>