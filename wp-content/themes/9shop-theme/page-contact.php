<?php
/**
 * Template Name: Contact Page
 */

get_header();
?>

<!-- Custom CSS Contact Page -->
<style>
    /* --- 1. FORM CONTAINER --- */
    .contact .bg-light {
        background-color: #ffffff !important; /* Dùng nền trắng cho sạch sẽ */
        box-shadow: 0 10px 50px rgba(0,0,0,0.08); /* Đổ bóng nhẹ cho toàn bộ khung */
        border-radius: 20px !important;
        padding: 3rem !important;
    }

    /* --- 2. INPUT FIELDS & TEXTAREA --- */
    .wpcf7-form-control:not(.wpcf7-submit) {
        display: block;
        width: 680px;
        height: 100%;
        padding: 1rem 1.5rem; /* Tăng padding cho thoáng */
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #555;
        background-color: #f8f9fa; /* Nền xám nhạt hiện đại */
        border: 1px solid transparent; /* Ẩn viền mặc định */
        border-radius: 10px; /* Bo tròn mềm mại */
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
    }

    /* Hiệu ứng khi click vào ô input */
    .wpcf7-form-control:focus {
        color: #212529;
        background-color: #fff;
        border-color: var(--bs-primary, #0d6efd);
        outline: 0;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05); /* Đổ bóng khi focus */
    }
    
    /* Placeholder style */
    .wpcf7-form-control::placeholder {
        color: #adb5bd;
        font-size: 0.95rem;
    }

    /* --- 3. SUBMIT BUTTON --- */
    .wpcf7-submit {
        display: inline-block;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        text-align: center;
        cursor: pointer;
        background-color: var(--bs-primary, #0d6efd);
        border: none;
        padding: 1rem 3rem;
        font-size: 0.9rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(var(--bs-primary-rgb, 13, 110, 253), 0.3);
        margin-top: 10px;
        width: 100%;
    }

    .wpcf7-submit:hover {
        background-color: var(--bs-secondary, #6c757d);
        transform: translateY(-3px); /* Nổi lên khi hover */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* --- 4. INFO CARDS (Địa chỉ, Email...) --- */
    .contact-info-item {
        background: #fff;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
        border: 1px solid #eee;
        height: 100%;
        transition: all 0.3s ease;
        text-align: center;
    }

    /* Hiệu ứng hover cho thẻ thông tin */
    .contact-info-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: var(--bs-primary, #0d6efd);
    }

    .contact-info-item .icon-box {
        width: 80px;
        height: 80px;
        background-color: #f8f9fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover .icon-box {
        background-color: var(--bs-primary, #0d6efd);
    }
    
    .contact-info-item:hover .icon-box i {
        color: #fff !important;
    }

    /* --- 5. GOOGLE MAP --- */
    .contact-map iframe {
        border-radius: 20px !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 95% !important;
    }

    /* --- 6. OTHER CF7 FIXES --- */
    .wpcf7-form p { margin-bottom: 0; }
    .wpcf7-form br { display: none; }
    .wpcf7-response-output { 
        border-radius: 10px; 
        font-size: 0.9rem; 
        padding: 1rem !important; 
    }
</style>

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">
        <?php the_title(); ?>
    </h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php _e('Home', 'your-theme-domain'); ?>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">
                <?php _e('Pages', 'your-theme-domain'); ?>
            </a>
        </li>
        <li class="breadcrumb-item active text-white">
            <?php the_title(); ?>
        </li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <!-- Main Form Section -->
        <div class="p-5 bg-light rounded mb-5"> <!-- Thêm mb-5 để cách phần info bên dưới -->
            <div class="row g-5"> <!-- Tăng g-4 lên g-5 để khoảng cách rộng hơn -->
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">
                            <?php _e('Get in touch', 'your-theme-domain'); ?>
                        </h4>
                        <p class="mb-5 fs-5 text-Info">
                            <?php _e('We are here for you! How can we help?', 'your-theme-domain'); ?>
                        </p>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="col-lg-7">
                    <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s">
                        <?php _e('Let’s Connect', 'your-theme-domain'); ?>
                    </h5>
                    <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <?php _e('Send Your Message', 'your-theme-domain'); ?>
                    </h2>

                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;

                    ?>
                </div>

                <!-- Map Column -->
                <div class="col-lg-5 wow fadeInUp contact-map" data-wow-delay="0.2s">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 100%; min-height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.484289313857!2d106.75549837580119!3d10.85074545781352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEPDtG5nIG5naOG7hyBUaOG7pyDEkOG7qWM!5e0!3m2!1svi!2s!4v1678886400001!5m2!1svi!2s"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info Columns -->
        <div class="row g-4 justify-content-center">
            <!-- Address -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="contact-info-item">
                    <div class="icon-box">
                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4><?php _e('Address', 'your-theme-domain'); ?></h4>
                        <p class="mb-0 text-muted">Trường Cao đẳng Công nghệ Thủ Đức</p>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="contact-info-item">
                    <div class="icon-box">
                        <i class="fas fa-envelope fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4><?php _e('Mail Us', 'your-theme-domain'); ?></h4>
                        <p class="mb-0 text-muted">info@mail.tdc.edu.vn</p>
                    </div>
                </div>
            </div>

            <!-- Telephone -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="contact-info-item">
                    <div class="icon-box">
                        <i class="fa fa-phone-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4><?php _e('Telephone', 'your-theme-domain'); ?></h4>
                        <p class="mb-0 text-muted">(+012) 3456 7890</p>
                    </div>
                </div>
            </div>

            <!-- Website -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="contact-info-item">
                    <div class="icon-box">
                        <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4>Website</h4>
                        <p class="mb-0 text-muted">www.9shop.com</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Contact End -->

<?php
get_footer();
?>