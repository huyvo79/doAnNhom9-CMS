<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 *
 * (Giữ nguyên các chú thích trên để tham khảo)
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
	?>
	<div class="quantity input-group" style="width: 100px;"> <?php // <-- Lớp (class) của bạn được thêm vào đây ?>
		
		<?php // Nút Trừ (Minus Button) của bạn ?>
		<div class="input-group-btn">
			<button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
				<i class="fa fa-minus"></i>
			</button>
		</div>

		<?php // Ô Input chính ?>
		<input
			type="text" <?php // Đổi từ "number" sang "text" để giống HTML của bạn ?>
			id="<?php echo esc_attr( $input_id ); ?>"
			class="form-control form-control-sm text-center border-0 <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>" <?php // Thêm các lớp (class) của bạn vào ?>
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
			size="4"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			<?php if ( $step > 0 ) : ?>
				step="<?php echo esc_attr( $step ); ?>"
			<?php endif; ?>
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="numeric" <?php // Giúp hiển thị bàn phím số trên di động ?>
			autocomplete="off"
		/>

		<?php // Nút Cộng (Plus Button) của bạn ?>
		<div class="input-group-btn">
			<button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
				<i class="fa fa-plus"></i>
			</button>
		</div>
		
	</div>
	<?php
}