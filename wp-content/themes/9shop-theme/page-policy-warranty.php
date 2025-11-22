<?php
/*
Template Name: Chính Sách Bảo Hành
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
        <div class="col-lg-12">
            <div class="bg-light rounded p-5">
                <h2 class="text-primary mb-4">Chính Sách Bảo Hành Điện Tử 9Shop</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item py-3"><strong>Bảo hành chính hãng 12 tháng</strong> (iPhone 12 tháng, Samsung 12 tháng, Xiaomi 18 tháng)</li>
                    <li class="list-group-item py-3"><strong>1 đổi 1 trong 30 ngày</strong> nếu lỗi nhà sản xuất</li>
                    <li class="list-group-item py-3">Bảo hành phần mềm trọn đời</li>
                    <li class="list-group-item py-3">Hỗ trợ bảo hành tại hơn 50 trung tâm trên toàn quốc</li>
                    <li class="list-group-item py-3">Miễn phí kiểm tra, vệ sinh máy định kỳ</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>