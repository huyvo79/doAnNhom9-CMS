<?php
/*
Template Name: Trang Giỏ Hàng (9shop Cart)
*/

get_header();  
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container-fluid py-5">
    <div class="container py-5">

        <div class="row">
            <div class="col-12">
                <?php wc_print_notices(); ?>
            </div>
        </div>

        <?php if ( WC()->cart->is_empty() ) : ?>
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                <h3>Giỏ hàng của bạn đang trống</h3>
                <p class="text-muted">Hãy quay lại cửa hàng và chọn món đồ yêu thích nhé!</p>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary rounded-pill px-5 py-3 mt-3">Quay lại cửa hàng</a>
            </div>
        <?php else : ?>

            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                        <td scope="row">
                                            <div class="d-flex align-items-center">
                                                <?php 
                                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key );
                                                if ( ! $product_permalink ) {
                                                    echo $thumbnail; 
                                                } else {
                                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                                }
                                                ?>
                                                <div class="ms-3">
                                                    <?php
                                                    if ( ! $product_permalink ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                    } else {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="text-dark fw-bold">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                    }
                                                    // Meta data (Size, Color...)
                                                    echo wc_get_formatted_cart_item_data( $cart_item );

                                                    // Backorder notification
                                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <p class="mb-0 fw-bold">
                                                <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                            </p>
                                        </td>

                                        <td class="align-middle">
                                            <div class="input-group quantity" style="width: 120px;">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-sm text-center border-0 qty" 
                                                    name="cart[<?php echo $cart_item_key; ?>][qty]"
                                                    value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"
                                                    title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"
                                                    min="0"
                                                    step="1"
                                                    inputmode="numeric"
                                                >
                                                
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <p class="mb-0 fw-bold text-primary">
                                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                            </p>
                                        </td>

                                        <td class="align-middle">
                                            <?php
                                            echo apply_filters(
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="btn btn-md rounded-circle bg-light border" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times text-danger"></i></a>',
                                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                    esc_attr__( 'Remove this item', 'woocommerce' ),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() )
                                                ),
                                                $cart_item_key
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-5 row">
                    <div class="col-md-6 mb-3">
                        <?php if ( wc_coupons_enabled() ) { ?>
                            <div class="d-flex">
                                <input type="text" name="coupon_code" class="form-control border-0 border-bottom rounded me-3 py-3" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-3 text-nowrap" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <div class="col-md-6 text-end mb-3">
                        <button type="submit" class="btn btn-secondary rounded-pill px-4 py-3" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </div>
                </div>
            
            </form>


            <div class="row g-4 justify-content-end mt-4">
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        
                        <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
                             <div class="d-flex justify-content-between mb-4 border-bottom pb-3">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0 fw-bold"><?php wc_cart_totals_subtotal_html(); ?></p>
                            </div>

                            <div class="mb-4 border-bottom pb-3">
                                <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                                    <?php wc_cart_totals_shipping_html(); ?>
                                <?php elseif ( WC()->cart->needs_shipping() ) : ?>
                                    <div class="woocommerce-shipping-calculator">
                                        <?php woocommerce_shipping_calculator(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                <div class="d-flex justify-content-between mb-4 border-bottom pb-3 cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                    <h5 class="mb-0"><?php wc_cart_totals_coupon_label( $coupon ); ?></h5>
                                    <p class="mb-0"><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
                                </div>
                            <?php endforeach; ?>

                            <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                                <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                                        <div class="d-flex justify-content-between mb-4 tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                            <h5 class="mb-0"><?php echo esc_html( $tax->label ); ?></h5>
                                            <p class="mb-0"><?php echo wp_kses_post( $tax->formatted_amount ); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="d-flex justify-content-between mb-4 tax-total">
                                        <h5 class="mb-0"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></h5>
                                        <p class="mb-0"><?php wc_cart_totals_taxes_total_html(); ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <div class="py-4 mb-4 d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4 display-6">Total</h5>
                                <p class="mb-0 pe-4 display-6 text-primary fw-bold"><?php wc_cart_totals_order_total_html(); ?></p>
                            </div>

                            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-primary rounded-pill w-100 py-3 text-uppercase">
                                Proceed Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>