<?php
/*
Template Name: Điều Khoản Dịch Vụ
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active text-white"><?php the_title(); ?></li>
    </ol>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-light rounded p-5">
                <h2 class="text-primary mb-4">Điều Khoản Sử Dụng Website 9Shop</h2>
                <p class="text-muted fst-italic">Cập nhật lần cuối: 22/11/2025</p>
                
                <h5 class="mt-4">1. Chấp nhận điều khoản</h5>
                <p>Khi truy cập và mua sắm tại 9Shop, bạn đồng ý bị ràng buộc bởi các điều khoản sau...</p>

                <h5 class="mt-4">2. Thông tin sản phẩm</h5>
                <p>9Shop cam kết cung cấp thông tin chính xác. Tuy nhiên, chúng tôi có quyền sửa đổi giá, thông số mà không cần báo trước.</p>

                <h5 class="mt-4">3. Thanh toán</h5>
                <p>Hỗ trợ: COD, Chuyển khoản, Thẻ tín dụng, Momo, ZaloPay, Ví ShopeePay...</p>

                <h5 class="mt-4">4. Bảo mật thông tin</h5>
                <p>9Shop cam kết không chia sẻ thông tin khách hàng cho bên thứ 3 trừ trường hợp pháp luật yêu cầu.</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>