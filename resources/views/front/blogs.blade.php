<!--blog-section-->
<section id="blog" class="ttm-row bolg-section ttm-bgcolor-grey clearfix">
        <div class="container">
            <!--row-->
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-11 m-auto">
                    <!--section-title-->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3>RECENT ARTICLES</h3>
                            <h2 class="title">Read Our Latest Articles</h2>
                        </div>
                    </div><!--section-title end-->
                </div>
            </div><!--row end-->
            <!--row-->
            <div class="row slick_slider mt-5 res-991-mt-0" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":992,"settings":{"slidesToShow": 2}}, {"breakpoint":750,"settings":{"slidesToShow": 1}}]}'>
                <?php $Blog = DB::table('blogs')->get(); ?>
                @foreach ($Blog as $recent)
                <div class="ttm-box-col-wrapper col-lg-4">
                    <!--featured-imagebox-blog-->
                    <div class="featured-imagebox featured-imagebox-post style1">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" style="min-height:370px;" width="650" height="510" src="{{url('/')}}/uploads/blog/{{$recent->image}}" alt="{{$recent->title}}">
                            <div class="ttm-box-post-date">
                                <span class="ttm-entry-date">{{date('M', strtotime($recent->created_at))}} {{date('d', strtotime($recent->created_at))}} {{date('Y', strtotime($recent->created_at))}}</span>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3><a href="{{url('/')}}/blog/{{$recent->slung}}">{{$recent->title}}</a>
                                </h3>
                            </div>

                            <div class="ttm-postbox-desc-footer">
                                <a class="ttm-btn ttm-btn-size-md btn-inline ttm-icon-btn-right ttm-btn-color-darkgrey" href="{{url('/')}}/blog/{{$recent->slung}}">Read More<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!--featured-imagebox-post end-->
                </div>
                @endforeach


            </div><!--row end-->
        </div>
</section>
<!--blog-section end-->
