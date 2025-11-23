<?php
// wp-content/themes/9shop/woocommerce/yith_wcwl/wishlist-button.php

if (!defined('ABSPATH')) exit;

echo do_shortcode('[yith_wcwl_add_to_wishlist 
    icon="far fa-heart" 
    label="Yêu thích" 
    already_in_wishlist_text="Đã yêu thích" 
    product_added_text="Đã thêm!" 
    browse_wishlist_text="Xem danh sách"]');
?>