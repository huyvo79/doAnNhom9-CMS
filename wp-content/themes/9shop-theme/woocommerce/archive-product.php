<?php get_header(); ?>

<main>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Shop Page</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <?php get_template_part('template-parts/service'); ?>

    <!-- Single Page Header End -->

    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                  <?php get_template_part('template-parts/sidebar-shop'); ?>


                <!-- Product Grid -->
                <div class="col-lg-9">
                    <?php get_template_part('template-parts/content-product-grid'); ?>
                </div>

            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/products-offer'); ?>
    <?php get_template_part('template-parts/bestSeller'); ?>
</main>

<?php get_footer(); ?>