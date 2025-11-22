<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-4 rounded mb-5" style="background: rgba(255, 255, 255, .03);">
                
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Address</h4>
                            <p class="mb-2"><?php echo get_theme_mod('footer_address', '123 Street Ho Chi Minh city, Vietnam'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Mail Us</h4>
                            <p class="mb-2"><?php echo get_theme_mod('footer_email', 'admin@gmail.com'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Telephone</h4>
                            <p class="mb-2"><?php echo get_theme_mod('footer_phone', '(+84) 3456 7890'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Website</h4>
                            <p class="mb-2"><?php echo get_theme_mod('footer_website', 'www.9shop.com'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <div class="footer-item">
                            <h4 class="text-primary mb-4">
                                <?php echo get_theme_mod('footer_news_title', 'Newsletter'); ?>
                            </h4>
                            <p class="mb-3">
                                <?php echo get_theme_mod('footer_news_desc', 'Đừng bỏ lỡ những xu hướng công nghệ mới nhất...'); ?>
                            </p>
                            <div class="position-relative mx-auto rounded-pill">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Customer Service</h4>
                        <?php
                        if (has_nav_menu('footer_service')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_service',
                                'container'      => false,
                                'menu_class'     => 'list-unstyled',
                                'fallback_cb'    => false,
                            ));
                        } else {
                            echo '<p class="text-muted small">Vào Admin > Menus để tạo menu và gán vào vị trí "Footer 1".</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Information</h4>
                        <?php
                        if (has_nav_menu('footer_info')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_info',
                                'container'      => false,
                                'menu_class'     => 'list-unstyled',
                                'fallback_cb'    => false,
                            ));
                        } else {
                            echo '<p class="text-muted small">Chưa gán menu "Footer 2".</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Extras</h4>
                        <?php
                        if (has_nav_menu('footer_extras')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_extras',
                                'container'      => false,
                                'menu_class'     => 'list-unstyled',
                                'fallback_cb'    => false,
                            ));
                        } else {
                            echo '<p class="text-muted small">Chưa gán menu "Footer 3".</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <?php 
    $zalo_phone = get_theme_mod('floating_zalo_number', ''); 
    $position   = get_theme_mod('floating_position', 'right');
    
    // Xác định CSS vị trí
    $style_pos = ($position === 'left') ? 'left: 20px;' : 'right: 20px;';
    ?>

    <?php 
    $zalo_phone = get_theme_mod('floating_zalo_number', ''); 
    $position   = get_theme_mod('floating_position', 'right');
    $style_pos  = ($position === 'left') ? 'left: 20px;' : 'right: 20px;';
    ?>

    <?php if (!empty($zalo_phone)) : ?>
        <div class="zalo-floating-btn" style="position: fixed; bottom: 90px; <?php echo $style_pos; ?> z-index: 9999;">
            <a href="https://zalo.me/<?php echo esc_attr($zalo_phone); ?>" target="_blank" rel="nofollow" title="Chat Zalo ngay">
                <div class="zalo-ring">
                    <div class="zalo-coc-coc-alo-phone-n-bg"></div>
                    <div class="zalo-coc-coc-alo-phone-n-fill"></div>
                </div>
                
                <div class="zalo-icon-circle" style="width: 60px; height: 60px; background: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.2); position: relative; z-index: 2;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1024px-Icon_of_Zalo.svg.png" 
                         alt="Zalo" 
                         style="width: 35px; height: 35px; object-fit: contain;">
                </div>
            </a>
        </div>

        <style>
            .zalo-ring { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }
            
            .zalo-coc-coc-alo-phone-n-bg {
                position: absolute; top: 0; left: 0; width: 60px; height: 60px;
                border-radius: 50%; border: 2px solid transparent;
                background: rgba(0, 104, 255, 0.1); opacity: .5;
                animation: zalo-anim-1 1.5s infinite ease-in-out;
            }
            
            .zalo-coc-coc-alo-phone-n-fill {
                position: absolute; top: 0; left: 0; width: 60px; height: 60px;
                border-radius: 50%; background: rgba(0, 104, 255, 0.2); 
                opacity: .5; animation: zalo-anim-2 1.5s infinite ease-in-out;
            }

            .zalo-icon-circle:hover { transform: scale(1.1); transition: 0.3s; }
            .zalo-icon-circle { animation: zalo-shake 2s infinite; }

            @keyframes zalo-anim-1 { 0% { transform: scale(.8); opacity: .5; } 100% { transform: scale(2.2); opacity: 0; } }
            @keyframes zalo-anim-2 { 0% { transform: scale(.8); opacity: .5; } 100% { transform: scale(1.7); opacity: 0; } }
            @keyframes zalo-shake {
                0% { transform: rotate(0) scale(1) skew(1deg); }
                10% { transform: rotate(-25deg) scale(1) skew(1deg); }
                20% { transform: rotate(25deg) scale(1) skew(1deg); }
                30% { transform: rotate(-25deg) scale(1) skew(1deg); }
                40% { transform: rotate(25deg) scale(1) skew(1deg); }
                50% { transform: rotate(0) scale(1) skew(1deg); }
                100% { transform: rotate(0) scale(1) skew(1deg); }
            }
        </style>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>