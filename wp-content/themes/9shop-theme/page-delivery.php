<?php
/*
Template Name: Giao Hàng & Vận Chuyển
*/
get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-10 mx-auto">
            <h2 class="text-primary text-center mb-5">Chính Sách Giao Hàng Toàn Quốc</h2>
            
            <div class="row g-4 mb-5">
                <div class="col-md-4 text-center">
                    <div class="p-4 bg-light rounded shadow-sm">
                        <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                        <h5>Miễn Phí Giao Hàng</h5>
                        <p class="text-muted">Đơn từ 500k nội thành & 1 triệu ngoại tỉnh</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-4 bg-light rounded shadow-sm">
                        <i class="fas fa-clock fa-3x text-success mb-3"></i>
                        <h5>Nhanh Chóng</h5>
                        <p class="text-muted">Nội thành: 24h<br> Ngoại tỉnh: 1-3 ngày</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-4 bg-light rounded shadow-sm">
                        <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                        <h5>An Toàn Tuyệt Đối</h5>
                        <p class="text-muted">Đóng gói chống sốc + Niêm phong</p>
                    </div>
                </div>
            </div>

            <div class="bg-light rounded p-5">
                <h4 class="text-primary mb-4"><i class="fas fa-shipping-fast me-2"></i> Bảng Phí Giao Hàng</h4>
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Khu vực</th>
                            <th>Thời gian</th>
                            <th>Phí ship</th>
                            <th>Miễn phí khi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TP.HCM, Hà Nội, Đà Nẵng</td>
                            <td>2-4 giờ</td>
                            <td>25.000đ</td>
                            <td>Đơn từ 500k</td>
                        </tr>
                        <tr>
                            <td>Các tỉnh thành khác</td>
                            <td>1-3 ngày</td>
                            <td>35.000đ - 50.000đ</td>
                            <td>Đơn từ 1.000.000đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>