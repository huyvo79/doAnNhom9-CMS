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

if (!defined('ABSPATH')) {
	exit;
}

// SỬA LỖI: Thay đổi điều kiện kiểm tra để tránh lỗi Undefined variable
if (!empty($related_products)): ?>

	<div class="container-fluid related-product py-5">
		<div class="container">
			<div class="mx-auto text-center pb-5" style="max-width: 700px;">
				<h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
					data-wow-delay="0.1s">
					<?php
					$heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', '9shop-theme'));
					if ($heading):
						echo esc_html($heading);
					endif;
					?>
				</h4>
				<p class="wow fadeInUp" data-wow-delay="0.2s">
					<?php _e('Discover similar products you might like.', '9shop-theme'); ?></p>
			</div>

			<div class="related-carousel owl-carousel pt-4">

				<?php foreach ($related_products as $related_product): ?>

					<?php
					$post_object = get_post($related_product->get_id());
					setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
			
					global $product;
					?>

					<div class="related-item rounded position-relative">
						<div class="related-item-inner border rounded-top bg-white">
							<div class="related-item-inner-item position-relative overflow-hidden">
								<a href="<?php echo esc_url(get_permalink()); ?>" class="d-block">
									<?php
									// Hiển thị ảnh sản phẩm
									if (has_post_thumbnail()) {
										echo woocommerce_get_product_thumbnail('woocommerce_thumbnail', ['class' => 'img-fluid w-100 rounded-top transition-scale']);
									} else {
										echo '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" class="img-fluid w-100 rounded-top">';
									}
									?>
								</a>

								<?php if ($product->is_on_sale()): ?>
									<div
										class="related-new position-absolute top-0 start-0 bg-danger text-white px-2 py-1 m-2 rounded small">
										Sale</div>
								<?php endif; ?>

								<div
									class="related-details position-absolute top-50 start-50 translate-middle d-flex opacity-0">
									<a href="<?php echo esc_url(get_permalink()); ?>"
										class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
										style="width: 40px; height: 40px;">
										<i class="fa fa-eye"></i>
									</a>
								</div>
							</div>

							<div class="text-center p-4">
								<?php
								$categories = get_the_terms($product->get_id(), 'product_cat');
								if (!empty($categories) && !is_wp_error($categories)) {
									$category = $categories[0];
									echo '<a href="' . esc_url(get_term_link($category)) . '" class="d-block mb-2 text-secondary small text-decoration-none">' . esc_html($category->name) . '</a>';
								}
								?>
								<a href="<?php echo esc_url(get_permalink()); ?>"
									class="d-block h5 text-dark text-decoration-none mb-2 text-truncate"><?php the_title(); ?></a>
								<div class="d-flex justify-content-center text-primary fw-bold">
									<?php echo $product->get_price_html(); ?>
								</div>
							</div>
						</div>

						<div class="related-item-add border border-top-0 rounded-bottom text-center p-4 pt-0 bg-white">

							<div class="mb-3">
								<?php woocommerce_template_loop_add_to_cart(); ?>
							</div>

							<div class="d-flex justify-content-between align-items-center border-top pt-3">
								<div class="d-flex small">
									<?php woocommerce_template_loop_rating(); ?>
								</div>
								<div class="d-flex gap-2">
									<a href="#" class="text-primary d-flex align-items-center justify-content-center btn-action"
										title="Compare"><i class="fas fa-random"></i></a>
									<a href="#" class="text-primary d-flex align-items-center justify-content-center btn-action"
										title="Wishlist"><i class="fas fa-heart"></i></a>
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