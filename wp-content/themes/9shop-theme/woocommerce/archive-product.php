<?php
defined( 'ABSPATH' ) || exit;
get_header();

echo '<main id="primary" class="site-main container">';
    
if ( woocommerce_product_loop() ) {

    woocommerce_product_loop_start();

    while ( have_posts() ) {
        the_post();
        wc_get_template_part( 'content', 'product' );
    }

    woocommerce_product_loop_end();

    do_action( 'woocommerce_after_shop_loop' );

} else {
    do_action( 'woocommerce_no_products_found' );
}

echo '</main>';
get_footer();
