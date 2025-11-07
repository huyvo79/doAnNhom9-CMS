<?php
/**
 * Banner Section
 * 
 * slug: electronics-retail-shop/banner
 * title: Banner
 * categories: electronics-retail-shop
 */

return array(
    'title'      =>__( 'Banner', 'electronics-retail-shop' ),
    'categories' => array( 'electronics-retail-shop' ),
    'content'    => '<!-- wp:group {"className":"electronics-retail-shop-banner-section","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div id="banner" class="wp-block-group electronics-retail-shop-banner-section" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"dimRatio":50,"isUserOverlayColor":true,"minHeightUnit":"px","gradient":"primary-gradient","contentPosition":"center center","isDark":false,"sizeSlug":"full","className":"banner-section banner-main","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%","wideSize":""}} -->
<div class="wp-block-cover is-light banner-section banner-main" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-gradient has-primary-gradient-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"secaccent","layout":{"type":"constrained","contentSize":"100%","wideSize":"100%"}} -->
<div class="wp-block-group has-secaccent-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"className":"main-banner","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns main-banner" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"banner-column01"} -->
<div class="wp-block-column is-vertically-aligned-center banner-column01" style="flex-basis:10%"><!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","openInNewTab":true,"className":"is-style-logos-only banner-social-icon","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"vertical"}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only banner-social-icon"><!-- wp:social-link {"url":"www.facebook.com","service":"facebook"} /-->

<!-- wp:social-link {"url":"www.twitter.com","service":"x"} /-->

<!-- wp:social-link {"url":"www.instagram.com","service":"instagram"} /-->

