<?php get_header(); ?>
<!-- Breadcrumb -->
<div class="container-fluid page-header py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 text-white"><?php the_title(); ?></h1>
    </div>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); // Hoặc bạn có thể dùng breadcrumb khác nếu muốn ?>
    </ol>
</div>
<div class="container-fluid blog-single-page px-5">

    <!-- Single Page Header End -->
    <div class="row">

        <!-- MAIN CONTENT -->
        <div class="col-lg-9 col-md-9">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <article class="single-post-container">

                        <h1 class="post-title"><?php the_title(); ?></h1>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> <?php the_author(); ?></span>
                            <span><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span>
                        </div>

                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tag -->
                        <div class="post-tags">
                            <?php the_tags('Tags: ', ', '); ?>
                        </div>

                    </article>
                <?php endwhile;
            endif;
            ?>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-3 col-md-3">
            <?php if (is_active_sidebar('blog-sidebar')): ?>
                <?php dynamic_sidebar('blog-sidebar'); ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- RELATED POSTS -->
    <div class="related-posts">
        <?php echo do_shortcode('[the-post-grid id="221" title="Bài viết liên quan"]'); ?>
    </div>
    <div class="bg-light p-4 rounded shadow-sm mb-5 mt-5">
        <h4 class="mb-5 text-center">Sản phẩm mới nhất</h4>
        <?php echo do_shortcode('[sp_wpcarousel id="360"]'); ?>
    </div>
</div>

<?php get_footer(); ?>