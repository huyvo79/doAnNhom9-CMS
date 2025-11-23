<?php
/*
Template Name: Giới Thiệu 9Shop
*/
get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/about-img.jpg" class="img-fluid rounded" alt="9Shop - Giới thiệu">
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="text-primary mb-4">9Shop - Đỉnh Cao Công Nghệ Trong Tầm Tay</h2>
            <p class="mb-4">Thành lập từ 2020, 9Shop tự hào là hệ thống bán lẻ điện thoại, máy tính bảng, phụ kiện chính hãng lớn nhất khu vực với hơn 50+ chi nhánh trên toàn quốc.</p>
            <div class="row g-4 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check text-primary me-3"></i>
                        <span>Hàng chính hãng 100%</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check text-primary me-3"></i>
                        <span>Bảo hành điện tử toàn quốc</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check text-primary me-3"></i>
                        <span>Đổi trả trong 30 ngày</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check text-primary me-3"></i>
                        <span>Giao hàng miễn phí toàn quốc</span>
                    </div>
                </div>
            </div>
            <a href="<?= wc_get_page_permalink('shop'); ?>" class="btn btn-primary rounded-pill py-3 px-5">Mua Ngay</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>