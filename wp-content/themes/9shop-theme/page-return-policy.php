<?php
/*
Template Name: Chính Sách Đổi Trả
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-primary">Đổi Trả Dễ Dàng - Mua Sắm An Tâm</h2>
        <p class="lead">Chính sách đổi trả linh hoạt trong 30 ngày</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="text-center p-4 bg-light rounded shadow-sm">
                <i class="fas fa-sync-alt fa-3x text-primary mb-3"></i>
                <h5>30 Ngày Đổi Trả</h5>
                <p>Máy lỗi do nhà sản xuất</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4 bg-light rounded shadow-sm">
                <i class="fas fa-shield-alt fa-3x text-success mb-3"></i>
                <h5>Hoàn Tiền 100%</h5>
                <p>Nếu sản phẩm không đúng mô tả</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4 bg-light rounded shadow-sm">
                <i class="fas fa-truck fa-3x text-warning mb-3"></i>
                <h5>Miễn Phí Vận Chuyển</h5>
                <p>Đổi trả tại nhà</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>