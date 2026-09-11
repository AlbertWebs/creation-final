@extends('front.master')

@section('additional-head')
<link rel="stylesheet" type="text/css" href="{{ asset('theme/css/contact-page.css') }}"/>
@endsection

@section('content')


<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Contact Us</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="breadcrumb-wrapper-inner">
                                <span>
                                    <a title="Go to Delmont." href="#" class="home"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
                                <span>Contact Us</span>
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


<section class="contact-details">
    <div class="container">
        <div class="contact-details-grid">
            <article class="contact-card">
                <div class="contact-card-icon" aria-hidden="true">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="contact-card-main">
                    <h3>Call us</h3>
                    <div class="contact-card-body">
                        <a href="tel:+254723768593">+254 723 768 593</a>
                    </div>
                </div>
            </article>

            <article class="contact-card">
                <div class="contact-card-icon" aria-hidden="true">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="contact-card-main">
                    <h3>Email us</h3>
                    <div class="contact-card-body">
                        <div>
                            <span class="contact-card-label">General</span>
                            <a href="mailto:info@creationltd.co.ke">info@creationltd.co.ke</a>
                        </div>
                        <div>
                            <span class="contact-card-label">Direct</span>
                            <a href="mailto:henry@creationltd.co.ke">henry@creationltd.co.ke</a>
                        </div>
                    </div>
                </div>
            </article>

            <article class="contact-card">
                <div class="contact-card-icon" aria-hidden="true">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="contact-card-main">
                    <h3>Visit us</h3>
                    <div class="contact-card-body">
                        <a href="https://maps.google.com/?q=Creation+Office+Fitouts,+Nairobi" target="_blank" rel="noopener noreferrer">
                            Industrial Area, Road A<br>No. 6, Nairobi, Kenya
                        </a>
                    </div>
                </div>
            </article>

            <article class="contact-card">
                <div class="contact-card-icon" aria-hidden="true">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="contact-card-main">
                    <h3>Opening hours</h3>
                    <div class="contact-card-body">
                        <dl class="contact-hours">
                            <dt>Mon – Sat</dt>
                            <dd>9:00 AM – 6:00 PM</dd>
                            <dt>Sunday</dt>
                            <dd class="is-closed">Closed</dd>
                        </dl>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>


<!--- conatact-section -->
<section class="ttm-row conatact-section contact-form-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-4">
                <aside class="contact-livechat" style="background-image: url('{{ asset('theme/images/bg-image/col-bgimage-8.jpg') }}');">
                    <div class="contact-livechat-copy">
                        <h3>Chat with a live expert</h3>
                        <p>Let’s chat with our live experts to get answers to your questions.</p>
                        <a class="contact-livechat-btn" href="https://tawk.to/chat/631735a937898912e96779f9/1gc9aj7j0" target="_blank" rel="noopener noreferrer">Live chat</a>
                    </div>
                </aside>
            </div>
            <div class="col-lg-8">
                <!-- col-img-img-eight -->
                <div class="ttm-bg ttm-col-bgcolor-yes ttm-right-span spacing-12">
                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                    <div class="layer-content">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h2 class="title">Send Your Message To Us</h2>
                            </div>
                        </div><!-- section title end -->
                        <div class="contact-form-wrap">
                            <form id="contact_form" class="contact_form wrap-form clearfix" method="post" action="{{url('/submitMessage')}}">
                                @csrf
                                <input style="display: none" type="text" name="checkmate" tabindex="-1" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="contact-field">
                                            <span class="contact-field-label">Name</span>
                                            <input name="name" type="text" autocomplete="name" placeholder="Your full name" required>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="contact-field">
                                            <span class="contact-field-label">Email</span>
                                            <input name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="contact-field">
                                            <span class="contact-field-label">Phone</span>
                                            <input name="mobile" type="tel" autocomplete="tel" placeholder="+254 7XX XXX XXX" required>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="contact-field">
                                            <span class="contact-field-label">Subject</span>
                                            <input name="subject" type="text" autocomplete="off" placeholder="How can we help?" required>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="contact-field">
                                            <span class="contact-field-label">Message</span>
                                            <textarea name="message" rows="5" placeholder="Tell us about your project..." required></textarea>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="contact-remember">
                                            <input id="cookies-consent" name="cookies-consent" type="checkbox" value="yes">
                                            <span>Remember my name and email on this device</span>
                                        </label>
                                        <div class="contact-form-actions" id="TheCapcha">
                                            <div class="g-recaptcha" data-sitekey="6LcdKhQeAAAAAHbljXhOgo9_WHQE7LQnRMe7LgSO" data-callback="correctCaptcha"></div>
                                            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
                                            <button type="submit" class="contact-submit">Send message <i class="ti ti-arrow-right"></i></button>
                                        </div>
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
<!-- conatact-section end -->


<!--google_map-->
<div id="google_map" class="google_map contact-map">
    <div class="map_container">
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.33158202457!2d36.7996562!3d-1.2734496!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe07bbf266ae12aee!2sCreation%20Office%20Fitouts!5e0!3m2!1sen!2ske!4v1662463739010!5m2!1sen!2ske"  height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>



</div><!--site-main end-->

@endsection
