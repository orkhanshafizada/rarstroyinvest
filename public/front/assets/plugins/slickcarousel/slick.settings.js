$(document).ready(function () {
  // Main slider

  $('.slider__main')
    .slick({
      autoplay: true,
      speed: 800,
      lazyLoad: 'progressive',
      arrows: true,
      dots: true,
      asNavFor: '.slider-content',
      prevArrow: $('.pull-left'),
      nextArrow: $('.pull-right'),
      responsive: [
        {
          breakpoint: 992,
          settings: {
            centerMode: false,
            slidesToShow: 1,
            arrows: false,
            prevArrow: "<button class='slick-prev pull-left'><i class='fa-solid fa-chevron-left'></i></button>",
            nextArrow: "<button class='slick-next pull-right'><i class='fa-solid fa-chevron-right'></i></button>",
          },
        },
      ],
    })
    .slickAnimation()

  $('.slider-content').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider__main',
    dots: false,
    adaptiveHeight: false,
    infinite: true,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    arrows: false,
    centerMode: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: false,
          slidesToShow: 1,
          arrows: false,
        },
      },
      {
        breakpoint: 520,
        settings: {
          centerMode: false,
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  })
  .slickAnimation()

  // Gallery sliders

  $('.main-slide').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav',
    prevArrow: "<button class='slick-prev pull-left'><i class='far fa-chevron-left'></i></button>",
    nextArrow: "<button class='slick-next pull-right'><i class='far fa-chevron-right'></i></button>",
    adaptiveHeight: false,
    infinite: false,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
  })
  

  $('.slider-nav').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    asNavFor: '.main-slide',
    dots: false,
    adaptiveHeight: false,
    infinite: false,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    arrows: false,
    centerMode: false,
    focusOnSelect: true,
    prevArrow: '<button class="slick-prev "><i class="fa-regular fa-arrow-left"></i></button>',
    nextArrow: '<button class="slick-next "><i class="fa-regular fa-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: false,
          slidesToShow: 3,
          arrows: false,
        },
      },
      {
        breakpoint: 520,
        settings: {
          centerMode: false,
          slidesToShow: 3,
          arrows: false,
        },
      },
    ],
  })
  ;('use strict')
  $('.secondary__slide').length &&
    $('.secondary__slide').each(function (s, e) {
      var o = $(this).attr('id'),
        i = '#' + o + '-arrows'
      $('#' + o).slick({
        infinite: !0,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: !0,
        dots: !0,
        arrows: !0,
        speed: 1e3,
        loop: !0,
        adaptiveHeight: !0,
        responsive: [
          { breakpoint: 1025, settings: { slidesToShow: 3, slidesToScroll: 1 } },
          { breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 1, centerMode: true, arrows: !1 } },
          { breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1, centerMode: true, arrows: !1 } },
        ],
        prevArrow: '<button class="slick-prev"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fal fa-chevron-right"></i></button>',
        appendArrows: i,
      })
    })
})
