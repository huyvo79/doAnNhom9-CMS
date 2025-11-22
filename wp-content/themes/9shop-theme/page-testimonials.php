<?php
/*
Template Name: Đánh Giá Khách Hàng
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <h2 class="text-center text-primary mb-5">Khách Hàng Nói Gì Về 9Shop</h2>
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="bg-light p-4 rounded shadow-sm text-center">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/customer1.jpg" class="rounded-circle mb-3" width="80" alt="">
                <p class="fst-italic">"Máy đẹp long lanh, giao siêu nhanh, nhân viên nhiệt tình!"</p>
                <strong>Anh Minh - Hà Nội</strong>
            </div>
        </div>
        <!-- Thêm 5-8 đánh giá -->
    </div>
</div>

<?php get_footer(); ?>