(function ($, window, document, undefined) {
  $(function () {

    function mainSlider() {
      var mySwiper = new Swiper('.main-slider .swiper-container', {
        loop: false,
        pagination: {
          el: '.main-slider  .swiper-pagination',
          type: 'bullets'
        }
      })
    }

    function advicesSlider() {
      var mySwiper = new Swiper('.advices-slider .swiper-container', {
        loop: false,
        navigation: {
          nextEl: '.advices-slider .swiper-button-next',
          prevEl: '.advices-slider .swiper-button-prev'
        },
        slidesPerView: 3,
        spaceBetween: 30
      })
    }
    // function geSlideDataIndex(swipe){
    //   var activeIndex = swipe.activeIndex;
    //   var slidesLen = swipe.slides.length;
    //   if(swipe.params.loop){
    //     switch(swipe.activeIndex){
    //       case 0:
    //         activeIndex = slidesLen-3;
    //         break;
    //       case slidesLen-1:
    //         activeIndex = 0;
    //         break;
    //       default:
    //         --activeIndex;
    //     }
    //   }
    //   console.log(activeIndex)
    //   return  activeIndex;
    // }

    function reviewSlider() {
      var mySwiper = new Swiper('.review-slider.swiper-container', {
        loop: false,
        navigation: {
          nextEl: '.review-slider-btns .swiper-button-next',
          prevEl: '.review-slider-btns .swiper-button-prev'
        },
        pagination: {
          el: ' .review-slider.swiper-pagination',
          type: 'bullets'
        },
        // on: {
        //   init: updSwiperNumericPagination(mySwiper.activeIndex),
        //   slideChange: updSwiperNumericPagination(mySwiper.activeIndex)
        // },
        slidesPerView: 'auto',
        centeredSlides: true,
        slidesPerGroup: 1,
        spaceBetween: 30
      });
      //
      // function updSwiperNumericPagination(el) {
      //   var counter = $('.review-slider.swiper-container .swiper-counter'),
      //     allSlides = $('.review-slider.swiper-container .swiper-slide').length;
      //     // currentSlide = mySwiper.activeIndex;
      //   counter.html = '22' + el + allSlides;
      // }
    }

    function stickySideBar() {
      console.log("document ready!");

      var $sticky = $('.sticky');
      var $stickyrStopper = $('.sticky-stopper');
      if (!!$sticky.offset()) {

        var generalSidebarHeight = $sticky.innerHeight();
        var stickyTop = $sticky.offset().top;
        var stickOffset = 0;
        var stickyStopperPosition = $stickyrStopper.offset().top;
        var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
        var diff = (stopPoint + stickOffset) - 10;

        $(window).scroll(function () {
          var windowTop = $(window).scrollTop();

          if (stopPoint < windowTop) {
            $sticky.css({position: 'absolute', top: diff, maxWidth: 'unset', flex: 'unset'});
          } else if (stickyTop < windowTop + stickOffset) {
            $sticky.css({position: 'fixed', top: stickOffset, maxWidth: '20%', flex: '0 0 20%'});
          } else {
            $sticky.css({position: 'absolute', top: 'initial', maxWidth: 'unset', flex: 'unset'});
          }
        });

      }
    }

    function init() {
      mainSlider();
      advicesSlider();
      stickySideBar();
      reviewSlider();
    }

    init();

  });
})(jQuery, window, document);

$(document).ready(function () {
   $('address').each(function () {
    var link = "<a href='http://maps.google.com/maps?q=" + encodeURIComponent( $(this).text() ) + "' target='_blank'>" + $(this).text() + "</a>";
    $(this).html(link);
  });
});