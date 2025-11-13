<?php get_header(); ?>

<main>
  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Shop Page</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
  </div>
  <!-- Single Page Header End -->

  <div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                ...
            </div>
            
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-5" class="tab-pane fade show p-0 active">
                        <div class="row g-4 product">
                            
                            <?php
                            // Kiểm tra xem có sản phẩm nào để hiển thị không
                            if ( have_posts() ) {
                                
                                // Bắt đầu vòng lặp
                                while ( have_posts() ) {
                                    the_post(); // Thiết lập dữ liệu bài viết/sản phẩm
                                    
                                    // Chèn template content-product.php để hiển thị từng sản phẩm
                                    // File này chịu trách nhiệm gói mỗi sản phẩm trong thẻ <li> hoặc <div>
                                    wc_get_template_part( 'content', 'product' ); 
                                }
                                
                            } else {
                                // Không tìm thấy sản phẩm
                                do_action( 'woocommerce_no_products_found' );
                            }
                            ?>
                            
                        </div>
                    </div>
                    
                    ...
                    
                </div>
                
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="pagination d-flex justify-content-center mt-5">
                        <?php 
                        // Hàm tạo link phân trang động của WooCommerce
                        woocommerce_pagination(); 
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

  <?php get_template_part('template-parts/service'); ?>
  <?php get_template_part('template-parts/products-offer'); ?>
  <?php get_template_part('template-parts/bestSeller'); ?>
</main>

<?php get_footer(); ?>