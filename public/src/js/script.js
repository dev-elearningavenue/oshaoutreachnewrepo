// JavaScript Document
$(function () {

    //*****************************
    // Match Height Functions
    //*****************************
    $('.matchheight').matchHeight();

    //*****************************
    // Mobile Navigation
    //*****************************
    $('.mobile-nav-btn').click(function () {
        $('.mobile-nav-btn, .primary-nav, .blur-section, .mobile-nav').toggleClass('nav-active');
        //$('.overlay-bg').fadeIn();
    });

    // $('.overlay-bg').click(function(){
    //     $('.mobile-nav-btn, .mobile-nav, .app-container').removeClass('active');
    //     $(this).fadeOut();
    // });


    //*****************************
    // Scroll Funtion
    //*****************************

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 130) {
            $('.mobile-contact').addClass('active');
        } else {
            $('.mobile-contact').removeClass('active');
        }

        if (scroll >= 100) {
            $('header.ph').addClass('fixed');
        } else {
            $('header.ph').removeClass('fixed');
        }
    });


    //*****************************
    // Slick Slider
    //*****************************
    $('.homepage-slider').slick({
        dots: false,
        arrows: true,
        // slidesToShow: 4,
        // slidesToScroll: 1,
        infinite: true,
        // responsive: [
        //     {
        //         breakpoint: 991,
        //         settings: {
        //             slidesToShow: 2,
        //             slidesToScroll: 1
        //         }
        //     },
        //     {
        //         breakpoint: 767,
        //         settings: {
        //             slidesToShow: 1,
        //             slidesToScroll: 1
        //         }
        //     }
        // ]
    });


    $('.banner-strip-slider').slick({
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        mobile: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true
                }
            }
        ]
    });

    // promotions need to train slider
    $(".need_to_train_slider").slick({
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        mobile: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: true,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    // arrows: true,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    // arrows: true,
                },
            },
        ],
    });
    // end promotions need to train slider

    $('.banner-strip-slider-sc').slick({
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        mobile: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true
                }
            }
        ]
    });

    $('.home-banner-slider').slick({
        dots: true,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        mobile: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 2000,
                settings: "unslick"
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.whyus-banner-slider').slick({
        dots: true,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        mobileFirst: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 2000,
                settings: "unslick"
            },
            {
                breakpoint: 992,
                settings: "unslick"
            },
            {
                breakpoint: 767,
                settings: "unslick"
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".bpl-sc-pws-slider").slick({
        dots: false,
        arrows: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        mobileFirst: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 2000,
                settings: "unslick",
            },
            {
                breakpoint: 992,
                settings: "unslick",
            },
            {
                breakpoint: 767,
                settings: "unslick",
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $('.homepage-product-slider').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.sale-page-slider').slick({
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.homepage-testimonial-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 8000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.checkout-testimonial-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    $('.related-course-slider').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".osha1030-course-slider").slick({
        dots: false,
        arrows: true,
        autoplay: false,
        infinite: true,
        responsive: [
            {
                breakpoint: 5000,
                settings: "unslick"
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    // dots: true,
                }
            }
        ],
    });

    $('.homepage-clients-slider').slick({
        dots: false,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3500,
        infinite: true,
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });


    $('.video-reviews-slider').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });
    $('.promotional-video-reviews-slider').slick({
        dots: false,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        responsive: [
            {
                breakpoint: 1099,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    $('.latest-articles-slider').slick({
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".signup-clients-slider").slick({
        dots: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3500,
        infinite: true,
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplaySpeed: 2000,
                    dots: false,
                },
            },
        ],
    });


    if ($('.latest-article').length) {
        setTimeout(function () {
            $('.latest-article .latest-article-heading').matchHeight();
            $('.latest-article p').matchHeight();
        }, 2000);
    }

    // $(window).on('orientationchange', function() { $('.home-banner-slider').slick('resize'); });
    $(window).resize(function () {
        $('.home-banner-slider').slick('resize');
    });
    $(window).on('orientationchange', function () {
        $('.home-banner-slider').slick('resize');
    });

    //*****************************
    // Accordian
    //*****************************\
    $('.tab-body .title').click(function () {
        $(this).toggleClass('open');
        // $('.tab-body .details').slideUp();
        $(this).parent().children('.details').slideToggle();
    });

    //*****************************
    // Fancybox
    //*****************************
    $('[data-fancybox="gallery"]').fancybox({
        // Options will go here
    });

    //*****************************
    // Form Animation
    //*****************************
    /*$('.form-field').on('focus blur',function(i){
        // console.log('field', i);
        $(this).parents('.control-group').toggleClass('focused','focus'===i.type||this.value.length>0)
    }).trigger('blur');
    $('.form-label').on('click', function(i){
        // console.log('label', i);
        $(this).parents('.control-group').toggleClass('focused', function(){
            $(this).next('input').focus().trigger('focus');
        });
    });*/

    //*****************************
    // Set Map
    //*****************************
    $("address.setmap").each(function () {
        var embed = "<iframe frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=" + encodeURIComponent($(this).text()) + "&amp;output=embed'></iframe>";
        $(this).html(embed);
    });

    //*****************************
    // Tabbing New
    //*****************************
    $('.faq-tabbing .tab-head li').first().addClass('current');
    $('.faq-tabbing .tab-body').first().addClass('current');

    $('.faq-tabbing .tab-head li').click(function () {
        $('.faq-tabbing .tab-head li').removeClass('current');
        $('.faq-tabbing .tab-body').removeClass('current');
        $(this).addClass('current');
        var tab_id = $(this).index();
        tab_id += 1;
        $('.faq-tabbing .tab-body:nth-child(' + tab_id + ')').addClass('current');
    });


    //*****************************
    // Copyright Year
    //*****************************
    now = new Date;
    thecopyrightYear = now.getYear();
    if (thecopyrightYear < 1900) thecopyrightYear = thecopyrightYear + 1900;
    $("#cur-year").html(thecopyrightYear);

});
$(document).ready(function() {
    var shrinkHeader = 200;
    jQuery(window).on('scroll',function() {
        var scroll = getCurrentScroll();
        if (scroll >= shrinkHeader) {
            $('.enrollBtn').addClass('Show');
        } else {
            $('.enrollBtn').removeClass('Show');
        }
    })
    function getCurrentScroll() {
        return window.pageYOffset;
      }
})
