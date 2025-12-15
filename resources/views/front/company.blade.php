@extends('front.master')

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">About Us</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="index-2.html" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>About us </span>
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

    <!--welcome-section-->
    <section class="ttm-row welcome-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <!-- ttm_single_image-wrapper -->
                    <div class="ttm_single_image-wrapper">
                        <img width="570" height="484" class="img-fluid" src="{{url('/')}}/uploads/banners/Partition.jpg" alt="single_07">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-heade">
                                <h3 style="color:#32415C">About Creation office Fitouts</h3>
                                <h2 class="title">Inspired Creative and Functional Interiors</h2>
                            </div>
                        </div><!-- section title end -->
                        <p style="color:#32415C;">
                            With Over 10 Years of Experience , Creation office Fitouts incorporates conceptual thinking, spatial and interior design and graphic design to ensure consistent and coherent branded environments for its clients.
                            <br><br>
                            These multi-disciplines manifest themselves through their work for restaurant and entertainment design; retail and corporate office design; and single and multi-family residential projects.
                        </p>
                        <div class="pt-0 res-991-pt-0 pb-30 res-991-pb-0">
                            {{-- <div class="row">
                                <div class="col-lg-6" style="border: 3px solid #32415C; border-radius:10px">
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top">

                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Residential Interior</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>We do all types of the interior designing, decoration work.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pr-0" style="border: 3px solid #32415C; border-radius:10px">
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top">

                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Modern Living Intrior</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>We are master of renovation & innovation of any kind of rooms.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- ttm-progress-bar -->
                        <div class="pt-15 res-991-pt-40">
                            <div class="ttm-progress-bar" data-percent="100%">
                                <div class="progressbar-title">Office Fitouts</div>
                                <div class="progress-bar-inner">
                                    <div class="progress-bar progress-bar-color-bar_skincolor">
                                        <div class="progress-bar-percent" data-percentage="100">100%</div>
                                    </div>
                                </div>
                            </div><!-- ttm-progress-bar end -->
                            <!-- ttm-progress-bar -->
                            <div class="ttm-progress-bar" data-percent="100%">
                                <div class="progressbar-title">Interior Design</div>
                                <div class="progress-bar-inner">
                                    <div class="progress-bar progress-bar-color-bar_skincolor">
                                        <div class="progress-bar-percent" data-percentage="100">100%</div>
                                    </div>
                                </div>
                            </div><!-- ttm-progress-bar end -->
                            <!-- ttm-progress-bar -->
                            <div class="ttm-progress-bar" data-percent="100%">
                                <div class="progressbar-title">Construction</div>
                                <div class="progress-bar-inner">
                                    <div class="progress-bar progress-bar-color-bar_skincolor">
                                        <div class="progress-bar-percent" data-percentage="100">100%</div>
                                    </div>
                                </div>
                            </div><!-- ttm-progress-bar end -->
                        </div>

                        <div class="d-sm-flex align-items-center mt-60 res-767-mt-0">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-darkgrey mr-30 res-767-mt-20" href="{{url('/')}}/about-us" tabindex="0">Lear More</a>
                            <div class="res-767-mt-20">
                                <img width="186" height="53" class="img-fluid" src="{{asset('theme/images/author-sign.png')}}" alt="sign">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome-section end-->

     <!--client-section_1-->
     @include('front.clients-light')
     <!--client-section_1-->


     <!--services-section end-->
     <section class="ttm-row services-section ttm-bgcolor-darkgrey bg-img2 clearfix" id="center-of-excellence">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="pt-10 text-left">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3>Best Services</h3>
                                <h2 class="title">Our Center of Excellence</h2>
                            </div>
                            <div class="title-desc">
                                <p>
                                    From professional office spaces to large retail locations (and everything in between), Creation Office Fitouts is ready to revitalize your company's workspace from concept to completion
                                </p>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <?php $Services = DB::table('services')->get(); ?>
                @foreach ($Services as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-icon-box -->
                    <div class="featured-icon-box icon-align-top-content style2">
                        <div class="featured-icon">
                            <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                <i class="{{$item->icon}}"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>{{$item->title}}</h3>
                            </div>
                            <div class="featured-desc">
                                <p style="min-height:100px;">{{$item->meta}} </p>
                            </div>
                            <div class="ttm-footer">
                                <a target="new" class="ttm-btn btn-inline ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-white" href="{{url('/')}}/center-of-excellence/{{$item->slung}}">Read More</a>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-portfolio end-->
                </div>
                @endforeach
            </div><!-- row end -->
        </div>
    </section>
    <!--services-section end-->



    <!--blog-section-->
    @include('front.blogs')
    <!--blog-section end-->


</div><!--site-main end-->


@endsection
