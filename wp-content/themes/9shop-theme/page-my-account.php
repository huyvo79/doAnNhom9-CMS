<?php
/**
 * Template Name: My Account Page
 */
get_header(); ?>

<div class="container-fluid page-header py-5 bg-dark mb-5">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center text-uppercase mb-0">
               <?php woocommerce_breadcrumb(); ?>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12"> <div class="bg-white p-4 shadow-sm rounded custom-my-account-wrapper">
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
    /* --- 1. SETUP CHUNG --- */
    .custom-my-account-wrapper {
        min-height: 400px;
    }

    /* --- 2. TRẠNG THÁI: ĐÃ ĐĂNG NHẬP (Layout Sidebar) --- */
    /* Container chứa Menu và Content */
    .logged-in.woocommerce-account .woocommerce {
        display: flex;
        flex-wrap: wrap;
        gap: 30px; /* Khoảng cách giữa menu và nội dung */
    }

    /* Cột Menu bên trái */
    .woocommerce-account .woocommerce-MyAccount-navigation {
        flex: 0 0 25%;
        max-width: 25%;
    }

    /* Cột Nội dung bên phải */
    .woocommerce-account .woocommerce-MyAccount-content {
        flex: 1; /* Tự chiếm phần còn lại */
        background: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
    }

    /* --- 3. TRẠNG THÁI: CHƯA ĐĂNG NHẬP (Login / Register Split) --- */
    /* ID bao quanh cả 2 form do WooCommerce tự sinh ra */
    #customer_login {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px; /* Bù trừ padding */
    }

    /* Chia cột 50-50 cho Đăng nhập và Đăng ký */
    #customer_login .u-column1, 
    #customer_login .u-column2 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 30px; /* Tạo khoảng cách giữa 2 form */
        margin-bottom: 30px;
    }
    
    /* Đường kẻ ngăn cách giữa 2 form (Tùy chọn) */
    #customer_login .u-column1 {
        border-right: 1px solid #eee;
    }

    /* --- 4. RESPONSIVE (Mobile) --- */
    @media (max-width: 768px) {
        /* Khi đã đăng nhập: Menu lên trên, content xuống dưới */
        .logged-in.woocommerce-account .woocommerce {
            flex-direction: column;
        }
        .woocommerce-account .woocommerce-MyAccount-navigation,
        .woocommerce-account .woocommerce-MyAccount-content {
            flex: 0 0 100%;
            max-width: 100%;
        }

        /* Khi chưa đăng nhập: Form xếp chồng lên nhau */
        #customer_login .u-column1, 
        #customer_login .u-column2 {
            flex: 0 0 100%;
            max-width: 100%;
            border-right: none; /* Bỏ đường kẻ dọc */
            border-bottom: 1px solid #eee; /* Thêm đường kẻ ngang */
            padding-bottom: 30px;
        }
    }

    /* --- 5. STYLE ĐẸP (Cosmetic) --- */
    /* Menu bên trái */
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

    .woocommerce-MyAccount-navigation ul li:last-child { border-bottom: none; }

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
        color: var(--bs-primary);
        padding-left: 25px;
    }

    .woocommerce-MyAccount-navigation ul li.is-active a {
        background-color: var(--bs-primary);
        color: #fff;
    }

    /* Form Inputs & Buttons */
    .woocommerce form .form-row {
        margin-bottom: 15px;
        width: 100%; /* Fix input width */
    }
    
    .woocommerce input.input-text {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
    }
    
    .woocommerce input.input-text:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.25);
    }

    h2 {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        color: #333;
    }
    
    /* Nút Submit */
    .woocommerce button.button {
        background-color: var(--bs-primary);
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        width: 100%; /* Nút full chiều rộng cho đẹp */
        margin-top: 10px;
        transition: 0.3s;
    }
    .woocommerce button.button:hover {
        background-color: #000; /* Hoặc màu tối hơn của theme */
    }
</style>

<?php get_footer(); ?>