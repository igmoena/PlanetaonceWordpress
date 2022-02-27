jQuery(document).ready(function () {
	var featuredSwiperOne = new Swiper(".walkerpress-featured-slider-one", {
      spaceBetween: 30,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".walkerpress-slider-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-slide-next',
          prevEl: '.walkerpress-slide-prev',
          clickable: true,
        },
        
  });
  var featuredSwiperOne = new Swiper(".walkerpress-featured-slider-two", {
      spaceBetween: 3,
      slidesPerView:4,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".walkerpress-slider-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-slide-next',
          prevEl: '.walkerpress-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
      }   
  });
  var featuredSliderSwiper = new Swiper(".walkerpress-featured-slider-three", {
    spaceBetween: 1,
    slidesPerView:1,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
           el: ".walkerpress-slider-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-slide-next',
          prevEl: '.walkerpress-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 2,
        },
      }
  });
  var gridLayoutCat = new Swiper(".grid-layout-carousel", {
    spaceBetween: 25,
    slidesPerView:1,
    loop: true,
    loopAdditionalSlides: 30,
        navigation: {
          nextEl: '.grid-layout-post-next',
          prevEl: '.grid-layout-post-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });
  var featuredSliderSwiperfour = new Swiper(".walkerpress-featured-slider-four", {
    spaceBetween: 2,
    slidesPerView:1,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
           el: ".walkerpress-slider-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-slide-next',
          prevEl: '.walkerpress-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });

  var categorySlider = new Swiper(".walkerpress-category-slider", {
    spaceBetween: 0,
    slidesPerView:1,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
           el: ".walkerpress-slider-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-category-slide-next',
          prevEl: '.walkerpress-category-slide-prev',
          clickable: true
        },
  });
  var focusTickerSwiper = new Swiper(".walkerpress-ticker-news", {
    spaceBetween: 20,
    slidesPerView:4,
        pagination: {
          el: ".focusnews-pagination",
          clickable: true,
        },
         autoplay: {
          delay: 10000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.ticker-news-next',
          prevEl: '.ticker-news-prev',
          clickable: true,
      },
  });

   jQuery('.tickerMarqueeOne').marquee({
      duration: 40000,
      gap: 0,
      delayBeforeStart: 0,
      duplicated: true,
      pauseOnHover: true,
      startVisible: true
    });

   jQuery('ul.tabs li').click(function(){
    var tab_id = jQuery(this).attr('data-tab');

    jQuery('ul.tabs li').removeClass('active');
    jQuery('.tab-content').removeClass('active');

    jQuery(this).addClass('active');
    jQuery("#"+tab_id).addClass('active');
  })



  var box = jQuery('.header-global-search-form');
  var button = jQuery('.global-search-icon');
  var closeButton = jQuery('.global-search-close');
  button.on('click', function(){
    button.toggleClass('active');
    box.toggleClass('active');
  });
  closeButton.on('click', function(){
    box.toggleClass('active');
  });

jQuery('.slide-button').on('click', function () {
    jQuery('.sidebar-panel').toggleClass('active');
    jQuery('body').toggleClass('sidebar-panel-active');
});
jQuery(window).load(function(){
  viewPortHeight = jQuery(window).height();
  sidebarPanelHeight = jQuery('.panel-content').height();
  if(sidebarPanelHeight > viewPortHeight){
    jQuery('.sidebar-panel').css('overflow-y','scroll');
  }
});
jQuery( ".panel-close" ).click(function() {
  jQuery('.sidebar-panel').toggleClass('active');
  jQuery('body').toggleClass('sidebar-panel-active');
});

jQuery(window).scroll(function(){ 
      if (jQuery(this).scrollTop() > 100) { 
          jQuery('a.walkerpress-top').fadeIn(); 
      } else { 
          jQuery('a.walkerpress-top').fadeOut(); 
      } 
}); 
jQuery('a.walkerpress-top').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
}); 
/*navmenu-toggle control*/
var menuFocus, navToggleItem, focusBackward;
var menuToggle = document.querySelector('.menu-toggle');
var navMenu = document.querySelector('.nav-menu');
var navMenuLinks = navMenu.getElementsByTagName('a');
var navMenuListItems = navMenu.querySelectorAll('li');
var nav_lastIndex = navMenuListItems.length - 1;
var navLastParent = document.querySelectorAll('.main-navigation > ul > li').length - 1;

document.addEventListener('menu_focusin', function () {
    menuFocus = document.activeElement;
    if (navToggleItem && menuFocus !== navMenuLinks[0]) {
        document.querySelectorAll('.main-navigation > ul > li')[navLastParent].querySelector('a').focus();
    }
    if (menuFocus === menuToggle) {
        navToggleItem = true;
    } else {
        navToggleItem = false;
    }
}, true);


document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        focusBackward = true;
    } else {
        focusBackward = false;
    }
});


for (el of navMenuLinks) {
    el.addEventListener('blur', function (e) {
        if (!focusBackward) {
            if (e.target === navMenuLinks[nav_lastIndex]) {
                menuToggle.focus();
            }
        }
    });
}
menuToggle.addEventListener('blur', function (e) {
    if (focusBackward) {
        navMenuLinks[nav_lastIndex].focus();
    }
});

});

jQuery(window).load(function(){
  jQuery(window).scroll(function() {
    var wintop = jQuery(window).scrollTop(), docheight = jQuery('body').height(), winheight = jQuery(window).height();
    var totalScroll = (wintop/(docheight-winheight))*100;
    jQuery(".walkerwp-progress-bar").css("width",totalScroll+"%");
  });
});
jQuery('.header-global-search-form button.btn-default').on('keydown', function(e){
    jQuery('.header-global-search-form button.global-search-close').focus();
    e.preventDefault();
  });
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 90) {
        jQuery('.sticky-menu').addClass('sticky-menu-enabled');
    }
    else {
        jQuery('.sticky-menu').removeClass('sticky-menu-enabled');
    }
});