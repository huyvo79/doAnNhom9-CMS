<?php
/**
 * Template Name: Default Page
 * Description: Template chuẩn để hiển thị nội dung các trang con (Page)
 */

get_header(); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" 
     style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo get_theme_mod('breadcrumb_bg'); ?>'), #333 no-repeat center center; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center text-uppercase mb-0">
                <?php woocommerce_breadcrumb(); ?>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <div class="bg-white p-4 rounded shadow-sm content-wrapper">
                            <?php the_content(); ?>
                        </div>
                        <?php
                    endwhile;
                else :
                    echo '<p>Không có nội dung.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>