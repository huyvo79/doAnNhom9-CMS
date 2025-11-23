<?php
/**
 * Template part for displaying related products (5 Columns Layout - Compact)
 */

global $product;

if ( ! $product ) return;

// Lấy danh sách ID liên quan
$related_ids = wc_get_related_products( $product->get_id() );

if ( empty( $related_ids ) ) return;

$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 8, // Lấy 10 sản phẩm để slide mượt
    'post__in'       => $related_ids,
    'orderby'        => 'post__in',
);

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) : ?>

    <div class="container-fluid related-products-modern py-4 overflow-hidden"> <div class="container-fluid px-4"> <div class="section-header text-center mb-4">
                <span class="text-uppercase text-primary fw-bold tracking-wider x-small">Discover More</span>
                <h3 class="fw-bold mt-1">Related Products</h3>
                <div class="divider mx-auto mt-2 bg-primary" style="width:40px; height:3px;"></div>
            </div>

            <div id="related-carousel" class="productList-carousel owl-carousel">
                <?php
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    global $product;
                    ?>

                    <div class="modern-card h-100">
                        <div class="card-img-wrapper position-relative overflow-hidden">
                            <a href="<?php the_permalink(); ?>" class="d-block h-100 w-100">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('woocommerce_thumbnail', ['class' => 'img-fluid w-100 h-100']); ?>
                                <?php else: ?>
                                    <img src="<?php echo wc_placeholder_img_src(); ?>" class="img-fluid w-100 h-100" alt="No image">
                                <?php endif; ?>
                            </a>

                            <?php if ( $product->is_on_sale() ) : ?>
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2 shadow-sm rounded-pill" style="font-size: 10px;">
                                    -<?php echo round(100 - ($product->get_sale_price() / $product->get_regular_price() * 100)); ?>%
                                </span>
                            <?php endif; ?>

                            <div class="card-actions position-absolute bottom-0 start-0 w-100 p-2 d-flex justify-content-center gap-2">
                                <a href="?add-to-cart=<?php echo $product->get_id(); ?>" 
                                   class="btn-action btn-white ajax_add_to_cart shadow-sm"
                                   data-product_id="<?php echo $product->get_id(); ?>"
                                   title="Add to Cart">
                                    <i class="fas fa-shopping-bag"></i>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="btn-action btn-white shadow-sm" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-info text-center p-2 mt-1">
                            <div class="text-muted x-small text-uppercase mb-1 text-truncate" style="font-size: 10px;">
                                <?php echo strip_tags(wc_get_product_category_list($product->get_id(), ', ')); ?>
                            </div>

                            <h6 class="card-title mb-1">
                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none fw-bold text-truncate-2-lines">
                                    <?php the_title(); ?>
                                </a>
                            </h6>

                            <div class="price fw-bold text-primary" style="font-size: 14px;">
                                <?php echo $product->get_price_html(); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        $("#related-carousel").owlCarousel({
            loop: true,         // Cho phép lặp vòng tròn        // Khoảng cách giữa các thẻ
            nav: true,          // Hiện nút mũi tên trái phải
            dots: false,        // Tắt dấu chấm tròn bên dưới cho gọn
            autoplay: true,     // Tự động chạy
            autoplayTimeout: 4000,
            smartSpeed: 800,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'], // Icon mũi tên
            responsive: {
                0: { items: 1 },    // Mobile: 1 cột
                300: { items: 2 },  // Tablet nhỏ: 2 cột
                600: { items: 3 },  // Laptop nhỏ: 3 cột
                900: { items: 4 }  // Desktop lớn: 4 cột (YÊU CẦU CỦA BẠN)
            }
        });
    });
    </script>

<?php
    wp_reset_postdata();
endif;
?>