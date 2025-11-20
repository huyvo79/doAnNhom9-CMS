<?php
/**
 * Template Name: page-news
 * Description: Mẫu trang hiển thị tin tức tổng hợp từ RSS Aggregator.
 * * Đây là một Page Template tùy chỉnh.
 */

// Lấy Header của theme (bao gồm cả navigation, menu, v.v.)
get_header(); 
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Bắt đầu vòng lặp WordPress (The Loop)
        while ( have_posts() ) :
            the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <!-- Hiển thị Tiêu đề Trang -->
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <!-- Nội dung chính của trang (nếu có) -->
                <?php the_content(); ?>

                <hr style="margin: 30px 0; border: 0.5px solid #eee;">
                
                <!-- 
                ===============================================
                KHU VỰC HIỂN THỊ TIN TỨC TỔNG HỢP (RSS Aggregator)
                ===============================================
                Sử dụng Shortcode của plugin WP RSS Aggregator 
                để hiển thị danh sách tin tức.
                -->
                <div class="rss-aggregator-display">
                    <h2>Danh Sách Tin Tức Công Nghệ Mới Nhất</h2>
                    <?php 
                    // Echo Shortcode của WP RSS Aggregator
                    echo do_shortcode('[wp-rss-aggregator]'); 
                    ?>
                </div>

            </div><!-- .entry-content -->
        </article><!-- #post-## -->

        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
// Lấy Sidebar và Footer của theme
// get_sidebar(); // Nếu bạn muốn có sidebar, hãy bỏ dấu comment
get_footer();
?>