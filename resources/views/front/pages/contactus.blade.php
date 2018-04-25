@extends('front.layout')
@section('content')
<!-- Featured Title -->
<div id="featured-title" class="text-center" style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
    <div id="featured-title-inner" class="wprt-container">
        <div class="featured-title-inner-wrap">
            <div class="featured-title-heading-wrap">
                <h1 class="featured-title-heading ">Contact Us</h1>
            </div>
        </div>
    </div>
</div><!-- /#featured-title -->
<!-- Main Content -->
<main id="main-content">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <div class="wprt-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wprt-spacer clearfix" data-desktop="100" data-mobi="60" data-smobi="60"></div>
                            </div><!-- /.col-md-12 -->
                                <div class="col-md-3">

                                    <div class="wprt-content-box style-1 bg-accent">
                                        <div class="inner">
                                            <h2 class="heading font-size-18 text-white">OPENING HOURS</h2>

                                            <div class="wprt-menu-list style-1 clearfix">
                                                <span class="text">Mon - Fri</span>
                                                <span class="value">08:00 - 17:00</span>
                                            </div>

                                            <div class="wprt-menu-list style-1 clearfix">
                                                <span class="text">Saturday</span>
                                                <span class="value">09:00 - 14:00</span>
                                            </div>

                                            <div class="wprt-menu-list style-1 clearfix">
                                                <span class="text">Sunday</span>
                                                <span class="value">08:00 - 10:00</span>
                                            </div>

                                            <div class="wprt-menu-list style-1 clearfix">
                                                <span class="text">Holidays</span>
                                                <span class="value">Closed</span>
                                            </div>
                                        </div>
                                    </div><!-- /.wprt-content-box -->
                                </div><!-- /.col-md-3 -->

                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="inner">
                                                <form action="./includes/contact/contact-process.php" method="post" class="contact-form wpcf7-form" novalidate="novalidate">
                                                    <div class="wprt-contact-form-1">
                                                        <span class="col-md-6 name">
                                                            <input type="text" tabindex="1" id="name" name="name" value="" class="form-control" placeholder="Name *" required="">
                                                        </span>

                                                        <span class="col-md-6 phone">
                                                            <input type="email" tabindex="2" id="phone" name="phone" value="" class="form-control" placeholder="Phone *" required="">
                                                        </span>


                                                        <span class="col-md-6 email">
                                                            <input type="email" tabindex="2" id="email" name="email" value="" class="form-control" placeholder="E-mail *" required="">
                                                        </span>

                                                        <span class="col-md-6 subject">
                                                            <input type="text" tabindex="2" id="subject" name="subject" value="" class="form-control" placeholder="Subject *" required="">
                                                        </span>

                                                        <span class="col-md-12 message">
                                                            <textarea name="message" tabindex="5" cols="40" rows="6" class="form-control textarea" placeholder="Message *" required=""></textarea>
                                                        </span>

                                                        <div class="col-md-12">
                                                            <input type="submit" value="SEND" class="pull-right" id="send" name="send">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="30" data-smobi="30"></div>

                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->

                                </div><!-- /.col-md-9 -->

                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="100" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                                                            
                            </div>  
                        </div>
                    </div>
                </div><!-- /.page-content -->
            </div><!-- /#inner-content -->
        </div><!-- /#site-content -->
    </div><!-- /#content-wrap -->
</main> <!-- /#main-content -->

@stop