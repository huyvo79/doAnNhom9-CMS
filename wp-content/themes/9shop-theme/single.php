<?php get_header(); ?>
<!-- Breadcrumb -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>
<div class="container-fluid blog-single-page px-5">

    <!-- Single Page Header End -->
    <div class="row">

        <!-- MAIN CONTENT -->
        <div class="col-lg-8 col-md-8">
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

                    <!-- RELATED POSTS -->
                    <div class="related-posts">
                        <?php echo do_shortcode( '[the-post-grid id="221" title="Bài viết liên quan"]' ); ?>
                    </div>

                <?php endwhile;
            endif;
            ?>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4 col-md-4">
            <?php if (is_active_sidebar('blog-sidebar')): ?>
                <?php dynamic_sidebar('blog-sidebar'); ?>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>