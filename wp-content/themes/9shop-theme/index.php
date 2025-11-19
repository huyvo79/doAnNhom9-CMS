<?php get_header(); ?>
<main>
<?php get_template_part('template-parts/carousel'); ?>

<?php get_template_part('template-parts/service'); ?>
<?php get_template_part('template-parts/products-offer'); ?>
<?php get_template_part('template-parts/our-products'); ?>
<?php get_template_part('template-parts/all-product-items'); ?>
<?php get_template_part('template-parts/bestSeller'); ?>
<?php echo do_shortcode('[the-post-grid id="197" title=""]'); ?>
</main>

<?php get_footer(); ?>