<?php
/*
Template Name: Trang Đơn Hàng
*/

get_header();  

// Thiết lập phân trang
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$posts_per_page = 10; // Số đơn hàng trên 1 trang
?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Lịch sử đơn hàng</li>
    </ol>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <?php
        if ( ! is_user_logged_in() ) {
            ?>
            <div class="text-center py-5">
                <i class="fas fa-user-lock fa-4x text-warning mb-4"></i>
                <h3>Bạn chưa đăng nhập</h3>
                <p class="mb-4">Vui lòng đăng nhập để xem lịch sử đơn hàng của bạn.</p>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="btn btn-primary rounded-pill px-5 py-3">Đăng Nhập / Đăng Ký</a>
            </div>
            <?php
        } else {
            $customer_id = get_current_user_id();
            
            // Lấy danh sách đơn hàng với phân trang
            $args = array(
                'customer_id' => $customer_id,
                'limit'       => $posts_per_page,
                'page'        => $paged,
                'paginate'    => true, // Bật chế độ trả về object phân trang
            );
            
            $orders_data = wc_get_orders( $args );
            
            // wc_get_orders với paginate=true trả về object (orders, total, max_num_pages)
            $customer_orders = $orders_data->orders;
            $total_pages     = $orders_data->max_num_pages;

            if ( empty( $customer_orders ) ) {
                ?>
                <div class="text-center py-5 bg-light rounded">
                    <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
                    <h4 class="text-muted mb-3">Bạn chưa có đơn hàng nào</h4>
                    <p class="text-muted mb-4">Hãy bắt đầu mua sắm để xem đơn hàng tại đây!</p>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary rounded-pill px-5 py-3">Mua Sắm Ngay</a>
                </div>
                <?php
            } else {
                ?>
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 text-primary"><i class="fas fa-list-alt me-2"></i>Danh sách đơn hàng</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="py-3 ps-4">Mã Đơn</th>
                                    <th scope="col" class="py-3">Ngày Đặt</th>
                                    <th scope="col" class="py-3">Sản Phẩm</th>
                                    <th scope="col" class="py-3">Tổng Tiền</th>
                                    <th scope="col" class="py-3">Trạng Thái</th>
                                    <th scope="col" class="py-3 text-end pe-4">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ( $customer_orders as $order ) {
                                    $order_id = $order->get_id();
                                    $order_date = $order->get_date_created()->format('d/m/Y H:i');
                                    $order_total = $order->get_formatted_order_total();
                                    $order_status = wc_get_order_status_name( $order->get_status() );
                                    $status_slug = $order->get_status();
                                    $order_items = $order->get_items();
                                    
                                    // Class màu sắc cho badge trạng thái
                                    $badge_class = 'bg-secondary';
                                    if($status_slug == 'completed') $badge_class = 'bg-success';
                                    if($status_slug == 'processing') $badge_class = 'bg-primary';
                                    if($status_slug == 'on-hold') $badge_class = 'bg-warning text-dark';
                                    if($status_slug == 'cancelled' || $status_slug == 'failed') $badge_class = 'bg-danger';
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <strong>#<?php echo esc_html( $order->get_order_number() ); ?></strong>
                                        </td>
                                        <td><?php echo esc_html( $order_date ); ?></td>
                                        <td>
                                            <?php
                                            $product_names = array();
                                            foreach ( $order_items as $item ) {
                                                $product_names[] = $item->get_name() . ' x' . $item->get_quantity();
                                            }
                                            // Hiển thị 2 sản phẩm đầu, còn lại thu gọn
                                            echo '<span class="d-block text-truncate" style="max-width: 250px;" title="' . implode(', ', $product_names) . '">';
                                            echo implode(', ', $product_names);
                                            echo '</span>';
                                            ?>
                                        </td>
                                        <td class="fw-bold text-primary"><?php echo $order_total; ?></td>
                                        <td>
                                            <span class="badge rounded-pill <?php echo $badge_class; ?>"><?php echo esc_html( $order_status ); ?></span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" 
                                               class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                Xem <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php if ( $total_pages > 1 ) : ?>
                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Page navigation">
                            <?php
                            echo paginate_links( array(
                                'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'format'    => '?paged=%#%',
                                'current'   => max( 1, $paged ),
                                'total'     => $total_pages,
                                'type'      => 'list',
                                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                                'next_text' => '<i class="fas fa-chevron-right"></i>',
                                'mid_size'  => 2
                            ) );
                            ?>
                        </nav>
                        <style>
                            .page-numbers { display: flex; list-style: none; padding: 0; }
                            .page-numbers li { margin: 0 3px; }
                            .page-numbers li a, .page-numbers li span {
                                display: block; padding: 8px 16px; border: 1px solid #dee2e6; 
                                border-radius: 50px; color: #0d6efd; text-decoration: none;
                            }
                            .page-numbers li span.current {
                                background-color: #0d6efd; color: white; border-color: #0d6efd;
                            }
                            .page-numbers li a:hover { background-color: #e9ecef; }
                        </style>
                    </div>
                <?php endif; ?>
                
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>