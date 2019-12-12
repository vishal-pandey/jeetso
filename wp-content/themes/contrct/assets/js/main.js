/**
  * isMobile
  * responsiveMenu
  * headerFixed
  * scrollBtn
  * onepage_nav 
  * ajaxAppointmentl
  * ajaxContactForm
  * alertBox
  * detectViewport
  * counter
  * tabs
  * flatPricingCarousel
  * flatTestimonials
  * simpleSlider
  * datepicker
  * sectionVideo
  * googleMap  
  * responsiveVideo
  * flatAnimation
  * goTop
  * retinaLogos
  * parallax
  * removePreloader
*/

;(function($) {

   'use strict'

    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var headerFixed = function() {
        if ( $('body').hasClass('header_sticky') ) {
            var nav = $('.header');

            if ( nav.size() != 0 ) {
                var offsetTop = $('.header').offset().top,
                    headerHeight = $('.header').height(),
                    injectSpace = $('<div />', { height: headerHeight }).insertAfter(nav);   
                    injectSpace.hide();                 

                $(window).on('load scroll', function(){
                    if ( $(window).scrollTop() > offsetTop + 120 ) {
                        $('.header').addClass('downscrolled');
                        injectSpace.show();
                    } else {
                        $('.header').removeClass('header-small downscrolled');
                        injectSpace.hide();
                    }

                    if ( $(window).scrollTop() > 500 ) {
                        $('.header').addClass('header-small upscrolled');
                    } else {
                        $('.header').removeClass('upscrolled');
                    }
                })
            }
        }     
    };

	var responsiveMenu = function() {
        var menuType = 'desktop';

        $(window).on('load resize', function() {
            var currMenuType = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                currMenuType = 'mobile';
            }

            if ( currMenuType !== menuType ) {
                menuType = currMenuType;

                if ( currMenuType === 'mobile' ) {
                    var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

                    $('#header').after($mobileMenu);
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');
                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                    $desktopMenu.find('.submenu').removeAttr('style');
                    $('#header').find('.nav-wrap').append($desktopMenu);
                    $('.btn-submenu').remove();
                }
            }
        });

        $('.btn-menu').on('click', function() {        	
            $('#mainnav-mobi').slideToggle(300);
            $(this).toggleClass('active');
        });

        $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
            $(this).toggleClass('active').next('ul').slideToggle(300);
            e.stopImmediatePropagation()
        });
    }
    
    var retinaLogos = function() {
      var retina = window.devicePixelRatio > 1 ? true : false;

        if(retina) {
            $('.header .logo').find('img').attr({src:'https://jeetso.com/client-demo/contractor/wp-content/themes/contrct/assets/images/Wood-N-Dreams-Logo-vectorized-name-only-4-23-18.png',width:'154',height:'56'});   
        }
    };    

    var ajaxContactForm = function() {  
        $('#contactform').each(function() {
            $(this).validate({
                submitHandler: function( form ) {
                    var $form = $(form),
                        str = $form.serialize(),
                        loading = $('<div />', { 'class': 'loading' });

                    $.ajax({
                        type: "POST",
                        url:  $form.attr('action'),
                        data: str,
                        beforeSend: function () {
                            $form.find('.send-wrap').append(loading);
                        },
                        success: function( msg ) {
                            var result, cls;                            
                            if ( msg == 'Success' ) {                                
                                result = 'Email Sent Successfully. Thank you, Your application is accepted - we will contact you shortly';
                                cls = 'msg-success';
                            } else {
                                result = 'Error sending email.';
                                cls = 'msg-error';
                            }

                            $form.prepend(
                                $('<div />', {
                                    'class': 'flat-alert ' + cls,
                                    'text' : result
                                }).append(
                                    $('<a class="close" href="#"><i class="fa fa-close"></i></a>')
                                )
                            );

                            $form.find(':input').not('.submit').val('');
                        },
                        complete: function (xhr, status, error_thrown) {
                            $form.find('.loading').remove();
                        }
                    });
                }
            });
        }); // each contactform
    }; 

    var alertBox = function() {
        $(document).on('click', '.close', function(e) {
            $(this).closest('.flat-alert').remove();
            e.preventDefault();
        })     
    }    
   
    var testimonialSlide = function() {
        $('.flat-testimonials-slider').each(function(){
            $(this).children('#flat-testimonials-carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                itemWidth: 70,
                itemMargin: 30,
                asNavFor: $(this).children('#flat-testimonials-flexslider')
            });
            $(this).children('#flat-testimonials-flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: true,                
                sync: $(this).children('#flat-testimonials-carousel'),
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });
        });
    };
   
    var twitterFeed = function () {
        if ( $().tweet ) {
            $('.list-tiwtter').each(function () {
                var $this = $(this);
                $this.tweet({
                    username: $this.data('username'),
                    join_text: "auto",
                    avatar_size: null,
                    count: $this.data('number'),
                    template: "{text}",
                    loading_text: "loading tweets...",
                    modpath: $this.data('modpath')      
                }); // tweet
            }); // lastest-tweets each
        };
    };     

    var blogMasory = function() {         
        if ( $().isotope ) {           
            var $container = $('.post-wrap');
            $container.imagesLoaded(function(){
                $container.masonry({
                    itemSelector: '.entry',
                    transitionDuration: '0.5s',                    
                    layoutMode: 'masonry',                 
                    masonry: { columnWidth: $container.width() / 12 }
                }); // isotope
             });

            $(window).resize(function() {
                $container.masonry({
                   masonry: { columnWidth: $container.width() / 12 }
                });
            }); // relayout        
            
        };
    };

    var googleMap = function() {
        if ( $().gmap3 ) {
            $("#map").gmap3({
                map:{
                    options:{
                        zoom: 14,
                        mapTypeId: 'nah_style',
                        mapTypeControlOptions: {
                            mapTypeIds: ['nah_style', google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID]
                        },
                        scrollwheel: false
                    }
                },
                getlatlng:{
                    address:  "Big Ben Street, E16 3LS, London, United Kingdom",
                    callback: function(results) {
                        if ( !results ) return;
                        $(this).gmap3('get').setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    }
                },
                styledmaptype:{
                    id: "nah_style",
                    options:{
                        name: "Nah Map"
                    },
                    styles: [
                        {
                            "featureType": "water",
                            "stylers": [
                                { "color": "#81abff" }
                            ]
                        },
                        
                        {
                            "featureType": "road.local",
                            "stylers": [
                              { "color": "#edebe3" }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "stylers": [
                              { "color": "#e3e3e3" }
                            ]
                       },
                       {
                            "featureType": "poi.park",
                            "stylers": [
                              { "color": "#c0d997" }
                            ]
                       }                                              
                    ]
                },  
            });
        }
    };   

    var simpleSliderofBlog = function() { 
        if ( $().flexslider ) {
            $('.flat-blog-slider').each(function() {   
                var $this = $(this);         
                $this.find('.flexslider').flexslider({
                    animation      :  "fade",
                    direction      :  "horizontal", // vertical
                    pauseOnHover   :  true,
                    useCSS         :  false,
                    easing         :  "swing",
                    animationSpeed :  500,
                    slideshowSpeed :  5000,
                    controlNav     :  false,
                    directionNav   :  true,
                    slideshow      :  true,
                    prevText       :  '<i class="fa fa-angle-left"></i>',
                    nextText       :  '<i class="fa fa-angle-right"></i>',
                    smoothHeight   :  true
                }); // flexslider
           }); // flat-blog-slider
        }
    }; 

    var detectViewport = function() {
        $('[data-waypoint-active="yes"]').waypoint(function() {
            $(this).trigger('on-appear');
        }, { offset: '90%', triggerOnce: true });

        $(window).on('load', function() {
            setTimeout(function() {
                $.waypoints('refresh');
            }, 100);
        });
    };

    var counter = function() {
        $('.flat-counter').on('on-appear', function() {            
            $(this).find('.numb-count').each(function() { 
                var to = parseInt( ($(this).attr('data-to')),10 ), speed = parseInt( ($(this).attr('data-speed')),10 );
                console.log(speed);
                if ( $().countTo ) {
                    $(this).countTo({
                        to: to,
                        speed: speed
                    });
                }
            });
       });
    };

    var tabs = function() {
        $('.flat-tabs').each(function() {

            $(this).children('.content-tab').children().hide();
            $(this).children('.content-tab').children().first().show();

            $(this).find('.menu-tab').children('li').on('click', function(e) {
                var liActive = $(this).index(),
                    contentActive = $(this).siblings().removeClass('active').parents('.flat-tabs').children('.content-tab').children().eq(liActive);

                contentActive.addClass('active').fadeIn('slow');
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.flat-tabs').children('.content-tab').children().eq(liActive).siblings().hide();
                e.preventDefault();
            });
        });
    };  

    var togglesAccordion = function() {
        var args = {duration: 600};
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show();

        $('.flat-toggle.enable .toggle-title').on('click', function() {
            $(this).closest('.flat-toggle').find('.toggle-content').slideToggle(args);
            $(this).toggleClass('active');
        }); // toggle 

        $('.flat-accordion .toggle-title').on('click', function () {
            if( !$(this).is('.active') ) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }     
        }); // accordion
    };

    var goTop = function() {
        $(window).scroll(function() {
            var bienbottom =  $('body').height() - $('.bottom').height()-983; 
            if ( $(this).scrollTop() > 800 ) {
                $('.go-top').addClass('show');
                if ($(this).scrollTop() > bienbottom )  {

                 $('.go-top').removeClass('show');
                } 
            }             
            else {
                $('.go-top').removeClass('show');
            }
        }); 

        $('.go-top').on('click', function() {            
            $("html, body").animate({ scrollTop: 0 }, 1000 , 'easeInOutExpo');
            return false;
        });

        $('.go-top-v1').on('click', function() {            
            $("html, body").animate({ scrollTop: 0 }, 1000 , 'easeInOutExpo');
            return false;
        });
    };   
    
    var parallax = function() {
        if ( $().parallax && isMobile.any() == null ) {
            $('.parallax1').parallax("50%", 0.2);
            $('.parallax2').parallax("50%", 0.4);  
            $('.parallax3').parallax("50%", 0.5);            
        }
    };

    var flatServicesCarousel = function() {
        $('.flat-carousel').each(function(){
            if ( $().owlCarousel ) {
                $(this).find('.owl-carousel-services').owlCarousel({
                    loop: true,
                    margin: 30,
                    auto:true,
                    dots: true,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 3
                        }, 
                        1200:{
                            items: 3
                        }               
                    }
                });
            }
        });
    };

    var flatClientCarousel = function() {
        $('.flat-carousel').each(function(){
            if ( $().owlCarousel ) {
                $(this).find('.owl-carousel-client').owlCarousel({
                    loop: true,
                    margin: 20,
                    auto: true,
                    dots: false,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 3
                        },
                        991:{
                            items: 3
                        }, 
                        1200:{
                            items: 5
                        }               
                    }
                });
            }
        });
    };

    var flatIconboxCarousel = function() {
        $('.flat-carousel').each(function(){
            if ( $().owlCarousel ) {
                $(this).find('.owl-carousel-iconbox').owlCarousel({
                    loop: true,
                    margin: 0,
                    auto:true,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 3
                        }, 
                        1200:{
                            items: 5
                        }               
                    }
                });
            }
            $('.flat-carousel .owl-carousel-iconbox .owl-item.active').eq(0).addClass('hover-active');
        });
    };

    var featuredProduct = function() {
        $('.flat-product').each(function(){           
            if ( $().owlCarousel ) {
                $(this).find('.flat-featured-product').owlCarousel({
                    loop: true,
                    margin: 0,
                    dots: false,
                    auto:true,
                    responsive:{
                        0:{
                            items: 1
                        },
                        480:{
                            items: 2
                        },
                        767:{
                            items: 2
                        },
                        991:{
                            items: 3
                        }, 
                        1200:{
                            items: $('.flat-featured-product').data('iteminline') ? $('.flat-featured-product').data('iteminline'): 6
                        }               
                    }
                });
            }            
        });
    };    
    
    var portfolioIsotope = function() {         
        if ( $().isotope ) {           
            var $container = $('.portfolio-wrap .flat-gallery');
            $container.imagesLoaded(function(){
                $container.isotope({
                    itemSelector: '.item',
                    transitionDuration: '1s'
                });
            });           
        };
    };

    var togglesAccordion = function() {
        var args = {duration: 600};
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show(); 

        $('.flat-accordion .toggle-title').on('click', function () {
            if( !$(this).is('.active') ) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }     
        }); // accordion
    };   

    var woocommerceTabs = function() {
        $('.woocommerce-tabs').each(function() {
           var content = $('.woocommerce-Tabs-panel');
            content.hide();
            if ( (content).hasClass("active")) {
                $('.woocommerce-Tabs-panel.active').show();
            } else {
                content.first().show();
            }                     
            $(this).find(' > ul > li').on('click',function(e) {                
                var hid = $(this).index();
                e.preventDefault();
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                var contentActive = $(this).parents('.tabs').siblings('.woocommerce-Tabs-panel').eq(hid);                
                content.not(':eq(hid)').hide();
                contentActive.fadeIn(300);                
            })
        });
    };
  
    var gallerySlide = function() {
        $('.flat-gallery-slider').each(function(){
            $(this).children('#flat-gallery-carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: true,
                itemWidth: 85,
                itemMargin: 10,
                asNavFor: $(this).children('#flat-gallery-flexslider')
            });
            $(this).children('#flat-gallery-flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: true,                
                sync: $(this).children('#flat-gallery-carousel'),
                prevText: '<i class="fa fa-angle-left"></i>',
                nextText: '<i class="fa fa-angle-right"></i>'
            });
        });
    };    

    var flatAnimation = function() {
        if ( isMobile.any() == null ) {
            $('.flat-animation').each( function() {
                var flatElement = $(this),
                    flatAnimationClass = flatElement.data('animation'),
                    flatAnimationDelay = flatElement.data('animation-delay'),
                    flatAnimationOffset = flatElement.data('animation-offset');

                flatElement.css({
                    '-webkit-animation-delay':  flatAnimationDelay,
                    '-moz-animation-delay':     flatAnimationDelay,
                    'animation-delay':          flatAnimationDelay
                });

                flatElement.waypoint(function() {
                    flatElement.addClass('animated').addClass(flatAnimationClass);
                },{
                    triggerOnce: true,
                    offset: flatAnimationOffset
                });
            });
        }
    };

    var toggleExtramenu = function() {
        $('.wrap-icon-nav .block a').on('click', function() {
            $('body').toggleClass('off-canvas-active');
        });
        $('#site-off-canvas .close').on('click', function() {
            $('body').removeClass('off-canvas-active');
        });
    } 

    var popupGallery = function () {
        if ($().magnificPopup) {
        $(".popup-gallery").magnificPopup({
            type: "image",
            tLoading: "Loading image #%curr%...",
            removalDelay: 600,
            mainClass: "my-mfp-slide-bottom",
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [ 0, 1 ]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
            }
        });
        }
    }   

    var removePreloader = function() {        
        $('.loader').fadeOut('slow',function () {
            $(this).remove();
        });
    };

    var backgroundBlog = function() {
        var backgroundheight = 5000;
        $('<style>.bg-sidebar .wrap-main-post:before{height:'+backgroundheight+'px}</style>').appendTo('head');      
    }


   	// Dom Ready
	$(function() { 
        if ( matchMedia( 'only screen and (min-width: 991px)' ).matches ) {
            headerFixed(); 
        }      
        retinaLogos();     
        responsiveMenu();        
        blogMasory();
        portfolioIsotope();
        backgroundBlog();
        flatServicesCarousel();
        flatIconboxCarousel();
        featuredProduct();
        testimonialSlide();
        detectViewport();
        counter();
        tabs();
        popupGallery();
        togglesAccordion();
        flatClientCarousel();
        ajaxContactForm();
        alertBox();
        flatAnimation();
        twitterFeed();
        simpleSliderofBlog();  
        woocommerceTabs();
        gallerySlide();
        parallax();
        googleMap();        
        goTop();  
        toggleExtramenu();       
        removePreloader();
   	});

})(jQuery);