<?php
/* Template Name: Help & Support Page */
get_header();
?>
<div class="container-fluid page-header py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_title(); ?></h1>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); // Hoặc bạn có thể dùng breadcrumb khác nếu muốn ?>
    </ol>
</div>
<div class="help-page-container">

    <section class="help-hero">
        <div class="container">
            <h1>Xin chào, chúng tôi có thể giúp gì?</h1>
        </div>
    </section>
    <section class="help-categories container">
        <div class="grid-item">
            <i class="fa fa-user"></i>
            <h3>Tài khoản</h3>
            <p>Đổi mật khẩu, cập nhật hồ sơ...</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('my-account'))); ?>">Xem thêm &rarr;</a>
        </div>
        <div class="grid-item">
            <i class="fa fa-credit-card"></i>
            <h3>Thanh toán</h3>
            <p>Phương thức thanh toán, hoàn tiền...</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('help-center/help-topic-payment'))); ?>">Xem thêm
                &rarr;</a>
        </div>
        <div class="grid-item">
            <i class="fa fa-truck"></i>
            <h3>Vận chuyển</h3>
            <p>Tra cứu đơn hàng, phí ship...</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('order'))); ?>">Xem thêm &rarr;</a>
        </div>
    </section>

    <section class="help-faq container">
        <h2>Câu hỏi thường gặp</h2>
        <div class="faq-item">
            <details>
                <summary>Làm sao để tôi đổi mật khẩu?</summary>
                <p>Bạn vào trang Tài khoản > Cài đặt > Đổi mật khẩu.</p>
            </details>
        </div>
        <div class="faq-item">
            <details>
                <summary>Chính sách hoàn tiền như thế nào?</summary>
                <p>Chúng tôi hoàn tiền trong vòng 7 ngày nếu sản phẩm lỗi.</p>
            </details>
        </div>
        <div class="faq-item">
            <details>
                <summary>Không tìm thấy câu trả lời?</summary>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('support-center'))); ?>"
                    class="btn-contact">Liên hệ hỗ trợ</a>
            </details>
        </div>
    </section>

</div>

<?php get_footer(); ?>