@extends('front.master')

@section('additional-head')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/portfolio-detail.css')}}"/>
@endsection

@section('content')
@foreach ($Portfolio as $port)



<div class="ttm-page-title-rows" style="background: url('{{url('/')}}/uploads/portfolios/{{$port->image_one}}');  width: 100%;  background-size: cover;   background-position: center;   position: relative;  z-index: 1;">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Interior Work</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="{{url('/')}}" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>Interior Work</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--site-main start-->
<div class="site-main">


    <!-- project-single-section -->
    <section class="ttm-row project-single-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ttm-pf-single-content-wrapper-innerbox ttm-pf-view-top-image">
                        <div class="ttm-pf-single-content-wrapper">
                            <!-- ttm_single_image-wrapper -->
                            <div class="ttm_single_image-wrapper portfolio-hero-image">
                                <a href="{{url('/')}}/uploads/portfolios/{{$port->image_one}}" class="ttm_prettyphoto portfolio-lightbox-image" rel="prettyPhoto[portfolio]" data-rel="prettyPhoto">
                                    <img  class="img-fluid" src="{{url('/')}}/uploads/portfolios/{{$port->image_one}}" style="max-height:500px; width:1200px !important; object-fit: cover;" alt="{{$port->title}}">
                                </a>
                            </div><!-- ttm_single_image-wrapper end -->
                            <div class="ttm-pf-single-detail-box ttm-bgcolor-darkgrey ttm-textcolor-white">
                                <h2 class="ttm-pf-detailbox-title">Project Details:</h2>
                                <ul class="ttm-pf-detailbox-list">
                                    <li>
                                        <div class="ttm-pf-data-title">Project</div>
                                        <div class="ttm-pf-data-details">{{$port->title}}</div>
                                    </li>
                                    <li>
                                        <div class="ttm-pf-data-title">Clients</div>
                                        <div class="ttm-pf-data-details">{{$port->client}}</div>
                                    </li>
                                    <li>
                                        <div class="ttm-pf-data-title">Location</div>
                                        <div class="ttm-pf-data-details">Nairobi, Kenya</div>
                                    </li>
                                    <li>
                                        <div class="ttm-pf-data-title">Project Year</div>
                                        <div class="ttm-pf-data-details">--</div>
                                    </li>
                                </ul>
                                <div class="ttm-single-pf-footer">
                                    <div class="ttm-social-share-wrapper">
                                        <div class="ttm-social-share-title">Share Media:</div>
                                        <div class="ttm-social-share-links">
                                            <ul class="social-icons square">
                                                <li class="social-facebook">
                                                    <a href="https://www.facebook.com/creationltd"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="social-twitter">
                                                    <a href="https://twitter.com/creationoffice1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="social-instagram">
                                                    <a href="https://www.instagram.com/creation_office_fitout/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="social-linkedin">
                                                    <a href="https://www.linkedin.com/company/creation-office-fitouts/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ttm-pf-single-content-area">
                            <h2>{{$port->title}}</h2>

                            <!-- Portfolio Gallery Grid -->
                            <div class="portfolio-gallery-grid">
                                @php
                                    $images = [
                                        'image_two' => $port->image_two,
                                        'image_three' => $port->image_three,
                                        'image_four' => $port->image_four,
                                        'image_five' => $port->image_five,
                                        'image_six' => $port->image_six,
                                        'image_seven' => $port->image_seven,
                                        'image_eight' => $port->image_eight,
                                        'image_nine' => $port->image_nine,
                                        'image_ten' => $port->image_ten,
                                    ];
                                @endphp
                                
                                @foreach($images as $key => $image)
                                    @if($image && $image != '0' && $image != null)
                                        <div class="portfolio-image-item">
                                            <a href="{{url('/')}}/uploads/portfolios/{{$image}}" class="ttm_prettyphoto portfolio-lightbox-image" rel="prettyPhoto[portfolio]" data-rel="prettyPhoto" title="{{$port->title}}">
                                                <img src="{{url('/')}}/uploads/portfolios/{{$image}}" alt="{{$port->title}} - Image {{$loop->iteration + 1}}" loading="lazy">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="ttm-horizontal_sep width-100 mt-25 mb-25 res-991-mt-15"></div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- featured-icon-box -->
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style6">
                                        {{-- <div class="featured-icon icon-with-bg-shape">
                                            <div class="ttm-icon ttm-icon_element-fill ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                                <i class="flaticon flaticon-stairs"></i>
                                            </div>
                                        </div> --}}
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Our people make us unique</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>
                                                    From trusted expertise to emerging talent, Creation's Team have the drive to succeed and a genuine approach that delivers exceptional results for our clients and the communities we serve.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- featured-icon-box -->
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style6">
                                        {{-- <div class="featured-icon icon-with-bg-shape">
                                            <div class="ttm-icon ttm-icon_element-fill ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                                <i class="flaticon flaticon-windows"></i>
                                            </div>
                                        </div> --}}
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>We have ambition built on deep expertise</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>
                                                    We are ambitious to be the best we can be, individually and collectively.<br>

                                                    Our plans for growth are built on a foundation of collective expertise that few can match.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- featured-icon-box -->
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style6">
                                        {{-- <div class="featured-icon icon-with-bg-shape">
                                            <div class="ttm-icon ttm-icon_element-fill ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                                <i class="flaticon flaticon-interior-design"></i>
                                            </div>
                                        </div> --}}
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Relationships define our success</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>We are a business that builds strong relationships forged on trust and reliability.

                                                    We make ourselves easy to do business with and follow through on our promises.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ttm-nextprev-bottom-nav d-flex justify-content-between">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-icon-btn-right ttm-btn-style-fill ttm-btn-color-grey" href="#">Previous</a>
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-icon-btn-right ttm-btn-style-fill ttm-btn-color-grey" href="#">Next</a>
                                    </div>
                                </div>
                            </div><!-- row end-->
                        </div>
                        <?php $Portfolio = DB::table('portfolios')->inRandomOrder()->limit('3')->orderBy('id','DESC')->get(); ?>

                        <div class="ttm-pf-single-related-wrapper mb_15">
                            <h2>Related Projects</h2>
                            <div class="row">
                                @foreach ($Portfolio as $item)
                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-6">
                                    <!-- featured-imagebox-portfolio -->
                                    <div class="featured-imagebox featured-imagebox-portfolio style3">
                                        <!-- featured-thumbnail -->
                                        <div class="featured-thumbnail">
                                            <img width="610" height="750" class="img-fluid" src="{{url('/')}}/uploads/portfolios/{{$item->image}}" alt="image">
                                        </div>
                                        <!-- featured-thumbnail end-->
                                        <div class="featured-content-inner">
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h3><a href="{{url('/')}}/portfolio/{{$item->slung}}">{{$item->title}}</a></h3>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>
                                                        Our impact is measured not just in the quality of the project delivered but in the longer-term impact on the environment, communities and people.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="ttm-footer">
                                                <a class="ttm-btn btn-inline ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark" href="{{url('/')}}/portfolio/{{$item->slung}}">Read More<i class="ti ti-plus"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-portfolio end-->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-single-section end -->


