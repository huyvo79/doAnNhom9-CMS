<?php
/*
Template Name: Trang Đơn Hàng
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
        // Kiểm tra xem user đã đăng nhập chưa
        if ( ! is_user_logged_in() ) {
            echo '<div class="alert alert-warning text-center">';
            echo '<p class="mb-3">Bạn cần đăng nhập để xem đơn hàng của mình.</p>';
            echo '<a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '" class="btn btn-primary rounded-pill px-4">Đăng Nhập</a>';
            echo '</div>';
        } else {
            $current_user = wp_get_current_user();
            $customer_orders = wc_get_orders( array(
                'customer' => get_current_user_id(),
                'limit'    => -1, // Lấy tất cả đơn hàng
            ) );
            
            if ( empty( $customer_orders ) ) {
                echo '<div class="text-center">';
                echo '<i class="fas fa-shopping-bag fa-4x text-muted mb-4"></i>';
                echo '<h4 class="text-muted mb-3">Chưa có đơn hàng nào</h4>';
                echo '<p class="text-muted mb-4">Hãy bắt đầu mua sắm để xem đơn hàng tại đây!</p>';
                echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="btn btn-primary rounded-pill px-4">Mua Sắm Ngay</a>';
                echo '</div>';
            } else {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Mã Đơn Hàng</th>
                                <th scope="col">Ngày Đặt</th>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( $customer_orders as $order ) {
                                $order_id = $order->get_id();
                                $order_date = $order->get_date_created()->format('d/m/Y');
                                $order_total = $order->get_formatted_order_total();
                                $order_status = wc_get_order_status_name( $order->get_status() );
                                $order_items = $order->get_items();
                                ?>
                                <tr>
                                    <td>
                                        <strong>#<?php echo esc_html( $order_id ); ?></strong>
                                    </td>
                                    <td><?php echo esc_html( $order_date ); ?></td>
                                    <td>
                                        <?php
                                        $product_count = 0;
                                        foreach ( $order_items as $item ) {
                                            $product_count++;
                                            if ( $product_count <= 2 ) {
                                                echo '<div class="mb-1">';
                                                echo esc_html( $item->get_name() );
                                                echo ' × ' . $item->get_quantity();
                                                echo '</div>';
                                            }
                                        }
                                        if ( count( $order_items ) > 2 ) {
                                            echo '<small class="text-muted">+ ' . ( count( $order_items ) - 2 ) . ' sản phẩm khác</small>';
                                        }
                                        ?>
                                    </td>
                                    <td class="fw-bold text-primary"><?php echo $order_total; ?></td>
                                    <td>
                                        <?php
                                        $status_class = '';
                                        switch ( $order->get_status() ) {
                                            case 'completed':
                                                $status_class = 'badge bg-success';
                                                break;
                                            case 'processing':
                                                $status_class = 'badge bg-primary';
                                                break;
                                            case 'on-hold':
                                                $status_class = 'badge bg-warning';
                                                break;
                                            case 'cancelled':
                                                $status_class = 'badge bg-danger';
                                                break;
                                            default:
                                                $status_class = 'badge bg-secondary';
                                        }
                                        ?>
                                        <span class="<?php echo $status_class; ?>"><?php echo esc_html( $order_status ); ?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" 
                                           class="btn btn-sm btn-outline-primary rounded-pill">
                                            <i class="fas fa-eye me-1"></i> Xem
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Thống kê đơn hàng -->
                <div class="row mt-5">
                    <div class="col-md-3 col-6 text-center">
                        <div class="border rounded p-4">
                            <i class="fas fa-shopping-bag fa-2x text-primary mb-3"></i>
                            <h4 class="text-primary"><?php echo count( $customer_orders ); ?></h4>
                            <p class="mb-0">Tổng Đơn Hàng</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 text-center">
                        <div class="border rounded p-4">
                            <i class="fas fa-check-circle fa-2x text-success mb-3"></i>
                            <h4 class="text-success">
                                <?php
                                $completed_orders = array_filter( $customer_orders, function( $order ) {
                                    return $order->get_status() === 'completed';
                                } );
                                echo count( $completed_orders );
                                ?>
                            </h4>
                            <p class="mb-0">Đã Hoàn Thành</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 text-center">
                        <div class="border rounded p-4">
                            <i class="fas fa-sync-alt fa-2x text-warning mb-3"></i>
                            <h4 class="text-warning">
                                <?php
                                $processing_orders = array_filter( $customer_orders, function( $order ) {
                                    return $order->get_status() === 'processing';
                                } );
                                echo count( $processing_orders );
                                ?>
                            </h4>
                            <p class="mb-0">Đang Xử Lý</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 text-center">
                        <div class="border rounded p-4">
                            <i class="fas fa-truck fa-2x text-info mb-3"></i>
                            <h4 class="text-info">
                                <?php
                                $shipped_orders = array_filter( $customer_orders, function( $order ) {
                                    return in_array( $order->get_status(), ['shipped', 'on-hold'] );
                                } );
                                echo count( $shipped_orders );
                                ?>
                            </h4>
                            <p class="mb-0">Đang Giao</p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>