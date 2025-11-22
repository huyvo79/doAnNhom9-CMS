<?php
/*
Template Name: FAQ - Hỏi Đáp
*/
get_header(); ?>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php the_title(); ?></h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active text-white"><?php the_title(); ?></li>
    </ol>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2 class="text-center text-primary mb-5">Câu Hỏi Thường Gặp</h2>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1">
                            Sản phẩm bán tại 9Shop có chính hãng không?
                        </button>
                    </h2>
                    <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            100% chính hãng. Mọi sản phẩm đều có tem bảo hành điện tử và hóa đơn đỏ.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                            Có hỗ trợ trả góp 0% không?
                        </button>
                    </h2>
                    <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Có! Hỗ trợ trả góp 0% qua thẻ tín dụng và công ty tài chính (Home Credit, FE Credit, HD Saison).
                        </div>
                    </div>
                </div>
                <!-- Thêm 8-10 câu hỏi nữa tùy ý -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>