</div><!--site-main end-->
@endforeach

<script>
    // Initialize prettyPhoto for portfolio images
    $(document).ready(function() {
        $("a[rel^='prettyPhoto[portfolio]']").prettyPhoto({
            social_tools: false,
            theme: 'pp_default',
            horizontal_padding: 20,
            opacity: 0.8,
            show_title: true,
            allow_resize: true,
            default_width: 1200,
            default_height: 800,
            deeplinking: false,
            overlay_gallery: false,
            allow_expand: true // Keep expand functionality but fix close button
        });
        
        // Fix close button issue - ensure it closes instead of expanding
        // Use event delegation with higher priority
        $(document).off('click', 'a.pp_close').on('click', 'a.pp_close', function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation(); // Prevent other handlers
            
            // Call prettyPhoto close function directly
            if (typeof $.prettyPhoto !== 'undefined' && typeof $.prettyPhoto.close === 'function') {
                $.prettyPhoto.close();
            } else {
                // Fallback: remove modal classes and hide overlay
                $('body').removeClass('pp_modal_open');
                $('.pp_overlay, .pp_pic_holder').fadeOut(300, function() {
                    $(this).remove();
                });
            }
            return false;
        });
        
        // Ensure expand button doesn't interfere - but allow it to work
        $(document).on('click', 'a.pp_expand, a.pp_contract', function(e) {
            // Only stop propagation if it's not the expand button itself
            if (!$(e.target).hasClass('pp_expand') && !$(e.target).hasClass('pp_contract')) {
                e.stopPropagation();
            }
        });
        
        // Additional safety: ensure close button is always on top
        $(document).on('DOMNodeInserted', function() {
            $('a.pp_close').css({
                'z-index': '20002',
                'position': 'absolute',
                'right': '0',
                'top': '0'
            });
        });
    });
</script>

@endsection
