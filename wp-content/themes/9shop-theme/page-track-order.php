<?php
/*
Template Name: Theo Dõi Đơn Hàng
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="bg-light rounded p-5 text-center">
                <i class="fas fa-search-location fa-4x text-primary mb-4"></i>
                <h3 class="mb-4">Tra Cứu Đơn Hàng</h3>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Nhập mã đơn hàng (VD: 9SHOP12345)" required>
                        <button class="btn btn-primary px-5">Tra cứu</button>
                    </div>
                    <small class="text-muted">Mã đơn hàng được gửi qua SMS & Email khi đặt hàng thành công</small>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>