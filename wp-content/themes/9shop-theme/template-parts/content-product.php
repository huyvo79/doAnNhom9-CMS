<?php
defined( 'ABSPATH' ) || exit;
global $product;
?>
<article class="product-item">
  <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ) the_post_thumbnail('product-thumb'); else echo '<img src="'.get_template_directory_uri().'/assets/images/placeholder.png" alt="">'; ?>
    <h2><?php the_title(); ?></h2>
    <span class="price"><?php echo $product->get_price_html(); ?></span>
  </a>
</article>
