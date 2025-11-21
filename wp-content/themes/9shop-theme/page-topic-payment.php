<?php
/* Template Name: Help Topic - Payment */
get_header();
?>

<div class="topic-header">
    <div class="container">
        <div class="breadcrumb">
            <?php woocommerce_breadcrumb(); ?>
        </div>
        <h1 class="">Mọi thứ về Thanh toán & Hoàn tiền</h1>
    </div>
</div>
<div class="container topic-container">
    <div class="row-topic">

        <aside class="topic-sidebar">
            <div class="sticky-menu">
                <h3>Mục lục</h3>
                <ul>
                    <li><a href="#section-methods">1. Phương thức thanh toán</a></li>
                    <li><a href="#section-cod">2. Thanh toán khi nhận hàng (COD)</a></li>
                    <li><a href="#section-security">3. Bảo mật thông tin</a></li>
                    <li><a href="#section-refund">4. Chính sách hoàn tiền</a></li>
                    <li><a href="#section-faq">5. Lỗi thường gặp</a></li>
                </ul>
                <div class="sidebar-support">
                    <p>Cần trợ giúp gấp?</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('support-center'))); ?>"
                        class="btn-small">Liên hệ ngay</a>
                </div>
            </div>
        </aside>

        <main class="topic-content">

            <section id="section-methods" class="content-section">
                <h2>1. Các phương thức thanh toán được chấp nhận</h2>
                <p>Chúng tôi hỗ trợ đa dạng các cổng thanh toán để thuận tiện nhất cho bạn:</p>

                <div class="payment-methods-grid">
                    <div class="method-item">
                        <i class="fa fa-credit-card"></i>
                        <strong>Thẻ Quốc tế</strong>
                        <span>Visa, Master, JCB</span>
                    </div>
                    <div class="method-item">
                        <i class="fa fa-university"></i>
                        <strong>Thẻ ATM / Internet Banking</strong>
                        <span>Hỗ trợ 40+ ngân hàng</span>
                    </div>
                    <div class="method-item">
                        <i class="fa fa-qrcode"></i>
                        <strong>Ví điện tử</strong>
                        <span>Momo, ZaloPay, ShopeePay</span>
                    </div>
                </div>
            </section>

            <section id="section-cod" class="content-section">
                <h2>2. Thanh toán khi nhận hàng (COD)</h2>
                <p>Áp dụng cho đơn hàng có giá trị dưới <strong>5.000.000đ</strong>.</p>
                <div class="alert-box info">
                    <strong>Lưu ý:</strong> Vui lòng chuẩn bị đúng số tiền hoặc chuyển khoản cho shipper khi nhận hàng.
                    Bạn được quyền kiểm tra ngoại quan kiện hàng trước khi thanh toán.
                </div>
            </section>

            <section id="section-security" class="content-section">
                <h2>3. Bảo mật thông tin thẻ</h2>
                <p>Chúng tôi cam kết bảo mật tuyệt đối thông tin giao dịch của khách hàng:</p>
                <ul class="check-list">
                    <li>Giao thức mã hóa SSL 256-bit.</li>
                    <li>Không lưu trữ thông tin CVV/CVC của thẻ.</li>
                    <li>Hệ thống thanh toán đạt chuẩn PCI DSS.</li>
                </ul>
            </section>

            <section id="section-refund" class="content-section">
                <h2>4. Quy trình & Thời gian hoàn tiền</h2>
                <p>Nếu đơn hàng bị hủy hoặc trả hàng thành công, tiền sẽ được hoàn về tài khoản gốc:</p>
                <table class="refund-table">
                    <thead>
                        <tr>
                            <th>Phương thức</th>
                            <th>Thời gian xử lý (Ngày làm việc)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ví điện tử (Momo/ZaloPay)</td>
                            <td>1 - 3 ngày</td>
                        </tr>
                        <tr>
                            <td>Thẻ ATM nội địa</td>
                            <td>3 - 5 ngày</td>
                        </tr>
                        <tr>
                            <td>Thẻ Visa/Mastercard</td>
                            <td>7 - 14 ngày (tùy ngân hàng)</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section id="section-faq" class="content-section">
                <h2>5. Tại sao thanh toán của tôi bị lỗi?</h2>
                <p>Một số nguyên nhân phổ biến:</p>
                <ul>
                    <li>Thẻ chưa kích hoạt tính năng thanh toán online.</li>
                    <li>Số dư tài khoản không đủ.</li>
                    <li>Kết nối mạng bị gián đoạn trong quá trình xử lý.</li>
                </ul>
                <p>Nếu vẫn không thanh toán được, vui lòng chụp ảnh màn hình lỗi và gửi cho bộ phận Support.</p>
            </section>

        </main>
    </div>
</div>

<?php get_footer(); ?>