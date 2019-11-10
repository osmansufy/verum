/* ---------------------------------------------
 common scripts
 --------------------------------------------- */

;(function ($) {

    "use strict"; // use strict to start

    $(document).ready(function () {

        // Pre loader init
        var $window, $body;
        $window = $(window);
        $body = $("body");

        $window.on("load", function () {
            $body.imagesLoaded(function () {
                $(".tb-preloader-wave").fadeOut();
                $("#tb-preloader").delay(200).fadeOut("slow").remove();
            });
        });

        // Menu

        $('.menu').slicknav({
            prependTo: '.mobile-menu',
            label: '',
            closedSymbol: '&#xf054;',
            openedSymbol: '&#xf078;'
        });

        // overlay search

        $('.search_toggle').on('click', function(e) {
            e.preventDefault();
            //$(this).toggleClass('active');
            $('.search_toggle').toggleClass('active');
            $('.overlay').toggleClass('open');
            setTimeout(function(){
                $('.search-form .form-control').focus();
            },400);

        });


        // hero slider

        $('.js_hero_slider').owlCarousel({
            loop:true,
            margin:1,
            animateOut: 'fadeOut',
            autoplay: true,
            //nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


        // thumbnail slier

        $('.js_hero_thumb').owlCarousel({
            loop: true,
            items: 1,
            thumbs: true,
            autoplay: true
        });


        //  custom slider (slider number show)

        var owl = $('.js_number_carousel');
        owl.owlCarousel({
            autoplay: true,
            items:1,
            animateOut: 'fadeOut',
            nav:true,
            navText : ["<img src='assets/img/arrow-left.svg'/>","<img src='assets/img/arrow-right.svg'/>"],
            loop: true,
            onInitialized  : counter, //When the plugin has initialized.
            onTranslated : counter //When the translation of the stage has finished.
        });

        function counter(event) {
            var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item

            // it loop is true then reset counter from 1
            if(item > items) {
                item = item - items
            }
            $('#counter').html(" "+item+" / "+items)
        }

        // post gallery

        $('.post_gallery').owlCarousel({
            loop:true,
            margin:1,
            nav:true,
            dots: false,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        // flickr gallery

        $('.flickr_gallery').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots: false,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:3
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });

        // justified gallery

        $("#justified_gallery_sm").justifiedGallery({
            rowHeight : 70,
            lastRow : 'justify',
            margins : 5,
            captions: false
        });

        $("#justified_gallery").justifiedGallery({
            rowHeight : 150,
            lastRow : 'justify',
            margins : 10,
            captions: false
        });

        // magnific Popup link

        $(".popup-link").magnificPopup({
            type: "image"
        });


        // magnific popup gallery

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            }
        });

        // magnific Popup iframe

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            disableOn: 300,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });


        // meta social link

        $('.share-btn').on('click', function(e) {
            e.preventDefault();
            $(".meta-share .social-links").toggleClass('open');

        });



    });

})(jQuery);