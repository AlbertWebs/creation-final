@extends('front.master')

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Center of Excellence</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="{{url('/')}}" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>Center of Excellence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($Service as $Ser)
<!--site-main start-->
<div class="site-main">

    <!--welcome-section-->
    <section class="ttm-row welcome-section clearfix ttm-bgcolor-white">
        <div class="container">
            <div class="row ttm-bgcolor-white">
                <div class="col-lg-6 col-md-12">
                    <div class="pt-20 res-991-pt-0">
                        <!-- section title -->
                        <div class="section-title">
                            <h2>{{$Ser->title}}</h2>
                            <p style="color:#000000; font-size:16px;">{!! html_entity_decode($Ser->content, ENT_QUOTES, 'UTF-8') !!}</p>
                        </div><!-- section title end -->

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

                            <p style="color:#000000; font-size:16px;">{!! html_entity_decode($Ser->content_extra, ENT_QUOTES, 'UTF-8') !!}</p>
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




</div><!--site-main end-->

@endforeach
<a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor mt-15 w-100 text-center" target="new" href="{{url('/')}}/contact-us" tabindex="0">Contact Us <i class="ti ti-arrow-right"></i></a>

@endsection
