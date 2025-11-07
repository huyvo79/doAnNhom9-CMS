<?php
/**
 * Vlog Section
 * 
 * slug: electronics-retail-shop/vlog-section
 * title: Vlog Section
 * categories: electronics-retail-shop
 */

 $electronics_retail_shop_plugins_list = get_option('active_plugins');
 $electronics_retail_shop_gutentor_plugin = 'gutentor/gutentor.php'; 
  $electronics_retail_shop_woocommerce_plugin = 'woocommerce/woocommerce.php';
 $electronics_retail_shop_results = (in_array($electronics_retail_shop_woocommerce_plugin, $electronics_retail_shop_plugins_list) && in_array($electronics_retail_shop_gutentor_plugin, $electronics_retail_shop_plugins_list));
 
 if ($electronics_retail_shop_results) {
    return array(
        'title'      =>__( 'Vlog Section', 'electronics-retail-shop' ),
        'categories' => array( 'electronics-retail-shop' ),
        'content'    => '<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"className":"vlogger-section","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns vlogger-section" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"zoomIn wow product-col01"} -->
<div class="wp-block-column is-vertically-aligned-center zoomIn wow product-col01" style="flex-basis:10%"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontFamily":"inter"} -->
<p class="has-text-align-center has-inter-font-family" style="font-style:normal;font-weight:900">'. esc_html__('UPTO 80% OFF','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%","className":"zoomIn wow counter-img"} -->
<div class="wp-block-column zoomIn wow counter-img" style="flex-basis:30%"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"typography":{"fontSize":"26px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secaccent","fontFamily":"roboto"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-roboto-font-family" style="font-size:26px;font-style:normal;font-weight:700">'. esc_html__('Todays Deal Upto 80% Off','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:image {"id":15,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/sale-img.png" alt="" class="wp-image-15" style="border-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:gutentor/count-down {"blockID":"g-75171pv","gutentorBlockName":"gutentor/count-down","blockComponentTitleEnable":false,"blockComponentTitleTag":"h1","blockComponentTitleDesignEnable":false,"blockSingleItemBoxColor":{"enable":false,"hover":""},"blockCountDownEventDate":"2025-08-19T04:15:00","blockCountDownTimeColor":{"enable":true,"normal":{"hex":"#fff","rgb":{"r":255,"g":255,"b":255,"a":1}},"hover":""},"blockCountDownTypography":{"fontType":"","desktopFontSize":"18px"},"blockCountDownTextColor":{"enable":true,"normal":{"hex":"#1E2A38","rgb":{"r":30,"g":42,"b":56,"a":1}},"hover":""},"blockCountDownTextTypography":{"fontType":"default","desktopFontSize":"14px"},"className":"sale-countdown"} -->
<section id="section-g-75171pv" class="wp-block-gutentor-count-down gutentor-section  gutentor-countdown count-down-template1 sale-countdown"><div class="grid-container"><div class="gutentor-grid-item-wrap"><div class="gutentor-countdown-wrapper" data-eventdate="2025-08-19T04:15:00" data-expiredtext="Expired"><div class="gutentor-countdown-item gutentor-single-item"><span class="day gutentor-countdown-time"> </span><span class="day-text gutentor-countdown-label">'. esc_html__('Days','electronics-retail-shop').'</span></div><div class="gutentor-countdown-item gutentor-single-item"><span class="hour gutentor-countdown-time"> </span><span class="hour-text gutentor-countdown-label">'. esc_html__('Hours','electronics-retail-shop').'</span></div><div class="gutentor-countdown-item gutentor-single-item"><span class="min gutentor-countdown-time"> </span><span class="min-text gutentor-countdown-label">'. esc_html__('Minutes','electronics-retail-shop').'</span></div><div class="gutentor-countdown-item gutentor-single-item"><span class="sec gutentor-countdown-time"> </span><span class="sec-text gutentor-countdown-label">'. esc_html__('Second','electronics-retail-shop').'</span></div></div></div></div></section>
<!-- /wp:gutentor/count-down --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%","className":"product-col03"} -->
<div class="wp-block-column product-col03" style="flex-basis:60%"><!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"forcePageReload":true,"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"dynamic-product-col"} -->
<div class="wp-block-woocommerce-product-collection dynamic-product-col"><!-- wp:group {"className":"product-carousel","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group product-carousel"><!-- wp:woocommerce/product-template {"className":"dynamic-product-section owl-carousel"} -->
<!-- wp:group {"className":"tag-rating-wishlist","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group tag-rating-wishlist"><!-- wp:post-terms {"term":"product_tag"} /-->

<!-- wp:group {"className":"rating-wishlist","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group rating-wishlist"><!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"inner-rating","style":{"color":{"text":"#ffa500"},"elements":{"link":{"color":{"text":"#ffa500"}}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:post-title {"textAlign":"left","isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}},"typography":{"lineHeight":"1.4","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"medium","fontFamily":"inter","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-specifications {"showWeight":false,"showDimensions":false,"fontSize":"extra-small"} /-->

<!-- wp:group {"className":"product-price-row","style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group product-price-row"><!-- wp:paragraph {"className":"product-price-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="product-price-text has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size" style="font-style:normal;font-weight:400">'. esc_html__('Price:','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price","textColor":"accent","fontFamily":"inter","fontSize":"medium","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"button-section","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group button-section"><!-- wp:woocommerce/product-summary {"isDescendentOfQueryLoop":true,"showDescriptionIfEmpty":true,"showLink":true,"summaryLength":1,"linkText":"view Details","className":"view-details-woocommerce","textColor":"accent","fontFamily":"inter","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"textTransform":"capitalize"}}} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"is-style-outline add-cart-button","backgroundColor":"secaccent","textColor":"background","fontSize":"extra-small","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:group --></div>
<!-- /wp:woocommerce/product-collection -->

<!-- wp:group {"className":"product-swiper-pagination","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-swiper-pagination"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->',
    );

} else {
    return array(
        'title'      =>__( 'Vlog Section', 'electronics-retail-shop' ),
        'categories' => array( 'electronics-retail-shop' ),
        'content'    => '<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"className":"vlogger-section","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns vlogger-section" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"zoomIn wow product-col01"} -->
<div class="wp-block-column is-vertically-aligned-center zoomIn wow product-col01" style="flex-basis:10%"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontFamily":"inter"} -->
<p class="has-text-align-center has-inter-font-family" style="font-style:normal;font-weight:900">'. esc_html__('UPTO 80% OFF','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%","className":"zoomIn wow counter-img"} -->
<div class="wp-block-column zoomIn wow counter-img" style="flex-basis:30%"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}},"typography":{"fontSize":"26px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secaccent","fontFamily":"roboto"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-roboto-font-family" style="font-size:26px;font-style:normal;font-weight:700">'. esc_html__('Todays Deal Upto 80% Off','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:image {"id":15,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/sale-img.png" alt="" class="wp-image-15" style="border-radius:10px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%","className":"product-col03 "} -->
<div class="wp-block-column product-col03" style="flex-basis:60%"><!-- wp:group {"className":"product-static-carousel mySwiper","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group product-static-carousel mySwiper"><!-- wp:group {"className":"swiper-wrapper","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group swiper-wrapper"><!-- wp:group {"className":"static-product-box swiper-slide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group static-product-box swiper-slide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"static-product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontFamily":"inter"} -->
<p class="static-product-tag has-background-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:600">'. esc_html__('56% Off','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":56,"width":"47px","height":"35px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"rating-img"} -->
<figure class="wp-block-image size-full is-resized rating-img"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="" class="wp-image-56" style="object-fit:cover;width:47px;height:35px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"wishlist-product-static"} -->
<p class="wishlist-product-static"><img class="wp-image-38" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":63,"aspectRatio":"1","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"product-image-static"} -->
<figure class="wp-block-image size-full product-image-static"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product01.png" alt="" class="wp-image-63" style="aspect-ratio:1;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-inter-font-family">'. esc_html__('CrispEase 2-Slice Pop-up Toaster','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"extra-small","fontFamily":"inter"} -->
<p class="has-secaccent-color has-text-color has-link-color has-inter-font-family has-extra-small-font-size">'. esc_html__('Power: 2000 Watts','electronics-retail-shop').'<br>'. esc_html__('Special Feature: Foldable Handle + Diffuser','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size">'. esc_html__('Price: $20.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#8d8d8d"},"elements":{"link":{"color":{"text":"#8d8d8d"}}},"typography":{"textDecoration":"line-through"}}} -->
<p class="has-text-color has-link-color" style="color:#8d8d8d;text-decoration:line-through">'. esc_html__('$70.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
<p class="has-accent-color has-text-color has-link-color"><a href="##">'. esc_html__('View Details','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"static-button-buy"} -->
<div class="wp-block-buttons static-button-buy"><!-- wp:button {"backgroundColor":"secaccent","className":"is-style-outline","style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":{"topRight":"20px","bottomRight":"20px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secaccent-background-color has-background wp-element-button" style="border-top-right-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)">'. esc_html__('Buy Now','electronics-retail-shop').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"static-product-box swiper-slide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group static-product-box swiper-slide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"static-product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontFamily":"inter"} -->
<p class="static-product-tag has-background-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:600">'. esc_html__('56% Off','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":56,"width":"47px","height":"35px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"rating-img"} -->
<figure class="wp-block-image size-full is-resized rating-img"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="" class="wp-image-56" style="object-fit:cover;width:47px;height:35px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"wishlist-product-static"} -->
<p class="wishlist-product-static"><img class="wp-image-38" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":64,"aspectRatio":"1","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"product-image-static"} -->
<figure class="wp-block-image size-full product-image-static"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product02.png" alt="" class="wp-image-64" style="aspect-ratio:1;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-inter-font-family">'. esc_html__('Max super headphones','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"extra-small","fontFamily":"inter"} -->
<p class="has-secaccent-color has-text-color has-link-color has-inter-font-family has-extra-small-font-size">'. esc_html__('Power: 2000 Watts','electronics-retail-shop').'<br>'. esc_html__('Special Feature: Foldable Handle + Diffuser','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size">'. esc_html__('Price: $20.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#8d8d8d"},"elements":{"link":{"color":{"text":"#8d8d8d"}}},"typography":{"textDecoration":"line-through"}}} -->
<p class="has-text-color has-link-color" style="color:#8d8d8d;text-decoration:line-through">'. esc_html__('$70.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
<p class="has-accent-color has-text-color has-link-color"><a href="##">'. esc_html__('View Details','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"static-button-buy"} -->
<div class="wp-block-buttons static-button-buy"><!-- wp:button {"backgroundColor":"secaccent","className":"is-style-outline","style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":{"topRight":"20px","bottomRight":"20px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secaccent-background-color has-background wp-element-button" style="border-top-right-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)">'. esc_html__('Buy Now','electronics-retail-shop').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"static-product-box swiper-slide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group static-product-box swiper-slide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"static-product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontFamily":"inter"} -->
<p class="static-product-tag has-background-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:600">'. esc_html__('56% Off','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":56,"width":"47px","height":"35px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"rating-img"} -->
<figure class="wp-block-image size-full is-resized rating-img"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="" class="wp-image-56" style="object-fit:cover;width:47px;height:35px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"wishlist-product-static"} -->
<p class="wishlist-product-static"><img class="wp-image-38" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":72,"aspectRatio":"1","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"product-image-static"} -->
<figure class="wp-block-image size-full product-image-static"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product03.png" alt="" class="wp-image-72" style="aspect-ratio:1;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-inter-font-family">'. esc_html__('BreezeMax Turbo Ceiling Fan','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"extra-small","fontFamily":"inter"} -->
<p class="has-secaccent-color has-text-color has-link-color has-inter-font-family has-extra-small-font-size">'. esc_html__('Power: 2000 Watts','electronics-retail-shop').'<br>'. esc_html__('Special Feature: Foldable Handle + Diffuser','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size">'. esc_html__('Price: $20.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#8d8d8d"},"elements":{"link":{"color":{"text":"#8d8d8d"}}},"typography":{"textDecoration":"line-through"}}} -->
<p class="has-text-color has-link-color" style="color:#8d8d8d;text-decoration:line-through">'. esc_html__('$70.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
<p class="has-accent-color has-text-color has-link-color"><a href="##">'. esc_html__('View Details','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"static-button-buy"} -->
<div class="wp-block-buttons static-button-buy"><!-- wp:button {"backgroundColor":"secaccent","className":"is-style-outline","style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":{"topRight":"20px","bottomRight":"20px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secaccent-background-color has-background wp-element-button" style="border-top-right-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)">'. esc_html__('Buy Now','electronics-retail-shop').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"static-product-box swiper-slide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group static-product-box swiper-slide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"static-product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontFamily":"inter"} -->
<p class="static-product-tag has-background-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:600">'. esc_html__('56% Off','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":56,"width":"47px","height":"35px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"rating-img"} -->
<figure class="wp-block-image size-full is-resized rating-img"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="" class="wp-image-56" style="object-fit:cover;width:47px;height:35px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"wishlist-product-static"} -->
<p class="wishlist-product-static"><img class="wp-image-38" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":64,"aspectRatio":"1","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"product-image-static"} -->
<figure class="wp-block-image size-full product-image-static"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product02.png" alt="" class="wp-image-64" style="aspect-ratio:1;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-inter-font-family">'. esc_html__('Max super headphones','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"extra-small","fontFamily":"inter"} -->
<p class="has-secaccent-color has-text-color has-link-color has-inter-font-family has-extra-small-font-size">'. esc_html__('Power: 2000 Watts','electronics-retail-shop').'<br>'. esc_html__('Special Feature: Foldable Handle + Diffuser','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size">'. esc_html__('Price: $20.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#8d8d8d"},"elements":{"link":{"color":{"text":"#8d8d8d"}}},"typography":{"textDecoration":"line-through"}}} -->
<p class="has-text-color has-link-color" style="color:#8d8d8d;text-decoration:line-through">'. esc_html__('$70.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
<p class="has-accent-color has-text-color has-link-color"><a href="##">'. esc_html__('View Details','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"static-button-buy"} -->
<div class="wp-block-buttons static-button-buy"><!-- wp:button {"backgroundColor":"secaccent","className":"is-style-outline","style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":{"topRight":"20px","bottomRight":"20px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secaccent-background-color has-background wp-element-button" style="border-top-right-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)">'. esc_html__('Buy Now','electronics-retail-shop').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"static-product-box swiper-slide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group static-product-box swiper-slide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"static-product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontFamily":"inter"} -->
<p class="static-product-tag has-background-color has-text-color has-link-color has-inter-font-family" style="font-style:normal;font-weight:600">'. esc_html__('56% Off','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":56,"width":"47px","height":"35px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"rating-img"} -->
<figure class="wp-block-image size-full is-resized rating-img"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="" class="wp-image-56" style="object-fit:cover;width:47px;height:35px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"wishlist-product-static"} -->
<p class="wishlist-product-static"><img class="wp-image-38" style="width: 20px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/wishlist.png" alt=""></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":63,"aspectRatio":"1","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"product-image-static"} -->
<figure class="wp-block-image size-full product-image-static"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product01.png" alt="" class="wp-image-63" style="aspect-ratio:1;object-fit:contain"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-secaccent-color has-text-color has-link-color has-inter-font-family">'. esc_html__('CrispEase 2-Slice Pop-up Toaster','electronics-retail-shop').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secaccent"}}}},"textColor":"secaccent","fontSize":"extra-small","fontFamily":"inter"} -->
<p class="has-secaccent-color has-text-color has-link-color has-inter-font-family has-extra-small-font-size">'. esc_html__('Power: 2000 Watts','electronics-retail-shop').'<br>'. esc_html__('Special Feature: Foldable Handle + Diffuser','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"inter"} -->
<p class="has-accent-color has-text-color has-link-color has-inter-font-family has-medium-font-size">'. esc_html__('Price: $20.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#8d8d8d"},"elements":{"link":{"color":{"text":"#8d8d8d"}}},"typography":{"textDecoration":"line-through"}}} -->
<p class="has-text-color has-link-color" style="color:#8d8d8d;text-decoration:line-through">'. esc_html__('$70.00','electronics-retail-shop').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
<p class="has-accent-color has-text-color has-link-color"><a href="##">'. esc_html__('View Details','electronics-retail-shop').'</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"static-button-buy"} -->
<div class="wp-block-buttons static-button-buy"><!-- wp:button {"backgroundColor":"secaccent","className":"is-style-outline","style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":{"topRight":"20px","bottomRight":"20px"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-secaccent-background-color has-background wp-element-button" style="border-top-right-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)">'. esc_html__('UPTO 80% OFF','electronics-retail-shop').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-swiper-pagination","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-swiper-pagination"></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->',
    );
}
    