<!-- wp:social-link {"url":"www.pintrest.com","service":"pinterest"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"50%","className":"banner-left fadeInLeft wow","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-top banner-left fadeInLeft wow" style="padding-top:0;padding-bottom:0;flex-basis:50%"><!-- wp:columns {"verticalAlignment":"top","className":"banner-col01","style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}},"border":{"radius":"0px"}}} -->
<div class="wp-block-columns are-vertically-aligned-top banner-col01" style="border-radius:0px;margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"banner-header","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-header"><!-- wp:group {"className":"banner-header-top","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group banner-header-top"><!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|thirdaccent"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"thirdaccent"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"banner-wishlist"} -->
<p class="banner-wishlist"><a href="#"><img class="wp-image-83" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></a></p>
<!-- /wp:paragraph -->

<!-- wp:woocommerce/cart-link {"className":"banner-cart","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} /-->

<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"alt","iconClass":"wc-block-customer-account__account-icon","className":"banner-account","textColor":"background","fontSize":"medium","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-header-bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"background","layout":{"type":"constrained","contentSize":"100%","justifyContent":"left"}} -->
<div class="wp-block-group banner-header-bottom has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)"><!-- wp:navigation {"textColor":"secaccent","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"is-head-menu","style":{"typography":{"fontStyle":"normal","fontWeight":"400","textTransform":"capitalize"},"spacing":{"blockGap":"var:preset|spacing|60"}},"fontSize":"small","fontFamily":"inter","layout":{"type":"flex","justifyContent":"left"}} --><!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    <!-- wp:navigation-link {"label":"Shop","type":"","url":"#aboutus","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"categories","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

    <!-- wp:navigation-link {"label":"Get Pro","type":"","url":"https://www.wpradiant.net/products/electronics-store-wordpress-theme","kind":"custom","isTopLevelLink":true,"className":"getpro"} /-->

    <!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search For Product......","width":400,"widthUnit":"px","buttonText":"Search","buttonUseIcon":true,"query":{"post_type":"product"},"className":"banner-search","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"thirdaccent","textColor":"background","namespace":"woocommerce/product-search"} /-->

<!-- wp:heading {"className":"banner-heading","style":{"typography":{"fontStyle":"normal","fontWeight":"900","fontSize":"40px","lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"roboto"} -->
<h2 class="wp-block-heading banner-heading has-background-color has-text-color has-link-color has-roboto-font-family" style="font-size:40px;font-style:normal;font-weight:900;line-height:1.3">'. esc_html__('Next-Gen Tech, ','electronics-retail-shop').'<a href="#">'. esc_html__('Right at Your ','electronics-retail-shop').'</a><br>'. esc_html__('Fingertips','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"short-para-text","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"upper-heading","fontFamily":"inter"} -->
<p class="short-para-text has-background-color has-text-color has-link-color has-inter-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:400;line-height:1.5">'. esc_html__('Discover cutting-edge gadgets and electronics built for the future.','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|50"},"padding":{"left":"0"}},"border":{"radius":"0px"}},"fontSize":"medium","fontFamily":"rubik"} -->
<div class="wp-block-buttons has-custom-font-size has-rubik-font-family has-medium-font-size" style="border-radius:0px;padding-left:0;font-style:normal;font-weight:400"><!-- wp:button {"backgroundColor":"thirdaccent","textColor":"background","className":"is-style-outline slider-button01","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"width":"0px","style":"none","radius":{"topLeft":"6px","topRight":"30px","bottomLeft":"6px","bottomRight":"30px"}},"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontSize":"medium","fontFamily":"inter"} -->
<div class="wp-block-button is-style-outline slider-button01"><a class="wp-block-button__link has-background-color has-thirdaccent-background-color has-text-color has-background has-link-color has-inter-font-family has-medium-font-size has-custom-font-size wp-element-button" href="#" style="border-style:none;border-width:0px;border-top-left-radius:6px;border-top-right-radius:30px;border-bottom-left-radius:6px;border-bottom-right-radius:30px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50);font-style:normal;font-weight:600">'. esc_html__('Shop Now ','electronics-retail-shop').'<i class="fa-solid fa-circle-right"></i></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"banner-bottom-card","style":{"border":{"radius":{"bottomRight":"0%","topRight":"170px"}},"spacing":{"padding":{"right":"var:preset|spacing|60","left":"0"}}},"backgroundColor":"accent","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-bottom-card has-accent-background-color has-background" style="border-top-right-radius:170px;border-bottom-right-radius:0%;padding-right:var(--wp--preset--spacing--60);padding-left:0"><!-- wp:paragraph {"className":"paragraph-card","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontSize":"medium","fontFamily":"inter"} -->
<p class="paragraph-card has-background-color has-text-color has-link-color has-inter-font-family has-medium-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Easy Finance Options Available with ','electronics-retail-shop').'<a href="#">'. esc_html__('0%','electronics-retail-shop').'</a>'. esc_html__(' ','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"card-banner-row","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group card-banner-row"><!-- wp:image {"id":118,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"3px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/card01.png" alt="" class="wp-image-118" style="border-radius:3px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":119,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"3px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/card02.png" alt="" class="wp-image-119" style="border-radius:3px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":120,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"3px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/card03.png" alt="" class="wp-image-120" style="border-radius:3px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":121,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"3px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/card04.png" alt="" class="wp-image-121" style="border-radius:3px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":122,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"3px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/card05.png" alt="" class="wp-image-122" style="border-radius:3px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"banner-bottom-button","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|50"},"padding":{"left":"0"}},"border":{"radius":"0px"}},"fontSize":"medium","fontFamily":"rubik"} -->
<div class="wp-block-buttons has-custom-font-size banner-bottom-button has-rubik-font-family has-medium-font-size" style="border-radius:0px;padding-left:0;font-style:normal;font-weight:400"><!-- wp:button {"backgroundColor":"thirdaccent","textColor":"background","className":"is-style-outline card-button01","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"width":"0px","style":"none","radius":{"topLeft":"6px","topRight":"30px","bottomLeft":"6px","bottomRight":"30px"}},"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontSize":"small","fontFamily":"inter"} -->
<div class="wp-block-button is-style-outline card-button01"><a class="wp-block-button__link has-background-color has-thirdaccent-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size has-custom-font-size wp-element-button" href="#" style="border-style:none;border-width:0px;border-top-left-radius:6px;border-top-right-radius:30px;border-bottom-left-radius:6px;border-bottom-right-radius:30px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50);font-style:normal;font-weight:600">'. esc_html__('Check EMI ','electronics-retail-shop').'<i class="fa-solid fa-circle-right"></i></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"30%","className":"banner-right fadeInRight wow","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-column is-vertically-aligned-bottom banner-right fadeInRight wow" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:30%"><!-- wp:group {"className":"swiper mySwiper banner-right-col","layout":{"type":"constrained"}} -->
<div class="wp-block-group swiper mySwiper banner-right-col"><!-- wp:group {"className":"swiper-wrapper","layout":{"type":"constrained"}} -->
<div class="wp-block-group swiper-wrapper"><!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":115,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider01.png" alt="" class="wp-image-115" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""> <a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":116,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider02.png" alt="" class="wp-image-116" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""><a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":117,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider03.png" alt="" class="wp-image-117" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""> <a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":115,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider01.png" alt="" class="wp-image-115" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""> <a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":117,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider03.png" alt="" class="wp-image-117" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""> <a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-right-col swiper-slide","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-right-col swiper-slide"><!-- wp:image {"id":116,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-slider02.png" alt="" class="wp-image-116" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-left-radius:50px;border-top-right-radius:50px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><img class="wp-image-8" style="width: 6px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/map-pin.png" alt=""> <a href="#" target="_blank" rel="noreferrer noopener">'. esc_html__('123 Innovation St, New York,10001','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"10%","className":"banner-column04"} -->
<div class="wp-block-column banner-column04" style="flex-basis:10%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"banner-swiper-pagination","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-swiper-pagination"></div>
<!-- /wp:group -->

<!-- wp:group {"className":"phone-number-text","layout":{"type":"constrained"}} -->
<div class="wp-block-group phone-number-text"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topRight":"50px","bottomRight":"50px"}}},"backgroundColor":"background","textColor":"secaccent","fontSize":"small","fontFamily":"inter"} -->
<p class="has-text-align-center has-secaccent-color has-background-background-color has-text-color has-background has-link-color has-inter-font-family has-small-font-size" style="border-top-right-radius:50px;border-bottom-right-radius:50px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><i class="fa-solid fa-phone"></i>'. esc_html__(' For Enquiry Call Us - ','electronics-retail-shop').'<a href="tel:1234567890">'. esc_html__('+1234567890','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
    );