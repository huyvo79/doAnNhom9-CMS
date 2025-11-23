<?php 
    // 1. Lấy ảnh từ Admin. Nếu chưa up thì dùng ảnh mặc định (sửa đường dẫn ảnh mặc định cho đúng folder theme của bạn)
    $default_bg = get_template_directory_uri() . '/assets/img/breadcrumb.jpg'; 
    $bg_img = get_theme_mod('breadcrumb_bg', $default_bg); 
?>

<div class="container-fluid page-header py-5" 
     style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url($bg_img); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover;">
     
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active text-white"><?php the_title(); ?></li>
    </ol>
</div>