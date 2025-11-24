<?php get_header(); ?>

<?php
// 2. Lấy dữ liệu 404 từ Admin
$title = get_theme_mod('error_404_title', 'Page Not Found');
$desc = get_theme_mod('error_404_desc', 'We’re sorry, the page you have looked for does not exist in our website!');
$btn = get_theme_mod('error_404_btn', 'Go Back To Home');
$image = get_theme_mod('error_404_image'); // Ảnh minh họa custom
?>
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <?php if ($image): ?>
                    <div class="mb-4 wow bounceIn" data-wow-delay="0.1s">
                        <img src="<?php echo esc_url($image); ?>" alt="404 Error" class="img-fluid"
                            style="max-height: 250px;">
                    </div>
                <?php else: ?>
                    <i class="bi bi-exclamation-triangle display-1 text-secondary wow bounceIn" data-wow-delay="0.1s"></i>
                    <h1 class="display-1">404</h1>
                <?php endif; ?>

                <h1 class="mb-4"><?php echo esc_html($title); ?></h1>
                <p class="mb-4"><?php echo esc_html($desc); ?></p>

                <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo esc_html($btn); ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>