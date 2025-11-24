<?php
/*
Template Name: Danh Sách Yêu Thích (Wishlist)
*/
get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <?php if (is_user_logged_in()) : ?>
                <div id="wishlist-container">
                    <?php echo do_shortcode('[yith_wcwl_wishlist]'); // Dùng plugin YITH WooCommerce Wishlist ?>
                </div>
            <?php else : ?>
                <div class="text-center py-5 bg-light rounded">
                    <i class="fas fa-heart-broken fa-4x text-danger mb-4"></i>
                    <h4>Vui lòng đăng nhập để xem danh sách yêu thích!</h4>
                    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn btn-primary rounded-pill px-5 py-3 mt-3">
                        Đăng Nhập Ngay
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ĐẾM LƯỢT XEM SẢN PHẨM (View Count) -->
<script>
// Tăng lượt xem khi truy cập trang sản phẩm (chạy ở single-product.php)
document.addEventListener('DOMContentLoaded', function() {
    if (document.body.classList.contains('single-product')) {
        const productId = document.querySelector('input[name="add-to-cart"]')?.value || 
                         document.querySelector('.product_id')?.value;

        if (productId) {
            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'update_product_views',
                    product_id: productId,
                    nonce: '<?php echo wp_create_nonce("update_views_nonce"); ?>'
                })
            });
        }
    }
});
</script>

<?php get_footer(); ?>