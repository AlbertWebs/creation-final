<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content=" width=device-width, initial-scale=1, maximum-scale=2" />

<meta name="robots" content="index,follow">
<meta name="googlebot" content="index,follow"><!-- Google Specific -->
<meta name="subject" content="Interior Designer in Kenya | Creation Office Fitouts">
<meta name="rating" content="General">

<!-- SEO -->
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
{!! JsonLd::generate() !!}
<!-- SEO -->

@include('favicon')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/animate.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/flaticon.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/font-awesome.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/CerebriSans.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/themify-icons.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/prettyPhoto.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/twentytwenty.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/shortcodes.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/main.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/megamenu.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/responsive.css')}}"/>
<link rel='stylesheet' id='rs-plugin-settings-css' href="{{asset('theme/revolution/css/rs6.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/home-projects.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/clients-slider.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/mobile-responsive.css')}}"/>

</head>

<body class="ttm-one-page-site">

    <!--page start-->
    <div class="page ttm-bgcolor-grey">

       @include('front.header')


        @yield('content')


        <!--footer start-->
        @include('front.footer')
        <!--footer end-->

        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

</div><!-- page end -->


    <!-- Javascript -->

    <script src="{{asset('theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('theme/js/jquery-migrate-1.4.1.min.js')}}"></script>
    <script src="{{asset('theme/js/tether.min.js')}}"></script>
    <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/js/jquery.easing.js')}}"></script>
    <script src="{{asset('theme/js/jquery-waypoints.js')}}"></script>
    <script src="{{asset('theme/js/jquery-validate.js')}}"></script>
    <script src="{{asset('theme/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('theme/js/slick.min.js')}}"></script>
    <script src="{{asset('theme/js/numinate.min.js')}}"></script>
    <script src="{{asset('theme/js/imagesloaded.min.js')}}"></script>
    <script src="{{asset('theme/js/jquery-isotope.js')}}"></script>
    <script src="{{asset('theme/js/jquery.event.move.js')}}"></script>
    <script src="{{asset('theme/js/jquery.twentytwenty.js')}}"></script>
    <script src="{{asset('theme/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('theme/js/main.js')}}"></script>
    
    <!-- Smooth Scroll for Anchor Links -->
    <script>
        // Smooth scroll for all anchor links and hide Portfolio button on mobile
        (function() {
            // Hide "Our Portfolio" button on mobile, show only "View More"
            function hidePortfolioButton() {
                if (window.innerWidth <= 768) {
                    // Find all buttons with "Portfolio" text in hero slider - use multiple selectors
                    var selectors = [
                        'a.tm-slider-btn',
                        'rs-layer a',
                        '.tm-slider-btn',
                        'a[id*="layer-1"]',
                        'rs-layer[id*="layer-1"] a'
                    ];
                    
                    selectors.forEach(function(selector) {
                        try {
                            document.querySelectorAll(selector).forEach(function(btn) {
                                if (btn && btn.textContent && btn.textContent.trim().includes('Portfolio')) {
                                    btn.style.setProperty('display', 'none', 'important');
                                    btn.style.setProperty('visibility', 'hidden', 'important');
                                    btn.style.setProperty('opacity', '0', 'important');
                                    btn.style.setProperty('pointer-events', 'none', 'important');
                                    btn.style.setProperty('height', '0', 'important');
                                    btn.style.setProperty('width', '0', 'important');
                                    btn.style.setProperty('overflow', 'hidden', 'important');
                                }
                            });
                        } catch(e) {}
                    });
                    
                    // Ensure "View More" is visible and centered
                    selectors.forEach(function(selector) {
                        try {
                            document.querySelectorAll(selector).forEach(function(btn) {
                                if (btn && btn.textContent && btn.textContent.trim().includes('View More')) {
                                    btn.style.setProperty('display', 'block', 'important');
                                    btn.style.setProperty('visibility', 'visible', 'important');
                                    btn.style.setProperty('opacity', '1', 'important');
                                    btn.style.setProperty('position', 'absolute', 'important');
                                    btn.style.setProperty('left', '50%', 'important');
                                    btn.style.setProperty('transform', 'translateX(-50%)', 'important');
                                    btn.style.setProperty('text-align', 'center', 'important');
                                    btn.style.setProperty('pointer-events', 'auto', 'important');
                                }
                            });
                        } catch(e) {}
                    });
                } else {
                    // Show both buttons on desktop - reset styles
                    var allButtons = document.querySelectorAll('a.tm-slider-btn, rs-layer a, .tm-slider-btn');
                    allButtons.forEach(function(btn) {
                        if (btn && btn.textContent && (btn.textContent.includes('Portfolio') || btn.textContent.includes('View More'))) {
                            btn.style.removeProperty('display');
                            btn.style.removeProperty('visibility');
                            btn.style.removeProperty('opacity');
                            btn.style.removeProperty('pointer-events');
                            btn.style.removeProperty('position');
                            btn.style.removeProperty('left');
                            btn.style.removeProperty('transform');
                            btn.style.removeProperty('height');
                            btn.style.removeProperty('width');
                        }
                    });
                }
            }
            
            // Run immediately and on various events
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', hidePortfolioButton);
            } else {
                hidePortfolioButton();
            }
            
            window.addEventListener('resize', hidePortfolioButton);
            
            // Check multiple times to catch Revolution Slider initialization
            setTimeout(hidePortfolioButton, 500);
            setTimeout(hidePortfolioButton, 1000);
            setTimeout(hidePortfolioButton, 2000);
            setTimeout(hidePortfolioButton, 3000);
            
            // Use MutationObserver to watch for DOM changes
            if (window.MutationObserver) {
                var observer = new MutationObserver(function(mutations) {
                    hidePortfolioButton();
                });
                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            }
            
            // Keep slider buttons visible during transitions (desktop only)
            function keepButtonsVisible() {
                // Only run on desktop
                if (window.innerWidth > 768) {
                    var buttons = document.querySelectorAll('a.tm-slider-btn[data-eo="n"], rs-layer.tm-slider-btn[data-eo="n"]');
                    buttons.forEach(function(btn) {
                        if (btn) {
                            // Only force visibility if button should be visible (not Portfolio on mobile)
                            var isPortfolio = btn.textContent && btn.textContent.trim().includes('Portfolio');
                            if (!isPortfolio || window.innerWidth > 768) {
                                // Check computed style to see if Revolution Slider is hiding it
                                var computedStyle = window.getComputedStyle(btn);
                                if (computedStyle.opacity === '0' || computedStyle.visibility === 'hidden') {
                                    // Only force if it's being hidden by slider, not by our mobile script
                                    btn.style.setProperty('opacity', '1', 'important');
                                    btn.style.setProperty('visibility', 'visible', 'important');
                                }
                            }
                        }
                    });
                }
            }
            
            // Run on slider events
            if (typeof jQuery !== 'undefined') {
                jQuery(document).on('revolution.slide.onchange', function() {
                    setTimeout(keepButtonsVisible, 100);
                });
                jQuery(document).on('revolution.slide.onbeforeswap', function() {
                    setTimeout(keepButtonsVisible, 50);
                });
            }
            
            // Also run periodically to catch any disappearing buttons (throttled)
            var keepVisibleInterval = setInterval(keepButtonsVisible, 300);
            
            // Handle links with data-scroll attribute and anchor links for smooth scroll
            function initSmoothScroll() {
                document.querySelectorAll('a[data-scroll], a[href^="#"]').forEach(function(anchor) {
                    // Remove existing listeners to avoid duplicates
                    var newAnchor = anchor.cloneNode(true);
                    anchor.parentNode.replaceChild(newAnchor, anchor);
                    
                    newAnchor.addEventListener('click', function(e) {
                        var href = this.getAttribute('href');
                        if (href && href.startsWith('#')) {
                            var targetId = href.substring(1);
                            if (targetId) {
                                var targetElement = document.getElementById(targetId) || 
                                                   document.querySelector('[name="' + targetId + '"]') || 
                                                   document.querySelector('[id*="' + targetId + '"]');
                                
                                if (targetElement) {
                                    e.preventDefault();
                                    
                                    // Calculate offset for fixed header
                                    var headerOffset = 80;
                                    var elementPosition = targetElement.getBoundingClientRect().top;
                                    var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                                    
                                    window.scrollTo({
                                        top: Math.max(0, offsetPosition),
                                        behavior: 'smooth'
                                    });
                                }
                            }
                        }
                    });
                });
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initSmoothScroll);
            } else {
                initSmoothScroll();
            }
        })();
    </script>

    <!-- Revolution Slider -->
    <script src="{{asset('theme/revolution/js/slider.js')}}"></script>
    <script src="{{asset('theme/revolution/js/revolution.tools.min.js')}}"></script>
    <script src="{{asset('theme/revolution/js/rs6.min.js')}}"></script>
    <!-- Javascript end-->

    <script>
        $("form").each(function() {
            $(this).find(':input[type="submit"]').prop('disabled', true);
        });
        function correctCaptcha() {
            $("form").each(function() {
                $(this).find(':input[type="submit"]').prop('disabled', false);
            });
        }
        
        // Initialize client slider separately to avoid conflicts
        $(document).ready(function() {
            // Wait a bit to ensure main.js has run
            setTimeout(function() {
                if ($('.client-slider').length) {
                    // Destroy any existing initialization first
                    if ($('.client-slider').hasClass('slick-initialized')) {
                        try {
                            $('.client-slider').slick('unslick');
                        } catch(e) {
                            console.log('Error unslicking:', e);
                        }
                    }
                    
                    // Small delay to ensure unslick completes
                    setTimeout(function() {
                        // Force 6 slides on desktop - responsive will handle smaller screens
                        // Slick breakpoints work as "less than or equal to"
                        $('.client-slider').slick({
                            slidesToShow: 6, // 6 logos on desktop (default for screens > 1024px)
                            slidesToScroll: 1,
                            arrows: false,
                            autoplay: true,
                            autoplaySpeed: 2000,
                            speed: 2000,
                            infinite: true,
                            cssEase: 'linear',
                            pauseOnHover: false,
                            pauseOnFocus: false,
                            fade: false,
                            variableWidth: false,
                            adaptiveHeight: false,
                            useTransform: true,
                            responsive: [
                                {
                                    breakpoint: 1024, // 1024px and below: show 4
                                    settings: { 
                                        slidesToShow: 4,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 777, // 777px and below: show 3
                                    settings: { 
                                        slidesToShow: 3,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 575, // 575px and below (mobile): show 2
                                    settings: { 
                                        slidesToShow: 2,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        });
                        
                        // Debug: Log the initialization
                        var windowWidth = $(window).width();
                        var currentSlides = $('.client-slider').slick('slickGetOption', 'slidesToShow');
                        var slideCount = $('.client-slider .slick-slide:not(.slick-cloned)').length;
                        console.log('Client slider initialized. Window width:', windowWidth, 'px. Slides showing:', currentSlides, 'Total slides:', slideCount);
                        
                        // Force correct slide widths for 6 slides on desktop
                        setTimeout(function() {
                            var slider = $('.client-slider');
                            var sliderWidth = slider.width();
                            var targetSlides = currentSlides;
                            
                            // Calculate correct width per slide
                            var slideWidth = Math.floor((sliderWidth - (targetSlides * 16)) / targetSlides); // Account for padding
                            
                            // Apply width to all non-cloned slides
                            slider.find('.slick-slide:not(.slick-cloned)').each(function() {
                                $(this).css({
                                    'width': slideWidth + 'px',
                                    'min-width': slideWidth + 'px',
                                    'max-width': slideWidth + 'px'
                                });
                            });
                            
                            // Force Slick to recalculate
                            slider.slick('setPosition');
                            
                            console.log('Slide widths set to:', slideWidth, 'px for', targetSlides, 'slides');
                        }, 500);
                        
                        // Force visibility
                        $('.client-slider').css({
                            'visibility': 'visible',
                            'opacity': '1',
                            'display': 'block'
                        });
                        $('.client-slider .client-box, .client-slider .client-thumbnail, .client-slider img').css({
                            'visibility': 'visible',
                            'opacity': '1'
                        });
                    }, 300);
                }
            }, 1500);
        });
    </script>


<script type='application/ld+json'>
    {
      "@context": "http://www.schema.org",
      "@type": "ProfessionalService",
      "name": "Creation Office Fitouts",
      "url": "http://creationltd.co.ke/",
      "logo": "https://creationltd.co.ke/theme/images/logos.png",
      "sameAs": [
        "https://www.facebook.com/creationltd",
        "https://www.instagram.com/creation_office_fitout/",
        "https://www.linkedin.com/company/creation-office-fitouts/",
        "https://twitter.com/creationoffice1",
        "https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ"
      ],
      "priceRange": "$$$$",
      "image": "https://creationltd.co.ke/theme/images/logos.png",
      "description": "Creation office Fitouts is the number one interior design firm, in Nairobi, Kenya.

      We are professionals in Interior Design, Construction, Refurbishments, Partitioning, Ceiling and Flooring, Furniture Supply.

      Our team comprises of vibrant, creative, and exemplary interior designers whose sole objective is to deliver quality and excellence to our clients.

      ",
      "address": {
         "@type": "PostalAddress",
         "streetAddress": "Nas Apartments, Laikipia Rd, Nairobi",
         "addressLocality": "Nairobi",
         "addressRegion": "Kenya",
         "postalCode": "00100",
         "addressCountry": "Kenya"
      },
       "openingHours": "Mo 01:00-01:00 Tu 01:00-01:00 We 01:00-01:00 Th 01:00-01:00 Fr 01:00-01:00 Sa 01:00-01:00 Su 01:00-01:00",
       "telephone": "+254723 768593
       "
    }
</script>

</body>

</html>
