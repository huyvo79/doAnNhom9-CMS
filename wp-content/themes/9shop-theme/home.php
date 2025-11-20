<?php
/**
 * Template Name: blogs Page
 * Description: home blogs Page
 *
 * @package 9shop-theme
 */

get_header();
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_archive_title(); ?></h1>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); // Hoặc bạn có thể dùng breadcrumb khác nếu muốn ?>
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
                    <?php if (have_posts()): ?>
                        <?php
                        // Bắt đầu vòng lặp (The Loop)
                        while (have_posts()):
                            the_post(); ?>

                            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'style' => 'height: 220px; object-fit: cover;']); ?>
                                        </a>
                                    <?php else: ?>
                                        <!-- Ảnh dự phòng nếu bài viết không có ảnh đại diện -->
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
                                <p>Rất tiếc, không có bài viết nào trong chuyên mục này.</p>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="col-12 mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('<i class="fa fa-angle-left"></i>', '9shop-theme'),
                            'next_text' => __('<i class="fa fa-angle-right"></i>', '9shop-theme'),
                        ));
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
                <?php get_sidebar('blog'); // Gọi sidebar-blog.php nếu có, nếu không sẽ gọi sidebar.php ?>
            </div>

        </div>
    </div>
</div>
<!-- Main Content End -->

<?php get_footer(); ?>