<?php
/*
Template Name: Tuyển Dụng
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-primary">Tham Gia Đội Ngũ 9Shop</h2>
        <p class="lead">Cùng xây dựng thương hiệu công nghệ hàng đầu Việt Nam</p>
    </div>
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="job-card p-4 border rounded shadow-sm text-center">
                <h5 class="text-primary">Nhân Viên Bán Hàng</h5>
                <p class="text-muted">Thu nhập: 10 - 25 triệu</p>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4">Ứng Tuyển</a>
            </div>
        </div>
        <!-- Thêm các vị trí khác -->
    </div>
</div>

<?php get_footer(); ?>