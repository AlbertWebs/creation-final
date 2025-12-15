@extends('front.master')

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">{{$title}}</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="index-2.html" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>{{$title}} </span>
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
    @foreach ($Blog as $blog)


        <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white pb-70 res-991-pb-30 overflow-hidden clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-8 content-area">
                        <!-- post -->
                        <article class="post ttm-blog-single clearfix">
                            <!-- post-featured-wrapper -->
                            <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                                <div class="ttm_single_image-wrapper text-lg-left text-center">
                                    <img width="1200" height="800" class="img-fluid" src="{{url('/')}}/uploads/blog/{{$blog->image}}" alt="blog-03">
                                </div>
                            </div><!-- post-featured-wrapper end -->
                            <!-- ttm-blog-classic-content -->
                            <div class="ttm-blog-single-content">
                                <div class="ttm-post-entry-header">
                                    <div class="post-meta">
                                        <span class="ttm-meta-line byline"><i class="ti ti-user ttm-textcolor-skincolor"></i>Henry Wairiri</span>
                                        <span class="ttm-meta-line comments-links"><i class="ti ti-comment ttm-textcolor-skincolor"></i>0 Comments</span>
                                        <span class="ttm-meta-line cat-links"><i class="ti ti-folder ttm-textcolor-skincolor"></i>Door Windows , Home Land</span>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <div class="ttm-box-desc-text">
                                        <p>{!! html_entity_decode($blog->content, ENT_QUOTES, 'UTF-8') !!}</p>
                                        <hr>
                                        @if($blog->content_extra == null)

                                        @else
                                        <div class="mt-15 mb-25">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="ttm_single_image-wrapper res-767-pb-30">
                                                        <img width="420" height="240" class="img-fluid" src="{{url('/')}}/uploads/blog/{{$blog->image}}" alt="single_image-12">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-5 res-991-pl-15">
                                                    <p>{!! html_entity_decode($blog->content_extra, ENT_QUOTES, 'UTF-8') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <blockquote>
                                            <p>{!! html_entity_decode($blog->blockquote, ENT_QUOTES, 'UTF-8') !!}</p>
                                        </blockquote>
                                        {{--  --}}
                                        @if($blog->content_one == null)

                                        @else
                                        <hr>
                                        <div class="mt-15 mb-25">
                                            <div class="row">
                                                <div class="col-md-6 pl-5 res-991-pl-15">
                                                    {!! html_entity_decode($blog->content_one, ENT_QUOTES, 'UTF-8') !!}
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="ttm_single_image-wrapper res-767-pb-30">
                                                        <img width="420" height="240" class="img-fluid" src="{{url('/')}}/uploads/blog/{{$blog->image_one}}" alt="single_image-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endif
                                        {{--  --}}
                                        {{--  --}}
                                        @if($blog->content_two == null)

                                        @else
                                        <hr>
                                        <div class="mt-15 mb-25">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="ttm_single_image-wrapper res-767-pb-30">
                                                        <img width="420" height="240" class="img-fluid" src="{{url('/')}}/uploads/blog/{{$blog->image_two}}" alt="single_image-12">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-5 res-991-pl-15">
                                                    <p>{!! html_entity_decode($blog->content_two, ENT_QUOTES, 'UTF-8') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endif
                                        {{--  --}}
                                        {{--  --}}
                                        @if($blog->content_three == null)

                                        @else
                                        <hr>
                                        <div class="mt-15 mb-25">
                                            <div class="row">
                                                <div class="col-md-6 pl-5 res-991-pl-15">
                                                    {!! html_entity_decode($blog->content_three, ENT_QUOTES, 'UTF-8') !!}
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="ttm_single_image-wrapper res-767-pb-30">
                                                        <img width="420" height="240" class="img-fluid" src="{{url('/')}}/uploads/blog/{{$blog->image_three}}" alt="single_image-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endif
                                        {{--  --}}
                                        {{--  --}}
                                        @if($blog->content_four == null)

                                        @else

                                        <hr>
                                        <div class="mt-15 mb-25">
                                            <div class="row">
                                                <div style="border-bottom: solid 1px silver; overflow: hidden;">
                                                    <img src="{{url('/')}}/uploads/blog/{{$blog->image_four}}" class="extra-image-left">
                                                    <div>{!! html_entity_decode($blog->content_four, ENT_QUOTES, 'UTF-8') !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                                <hr>
                                        @endif
                                        {{--  --}}
                                        {{--  --}}
                                        @if($blog->content_five == null)

                                        @else

                                        <hr>
                                        <div class="mt-15 mb-25">
                                            <div class="row">
                                                <div style="border-bottom: solid 1px silver; overflow: hidden;">
                                                    <img src="{{url('/')}}/uploads/blog/{{$blog->image_five}}" class="extra-image-left">
                                                    <div>{!! html_entity_decode($blog->content_five, ENT_QUOTES, 'UTF-8') !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                                <hr>
                                        @endif

                                        <p><i>{!! html_entity_decode($blog->credit, ENT_QUOTES, 'UTF-8') !!}</i></p>
                                        {{--  --}}
                                        <div class="social-media-block">
                                            <div class="d-sm-flex justify-content-between">
                                                <div class="ttm-social-share-wrapper mt-15">
                                                    <h6 class="font-weight-normal m-0 mr-2">Share:</h6>
                                                    <ul class="social-icons square">
                                                        <li class="social-facebook">
                                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li class="social-twitter">
                                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li class="social-linkedin">
                                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li class="social-pinterest">
                                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mt-15">
                                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-squar ttm-btn-style-fill ttm-btn-color-grey mr-2" href="#">Architecture</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="ttm-blog-classic-box-comment clearfix">
                                            <div id="comments" class="comments-area">
                                                <div class="comment-respond">
                                                    <h2 class="comment-reply-title">Leave a Reply</h2>
                                                    <form action="#" method="post" id="commentform" class="comment-form">
                                                    <p class="comment-notes">Your email address will not be published. </p>
                                                    <p class="comment-form-comment">
                                                        <textarea id="comment" placeholder="Comment" name="comment" cols="45" rows="4" aria-required="true"></textarea>
                                                    </p>
                                                    <p class="comment-form-author">
                                                        <input id="author" placeholder="Name (required)" name="author" type="text" value="" size="30" aria-required="true">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <input id="email" placeholder="Email (required)" name="email" type="text" value="" size="30" aria-required="true">
                                                    </p>
                                                    <p class="comment-form-url">
                                                        <input id="url" placeholder="Website" name="url" type="text" value="" size="30">
                                                    </p>
                                                    <p class="comment-cookies">
                                                        <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes">
                                                        <label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                                    </p>
                                                    <p class="form-submit mt-30 mb-0">
                                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-squar ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-darkgrey mt-15 res-991-mt-0" href="#" tabindex="0">Post Comment</a>
                                                    </p>
                                                </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div><!-- ttm-blog-classic-content end -->
                        </article><!-- post end -->
                    </div>
                    <div class="col-lg-4 widget-area sidebar-right widget_border">

                        <aside class="widget widget-categories with-title">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                <?php $Categories = DB::table('categories')->get(); ?>
                                @foreach($Categories as $Cat)
                                <li><a href="{{url('/')}}/categories/{{$Cat->slung}}">{{$Cat->title}}(<?php echo count($Blog = DB::table('blogs')->where('category_id',$Cat->id)->get()) ?>)</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget-recent-post with-title">
                            <h3 class="widget-title">Recent Post</h3>
                            <ul class="widget-post ttm-recent-post-list">
                                <?php $Recent = DB::table('blogs')->orderBy('id','DESC')->limit('3')->get() ?>
                                @foreach($Recent as $recent)
                                <li>
                                    <a href="{{url('/')}}/blog/{{$recent->slung}}"><img width="150" height="150" src="{{url('/')}}/uploads/blog/{{$recent->image}}" class="img-fluid" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>{{date('M', strtotime($recent->created_at))}} {{date('d', strtotime($recent->created_at))}}, {{date('Y', strtotime($recent->created_at))}}</span>
                                        <a href="{{url('/')}}/blog/{{$recent->slung}}">{{$recent->title}}</a>
                                    </div>
                                </li>
                                @endforeach
                                <li>
                                    <a href="blog-single.html"><img width="150" height="150" src="{{asset('theme/images/portfolio/project-3-150x150.jpg')}}" class="img-fluid" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>May 23, 2021</span>
                                        <a href="blog-single.html">Colour Schemes to Introduce Spring in Your Home</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-single.html"><img width="150" height="150" src="{{asset('theme/images/portfolio/project-2-150x150.jpg')}}" class="img-fluid" alt="post-img"></a>
                                    <div class="post-detail">
                                        <span class="post-date"><i class="fa fa-calendar"></i>May 15, 2021</span>
                                        <a href="blog-single.html">4 Ways to Create Extra Space in Small Homes</a>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget tagcloud-widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link">Architecture</a>
                                <a href="#" class="tag-cloud-link">Building</a>
                                <a href="#" class="tag-cloud-link">Exterior</a>
                                <a href="#" class="tag-cloud-link">interior</a>
                                <a href="#" class="tag-cloud-link">Kitchen Style</a>
                                <a href="#" class="tag-cloud-link">Plan</a>
                                <a href="#" class="tag-cloud-link">Planning</a>
                            </div>
                        </aside>
                        <aside class="widget widget-follow-us">
                            <h3 class="widget-title">Follow Us</h3>
                            <div class="ttm-social-share-links">
                                <ul class="social-icons square">
                                    <li class="social-facebook">
                                        <a class="tooltip-top" target="_blank" href="https://www.facebook.com/ribyedesigners" data-tooltip="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-twitter">
                                        <a class="tooltip-top" target="_blank" href="#" data-tooltip="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-linkedin">
                                        <a class="tooltip-top" target="_blank" href="https://www.linkedin.com/company/ribye-designers-limited/" data-tooltip="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-pinterest">
                                        <a class="tooltip-top" target="_blank" href="https://www.pinterest.com/ribyedesigners" data-tooltip="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-pinterest">
                                        <a class="tooltip-top" target="_blank" href="https://www.instagram.com/ribyedesigners/" data-tooltip="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-pinterest">
                                        <a class="tooltip-top" target="_blank" href="https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ" data-tooltip="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <aside class="widget widget-banner">
                            <div class="ttm-col-bgcolor-yes ttm-bgcolor-darkgrey ttm-textcolor-white col-bg-img-seven ttm-col-bgimage-yes ttm-bg spacing-13">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <h3 class="widget-title">Quick Contact</h3>
                                    <div class="widget-text">Our impact is measured not just in the quality of the project delivered but in the longer-term impact on the environment, communities and people.
                                        <div class="ttm-quicklink-box">
                                        <div class="ttm-lefticon-box">
                                                <i class="fa fa fa-headphones"></i>
                                        </div>
                                        <div class="ttm-righttext-box">
                                                <h3>Call Us On:</h3>
                                                <p class="custom-heading">+255 72 456 7890</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget widget-archive">
                            <h3 class="widget-title">Gallery</h3>
                            <div id="gallery-2" class="gallery-wrapper">
                                <?php $Portfolio = DB::table('portfolios')->get(); ?>
                                @foreach ($Portfolio as $item)
                                <figure class="gallery-item">
                                    <div class="gallery-icon landscape">
                                        <a class="ttm_prettyphoto" href="{{url('/')}}/uploads/portfolios/{{$item->image}}" rel="prettyPhoto[coregallery]" data-rel="prettyPhoto">
                                        <img width="150" height="150" class="img-fluid" src="{{url('/')}}/uploads/portfolios/{{$item->image}}" alt="gellary_img"></a>
                                    </div>
                                </figure>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div><!-- row end -->
            </div>
        </div>

    @endforeach

</div><!--site-main end-->


@endsection
