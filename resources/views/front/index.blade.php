@extends('front.master-home')

@section('content')

<div class="ttm-rev_slider-wide" id="home">
    <!-- START homemainclassicslider REVOLUTION SLIDER 6.1.8 -->
    <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery">

        <rs-module id="rev_slider_1_1" style="display:none;" data-version="6.1.8">

            {{-- <div class="ttm-quickdetails-area">
                <ul class="top-contact">
                    <li><i class="fa fa-map-marker ttm-textcolor-skincolor"></i>Nas Apartments, Laikipia Rd</li>
                    <li><i class="fa fa-phone ttm-textcolor-skincolor"></i>+254 723 768 593</li>
                    <li><i class="fa fa-envelope-o ttm-textcolor-skincolor"></i>Email: <a href="mailto:info@creationltd.co.ke">info@creationltd.co.ke</a></li>
                </ul>
            </div> --}}

            <rs-slides>

                @forelse($sliders as $index => $slider)
                <rs-slide data-key="rs-{{$index + 1}}" data-title="{{$slider->name ?? 'Slide'}}" data-thumb="{{url('/')}}/uploads/slider/{{$slider->image}}" data-anim="ei:d;eo:d;s:d;r:0;t:grayscalecross;sl:d;">

                    <img src="{{url('/')}}/uploads/slider/{{$slider->image}}" title="{{$slider->name ?? 'slider-bg'}}" width="1741" height="700" class="rev-slidebg" data-no-retina>

                    {{-- Dark transparent overlay covering entire screen --}}
                    <rs-layer
                        id="slider-1-slide-{{$index + 1}}-layer-overlay"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="x:l;xo:0,0,0,0;y:t;yo:0,0,0,0;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:100vw,100vw,100vw,100vw;h:100vh,100vh,100vh,100vh;"
                        data-frame_0="o:0;"
                        data-frame_1="st:0;sp:500;o:1;"
                        data-frame_999="o:1;st:w;sR:8500;"
                        style="z-index:7;background:rgba(0,0,0,0.0) !important; width:100vw !important; height:100vh !important; min-width:100vw !important; min-height:100vh !important; max-width:100vw !important; max-height:100vh !important; position:fixed !important; left:0 !important; top:0 !important; right:0 !important; bottom:0 !important; margin:0 !important; padding:0 !important; transform:none !important;"
                    >
                    </rs-layer>

                    @if($slider->name)
                    <rs-layer
                        id="slider-1-slide-{{$index + 1}}-layer-0"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:45px,45px,1px,0;yo:331px,331px,84px,71px;"
                        data-text="w:normal;s:17,17,16,15;l:25,25,18,18;fw:500;"
                        data-frame_0="x:50,50,31,19;"
                        data-frame_1="st:200;sp:500;sR:200;"
                        data-frame_999="o:0;st:w;sR:8300;"
                        style="z-index:9;font-family:Cerebri Sans;text-transform:uppercase; background:rgba(0,0,0,0.5) !important; padding:2px; "
                    >{{$slider->name}}
                    </rs-layer>
                    @endif

                    <a
                        id="slider-1-slide-{{$index + 1}}-layer-1"
                        class="rs-layer tm-slider-btn"
                        href="{{url('/')}}/portfolio"  target="_self"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:243px,243px,-80px,-40px;y:m;yo:151px,151px,120px,228px;"
                        data-text="w:normal;s:14;l:14,14,8,6;fw:700;a:center;"
                        data-padding="t:15,15,15,9;r:38,38,24,15;b:15,15,15,9;l:38,38,24,15;"
                        data-border="bos:solid;boc:#32415C;bow:1px,1px,1px,1px;bor:50px,50px,50px,50px;"
                        data-eo="n"
                        data-ei="n"
                        data-frame_0="o:0;y:50,50,31,19;"
                        data-frame_1="o:1;y:0,0,0,0;st:800;sp:500;sR:800;"
                        data-frame_999="o:1;y:0,0,0,0;st:w;"
                        data-frame_hover="c:#32415C;bgc:#fff;boc:#fff;bor:50px,50px,50px,50px;bos:solid;bow:1px,1px,1px,1px;"
                        style="z-index:10;background-color:#32415C;font-family:Cerebri Sans;text-transform:uppercase;"
                    >Our Portfolio <i class="fa fa-long-arrow-right left-icon-spacing"></i>
                    </a>

                    <rs-layer
                        id="slider-1-slide-1-layer-2"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="xo:0,0,-160px,-98px;yo:269px,269px,167px,103px;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:5px,5px,3px,1px;h:407px,407px,263px,162px;"
                        data-frame_999="o:0;st:w;"
                        style="z-index:20;background-color:#32415C;"
                    >
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-3"
                        class="tm-skincolor-strong"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:44px,44px,0,0;y:m;yo:61px,61px,-10px,10px;"
                        data-text="w:normal;s:68,68,60,40;l:84,84,70,43;fw:700;"
                        data-frame_0="x:-50,-50,-31,-19;"
                        data-frame_1="st:440;sp:900;sR:440;"
                        data-frame_999="o:0;st:w;sR:7660;"
                        style="z-index:11;font-family:Cerebri Sans; background:rgba(0,0,0,0.5) !important; "
                    >Your Office
                    </rs-layer>

                    <a
                        id="slider-1-slide-{{$index + 1}}-layer-4"
                        class="rs-layer tm-slider-btn"
                        href="#about" target="_self"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:44px,44px,100px,50px;y:m;yo:153px,153px,120px,228px;"
                        data-text="w:normal;s:14;l:14,14,8,6;fw:700;a:center;"
                        data-padding="t:15;r:38,38,18,10;b:15;l:38,38,18,10;"
                        data-border="bos:solid;boc:#ffffff;bow:1px,1px,1px,1px;bor:50px,50px,50px,50px;"
                        data-eo="n"
                        data-ei="n"
                        data-frame_0="o:0;y:50,50,31,19;"
                        data-frame_1="o:1;y:0,0,0,0;st:850;sp:500;sR:800;"
                        data-frame_999="o:1;y:0,0,0,0;st:w;"
                        data-frame_hover="bgc:#32415C;boc:#32415C;bor:50px,50px,50px,50px;bos:solid;bow:1px,1px,1px,1px;"
                        style="z-index:12;font-family:Cerebri Sans;text-transform:uppercase;"
                    >View More <i class="fa fa-long-arrow-right left-icon-spacing"></i>
                    </a>

                    <rs-layer
                        id="slider-1-slide-1-layer-5"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:189px,189px,-108px,-225px;y:b;yo:51px,51px,37px,239px;"
                        data-text="w:normal;s:14,14,8,4;l:22,22,13,8;"
                        data-vbility="t,t,f,f"
                        data-frame_0="sX:0.9;sY:0.9;"
                        data-frame_1="e:power2.inOut;st:890;sp:500;sR:890;"
                        data-frame_999="o:0;st:w;sR:7610;"
                        style="z-index:15;font-family:Cerebri Sans;"
                    >Click Here To
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-6"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:146px,146px,-136px,-145px;y:b;yo:22px,22px,18px,216px;"
                        data-text="w:normal;s:20,20,12,7;l:22,22,13,8;fw:700;"
                        data-vbility="t,t,f,f"
                        data-frame_0="sX:0.9;sY:0.9;"
                        data-frame_1="y:-1px,-1px,0px,0px;e:power2.inOut;st:930;sp:400;sR:930;"
                        data-frame_999="o:0;st:w;sR:7670;"
                        style="z-index:16;font-family:Cerebri Sans;"
                    >Watch Video
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-7"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:0,0,-230px,-281px;y:b;yo:0,0,0,196px;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:300px,300px,194px,119px;h:100px,100px,64px,39px;"
                        data-vbility="t,t,f,f"
                        data-border="bor:6px,6px,0px,0px;"
                        data-frame_0="y:50,50,31,19;"
                        data-frame_1="st:830;sp:500;sR:830;"
                        data-frame_999="o:0;st:w;sR:7670;"
                        style="z-index:14;background-color:rgba(0,0,0,0.5);"
                    >
                    </rs-layer>

                    <a
                        id="slider-1-slide-1-layer-8"
                        class="rs-layer ttm_prettyphoto"
                        href="https://youtu.be/64Iq4Y4lFSc-remove-everithing-after-c" target="_self"
                        data-type="text"
                        data-color="#32415C"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:28px,28px,-213px,-151px;y:b;yo:28px,28px,17px,186px;"
                        data-text="w:normal;s:20,20,18,11;l:42,42,26,16;a:center;"
                        data-dim="w:44px,44px,28px,17px;h:44px,44px,28px,17px;"
                        data-vbility="t,t,f,f"
                        data-border="bos:solid;boc:#ffffff;bow:1px,1px,1px,1px;bor:50px,50px,50px,50px;"
                        data-frame_0="sX:0.9;sY:0.9;"
                        data-frame_1="e:power2.inOut;st:980;sp:500;sR:980;"
                        data-frame_999="o:0;st:w;sR:7520;"
                        style="z-index:19;background-color:#ffffff;font-family:Roboto;"
                    ><i class="fa fa-play"></i>
                    </a>

                    <rs-layer
                        id="slider-1-slide-1-layer-9"
                        class="ttm-skincolor-strong"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:45px,45px,0,0;y:t,t,t,m;yo:364px,364px,113px,-40px;"
                        data-text="w:normal;s:68,68,60,40;l:84,84,70,43;fw:700;"
                        data-frame_0="x:50,50,31,19;"
                        data-frame_1="st:250;sp:900;sR:250;"
                        data-frame_999="o:0;st:w;sR:7850;"
                        style="z-index:11;font-family:Cerebri Sans; background:rgba(0,0,0,0.5) !important; "
                    >Bring Elegance To
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-10"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="xo:0,0,-160px,-98px;yo:264px,264px,164px,101px;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:175px,175px,113px,69px;h:5px,5px,3px,1px;"
                        data-frame_999="o:0;st:w;"
                        style="z-index:22;background-color:#32415C;"
                    >
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-11"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="xo:0,0,-210px,-129px;yo:671px,671px,430px,265px;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:175px,175px,113px,69px;h:5px,5px,3px,1px;"
                        data-frame_999="o:0;st:w;"
                        style="z-index:21;background-color:#32415C;"
                    >
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-12"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:20px,20px,-218px,-134px;y:b;yo:20px,20px,12px,7px;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:60px,60px,38px,23px;h:60px,60px,38px,23px;"
                        data-border="bos:solid;boc:rgba(255, 255, 255, 0);bow:1px,1px,1px,1px;bor:50px,50px,50px,50px;"
                        data-frame_0="sX:0.8;sY:0.8;"
                        data-frame_1="e:power4.out;st:1020;sp:500;"
                        data-frame_999="o:0;st:w;"
                        style="z-index:18;background-color:rgba(255,255,255,0.5);"
                    >
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-13"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="x:r;xo:0,0,-230px,-141px;y:b;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:100px,100px,64px,39px;h:100px,100px,64px,39px;"
                        data-border="bor:0px,6px,0,0;"
                        data-frame_0="y:50,50,31,19;"
                        data-frame_1="st:830;sp:500;"
                        data-frame_999="o:0;st:w;"
                        style="z-index:17;background-color:#32415C;"
                    >
                    </rs-layer>

                    <rs-layer
                        id="slider-1-slide-1-layer-14"
                        data-type="shape"
                        data-rsp_ch="on"
                        data-xy="xo:-330px,-330px,0,0;yo:50px,50px,0,0;"
                        data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                        data-dim="w:300px,300px,100%,100%;h:180px,180px,100%,100%;"
                        data-vbility="f,t,t,t"
                        data-frame_999="o:0;st:w;"
                        style="z-index:8;background-color:rgba(0,0,0,0.3);"
                    >
                    </rs-layer>

                </rs-slide>
                @empty
                <!-- Default slide if no sliders exist -->
                <rs-slide data-key="rs-1" data-title="Slide" data-thumb="{{asset('theme/images/slides/slider-mainbg-001.jpg')}}" data-anim="ei:d;eo:d;s:d;r:0;t:grayscalecross;sl:d;">
                    <img src="{{asset('theme/images/slides/slider-mainbg-001.jpg')}}" title="slider-bg001" width="1741" height="700" class="rev-slidebg" data-no-retina>
                    <rs-layer
                        id="slider-1-slide-1-layer-0"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:45px,45px,1px,0;yo:331px,331px,84px,71px;"
                        data-text="w:normal;s:17,17,16,15;l:25,25,18,18;fw:500;"
                        data-frame_0="x:50,50,31,19;"
                        data-frame_1="st:200;sp:500;sR:200;"
                        data-frame_999="o:0;st:w;sR:8300;"
                        style="z-index:9;font-family:Cerebri Sans;text-transform:uppercase;"
                    >Welcome to Creation Office Fitouts
                    </rs-layer>
                    <a
                        id="slider-1-slide-1-layer-1"
                        class="rs-layer tm-slider-btn"
                        href="{{url('/')}}/portfolio"  target="_self"
                        data-type="text"
                        data-rsp_ch="on"
                        data-xy="x:l,l,c,c;xo:243px,243px,0,0;y:m;yo:151px,151px,120px,228px;"
                        data-text="w:normal;s:14;l:14,14,8,6;fw:700;a:center;"
                        data-padding="t:15,15,15,9;r:38,38,24,15;b:15,15,15,9;l:38,38,24,15;"
                        data-border="bos:solid;boc:#32415C;bow:1px,1px,1px,1px;bor:50px,50px,50px,50px;"
                        data-eo="n"
                        data-ei="n"
                        data-frame_0="o:0;y:50,50,31,19;"
                        data-frame_1="o:1;y:0,0,0,0;st:800;sp:500;sR:800;"
                        data-frame_999="o:1;y:0,0,0,0;st:w;"
                        data-frame_hover="c:#32415C;bgc:#fff;boc:#fff;bor:50px,50px,50px,50px;bos:solid;bow:1px,1px,1px,1px;"
                        style="z-index:10;background-color:#32415C;font-family:Cerebri Sans;text-transform:uppercase;"
                    >Our Portfolio <i class="fa fa-long-arrow-right left-icon-spacing"></i>
                    </a>
                </rs-slide>
                @endforelse

            </rs-slides>

            <rs-progress class="rs-bottom" style="visibility: hidden !important;"></rs-progress>
        </rs-module>

   </rs-module-wrap>
