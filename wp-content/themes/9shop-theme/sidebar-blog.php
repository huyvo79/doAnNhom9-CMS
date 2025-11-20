<?php
/**
 * The sidebar containing the main widget area for blog/archive pages.
 *
 * @package 9shop-theme
 */

if (is_active_sidebar('blog-sidebar')): ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('blog-sidebar'); ?>
    </aside><!-- #secondary -->
<?php endif; ?>