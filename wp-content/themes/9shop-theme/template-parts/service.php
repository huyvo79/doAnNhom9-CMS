<div class="container-fluid px-0">
    <div class="row g-0">
        <?php 
        // Dữ liệu mặc định để phòng hờ
        $default_services = array(
            1 => array('icon' => 'fa fa-sync-alt',       'title' => 'Free Return',        'desc' => '30 days money back guarantee!'),
            2 => array('icon' => 'fab fa-telegram-plane', 'title' => 'Free Shipping',      'desc' => 'Free shipping on all order'),
            3 => array('icon' => 'fas fa-life-ring',      'title' => 'Support 24/7',       'desc' => 'We support online 24 hrs a day'),
            4 => array('icon' => 'fas fa-credit-card',    'title' => 'Receive Gift Card',  'desc' => 'Recieve gift all over oder $50'),
            5 => array('icon' => 'fas fa-lock',           'title' => 'Secure Payment',     'desc' => 'We Value Your Security'),
            6 => array('icon' => 'fas fa-blog',           'title' => 'Online Service',     'desc' => 'Free return products in 30 days'),
        );

        // Chạy vòng lặp 6 lần để in ra 6 cột
        for ($i = 1; $i <= 6; $i++) :
            // Lấy dữ liệu từ Customizer
            $icon  = get_theme_mod("service_icon_$i", $default_services[$i]['icon']);
            $title = get_theme_mod("service_title_$i", $default_services[$i]['title']);
            $desc  = get_theme_mod("service_desc_$i", $default_services[$i]['desc']);
            
            // Tính toán delay cho hiệu ứng WOW JS (0.1s, 0.2s, 0.3s...)
            $delay = '0.' . $i . 's';
            
            // Xử lý border (Cột đầu tiên có border-start, các cột khác chỉ border-end)
            $border_class = ($i == 1) ? 'border-start border-end' : 'border-end';
        ?>
            <div class="col-6 col-md-4 col-lg-2 <?php echo $border_class; ?> wow fadeInUp" data-wow-delay="<?php echo $delay; ?>">
                <div class="p-4">
                    <div class="d-flex align-items-center service-item-custom">
                        <i class="<?php echo esc_attr($icon); ?> fa-2x text-primary"></i>
                        
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2 fw-bold"><?php echo esc_html($title); ?></h6>
                            <p class="mb-0 small text-muted"><?php echo esc_html($desc); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>