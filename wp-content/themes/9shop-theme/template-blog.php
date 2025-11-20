<?php
/**
 * Template Name: Blog Index Page
 *
 * Đây là template để hiển thị tất cả bài viết (tin tức).
 */

get_header();
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_title(); ?></h1>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>
<!-- Page Header End -->

<!-- Main Content Start -->
<div class="container-fluid px-5">
    <div class="container-fluid">
        <div class="row">
            <!-- Blog Posts Column -->
            <div class="col-lg-9">
                <div class="row g-4">
                    <?php
                    // Thiết lập query để lấy tất cả bài viết, có phân trang
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 10, // Bạn có thể thay đổi số bài viết mỗi trang
                        'paged' => $paged,
                    );
                    $blog_query = new WP_Query($args);

                    if ($blog_query->have_posts()):
                        while ($blog_query->have_posts()):
                            $blog_query->the_post(); ?>

                            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'style' => 'height: 220px; object-fit: cover;']); ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg"
                                                class="card-img-top" style="height: 220px; object-fit: cover;" alt="No image">
                                        </a>
                                    <?php endif; ?>

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">
                                            <a href="<?php the_permalink(); ?>"
                                                class="text-dark text-decoration-none stretched-link"><?php the_title(); ?></a>
                                        </h5>

                                        <div class="post-meta text-muted small mb-3">
                                            <span><i class="fa fa-user me-1"></i> <?php the_author(); ?></span>
                                            <span class="ms-3"><i class="fa fa-clock me-1"></i>
                                                <?php echo get_the_date(); ?></span>
                                        </div>

                                        <div class="card-text text-muted mb-4">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="mt-auto">
                                            <a href="<?php the_permalink(); ?>"
                                                class="btn btn-sm btn-primary rounded-pill px-3">Read more <i
                                                    class="fa fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                <h2>Không tìm thấy bài viết</h2>
                                <p>Rất tiếc, chưa có bài viết nào được đăng.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="col-12 mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        // Hiển thị phân trang cho query tùy chỉnh
                        echo paginate_links(array(
                            'total' => $blog_query->max_num_pages,
                            'prev_text' => __('<i class="fa fa-angle-left"></i>', '9shop-theme'),
                            'next_text' => __('<i class="fa fa-angle-right"></i>', '9shop-theme'),
                        ));
                        wp_reset_postdata(); // Khôi phục lại dữ liệu post gốc
                        ?>
                    </div>
                </div>

                <div class="bg-light p-4 rounded shadow-sm mb-5 mt-5">
                    <h4 class="mb-5 text-center section-title-highlight">Latest product</h4>
                    <?php echo do_shortcode('[sp_wpcarousel id="360"]'); ?>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Main Content End -->

<?php get_footer(); ?>