</div>
<!-- END REVOLUTION SLIDER -->

<!--site-main start-->
<div class="site-main">

    <!--welcome-section-->
    <section class="ttm-row welcome-section clearfix" id="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <!-- ttm_single_image-wrapper -->
                    <div class="ttm_single_image-wrapper res-991-mb-40">
                        {{-- <img width="554" height="603" class="img-fluid" src="{{asset('theme/images/single-img-01.jpg')}}" alt="single_01"> --}}
                        <img width="554" height="603" class="img-fluid" src="{{url('/')}}/uploads/slider/photo_2024-02-09_15-19-34.jpg" alt="Creation Office Fitouts">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-heade">
                                <h3 style="color:#32415C">About Creation Office Fitouts</h3>
                                <h2 class="title">Inspired Creative and Functional Interiors</h2>
                            </div>
                        </div><!-- section title end -->
                        <p style="color:#32415C;">
                            Creation office Fitouts is the number one interior design firm, in Nairobi, Kenya.

                            We are professionals in Interior Design, Construction, Refurbishments, Partitioning, Ceiling and Flooring, Furniture Supply.<br><br>

                            Our organization boasts a dynamic team of passionate and skilled interior designers dedicated to delivering unparalleled quality and excellence to clients. With a unique blend of creativity and expertise, our designers transform visions into reality, creating spaces that marry aesthetic brilliance with functional practicality.
                            <br><br>
                            Creativity is our driving force, with a commitment to pushing design boundaries, setting trends, and embracing challenges for inventive expression. Exemplary work is our standard, seen in meticulous attention to detail, dedication to functionality and sustainability, and a client-centric approach that tailors designs to exceed expectations.<br><br>

                            As we move forward, our commitment to quality, creativity, and excellence invites clients to join a journey where aspirations meet innovation, shaping spaces that leave a lasting mark on the world of interior design.
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
                        {{-- <div class="pt-15 res-991-pt-40">
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
                        </div> --}}

                        <div class="d-sm-flex align-items-center mt-60 res-767-mt-0">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-darkgrey mr-30 res-767-mt-20" href="{{url('/')}}/about-us" tabindex="0">Lear More</a>
                            {{-- <div class="res-767-mt-20">
                                <img width="186" height="53" class="img-fluid" src="{{asset('theme/images/author-sign.png')}}" alt="sign">
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome-section end-->


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
                <?php $Services = DB::table('services')->where('home','1')->get(); ?>
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







    <!--bottom_zero_padding-section-->
    <section class="ttm-row bottom_zero_padding-section clearfix">
        <div class="container">
            <!--row-->
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                    <!--section-title-->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3 style="color: #32415C">Working Style</h3>
                            <h2 class="title">Our Innovative Approaches, Defines Our Strength</h2>
                        </div>
                    </div><!--section-title end-->
                </div>
            </div><!--row end-->
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-100">
                        <div class="ttm-bgcolor-white box-shadow position-relative z-index-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt_70 featuredbox-number">
                                        <div class="row no-gutters">
                                            <div class="ttm-box-col-wrapper col-lg-4 col-md-12">
                                                <!-- featured-icon-box -->
                                                <div class="featured-imagebox featured-imagebox-services style1">
                                                    <div class="featured-thumbnail">
                                                        <img src="{{url('/')}}/uploads/banners/pexels-pixabay-45842.jpg" class="img-fluid" alt="services-1">
                                                    </div>
                                                    <div class="featured-content">
                                                        <div class="featured-title">
                                                            <h3>Our people make us unique</h3>
                                                        </div>
                                                        <div class="featured-desc">
                                                            {{-- <p>Our people are the core of our business and the force behind our success.</p> --}}
                                                            {{-- <p>We have an open and inclusive culture which sets us apart.</p> --}}
                                                            <p>From trusted expertise to emerging talent, Creation's Team have the drive to succeed and a genuine approach that delivers exceptional results for our clients and the communities we serve.</p>
                                                        </div>
                                                        <a class="ttm-btn ttm-btn-size-md btn-inline ttm-icon-btn-right ttm-btn-color-skincolor" href="#about">Read More<i class="fa fa-long-arrow-right"></i></a>
                                                        <i class="ttm-num ti-info"></i>
                                                    </div>
                                                </div><!-- featured-icon-box end-->
                                            </div>
                                            <div class="ttm-box-col-wrapper col-lg-4 col-md-12">
                                                <!-- featured-icon-box -->
                                                <div class="featured-imagebox featured-imagebox-services style1">
                                                    <div class="featured-thumbnail">
                                                        <img src="{{asset('theme/images/services/service-02-260x260.jpg')}}" class="img-fluid" alt="services-1">
                                                    </div>
                                                    <div class="featured-content">
                                                        <div class="featured-title">
                                                            <h3>We have ambition built on deep expertise</h3>
                                                        </div>
                                                        <div class="featured-desc">
                                                            <p>We are ambitious to be the best we can be, individually and collectively.</p>
                                                            <p>Our plans for growth are built on a foundation of collective expertise that few can match.</p>
                                                        </div>
                                                        <a class="ttm-btn ttm-btn-size-md btn-inline ttm-icon-btn-right ttm-btn-color-skincolor" href="#about">Read More<i class="fa fa-long-arrow-right"></i></a>
                                                        <i class="ttm-num ti-info"></i>
                                                    </div>
                                                </div><!-- featured-icon-box end-->
                                            </div>
                                            <div class="ttm-box-col-wrapper col-lg-4 col-md-12">
                                                <!-- featured-icon-box -->
                                                <div class="featured-imagebox featured-imagebox-services style1">
                                                    <div class="featured-thumbnail">
                                                        <img src="{{url('/')}}/uploads/banners/pexels-cyton.jpg" class="img-fluid" alt="services-1">
                                                    </div>
                                                    <div class="featured-content">
                                                        <div class="featured-title">
                                                            <h3>Relationships define our success</h3>
                                                        </div>
                                                        <div class="featured-desc">
                                                            <p>We are a business that builds strong relationships forged on trust and reliability.</p>
                                                            <p>We make ourselves easy to do business with and follow through on our promises.</p>
                                                        </div>
                                                        <a class="ttm-btn ttm-btn-size-md btn-inline ttm-icon-btn-right ttm-btn-color-skincolor" href="#about">Read More<i class="fa fa-long-arrow-right"></i></a>
                                                        <i class="ttm-num ti-info"></i>
                                                    </div>
                                                </div><!-- featured-icon-box end-->
                                            </div>
                                        </div><!-- row end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--bottom_zero_padding-section end-->

    <!--testimonials-section-->
    <section class="ttm-row testimonials-section ttm-bgcolor-darkgrey mt_80 res-991-mt_60 ttm-bg ttm-bgimage-yes bg-img1 clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pt-20 text-left res-575-mb-15 res-991-mb-40">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3>Our Brand Promise</h3>
                                <h2 class="title">Creativity is our driving force, with a commitment to pushing design boundaries, setting trends, and embracing challenges for inventive expression</h2>
                            </div>
                        </div><!-- section title end -->
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-white mt-20 res-991-mt-0" href="{{url('/')}}/portfolio" tabindex="0">VIEW Portfolio<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--testimonials-section end-->


    <!--broken-section-->
    <section class="ttm-row broken-section bg-layer-equal-height clearfix">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <!-- col-img-img-two -->
                    <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-skincolor ttm-left-span spacing-3">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-white ttm-icon_element-style-round ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-blueprint"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>We Are Professional</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>We strive to maintain Proffessionalism throughout a clients project</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-white ttm-icon_element-style-round ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-clock-1"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Honesty</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Our experience and commitment to our clients  assure will meet your objectives.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-icon-box icon-align-before-content icon-ver_align-top style3">
                                        <div class="featured-icon">
                                            <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-white ttm-icon_element-style-round ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-destination"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>Promise to Customers</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p> Creating a great customer experience begins with staying true to the words we speak and the bonds we make</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-img-bg-img-two end-->
                </div>
                <div class="col-lg-7">
                    <div class="spacing-2">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3 style="color:#32415C">WHY Creation Office Fitouts</h3>
                                <h2 class="title">We Strive To Make a Difference</h2>
                            </div>
                            <div class="title-desc" style="color:#32415C">
                                <p>Creations Office Fitouts is here to stay and so are our projects.</p>
        <p>Our impact is measured not just in the quality of the project delivered but in the longer-term impact on the environment, communities and people.<br /><br />Our work connects communities, builds a better future and transforms and maintains the places where we live, work and relax.</p>
                            </div>
                        </div><!-- section title end -->
                        <!-- ttm_single_image-wrapper -->
                        <div class="ttm_single_image-wrapper pt-20 res-991-pt-0">
                            <img width="603" height="270" class="img-fluid" src="{{url('/')}}/uploads/banners/bsnnrts.jpg" alt="single_02">
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--broken-section end-->


    <!--bottom_zero_padding-section-->
    <section id="portfolio" class="ttm-row bottom_zero_padding-section clearfix ttm-bgcolor-grey">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-10 m-auto">
                    <!--section-title-->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3 style="color:#32415C">Our Projects</h3>
                            <h2 class="title" style="max-width:400px; margin:0 auto;">Let's Have A Look At Our Past Projects</h2>
                        </div>
                    </div><!--section-title end-->
                </div>
            </div><!-- row end -->
            <!-- row -->
            <div class="row slick_slider mr_450 res-991-mr-0 mt-20 res-991-mt-0" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "autoplay":true, "dots":false, "infinite":true, "responsive":[{"breakpoint":1199,"settings": {"slidesToShow": 3}}, {"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":620,"settings":{"slidesToShow": 1}}]}'>

                <?php $Portfolio = DB::table('portfolios')->limit('4')->orderBy('id','DESC')->get(); ?>
                @foreach ($Portfolio as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
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


            </div><!-- row end -->
        </div>
    </section>
    <!--bottom_zero_padding-section end-->


    <!--client-section-->
    @include('front.clients-light')
    <!--client-section-->


    <!--broken-section-->
    <section id="contact-us" class="ttm-row broken-section ttm-bgcolor-grey bg-layer-equal-height clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-bg-img-two ttm-bg ttm-col-bgimage-yes ttm-left-span z-index-2 spacing-4">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content ttm-bgcolor-white">
                            <div class="col-bg-img-four ttm-bg ttm-col-bgimage-yes text-center border spacing-6">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <h2 class="font-size-34 mb-10">Creation Office Fitouts</h2>
                                <p>Do not hesitate to send us a message. We are looking forward to hearing from you.</p>
                                <div class="d-flex flex-row align-items-center justify-content-center mb-10 mt-10">
                                    <div class="widget_icon">
                                        <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md mb-0 pt-5">
                                           <i class="flaticon flaticon-call"></i>
                                        </div>
                                    </div>
                                    <div class="widget_content">
                                        <h3 class="widget_number mb-0"> +254 723 768 593</h3>
                                    </div>
                                </div>
                                <ul class="social-icons square">
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://www.facebook.com/creationltd" data-tooltip="Facebook"><i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://twitter.com/creationoffice1" data-tooltip="Twitter"><i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://www.linkedin.com/company/creation-office-fitouts/" data-tooltip="LinkedIn"><i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://www.pinterest.com/ribyedesigners" data-tooltip="Pinterest"><i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://www.instagram.com/creation_office_fitout/" data-tooltip="Instagram"><i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tooltip-bottom" target="_blank" href="https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ" data-tooltip="Youtube"><i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- col-img-img-three -->
                    <div class="col-bg-img-three ttm-bg ttm-col-bgimage-yes ttm-right-span ttm-bgcolor-darkgrey h-auto spacing-5">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header">
                                    <h2 class="title">Send Your Message</h2>
                                </div>
                            </div><!-- section title end -->
                            <div class="padding_top30">
                                <form id="contact_form" class="contact_form wrap-form clearfix" method="post" novalidate="novalidate" action="{{url('/submitMessage')}}">
                                    @csrf
                                    <div class="row ttm-boxes-spacing-20px">
                                        <div class="ttm-box-col-wrapper col-md-12">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value="" placeholder="Your Name*" required="required"></span>
                                            </label>
                                        </div>
                                        <input style="display: none" type="text" name="checkmate">
                                        <div class="ttm-box-col-wrapper col-md-12">
                                            <label>
                                                <span class="text-input"><input name="email" type="email" value="" placeholder="Your Email*" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="ttm-box-col-wrapper col-md-12">
                                            <label>
                                                <span class="text-input"><input name="mobile" type="text" value="" placeholder="Your Phone*" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="ttm-box-col-wrapper col-md-12">
                                            <label>
                                                <span class="text-input"><input name="subject" type="text" value="" placeholder="Your Subject*" required="required"></span>
                                            </label>
                                        </div>


                                        <div class="ttm-box-col-wrapper col-md-12">
                                            <label>
                                                <span class="text-input"><textarea name="message" cols="20" rows="4" placeholder="Message*" required="required"></textarea></span>
                                            </label>
                                        </div>
                                        {{--  --}}
                                        <div class="col-lg-12 col-md-12" id="TheCapcha">
                                            <div class="g-recaptcha" data-sitekey="6LcdKhQeAAAAAHbljXhOgo9_WHQE7LQnRMe7LgSO" data-callback="correctCaptcha"></div>
                                            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
                                        </div>
                                        {{--  --}}
                                        <div class="ttm-box-col-wrapper col-lg-12">
                                            <p class="cookies">
                                                <input id="cookies-consent" name="cookies-consent" type="checkbox" value="yes">
                                                <label for="cookies-consent"> It would be great to hear from you! If you got any questions.</label>
                                            </p>
                                            <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-icon-btn-right ttm-btn-color-skincolor mt-15 w-100 text-center" href="#" tabindex="0">Send Message <i class="ti ti-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- col-img-bg-img-two end-->
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--broken-section end-->


   {{-- @include('front.blogs') --}}


</div><!--site-main end-->

@endsection
