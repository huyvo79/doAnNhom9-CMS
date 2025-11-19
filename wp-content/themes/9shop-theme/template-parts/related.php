<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div class="container-fluid related-product">
		<div class="container">
			<div class="mx-auto text-center pb-5" style="max-width: 700px;">
				<h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
					<?php
					$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
					if ( $heading ) :
						echo esc_html( $heading );
					endif;
					?>
				</h4>
				<p class="wow fadeInUp" data-wow-delay="0.2s">Khám phá các sản phẩm tương tự mà bạn có thể thích.</p>
			</div>
			<div class="related-carousel owl-carousel pt-4">

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					
					global $product;
					?>

					<div class="related-item rounded">
						<div class="related-item-inner border rounded">
							<div class="related-item-inner-item">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php echo woocommerce_get_product_thumbnail('woocommerce_thumbnail', ['class' => 'img-fluid w-100 rounded-top']); ?>
								</a>
								
								<?php if ( $product->is_on_sale() ) : ?>
									<div class="related-new">Sale</div>
								<?php endif; ?>

								<div class="related-details">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-eye fa-1x"></i></a>
								</div>
							</div>
							<div class="text-center rounded-bottom p-4">
								<?php
								$categories = get_the_terms( $product->get_id(), 'product_cat' );
								if ( ! empty( $categories ) ) {
									$category = $categories[0];
									echo '<a href="' . esc_url( get_term_link( $category ) ) . '" class="d-block mb-2">' . esc_html( $category->name ) . '</a>';
								}
								?>
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="d-block h4"><?php the_title(); ?></a>
								<div class="d-flex justify-content-center">
									<?php echo $product->get_price_html(); ?>
								</div>
							</div>
						</div>
						<div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
							
							<?php woocommerce_template_loop_add_to_cart(); ?>

							<div class="d-flex justify-content-between align-items-center mt-4">
								<div class="d-flex">
									<?php woocommerce_template_loop_rating(); ?>
								</div>
								<div class="d-flex">
									<?php // You can add wishlist/compare buttons here if your theme/plugins support it ?>
									<a href="#" class="text-primary d-flex align-items-center justify-content-center me-3"><span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span></a>
									<a href="#" class="text-primary d-flex align-items-center justify-content-center me-0"><span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span></a>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>

<?php
endif;

wp_reset_postdata();

?>
