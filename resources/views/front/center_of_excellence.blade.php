@extends('front.master')

@section('content')
@foreach ($Service as $Ser)



<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h1 class="title" style="color: #fff !important;">{{$Ser->title}}</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb-wrapper-inner" itemscope itemtype="https://schema.org/BreadcrumbList">
                                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                        <a itemprop="item" title="Go to Home" href="{{url('/')}}" class="home">
                                            <span itemprop="name"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</span>
                                        </a>
                                        <meta itemprop="position" content="1" />
                                    </span>
                                    <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                        <span itemprop="name">{{$Ser->title}}</span>
                                        <meta itemprop="position" content="2" />
                                    </span>
                                </ol>
                            </nav>
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
                <div class="col-lg-6 col-md-12">
                    <div class="pt-20 res-991-pt-0">
                        <!-- section title -->
                        <div class="section-title">

                            <div style="color:#000000; font-size:16px;">
                                @php
                                    $decodedContent = html_entity_decode($Ser->content, ENT_QUOTES, 'UTF-8');
                                    // Split by double newlines to create paragraphs
                                    $paragraphs = preg_split('/\n\s*\n/', $decodedContent, -1, PREG_SPLIT_NO_EMPTY);
                                @endphp
                                @foreach($paragraphs as $paragraph)
                                    <p style="margin-bottom: 15px;">{!! nl2br(trim($paragraph)) !!}</p>
                                @endforeach
                            </div>
                        </div><!-- section title end -->
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor mt-15 w-100 text-center" target="new" href="{{url('/')}}/contact-us" tabindex="0" style="color: #fff !important;">Contact Us <i class="ti ti-arrow-right"></i></a>

                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <!-- ttm_single_image-wrapper -->
                    <div class="ttm_single_image-wrapper">
                        <img  class="img-fluid" style="max-height: 500px; width:100%; border: 5px solid#32415C" src="{{url('/')}}/uploads/services/{{$Ser->image}}" alt="{{$Ser->title}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome-section end-->
    @if($Ser->content_extra == null)


    @else
      <!--welcome-section-->
      <section class="welcome-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="pt-20 res-991-pt-0">
                        <!-- section title -->
                        <div class="section-title">

                            <div style="color:#000000; font-size:16px;">
                                @php
                                    $decodedContentExtra = html_entity_decode($Ser->content_extra, ENT_QUOTES, 'UTF-8');
                                    // Split by double newlines to create paragraphs
                                    $paragraphsExtra = preg_split('/\n\s*\n/', $decodedContentExtra, -1, PREG_SPLIT_NO_EMPTY);
                                @endphp
                                @foreach($paragraphsExtra as $paragraph)
                                    <p style="margin-bottom: 15px;">{!! nl2br(trim($paragraph)) !!}</p>
                                @endforeach
                            </div>
                            <hr>
                        </div><!-- section title end -->
                        {{-- <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor mt-15 w-100 text-center" target="new" href="{{url('/')}}/contact-us" tabindex="0">Contact Us <i class="ti ti-arrow-right"></i></a> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome-section end-->
    @endif


    <!-- procedure-section -->
    <section class="ttm-row procedure-section ttm-bgcolor-grey clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-10 m-auto">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3>Processing</h3>
                            <h2 class="title">Best Solutions For Your Dream</h2>
                        </div>
                        <p>Our team comprises of vibrant, creative, and exemplary interior designers whose sole objective is to deliver quality and excellence to our clients</p>
                    </div>
                    <!-- section title end -->
                </div>
            </div>
            <!-- row -->
            <div class="col-lg-12">
                <div class="featuredbox-number processbox">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content style4">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor ttm-icon_element-size-xl ttm-icon_element-style-rounded">
                                        <i style="color:#32415C" class="fa fa-edit"></i>
                                        <span style="color:#32415C" class="ttm-num"></span>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>The Feasibility</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>This initial phase of the  project includes preliminary studies</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content style4">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor ttm-icon_element-size-xl ttm-icon_element-style-rounded">
                                        <i style="color:#32415C" class="flaticon flaticon-interior-design-1"></i>
                                        <span style="color:#32415C" class="ttm-num"></span>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Mockup</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>we get into the detail of  the scheme. We’ll refine the internal</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content style4">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor ttm-icon_element-size-xl ttm-icon_element-style-rounded">
                                        <i style="color:#32415C" class="fa fa-check-circle"></i>
                                        <span style="color:#32415C" class="ttm-num"></span>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Approvals</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Once the contractor is  appointed, will workshops to review</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content style4">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-skincolor ttm-icon_element-size-xl ttm-icon_element-style-rounded">
                                        <i style="color:#32415C" class="fa fa-cog"></i>
                                        <span style="color:#32415C" class="ttm-num"></span>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Implementation</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>The project concludes  will visit site to inspect all the works</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!-- procedure-section end -->


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
                                From professional office spaces to large retail locations (and everything in between), Creation Office Fitouts LTD is ready to revitalize your company's workspace from concept to completion
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



    @include('front.blogs')


</div><!--site-main end-->

@endforeach
@endsection
