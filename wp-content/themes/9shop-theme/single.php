<?php get_header(); ?>
<!-- Breadcrumb -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <?php woocommerce_breadcrumb(); ?>
    </ol>
</div>
<div class="container blog-single-page">

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

                    <!-- RELATED POSTS -->
                    <div class="related-posts">
                        <h3>Bài viết liên quan</h3>

                        <?php
                        $related = new WP_Query([
                            'category__in' => wp_get_post_categories(get_the_ID()),
                            'posts_per_page' => 3,
                            'post__not_in' => [get_the_ID()],
                        ]);

                        if ($related->have_posts()):
                            echo '<div class="row">';
                            while ($related->have_posts()):
                                $related->the_post(); ?>

                                <div class="col-md-4 related-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                </div>

                            <?php endwhile;
                            echo '</div>';
                        endif;

                        wp_reset_postdata();
                        ?>
                    </div>

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
</div>

<?php get_footer(); ?>