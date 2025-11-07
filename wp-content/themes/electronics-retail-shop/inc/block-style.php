<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage electronics-retail-shop
 * @since electronics-retail-shop 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since electronics-retail-shop 1.0
	 *
	 * @return void
	 */
	function electronics_retail_shop_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'electronics-retail-shop-border',
				'label' => esc_html__( 'Borders', 'electronics-retail-shop' ),
			)
		);

		
	}
	add_action( 'init', 'electronics_retail_shop_register_block_styles' );
}