<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content=" width=device-width, initial-scale=1, maximum-scale=2" />

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
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/mobile-responsive.css')}}"/>
<link rel='stylesheet' id='rs-plugin-settings-css' href="{{asset('theme/revolution/css/rs6.css')}}">
@yield('additional-head')

</head>

<body class="ttm-one-page-site">

    <!--page start-->
    <div class="page ttm-bgcolor-grey">

       @include('front.header-pages')


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
    </script>

<script type='application/ld+json'>
    {
      "@context": "http://www.schema.org",
      "@type": "ProfessionalService",
      "name": "Creation Office Fitouts",
      "url": "http://creationltd.co.ke/",
      "logo": "https://creationltd.co.ke/favicon/android-icon-192x192.png",
      "sameAs": [
        "https://www.facebook.com/creationltd",
        "https://www.instagram.com/creation_office_fitout/",
        "https://www.linkedin.com/company/creation-office-fitouts/",
        "https://twitter.com/creationoffice1",
        "https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ"
      ],
      "priceRange": "$$$$",
      "image": "https://creationltd.co.ke/favicon/android-icon-192x192.png",
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
