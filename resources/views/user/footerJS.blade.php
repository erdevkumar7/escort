<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
</script>

<script>
    $(document).ready(function() {
        $("#card-carousel").owlCarousel({
            loop: true,
            items: 5,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                600: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                1000: {
                    items: 5,
                    nav: true,
                    dots: true,
                },
            },
        });
    });
</script>


<script>
    jQuery(document).ready(function($) {
        var owl = $("#owl-demo-2");
        owl.owlCarousel({
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            items: 3,
            loop: true,

            responsive: {
                0: {
                    items: 1
                    // nav: true
                },
                480: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 3,
                    // nav: true,
                    loop: false
                },
                992: {
                    items: 4,
                    // nav: true,
                    loop: false
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,
            fallbackEasing: "swing",
            info: false,
            nestedItemSelector: false,
            itemElement: "div",
            stageElement: "div",
            refreshClass: "owl-refresh",
            loadedClass: "owl-loaded",
            loadingClass: "owl-loading",
            rtlClass: "owl-rtl",
            responsiveClass: "owl-responsive",
            dragClass: "owl-drag",
            itemClass: "owl-item",
            stageClass: "owl-stage",
            stageOuterClass: "owl-stage-outer",
            grabClass: "owl-grab",
            autoHeight: false,
            lazyLoad: false
        });

        $(".next").click(function() {
            owl.trigger("owl.next");
        });
        $(".prev").click(function() {
            owl.trigger("owl.prev");
        });
    });
</script>


<script>
    $('.carousel-main').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>',
            '<span class="fas fa-chevron-right fa-2x"></span>'
        ],

        responsive: {
            0: {
                items: 1
                // nav: true
            },
            480: {
                items: 2,
                nav: false
            },
            768: {
                items: 3,
                // nav: true,
                loop: false
            },
            992: {
                items: 6,
                // nav: true,
                loop: false
            }
        },
    })
</script>


<script>
    $('.carousel-main-two').owlCarousel({
        items: 4,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>',
            '<span class="fas fa-chevron-right fa-2x"></span>'
        ],

        responsive: {
            0: {
                items: 1
                // nav: true
            },
            480: {
                items: 2,
                nav: false
            },
            768: {
                items: 3,
                // nav: true,
                loop: false
            },
            992: {
                items: 4,
                // nav: true,
                loop: false
            }
        },

    })
</script>
<script src="script.js"></script>

<script>
    // removeError
    function removeError(id) {
        var errElement = document.getElementById(id);
        if (errElement) {
            errElement.style.display = 'none'
        }
    }
</script>
