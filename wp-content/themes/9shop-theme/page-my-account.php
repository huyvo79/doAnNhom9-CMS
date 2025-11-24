<?php
/**
 * Template Name: My Account Page
 */
get_header(); ?>

<div class="container-fluid page-header py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_title(); ?></h1>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white p-4 shadow-sm rounded custom-my-account-wrapper">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    /* 1. Cấu trúc layout: Chia cột khi đã đăng nhập */
    .woocommerce-account .woocommerce {
        display: flex;
        flex-wrap: wrap;
    }
    
    /* Cột Menu bên trái */
    .woocommerce-account .woocommerce-MyAccount-navigation {
        flex: 0 0 25%; /* Chiếm 25% chiều rộng */
        max-width: 25%;
    }

    /* Cột Nội dung bên phải */
    .woocommerce-account .woocommerce-MyAccount-content {
        flex: 0 0 70%; /* Chiếm khoảng 70% chiều rộng */
        max-width: 70%;
        background: #f8f9fa; /* Màu nền nhẹ cho nội dung */
        padding: 30px;
        border-radius: 10px;
    }

    /* Mobile: Khi màn hình nhỏ thì dồn thành 1 cột */
    @media (max-width: 768px) {
        .woocommerce-account .woocommerce-MyAccount-navigation,
        .woocommerce-account .woocommerce-MyAccount-content {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* 2. Trang trí Menu bên trái */
    .woocommerce-MyAccount-navigation ul {
        list-style: none;
        padding: 0;
        margin: 0;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }

    .woocommerce-MyAccount-navigation ul li {
        border-bottom: 1px solid #eee;
        margin: 0;
    }

    .woocommerce-MyAccount-navigation ul li:last-child {
        border-bottom: none;
    }

    .woocommerce-MyAccount-navigation ul li a {
        display: block;
        padding: 15px 20px;
        color: #555;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
    }

    .woocommerce-MyAccount-navigation ul li a:hover {
        background-color: #f8f9fa;
        color: var(--bs-primary); /* Dùng màu chính của theme */
        padding-left: 25px; /* Hiệu ứng đẩy chữ sang phải */
    }

    /* Link đang được chọn (Active) */
    .woocommerce-MyAccount-navigation ul li.is-active a {
        background-color: var(--bs-primary); /* Màu cam của theme bạn */
        color: #fff;
    }

    /* 3. Trang trí Form Đăng nhập / Đăng ký (Khi chưa login) */
    .u-column1, .u-column2 {
        padding: 20px;
        border: 1px solid #eee;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    .woocommerce-form-login h2, .woocommerce-form-register h2 {
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    /* Nút bấm */
    .woocommerce-button {
        background-color: var(--bs-primary) !important;
        color: white !important;
        padding: 10px 30px !important;
        border-radius: 30px !important;
        border: none !important;
        font-weight: 600;
    }
    .woocommerce-button:hover {
        opacity: 0.9;
    }

    /* Input field */
    .woocommerce-Input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
    }
</style>

<?php get_footer(); ?>