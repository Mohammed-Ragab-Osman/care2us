@extends('front.layout')
@section('content')
<!-- Featured Title -->
<div id="featured-title" class="text-center" style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
    <div id="featured-title-inner" class="wprt-container">
        <div class="featured-title-inner-wrap">
            <div class="featured-title-heading-wrap">
                <h1 class="featured-title-heading ">تسجيل الدخول</h1>
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
                    <!-- Welcome -->
                    <div class="row-welcome">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-content-box clearfix move-into-slider-home-2">
                                        <div class="inner">

                                            <div class="bg-white col-md-12">
                                                <div class="inner ">
                                                <br>
                                                @if(session()->has('success'))
                                                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                                                        <div class="alert alert-success text-center">
                                                            {{ session()->get('success') }}
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(session()->has('fail'))
                                                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                                                        <div class="alert alert-danger text-center">
                                                            {{ session()->get('fail') }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-6 col-xs-12 col-md-offset-3">
                                                    @if(session()->has('loginerror'))
                                                        <strong class="text-danger text-center">
                                                            {{ session()->get('loginerror') }}
                                                        </strong>
                                                    @endif
                                                    <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="30" data-smobi="15"></div>
                                                    <form method="post" action="{{url('/sessionstore')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label for="email">البريد الالكترونى</label>
                                                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-app" required="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="password">كلمة المرور</label>
                                                            <input type="password" id="password" name="password" class="form-control form-app"  required="">
                                                        </div>

                                                        <div class="form-group text-center">
                                                            <button type="submit" class="btn btn-info btn-block btn-lg">تسجيل الدخول</button>
                                                        </div>
                                                    </form>
                                                    <br>
                                                </div>
                                                </div>
                                            </div><!-- /.wprt-content-box -->
                                        </div>
                                    </div><!-- /.wprt-content-box -->

                                    <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60" data-smobi="60"></div>
                                </div>
                            </div><!-- .row -->
                        </div><!-- /.wprt-container -->
                    </div><!-- /.row-welcome -->

                </div><!-- /.page-content -->
            </div><!-- /#inner-content -->
        </div><!-- /#site-content -->
    </div><!-- /#content-wrap -->
</main> <!-- /#main-content -->


@stop