@extends('front.master')

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Our Work</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="{{url('/')}}" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>Our Work</span>
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

    <!--grid-section-->
    <section class="ttm-row grid-section clearfix">
        <div class="container">
            <div class="row">
                <?php $Portfolio = DB::table('portfolios')->orderBy('id','DESC')->get(); ?>
                @foreach ($Portfolio as $item)
                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-imagebox-portfolio -->
                    <div class="featured-imagebox featured-imagebox-portfolio style3">
                        <!-- featured-thumbnail -->
                        <div class="featured-thumbnail">
                            <img width="610" height="750" class="img-fluid" src="{{url('/')}}/uploads/portfolios/{{$item->image}}" alt="{{$item->title}}">
                        </div>
                        <!-- featured-thumbnail end-->
                        <div class="featured-content-inner">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3><a href="{{url('/')}}/portfolio/{{$item->slung}}">{{$item->title}}</a></h3>
                                </div>
                                <div class="featured-desc">
                                    <p>{{$item->meta}}</p>
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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-darkgrey mt-35 res-991-mt-20" href="{{url('/')}}/contact-us">Get A Quote</a>
                </div>
            </div>
        </div>
    </section><!--grid-section end-->




    @include('front.blogs')

</div><!--site-main end-->





@endsection
