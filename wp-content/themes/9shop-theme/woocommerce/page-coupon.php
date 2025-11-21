<?php
/*
Template Name: Trang Mã Giảm Giá (9shop Coupons)
*/

get_header();
?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <li class="breadcrumb-item active text-white"><?php the_title(); ?></li>
    </ol>
</div>

<div class="container-fluid coupon-page py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="p-4 rounded shadow-sm bg-light mb-5 text-center">
                    <h3 class="text-primary mb-3">Săn Mã Giảm Giá Cực Hot!</h3>
                    <p class="mb-4 text-muted">Sao chép mã bạn muốn và áp dụng tại trang giỏ hàng để nhận ưu đãi.</p>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post" class="d-flex w-50">
                                <input type="text" name="coupon_code"
                                    class="form-control rounded-pill py-3 px-4 me-2 border-primary"
                                    placeholder="Nhập mã ưu đãi của bạn" required>
                                <button type="submit" name="apply_coupon"
                                    class="btn btn-secondary rounded-pill px-4 py-3" value="Apply Coupon">Áp
                                    Dụng</button>
                                <?php wp_nonce_field('woocommerce-cart', '_wpnonce'); ?>
                            </form>
                        </div>
                    </div>
                    <small class="text-muted mt-2 d-block">Mã sẽ được áp dụng trực tiếp vào giỏ hàng của bạn.</small>
                </div>
            </div>

            <div class="col-lg-12">
                <h4 class="mb-4 text-dark"><i class="fas fa-ticket-alt me-2 text-primary"></i> Các Ưu Đãi Hiện Có</h4>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="coupon-card p-4 rounded border border-2 border-primary"
                            style="border-style: dashed !important;">
                            <h5 class="text-primary mb-3">Giảm 10% Cho Đơn Đầu</h5>
                            <p class="text-muted mb-3">Áp dụng cho khách hàng mới</p>
                            <div class="d-flex align-items-center justify-content-between bg-white p-2 rounded">
                                <span class="text-dark fw-bold" id="couponCode1">KHACHMOI</span>
                                <button class="btn btn-sm btn-primary rounded-pill px-3 copy-btn"
                                    data-clipboard-target="#couponCode1">Sao Chép</button>
                            </div>
                            <small class="d-block mt-2">Hết hạn: 31/12/2025</small>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="coupon-card p-4 rounded border border-2 border-secondary"
                            style="border-style: dashed !important;">
                            <h5 class="text-secondary mb-3">Giảm 20%</h5>
                            <p class="text-muted mb-3">Áp dụng cho mọi đơn hàng</p>
                            <div class="d-flex align-items-center justify-content-between bg-white p-2 rounded">
                                <span class="text-dark fw-bold" id="couponCode2">3C85PD4X</span>
                                <button class="btn btn-sm btn-secondary rounded-pill px-3 copy-btn"
                                    data-clipboard-target="#couponCode2">Sao Chép</button>
                            </div>
                            <small class="d-block mt-2">Hết hạn: 31/12/2025</small>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="coupon-card p-4 rounded border border-2 border-warning"
                            style="border-style: dashed !important;">
                            <h5 class="text-warning mb-3">Giảm 50.000đ</h5>
                            <p class="text-muted mb-3">Áp dụng cho tất cả các sản phẩm.</p>
                            <div class="d-flex align-items-center justify-content-between bg-white p-2 rounded">
                                <span class="text-dark fw-bold" id="couponCode3">ACCESS50K</span>
                                <button class="btn btn-sm btn-warning rounded-pill px-3 copy-btn"
                                    data-clipboard-target="#couponCode3">Sao Chép</button>
                            </div>
                            <small class="d-block mt-2">Hết hạn: 31/12/2025</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-5">
                <h4 class="mb-4 text-dark"><i class="fas fa-info-circle me-2 text-primary"></i> Cách Sử Dụng Mã Giảm Giá
                </h4>
                <ul class="list-group list-group-flush shadow-sm rounded">
                    <li class="list-group-item py-3"><span class="badge bg-primary me-2">1</span> Tìm và **Sao Chép** mã
                        giảm giá bạn muốn sử dụng.</li>

                    <li class="list-group-item py-3"><span class="badge bg-primary me-2">2</span> Thêm sản phẩm vào giỏ
                        hàng và truy cập <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                            class="text-primary fw-bold">Trang Giỏ Hàng</a>.</li>
                    
                        <li class="list-group-item py-3"><span class="badge bg-primary me-2">3</span> Dán mã giảm giá vào ô
                        **"Coupon Code"** và nhấn **"Apply Coupon"** để kiểm tra ưu đãi.</li>
                   
                        <li class="list-group-item py-3"><span class="badge bg-primary me-2">4</span> Tiếp tục đến trang
                        Thanh toán để hoàn tất đơn hàng.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyButtons = document.querySelectorAll('.copy-btn');
        copyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.getAttribute('data-clipboard-target').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Tạo một input tạm thời để copy
                    const tempInput = document.createElement('input');
                    tempInput.value = targetElement.innerText;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    // Đổi text nút sau khi copy
                    const originalText = this.innerText;
                    this.innerText = 'Đã Sao Chép!';
                    setTimeout(() => {
                        this.innerText = originalText;
                    }, 1500);
                }
            });
        });
    });
</script>
<?php
get_footer();
?>