<?php
/*
Template Name: Hướng Dẫn Mua Hàng
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8 mx-auto">
            <h2 class="text-center text-primary mb-5">Quy Trình Mua Hàng Tại 9Shop</h2>
            <div class="accordion" id="huongdanAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#step1">
                            Bước 1: Chọn sản phẩm yêu thích
                        </button>
                    </h2>
                    <div id="step1" class="accordion-collapse collapse show" data-bs-parent="#huongdanAccordion">
                        <div class="accordion-body">
                            Tìm kiếm sản phẩm → Xem chi tiết → Chọn màu sắc, dung lượng → Nhấn "Thêm vào giỏ hàng"
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#step2">
                            Bước 2: Xem giỏ hàng & Áp dụng mã giảm giá
                        </button>
                    </h2>
                    <div id="step2" class="accordion-collapse collapse" data-bs-parent="#huongdanAccordion">
                        <div class="accordion-body">
                            Kiểm tra sản phẩm → Nhập mã giảm giá → Nhấn "Tiến hành thanh toán"
                        </div>
                    </div>
                </div>
                <!-- Thêm các bước còn lại... -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>