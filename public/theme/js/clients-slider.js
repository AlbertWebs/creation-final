(function ($) {
    function initClientSlider() {
        var $slider = $('.client-slider');
        if (!$slider.length) {
            return;
        }

        if ($slider.hasClass('slick-initialized')) {
            try {
                $slider.slick('unslick');
            } catch (e) {
                // Slider was not fully initialized
            }
        }

        $slider.slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 2000,
            infinite: true,
            cssEase: 'linear',
            pauseOnHover: false,
            pauseOnFocus: false,
            variableWidth: false,
            adaptiveHeight: false,
            swipeToSlide: true,
            responsive: [
                { breakpoint: 1200, settings: { slidesToShow: 5 } },
                { breakpoint: 1024, settings: { slidesToShow: 4 } },
                { breakpoint: 777, settings: { slidesToShow: 3 } },
                { breakpoint: 575, settings: { slidesToShow: 2 } }
            ]
        });
    }

    $(function () {
        initClientSlider();
    });
})(jQuery);
