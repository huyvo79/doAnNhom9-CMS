<?php
/**
 * File template cho trang chi tiết sản phẩm (Single Product).
 *
 * @package MyShop
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Ngăn truy cập trực tiếp
}

get_header(); // Gọi header.php
?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <?php
                    /**
                     * Gọi sidebar. Bạn cần vào Appearance > Widgets
                     * và kéo các widget (VD: Product Categories, Product Search)
                     * vào "Shop Sidebar"
                     */
                    if ( is_active_sidebar( 'shop-sidebar' ) ) {
                        dynamic_sidebar( 'shop-sidebar' );
                    }
                    ?>

                    <a href="#">
                        <div class="position-relative mt-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                                style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                                <h5 class="display-6 text-primary">SALE</h5>
                                <h4 class="text-secondary">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4 single-product">
                        
                        <div class="col-xl-6">
                            <div class="border rounded">
                                <?php
                                /**
                                 * Hàm này sẽ hiển thị thư viện ảnh của sản phẩm.
                                 * Nó thay thế cho toàn bộ <div class="single-carousel owl-carousel">
                                 * của bạn.
                                 */
                                woocommerce_show_product_images();
                                ?>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <?php
                            /**
                             * Các hàm của WooCommerce sẽ hiển thị
                             * Tên, Giá, Rating, Mô tả ngắn, Nút "Add to cart"...
                             * theo đúng thứ tự.
                             */
                            ?>
                            <h4 class="fw-bold mb-3"><?php woocommerce_template_single_title(); ?></h4>
                            <div class="mb-3">
                                <?php woocommerce_template_single_rating(); ?>
                            </div>
                            <h5 class="fw-bold mb-3"><?php woocommerce_template_single_price(); ?></h5>
                            
                            <div class="mb-4">
                                <?php woocommerce_template_single_excerpt(); ?>
                            </div>

                            <?php
                            /**
                             * Hàm này sẽ hiển thị ô chọn Số lượng và nút Add to Cart.
                             * Nó thay thế cho <div class="input-group quantity mb-5">
                             * và nút <a ... Add to cart> của bạn.
                             */
                            woocommerce_template_single_add_to_cart();
                            ?>
                            
                            <div class="mt-4">
                                <?php
                                /**
                                 * Hàm này hiển thị SKU, Danh mục, Tags
                                 */
                                woocommerce_template_single_meta();
                                ?>
                            </div>

                            <div class="mb-3 mt-4">
                                <div class="btn btn-primary d-inline-block rounded text-white py-1 px-4 me-2"><i class="fab fa-facebook-f me-1"></i> Share</div>
                                <div class="btn btn-secondary d-inline-block rounded text-white py-1 px-4 ms-2"><i class="fab fa-twitter ms-1"></i> Share</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <?php
                            /**
                             * Hàm này sẽ tự động tạo ra các tab:
                             * - Description (Mô tả dài)
                             * - Additional information (Thông tin bổ sung)
                             * - Reviews (Đánh giá) - bao gồm cả form đăng đánh giá
                             *
                             * Nó thay thế toàn bộ <nav> <div class="tab-content">
                             * và <form> "Leave a Reply" của bạn.
                             */
                            woocommerce_output_product_data_tabs();
                            ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; // Kết thúc Vòng lặp ?>
            
        </div>
    </div>
</div>
<div class="container-fluid related-product">
    <div class="container">
        <?php
        /**
         * Hàm này sẽ tự động hiển thị các sản phẩm liên quan.
         * Nó thay thế toàn bộ <div class="related-carousel owl-carousel">
         */
        woocommerce_output_related_products();
        ?>
    </div>
</div>
<?php
get_footer(); // Gọi footer.php
?>