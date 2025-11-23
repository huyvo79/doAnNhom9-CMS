<?php
/* Template Name: Support Page */
get_header();
?>
<div class="container-fluid page-header py-5 mb-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_title(); ?></h1>
        <p class="text-white-50">Đội ngũ kỹ thuật sẽ phản hồi trong vòng 24h.</p>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); // Hoặc bạn có thể dùng breadcrumb khác nếu muốn ?>
    </ol>
</div>
<div class="container support-content-area">
    <div class="row-flex">

        <div class="col-info">
            <div class="info-box">
                <h3>Kênh trực tiếp</h3>
                <p class="text-danger">Cần gấp? Gọi ngay cho chúng tôi.</p>
                <ul class="contact-list">
                    <li><strong>Hotline:</strong> +84 123 456 7890</li>
                    <li><strong>Email:</strong> support@domain.com</li>
                    <li><strong>Địa chỉ:</strong> 123 Street Ho Chi Minh city, Vietnam</li>
                </ul>
            </div>

            <div class="info-box working-hours">
                <h3>Giờ làm việc</h3>
                <p>Thứ 2 - Thứ 6: 08:00 - 17:30</p>
                <p>Thứ 7: 08:00 - 12:00</p>
            </div>
        </div>

        <div class="col-form">
            <div class="form-wrapper">
                <h3>Gửi ticket hỗ trợ</h3>
                <div class="cf7-support-form">
                    <?php echo do_shortcode('[contact-form-7 id="9d0f75f" title="support"]'); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>