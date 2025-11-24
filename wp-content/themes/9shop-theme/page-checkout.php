<?php
/*
Template Name: Trang Thanh Toán (9shop Checkout)
*/

get_header();  
?>
<?php get_template_part('template-parts/breadcrumb'); ?>


    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
                <div class="p-4 text-center text-md-start">
                    <i class="fa fa-sync-alt fa-2x text-primary mb-2"></i>
                    <div>
                        <h6 class="text-uppercase mb-1">Free Return</h6>
                        <small>30 days money back!</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
                 <div class="p-4 text-center text-md-start">
                    <i class="fab fa-telegram-plane fa-2x text-primary mb-2"></i>
                    <div>
                         <h6 class="text-uppercase mb-1">Free Shipping</h6>
                         <small>On all orders</small>
                    </div>
                </div>
            </div>
             <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
                 <div class="p-4 text-center text-md-start">
                    <i class="fas fa-life-ring fa-2x text-primary mb-2"></i>
                    <div>
                         <h6 class="text-uppercase mb-1">Support 24/7</h6>
                         <small>Online 24 hrs</small>
                    </div>
                </div>
            </div>
             <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
                 <div class="p-4 text-center text-md-start">
                    <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                    <div>
                         <h6 class="text-uppercase mb-1">Gift Cards</h6>
                         <small>Orders over $50</small>
                    </div>
                </div>
            </div>
             <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
                 <div class="p-4 text-center text-md-start">
                    <i class="fas fa-lock fa-2x text-primary mb-2"></i>
                    <div>
                         <h6 class="text-uppercase mb-1">Secure</h6>
                         <small>100% Payment Secure</small>
                    </div>
                </div>
            </div>
             <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
                 <div class="p-4 text-center text-md-start">
                    <i class="fas fa-blog fa-2x text-primary mb-2"></i>
                    <div>
                         <h6 class="text-uppercase mb-1">Services</h6>
                         <small>Free returns</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            
            <?php
            // Kiểm tra nếu giỏ hàng trống thì không hiện form checkout
            if ( WC()->cart->is_empty() && ! is_wc_endpoint_url( 'order-received' ) ) {
                echo '<div class="alert alert-info text-center">Giỏ hàng của bạn đang trống. <a href="'.wc_get_page_permalink('shop').'">Quay lại mua sắm</a></div>';
            } else {
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="woocommerce-checkout-wrapper">
                        <?php the_content(); ?>
                    </div>
                    <?php
                endwhile; 
            }
            ?>
        </div>
    </div>

<?php get_footer(); ?>