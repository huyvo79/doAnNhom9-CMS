<?php
/*
Template Name: Theo Dõi Đơn Hàng (Tự động - Đã đăng nhập)
Description: Khách đã đăng nhập sẽ thấy ngay tất cả đơn hàng của mình + có thể hủy đơn
*/
get_header();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <?php if (!is_user_logged_in()): ?>
                <!-- Chưa đăng nhập -->
                <div class="text-center py-5 bg-light rounded shadow-sm">
                    <i class="fas fa-user-lock fa-5x text-warning mb-4"></i>
                    <h3 class="mb-4">Bạn cần đăng nhập để theo dõi đơn hàng</h3>
                    <p class="text-muted mb-4">Đăng nhập ngay để xem toàn bộ đơn hàng và trạng thái giao hàng của bạn.</p>
                    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Đăng Nhập Ngay
                    </a>
                </div>

            <?php else: 
                // Đã đăng nhập → lấy tất cả đơn hàng của khách
                $customer_id = get_current_user_id();
                $customer_orders = wc_get_orders([
                    'customer_id' => $customer_id,
                    'limit'       => -1, // lấy hết
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'status'      => ['wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending', 'wc-cancelled', 'wc-refunded', 'wc-failed'],
                ]);
                ?>

                <h2 class="text-center text-primary mb-5">
                    <i class="fas fa-box-open me-2"></i>
                    Đơn hàng của bạn (<?php echo count($customer_orders); ?> đơn)
                </h2>

                <?php if (empty($customer_orders)): ?>
                    <div class="text-center py-5 bg-light rounded">
                        <i class="fas fa-shopping-bag fa-4x text-muted mb-4"></i>
                        <h4>Bạn chưa có đơn hàng nào</h4>
                        <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-primary rounded-pill px-5 py-3 mt-3">
                            <i class="fas fa-shopping-cart me-2"></i> Mua sắm ngay
                        </a>
                    </div>
                <?php else: ?>
                    <div class="accordion" id="ordersAccordion">
                        <?php foreach ($customer_orders as $index => $order): 
                            $can_cancel = in_array($order->get_status(), ['pending', 'on-hold', 'processing']);
                        ?>
                            <div class="accordion-item mb-3 border rounded shadow-sm overflow-hidden">
                                <h2 class="accordion-header" id="heading<?php echo $order->get_id(); ?>">
                                    <button class="accordion-button <?php echo $index > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $order->get_id(); ?>">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <strong>Đơn hàng #<?php echo $order->get_order_number(); ?></strong>
                                                <span class="badge <?php echo $order->get_status() === 'completed' ? 'bg-success' : ($order->get_status() === 'cancelled' ? 'bg-danger' : 'bg-warning'); ?> ms-2">
                                                    <?php echo wc_get_order_status_name($order->get_status()); ?>
                                                </span>
                                            </div>
                                            <div class="text-muted small">
                                                <?php echo wc_format_datetime($order->get_date_created(), 'd/m/Y H:i'); ?>
                                                — Tổng: <strong class="text-primary"><?php echo $order->get_formatted_order_total(); ?></strong>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $order->get_id(); ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" data-bs-parent="#ordersAccordion">
                                    <div class="accordion-body">
                                        <!-- Danh sách sản phẩm -->
                                        <div class="table-responsive mb-3">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Sản phẩm</th>
                                                        <th class="text-center">SL</th>
                                                        <th class="text-end">Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($order->get_items() as $item): 
                                                        $product = $item->get_product();
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php if ($product): ?>
                                                                    <a href="<?php echo get_permalink($product->get_id()); ?>" target="_blank">
                                                                        <?php echo esc_html($item->get_name()); ?>
                                                                    </a>
                                                                <?php else:
                                                                    echo esc_html($item->get_name());
                                                                endif; ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $item->get_quantity(); ?></td>
                                                            <td class="text-end"><?php echo wc_price($item->get_total()); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Thông tin thêm -->
                                        <div class="row text-muted small">
                                            <div class="col-md-6">
                                                <strong>Thanh toán:</strong> <?php echo $order->get_payment_method_title(); ?><br>
                                                <strong>Giao hàng:</strong> <?php echo $order->get_shipping_method(); ?>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <?php if ($can_cancel): ?>
                                                    <form method="post" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?\nHành động này không thể hoàn tác!');">
                                                        <?php wp_nonce_field('cancel_order_' . $order->get_id(), 'cancel_nonce'); ?>
                                                        <input type="hidden" name="cancel_order_id" value="<?php echo $order->get_id(); ?>">
                                                        <button type="submit" name="cancel_order_submit" class="btn btn-danger btn-sm rounded-pill">
                                                            <i class="fas fa-times-circle"></i> Hủy đơn hàng
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <span class="text-success"><i class="fas fa-check-circle"></i> Hủy thành công(đã xử lý)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php 
                // Xử lý hủy đơn hàng (phía server)
                if (isset($_POST['cancel_order_submit']) && isset($_POST['cancel_order_id'])) {
                    $order_id = absint($_POST['cancel_order_id']);
                    $order    = wc_get_order($order_id);

                    if ($order && $order->get_customer_id() === get_current_user_id() && wp_verify_nonce($_POST['cancel_nonce'], 'cancel_order_' . $order_id)) {
                        if (in_array($order->get_status(), ['pending', 'on-hold', 'processing'])) {
                            $order->update_status('cancelled', 'Khách hàng hủy đơn hàng qua trang theo dõi.');
                            wc_add_notice('Đơn hàng #' . $order->get_order_number() . ' đã được hủy thành công!', 'success');
                            wp_redirect(remove_query_arg(['cancel_order_submit', 'cancel_order_id', '_wpnonce']));
                            exit;
                        }
                    }
                }
                // Hiển thị thông báo WooCommerce
                wc_print_notices();
                ?>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>