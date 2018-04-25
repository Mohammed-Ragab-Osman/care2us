@extends('front.layout')
@section('content')
@include('front.parts.slider')
<!-- Main Content -->
<main id="main-content">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <!-- Welcome -->
                    <div class="row-welcome">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="0" data-mobi="60" data-smobi="60"></div>

                                    <div class="wprt-content-box clearfix move-into-slider-home-2">
                                        <div class="inner">
                                            <div class="info-box bg-white">
                                                <div class="inner">
                                                    <div class="wprt-headings clearfix text-left">
                                                        <h2 class="heading font-size-18">EMERGENCY CASES</h2>
                                                    </div><!-- /.wprt-headings -->

                                                    <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="30" data-smobi="15"></div>

                                                    <div class="call-now">Call Now: </div>
                                                    <div class="hotline">+86-123-456-789</div>
                                                    <div class="wprt-info-list style-1 clearfix">
                                                        <span class="title">Address 1 : </span>
                                                        <span class="text">6110 Athens Place Washington, DC 20521-7100</span>
                                                    </div>

                                                    <div class="wprt-info-list style-1 clearfix">
                                                        <span class="title">Address 2 :</span>
                                                        <span class="text">Medical Health 226 Fifth Avenue New York, NY 14354</span>
                                                    </div>

                                                    <div class="wprt-info-list style-1 clearfix">
                                                        <span class="title">Working Time :</span>
                                                        <span class="text">Mon - Sat / 07:00 - 17:00 Sunday / 08:00 - 11:00</span>
                                                    </div>

                                                    <div class="wprt-info-list style-1 clearfix">
                                                        <span class="title">mail : </span>
                                                        <span class="text">ESupport@Medical.com</span>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-content-box -->
                                            <div class="request-form-2 bg-white">
                                                <div class="inner">
                                                    <div class="wprt-headings clearfix text-left">
                                                        <h2 class="heading font-size-18">REQUEST APPOINTMENT</h2>
                                                    </div><!-- /.wprt-headings -->

                                                    <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="30" data-smobi="15"></div>

                                                    <form action="./includes/contact/contact-process.php" method="post" class="contact-form wpcf7-form" novalidate="novalidate">
                                                        <div class="wprt-contact-form-1">
                                                    <span class="wpcf7-form-control-wrap name">
                                                        <input type="text" tabindex="1" id="name" name="name" value="" class="wpcf7-form-control" placeholder="Name *" required="">
                                                    </span>

                                                            <span class="wpcf7-form-control-wrap phone">
                                                        <input type="email" tabindex="2" id="phone" name="phone" value="" class="wpcf7-form-control" placeholder="Phone *" required="">
                                                    </span>


                                                            <span class="wpcf7-form-control-wrap email">
                                                        <input type="email" tabindex="2" id="email" name="email" value="" class="wpcf7-form-control" placeholder="E-mail *" required="">
                                                    </span>

                                                            <span class="wpcf7-form-control-wrap date">
                                                        <input type="text" tabindex="2" id="date" name="date" value="" class="wpcf7-form-control" placeholder="Date *" required="">
                                                    </span>

                                                            <span class="wpcf7-form-control-wrap departments">
                                                        <select name="departments" class="wpcf7-form-control">
                                                            <option value="menu_order">Departments</option>
                                                            <option value="popularity">Primary Health Care</option>
                                                            <option value="popularity">Pediatric Clinic</option>
                                                            <option value="popularity">Gynaecological Clinic</option>
                                                            <option value="popularity">Outpatient Surgery</option>
                                                            <option value="popularity">Cardiac Clinic</option>
                                                        </select>
                                                    </span>

                                                            <span class="wpcf7-form-control-wrap doctors">
                                                        <select name="doctors" class="wpcf7-form-control">
                                                            <option value="menu_order">Doctors</option>
                                                            <option value="dr_ony_hammond">Dr. Tony Hammond</option>
                                                            <option value="dr_terry_ludgrove">Dr. Terry Ludgrove</option>
                                                            <option value="dr_gerry_saldanha">Dr. Gerry Saldanha</option>
                                                        </select>
                                                    </span>

                                                            <span class="wpcf7-form-control-wrap message">
                                                        <textarea name="message" tabindex="5" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message *" required=""></textarea>
                                                    </span>

                                                            <div class="wrap-submit">
                                                                <input type="submit" value="SUBMIT NOW" class="submit wpcf7-form-control wpcf7-submit" id="submit" name="submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.wprt-content-box -->
                                        </div>
                                    </div><!-- /.wprt-content-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60" data-smobi="60"></div>
                                </div>
                            </div><!-- .row -->
                        </div><!-- /.wprt-container -->
                    </div><!-- /.row-welcome -->

                    <!-- Services 2 -->
                    <div class="row-services-2">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="65" data-mobi="60" data-smobi="60" style="height:65px"></div>

                                    <div class="wprt-headings clearfix text-center">
                                        <h2 class="heading">Our Services</h2>
                                        <div class="sep"></div>
                                    </div>

                                    <div class="wprt-spacer clearfix" data-desktop="45" data-mobi="45" data-smobi="45" style="height:45px"></div>
                                </div><!-- /.col-md-12 -->

                                <div class="col-md-4">
                                    <div class="wprt-content-box has-shadow">
                                        <div class="inner">
                                            <div class="wprt-icon-box has-width w100 icon-top align-center rounded-100 grey-outline clearfix">
                                                <div class="image-wrap">
                                                    <img alt="image" src="{{url('front/assets/img/icon-4.png') }}">
                                                </div>
                                                <h3 class="heading"><a target="_blank" href="#"><span>Diagnosis</span></a></h3>
                                                <p class="desc">
                                                    <span>We offer patients state-of-the-art diagnostic services including X-ray, MRI and Ultrasound providing the highest quality clinical service...</span>
                                                </p>
                                            </div><!-- /.wprt-icon-box -->
                                        </div>
                                    </div><!-- /.wprt-content-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="0" data-mobi="30" data-smobi="30"></div>
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <div class="wprt-content-box has-shadow">
                                        <div class="inner">
                                            <div class="wprt-icon-box has-width w100 icon-top align-center rounded-100 grey-outline clearfix">
                                                <div class="image-wrap">
                                                    <img alt="image" src="{{url('front/assets/img/icon-5.png') }}">
                                                </div>
                                                <h3 class="heading"><a target="_blank" href="#"><span>Prevention &amp; Recovery</span></a></h3>
                                                <p class="desc">
                                                    <span>Recovery programmes and ongoing health management are essential for disease and injury prevention and we have developed services to help you...</span>
                                                </p>
                                            </div><!-- /.wprt-icon-box -->
                                        </div>
                                    </div><!-- /.wprt-content-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="0" data-mobi="30" data-smobi="30"></div>
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <div class="wprt-content-box has-shadow">
                                        <div class="inner">
                                            <div class="wprt-icon-box has-width w100 icon-top align-center rounded-100 grey-outline clearfix">
                                                <div class="image-wrap">
                                                    <img alt="image" src="{{ url('front/assets/img/icon-6.png') }}">
                                                </div>
                                                <h3 class="heading"><a target="_blank" href="#"><span>Treatments</span></a></h3>
                                                <p class="desc">
                                                    <span>We provide an extensive range of treatments from nationally recognised orthopaedic surgery to non-surgical services such...</span>
                                                </p>
                                            </div><!-- /.wprt-icon-box -->
                                        </div>
                                    </div><!-- /.wprt-content-box -->
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60" data-smobi="60" style="height:82px"></div>

                                    <div class="wprt-btn text-center">
                                        <a class="wprt-button" href="#">ALL SERVICES</a>
                                    </div><!-- /.wprt-btn -->

                                    <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60" data-smobi="60" style="height:82px"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.row-services-2 -->

                    <!-- Testimonial -->
                    <div class="row-testimonials-2">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="87" data-mobi="60" data-smobi="60"></div>

                                    <div class="wprt-headings clearfix text-center">
                                        <h2 class="heading">Customer Reviews</h2>
                                        <div class="sep"></div>
                                    </div><!-- /.wprt-headings -->

                                    <div class="wprt-spacer clearfix" data-desktop="16" data-mobi="16" data-smobi="16"></div>

                                    <div class="wprt-carousel-box has-bullets bullet40 bullet-circle text-center" data-auto="true" data-loop="true" data-gap="30" data-column="2" data-column2="2" data-column3="1">
                                        <div class="owl-carousel owl-theme">
                                            <div class="wprt-testimonials clearfix style-2">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/clients/client-1.png') }}" alt="image">
                                                        </div>
                                                        <blockquote class="text">
                                                            <div class="name-pos">
                                                                <h6 class="name">Justin Forder</h6>
                                                                <span class="position">Patient</span>
                                                            </div>
                                                            I just wanted to thank the staff at MEDICAL for taking such great care of me when I was ill. I could tell that the staff worked very well as a team and ensured that I received high quality care!
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-testimonials -->

                                            <div class="wprt-testimonials clearfix style-2">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/clients/client-1.png') }}" alt="image">
                                                        </div>
                                                        <blockquote class="text">
                                                            <div class="name-pos">
                                                                <h6 class="name">Justin Forder</h6>
                                                                <span class="position">Patient</span>
                                                            </div>
                                                            I just wanted to thank the staff at MEDICAL for taking such great care of me when I was ill. I could tell that the staff worked very well as a team and ensured that I received high quality care!
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-testimonials -->

                                            <div class="wprt-testimonials clearfix style-2">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/clients/client-1.png') }}" alt="image">
                                                        </div>
                                                        <blockquote class="text">
                                                            <div class="name-pos">
                                                                <h6 class="name">Justin Forder</h6>
                                                                <span class="position">Patient</span>
                                                            </div>
                                                            I just wanted to thank the staff at MEDICAL for taking such great care of me when I was ill. I could tell that the staff worked very well as a team and ensured that I received high quality care!
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-testimonials -->

                                        </div><!-- /.owl-carousel -->
                                    </div><!-- /.wprt-carousel-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="80" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.wprt-container -->
                    </div><!-- /.row-testimonials-1 -->

                    <!-- Slogan -->
                    <div class="row-slogan">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="110" data-mobi="100" data-smobi="100"></div>

                                    <div class="wprt-content-box mw-970">
                                        <div class="slogan-text text-white text-center" data-min="25px" data-max="50px">
                                            <span class="arrow fa fa-quote-left"></span>
                                            A Great Place to Work A Great Place to Receive Care
                                        </div>

                                        <div class="wprt-btn text-center margin-top-40">
                                            <a class="wprt-button outline light" href="#">APPOINTMENT</a>
                                        </div><!-- /.wprt-btn -->
                                    </div><!-- /.wprt-content-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="110" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.wprt-container -->
                    </div><!-- /.row-slogan -->

                    <!-- Team 1 -->
                    <div class="row-team-1">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="67" data-mobi="60" data-smobi="60"></div>

                                    <div class="wprt-headings clearfix text-center">
                                        <h2 class="heading">Meet Our Experts</h2>
                                        <div class="sep"></div>
                                    </div>

                                    <div class="wprt-spacer clearfix" data-desktop="60" data-mobi="60" data-smobi="60"></div>

                                    <div class="wprt-team has-bullets bullet40 bullet-circle text-center" data-auto="false" data-column="3" data-column2="3" data-column3="1" data-gap="30">
                                        <div class="owl-carousel owl-theme">
                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/1-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. TONY HAMMOND</a></h3>
                                                            <div class="position">Anaesthetist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->

                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/2-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. TERRY LUDGROVE</a></h3>
                                                            <div class="position">Throat Specialist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->

                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/3-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. GERRY SALDANHA</a></h3>
                                                            <div class="position">Cardiologist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->

                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/1-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. TONY HAMMOND</a></h3>
                                                            <div class="position">Anaesthetist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->

                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/2-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. TERRY LUDGROVE</a></h3>
                                                            <div class="position">Throat Specialist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->

                                            <div class="wprt-image-box has-shadow clearfix">
                                                <div class="item">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <img src="{{url('front/assets/img/doctors/3-360x400.jpg') }}" alt="image">
                                                        </div>

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">DR. GERRY SALDANHA</a></h3>
                                                            <div class="position">Cardiologist</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-image-box -->
                                        </div><!-- /.owl-carousel -->
                                    </div><!-- /.wprt-team -->

                                    <div class="wprt-spacer clearfix" data-desktop="100" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.row-team-1 -->

                    <!-- Facts -->
                    <div class="row-facts-2">
                        <div class="wprt-container" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="39" data-mobi="39" data-smobi="39"></div>
                                </div><!-- /.col-md-12 -->

                                <div class="col-md-3">
                                    <div class="wprt-counter style-1 text-center">
                                        <div class="numb-count" data-to="856" data-speed="3000" data-inviewport="yes">0</div>
                                        <div class="name-count">Hospital Rooms</div>
                                    </div>
                                </div><!-- /.col-md-3 -->

                                <div class="col-md-3">
                                    <div class="wprt-counter style-1 text-center">
                                        <div class="numb-count" data-to="5234" data-speed="3000" data-inviewport="yes">0</div>
                                        <div class="name-count">Satisfied Patients</div>
                                    </div>
                                </div><!-- /.col-md-3 -->

                                <div class="col-md-3">
                                    <div class="wprt-counter style-1 text-center">
                                        <div class="numb-count" data-to="789" data-speed="3000" data-inviewport="yes">0</div>
                                        <div class="name-count">Different Services</div>
                                    </div>
                                </div><!-- /.col-md-3 -->

                                <div class="col-md-3">
                                    <div class="wprt-counter style-1 text-center">
                                        <div class="numb-count" data-to="3657" data-speed="3000" data-inviewport="yes">0</div>
                                        <div class="name-count">People Working</div>
                                    </div>
                                </div><!-- /.col-md-3 -->

                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="39" data-mobi="39" data-smobi="39"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.row-facts-1 -->


                    <!-- News 1 -->
                    <div class="row-news-1">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="80" data-mobi="60" data-smobi="60"></div>

                                    <div class="wprt-headings clearfix text-center">
                                        <h2 class="heading">Medical News</h2>
                                        <p class="sub-heading mw-630">All our consultants are highly experienced in their fields and produce excellent outcomes for patients</p>
                                    </div><!-- /.wprt-headings -->

                                    <div class="wprt-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>

                                    <div class="wprt-carousel-box has-bullets bullet40 bullet-circle" data-auto="true" data-loop="true" data-gap="30" data-column="3" data-column2="2" data-column3="1">
                                        <div class="owl-carousel owl-theme">
                                            <div class="wprt-news has-shadow style-1">
                                                <div class="news-item">
                                                    <div class="inner">
                                                        <img src="{{url('front/assets/img/news/1-370x250.jpg') }}" alt="image">

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">Healthy New Year’s resolutions and how to keep them</a></h3>

                                                            <p class="excerpt-text-text">
                                                                Lorem ipsum dolor amet, consectetur adipiscing elit. Cras ac velit ex. Mauris mollis varius lacus ultrices
                                                            </p>

                                                            <div class="author clearfix">
                                                                <div class="thumb">
                                                                    <img src="{{url('front/assets/img/blog/avatar-1.png') }}" alt="image">
                                                                </div>

                                                                <div class="texts">
                                                                    <h4><a href="#">By John Doe</a></h4>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.text-wrap -->
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-news -->

                                            <div class="wprt-news has-shadow style-1">
                                                <div class="news-item">
                                                    <div class="inner">
                                                        <img src="{{url('front/assets/img/news/2-370x250.jpg') }}" alt="image">

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">How mindfulness can ease your stress</a></h3>

                                                            <p class="excerpt-text-text">
                                                                Lorem ipsum dolor amet, consectetur adipiscing elit. Cras ac velit ex. Mauris mollis varius lacus ultrices
                                                            </p>

                                                            <div class="author clearfix">
                                                                <div class="thumb">
                                                                    <img src="{{url('front/assets/img/blog/avatar-1.png') }}" alt="image">
                                                                </div>

                                                                <div class="texts">
                                                                    <h4><a href="#">By Paul Gibb</a></h4>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.text-wrap -->
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-news -->

                                            <div class="wprt-news has-shadow style-1">
                                                <div class="news-item">
                                                    <div class="inner">
                                                        <img src="{{url('front/assets/img/news/3-370x250.jpg') }}" alt="image">

                                                        <div class="text-wrap">
                                                            <h3 class="title"><a href="#">Physiotherapy Q&A: Is Pilates really helpful for back pain?</a></h3>

                                                            <p class="excerpt-text-text">
                                                                Lorem ipsum dolor amet, consectetur adipiscing elit. Cras ac velit ex. Mauris mollis varius lacus ultrices
                                                            </p>

                                                            <div class="author clearfix">
                                                                <div class="thumb">
                                                                    <img src="{{url('front/assets/img/blog/avatar-1.png') }}" alt="image">
                                                                </div>

                                                                <div class="texts">
                                                                    <h4><a href="#">By Tom Smith</a></h4>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.text-wrap -->
                                                    </div>
                                                </div>
                                            </div><!-- /.wprt-news -->
                                        </div><!-- /.owl-carousel -->
                                    </div><!-- /.wprt-carousel-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="80" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.row-news-1 -->
                </div><!-- /.page-content -->
            </div><!-- /#inner-content -->
        </div><!-- /#site-content -->
    </div><!-- /#content-wrap -->
</main> <!-- /#main-content -->
@stop