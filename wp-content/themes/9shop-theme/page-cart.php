<?php
/*
Template Name: Trang Giỏ Hàng (9shop Cart)
*/

get_header();  
?>

    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white"><?php the_title(); ?></li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">

            <?php 
            // Hiển thị bất kỳ thông báo nào của WooCommerce (ví dụ: "Sản phẩm đã được cập nhật")
            wc_print_notices(); 
            ?>

            <?php ?>
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Model (SKU)</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Bắt đầu vòng lặp (loop) để lấy từng sản phẩm trong giỏ hàng
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                // Chỉ hiển thị nếu sản phẩm tồn tại và có số lượng
                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                        <th scope="row">
                                            <p class="mb-0 py-4">
                                                <?php
                                                // Hiển thị tên sản phẩm, có link hoặc không
                                                if ( ! $product_permalink ) {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                } else {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                }
                                                // Hiển thị thông tin biến thể (ví dụ: Màu: Đỏ, Size: L)
                                                echo wc_get_formatted_cart_item_data( $cart_item );
                                                ?>
                                            </p>
                                        </th>

                                        <td>
                                            <p class="mb-0 py-4"><?php echo $_product->get_sku() ? $_product->get_sku() : 'N/A'; ?></p>
                                        </td>

                                        <td>
                                            <p class="mb-0 py-4">
                                                <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                            </p>
                                        </td>

                                        <td>
                                            <div class="input-group quantity py-4" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-sm text-center border-0"
                                                    name="cart[<?php echo $cart_item_key; ?>][qty]"
                                                    value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"
                                                    title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"
                                                    inputmode="numeric"
                                                >
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-0 py-4">
                                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                            </p>
                                        </td>

                                        <td class="py-4">
                                            <?php
                                            // Nút xóa sản phẩm, giữ nguyên style của bạn
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

                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <div>
                        <input type="text" name="coupon_code" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                        <button type="submit" name="apply_coupon" class="btn btn-primary rounded-pill px-4 py-3" value="Apply Coupon">Apply Coupon</button>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-secondary rounded-pill px-4 py-3" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">Update Cart</button>
                        <?php // Thêm trường nonce để bảo mật form ?>
                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </div>
                </div>
            
            </form> <?php  ?>


            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0"><?php wc_cart_totals_subtotal_html(); ?></p>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div>
                                    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                                        <?php woocommerce_shipping_calculator(); // Hiển thị máy tính phí ship ?>
                                    <?php elseif ( WC()->cart->needs_shipping() ) : ?>
                                        <p class="mb-0"><?php _e( 'Shipping costs calculated at checkout.', 'woocommerce' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4"><?php wc_cart_totals_order_total_html(); ?></p>
                        </div>

                        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4">
                            Proceed Checkout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
get_footer(); // Tải footer.php từ theme 9shop của bạn
?>