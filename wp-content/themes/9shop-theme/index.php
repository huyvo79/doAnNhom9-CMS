<?php
/**
 * Template Name: Home page
 * Description: Template để hiển thị các thành phần chính của cửa hàng.
 *
 * @package 9shop-theme
 */
?>
<?php get_header(); ?>
<main>
    <?php get_template_part('template-parts/carousel'); ?>

    <?php get_template_part('template-parts/service'); ?>
    <?php get_template_part('template-parts/products-offer'); ?>
    <?php get_template_part('template-parts/our-products'); ?>
    <?php get_template_part('template-parts/all-product-items'); ?>
    <?php get_template_part('template-parts/bestSeller'); ?>
    <div class="container">

        <?php echo do_shortcode('[the-post-grid id="214" title=""]'); ?>
    </div>
</main>

<?php get_footer(); ?>