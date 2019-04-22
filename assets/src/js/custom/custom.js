(function($) {

    'use strict';

    $(document).ready(function() {


        // init retina 

        retinajs();


        // Init nice select 


        $('select').niceSelect();
        

        // init navigation

        var primary_nav = $( '.primary_navigation' );
        primary_nav.stellarNav({
            theme: 'dark',
            breakpoint: 1024,
            closeBtn: true,
            scrollbarFix: false,
            sticky: false,
        });

        $(".has_search > ul").append('<li class="primarynav_search_icon"><a class="search_box" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a></li>');


        // toggle search

        $("body").on('click', '.search_box', function() {

            $(".header_search").toggle()

        });


        // match height 

        $('.matchheight').matchHeight();

        // sticky nav 

        $(".mb_stickhead").sticky({ topSpacing: 0 });;


        // init featured slider layout 1

        $('.mb_banner_style_1').owlCarousel({
            items: 1,
            loop: true,
            lazyLoad: false,
            margin: 0,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        });

        // init featured slider layout 2

        $('.mb_banner_style_2').owlCarousel({
            items: 2,
            loop: true,
            lazyLoad: false,
            margin: 5,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                600: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 2
                },
                1200: {
                    items: 2
                }
            },
        });


        // init featured slider layout 3

        $('.mb_banner_style_3').owlCarousel({
            items: 1,
            loop: true,
            lazyLoad: false,
            margin: 0,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        });


        // init featured slider layout 4

        $('.mb_banner_style_4').owlCarousel({
            items: 3,
            loop: true,
            lazyLoad: false,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                600: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 3
                },
                1200: {
                    items: 3
                }
            },
        });


        // init featured post carousel

        $('.mb_featuredpost_carousel').owlCarousel({

            items: 3,
            loop: true,
            lazyLoad: false,
            margin: 10,
            smartSpeed: 700,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                600: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 3
                },
                1200: {
                    items: 3
                }
            },
        });


        // init masonary for archive page layout

        $('.mb_rp_brick_grids').masonry({

            // options...

            itemSelector: '.bricks_items',

        });

        setTimeout( function() {

            $('.mb_rp_brick_grids').masonry({

                itemSelector: '.bricks_items',

            });
        }, 5000);


        // init back to top icon 

        $('body').append('<div id="toTop" class="btn btn-info"><i class="fa fa-angle-up" aria-hidden="true"></i></div>');
        $(window).on( 'scroll', function() {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $("body").on('click', '#toTop', function() {
        
           $("html, body").animate({ scrollTop: 0 }, 800);
            return false;

        });



    });

})(jQuery);