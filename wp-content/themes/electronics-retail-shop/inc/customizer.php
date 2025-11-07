<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage electronics-retail-shop
 * @since electronics-retail-shop 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function electronics_retail_shop_customize_register( $wp_customize ) {
	$wp_customize->add_section( new Electronics_Retail_Shop_Upsell_Section($wp_customize,'upsell_section',array(
		'title'            => __( 'Electronics Retail Shop Pro', 'electronics-retail-shop' ),
		'button_text'      => __( 'Upgrade Pro', 'electronics-retail-shop' ),
		'url'              => 'https://www.wpradiant.net/products/electronics-store-wordpress-theme',
		'priority'         => 0,
	)));
}
add_action( 'customize_register', 'electronics_retail_shop_customize_register' );

/**
 * Enqueue script for custom customize control.
 */
function electronics_retail_shop_custom_control_scripts() {
	wp_enqueue_script( 'electronics-retail-shop-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
	wp_enqueue_style( 'electronics-retail-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'electronics_retail_shop_custom_control_scripts' );