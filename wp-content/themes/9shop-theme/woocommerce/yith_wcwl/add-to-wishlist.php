<?php
// wp-content/themes/9shop/woocommerce/yith_wcwl/add-to-wishlist.php

if (!defined('ABSPATH')) exit;

global $product;
$product_id = isset($product) ? $product->get_id() : 0;
?>

<div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo $product_id ?>">
    <div class="yith-wcwl-add-button">
        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . $product_id . '"]'); ?>
    </div>
    <div class="yith-wcwl-wishlistaddedbrowse"></div>
    <div class="yith-wcwl-wishlistexistsbrowse"></div>
</div>
<div class="clear"></div>