jQuery(document).ready(function () {
  var electronics_retail_shop_swiper_testimonials = new Swiper(".testimonial-swiper-slider.mySwiper", {
    slidesPerView: 3,
      spaceBetween: 15,
      speed: 1000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".testimonial-swiper-button-next",
        prevEl: ".testimonial-swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        767: {
          slidesPerView: 2,
        },
        1023: {
          slidesPerView: 3,
        }
    },
  });
  var electronics_retail_shop_swiper_banner = new Swiper(".banner-right-col.mySwiper", {
    direction: "vertical",
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    Freemode : true,
    pagination: {
      el: ".banner-swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      901: {
        slidesPerView: 3,
      }
  },
  });

  var electronics_retail_shop_static_product = new Swiper(".product-static-carousel.mySwiper", {
    direction: 'horizontal',
    slidesPerView: 2.7,
    speed : 1000,
    spaceBetween: 20,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".product-swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        900: {
          slidesPerView: 2,
        },
        1025: {
          slidesPerView: 2.7,
        }
    },
  });
});

jQuery(document).ready(function() {
  jQuery('.owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: false,
    dots: true,
    rtl: false,
    responsive: {
    0: { 
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 2.7 
    }
  },
    autoplay: true,
  });
});
