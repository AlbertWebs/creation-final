@extends('front.master')

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Copyright Statement</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="index-2.html" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span> Copyright Statement </span>
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

                <div class="col-lg-12 col-md-12">
                    <div class="pl-30 res-991-pl-0 res-991-mt-40">
                        <!-- section title -->

                        <div class="pb-10 res-991-pb-30">
                            <p style="color:#000000 !important; font-size:16px;">
                                This website and its content is copyright of Ribye Designers LTD - © Ribye Designers LTD  {{date('Y')}}. All rights reserved. Any redistribution or reproduction of part or all of the contents in any form is partially prohibited other than the following:
                                you may print or download to a local hard disk extracts for your personal and non-commercial use only
                                you may copy the content to individual third parties for their personal use, but only if you acknowledge the website as the source of the material
                                You may not, except with our express written permission, distribute or commercially exploit the content. Nor may you transmit it or store it in any other website or other form of electronic retrieval system.
                            </p>
                        </div>

                        <div class="d-sm-flex align-items-center mt-60 res-767-mt-0">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-darkgrey mr-30 res-767-mt-20" href="{{url('/')}}/center-of-excellence" tabindex="0">What We Do</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome-section end-->




</div><!--site-main end-->


@endsection
