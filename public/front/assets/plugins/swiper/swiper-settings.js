// HERO SLIDER
var menu = []
jQuery('.swiper-slide').each(function (index) {
  menu.push(jQuery(this).find('.slide-inner').attr('data-text'))
})
var interleaveOffset = 0.5
var swiperOptions = {
  loop: true,
  speed: 1000,
  parallax: true,
  autoplay: {
    delay: 6500,
    disableOnInteraction: false,
  },
  watchSlidesProgress: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  on: {
    progress: function () {
      var swiper = this
      for (var i = 0; i < swiper.slides.length; i++) {
        var slideProgress = swiper.slides[i].progress
        var innerOffset = swiper.width * interleaveOffset
        var innerTranslate = slideProgress * innerOffset
        swiper.slides[i].querySelector('.slide-inner').style.transform = 'translate3d(' + innerTranslate + 'px, 0, 0)'
      }
    },

    touchStart: function () {
      var swiper = this
      for (var i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = ''
      }
    },

    setTransition: function (speed) {
      var swiper = this
      for (var i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = speed + 'ms'
        swiper.slides[i].querySelector('.slide-inner').style.transition = speed + 'ms'
      }
    },
  },
}

var swiper = new Swiper('.swiper-container', swiperOptions)

// DATA BACKGROUND IMAGE
var sliderBgSetting = $('.slide-bg-image')
sliderBgSetting.each(function (indx) {
  if ($(this).attr('data-background')) {
    $(this).css('background-image', 'url(' + $(this).data('background') + ')')
  }
})

var swiper = new Swiper('.mySwiper', {
  speed: 1000,
  autoplay: {
    delay: 6500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    640: {
      showSwitchArrows: false,
    },
    768: {
      showSwitchArrows: false,
    },
    1024: {
      showSwitchArrows: true,
    },
  },
})

var swiper = new Swiper('.swiper__mortgage', {
  slidesPerView: 4,
  spaceBetween: 20,
  freeMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    355: {
      slidesPerView: 2.5,
      spaceBetween: 12,
    },
    640: {
      slidesPerView: 2.5,
      spaceBetween: 14,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
})

var swiper = new Swiper('.swiper__products', {
  slidesPerView: 3,
  spaceBetween: 10,
  freeMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    355: {
      slidesPerView: 1.5,
      spaceBetween: 12,
    },
    640: {
      slidesPerView: 1.5,
      spaceBetween: 14,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
  scrollbar: {
    el: '.swiper-scrollbar',
    hide: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
})

var swiper = new Swiper('.swiper__tabs', {
  slidesPerView: 'auto',
  spaceBetween: 0,
  freeMode: true,
  // autoplay: {
  // 	delay: 2500,
  // 	disableOnInteraction: false,
  // },
  breakpoints: {
    355: {
      slidesPerView: 1.5,
      spaceBetween: 0,
    },
    640: {
      slidesPerView: 2.5,
      spaceBetween: 0,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 0,
    },
    1024: {
      slidesPerView: 'auto',
      spaceBetween: 0,
    },
  },
})

;('use strict')
function getSwiperConfig($container) {
  const defaultSlides = parseFloat($container.data('slides')) || 3
  const defaultSpaceBetween = parseFloat($container.data('spacebetween')) || 10
  const breakpoints = {
    320: { slidesPerView: parseFloat($container.data('xs-slides')) || defaultSlides, spaceBetween: parseFloat($container.data('xs-spacebetween')) || defaultSpaceBetween },
    576: { slidesPerView: parseFloat($container.data('sm-slides')) || defaultSlides, spaceBetween: parseFloat($container.data('sm-spacebetween')) || defaultSpaceBetween },
    768: { slidesPerView: parseFloat($container.data('md-slides')) || defaultSlides, spaceBetween: parseFloat($container.data('md-spacebetween')) || defaultSpaceBetween },
    992: { slidesPerView: parseFloat($container.data('lg-slides')) || defaultSlides, spaceBetween: defaultSpaceBetween },
  }

  console.log(parseFloat($container.data('xs-slides')))
  console.log($container.attr('id') + '__nav' + ' .swiper-button-prev')

  return {
    loop: true,
    slidesPerView: defaultSlides,
    spaceBetween: defaultSpaceBetween,
    freeMode: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: $container.find('.swiper-pagination'),
      clickable: true,
    },
    navigation: {
      nextEl: '#' + ($container.attr('id') + '__nav' + ' .swiper-button-next'),
      prevEl: '#' + ($container.attr('id') + '__nav' + ' .swiper-button-prev'),
    },
    scrollbar: {
      el: $container.find('.swiper-scrollbar'),
      hide: false,
    },
    breakpoints: breakpoints,
  }
}

$('.swiper__slider').each(function () {
  const config = getSwiperConfig($(this))
  new Swiper($(this)[0], config)
})
