<footer class="footer ttm-bg ttm-bgcolor-darkgrey widget-footer clearfix">
    <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="first-footer">
            <div class="container">
                <div class="row">
                    <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-style-round ttm-icon_element-size-sm">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <h3>&nbsp; +254 723 768 593</h3>
                                        <p>&nbsp; Have a question? call us now</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                    <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-style-round ttm-icon_element-size-sm">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <h3>&nbsp; info@creationltd.co.ke</h3>
                                        <p>&nbsp; Need support? Drop us an email</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                    <div class="widget-area col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-style-round ttm-icon_element-size-sm">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-desc">
                                        <h3>&nbsp; Mon – Sat 07:00 – 21:00</h3>
                                        <p>&nbsp; We are open on</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget widget_nav_menu clearfix">
                           <h3 class="widget-title">Quick Links</h3>
                            <ul id="menu-footer-service-link" class="menu">
                                <?php $Services = DB::table('services')->get(); ?>
                                @foreach ($Services as $Serv)
                                <li><a href="{{url('/')}}/center-of-excellence/{{$Serv->slung}}">{{$Serv->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 widget-area">
                        <div class="widget widget_text clearfix">
                            <div class="textwidget widget-text text-center ml_10 res-991-ml-0 mr-35 res-991-mr-0">
                                <div class="footer-logo">
                                    <img width="205" height="65" id="footer-logo-img" class="img-fluid" src="{{asset('theme/images/logos.png')}}" alt="Ribye Designers">
                                </div>
                                <p>Creation Office Fitouts, Interior Designer Firm that brings sensitivity to the design top hotels, offices & homes around the world.</p>
                                <a class="ttm-btn ttm-btn-size-md btn-inline ttm-icon-btn-right ttm-btn-color-skincolor" href="{{url('/')}}/about-us" tabindex="0" style="color: #fff !important;">READ MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="ttm-textcolor-white text-center">
                                <h3>Sign Up To Get Latest Updates</h3>
                                <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                                    <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                        <p><input type="email" name="email" placeholder="Your Email Address..." required=""></p>
                                        <p><button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit" style="color: #fff !important;">SUBMIT NOW</button></p>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                        <div class="widget widget_timing clearfix">
                           <h3 class="widget-title">Our Time Schedule</h3>
                           <ul class="ttm-pricelist-block"><li>Mon to Fri
                                <span class="service-price">7:00 am to 18:00</span></li><li>Saturday
                                <span class="service-price">9:00 am to 18:00</span></li><li>Sunday
                                <span class="service-price">Closed</span></li>
                            </ul>
                            <br>
                            <h3 class="widget-title">Follow Us On</h3>
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
                                    <a class="tooltip-bottom" target="_blank" href="#" data-tooltip="Instagram"><i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-bottom" target="_blank" href="https://www.youtube.com/channel/UCZ17kwbtJbV0pa_oVXd_aEQ" data-tooltip="youtube"><i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-bottom" target="_blank" href="https://www.pinterest.com/ribyedesigners" data-tooltip="Pintrest"><i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-text">
            <div class="container">
                <div class="row copyright">
                    <div class="col-md-12">
                        <div class="">
                            <span>Copyright © {{date('Y')}} Creation Office Fitouts All Rights Reserved | Powered by &nbsp;<a target="new" href="https://designekta.com" class="ttm-textcolor-skincolor">Designekta Studios</a></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul id="menu-footer-menu" class="footer-nav-menu">
                            <li><a href="{{url('/')}}/copyright">Copyright Statement</a></li>
                            <li><a href="{{url('/')}}/terms-and-conditions">Terms and Conditions</a></li>
                            <li><a href="{{url('/')}}/privacy-policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>
