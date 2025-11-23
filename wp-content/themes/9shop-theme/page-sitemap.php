<?php
/*
Template Name: Site Map
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h3 class="text-primary">Sơ Đồ Trang Web 9Shop</h3>
            <ul class="list-unstyled">
                <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
                <li><a href="<?= wc_get_page_permalink('shop'); ?>">Cửa hàng</a></li>
                <li><a href="<?= wc_get_cart_url(); ?>">Giỏ hàng</a></li>
                <li><a href="<?= get_permalink(get_page_by_path('ma-giam-gia')); ?>">Mã giảm giá</a></li>
                <!-- Tự động liệt kê thêm bằng wp_list_pages() nếu cần -->
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>