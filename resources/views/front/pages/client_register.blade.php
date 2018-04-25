@extends('front.layout')
@section('title')
    تسجيل مستخدم جديد
@stop

@section('content')
    <style>
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>
    <!-- Featured Title -->
    <div id="featured-title" class="text-center"
         style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading ">تسجيل مستخدم جديد</h1>
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
                                                        <div class="col-md-6 col-xs-12 col-md-offset-3">
                                                            <div class="wprt-spacer clearfix" data-desktop="30"
                                                                 data-mobi="30" data-smobi="15"></div>
                                                            <form method="post" action="{{url('/client-store')}}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="u_type" value="3">
                                                                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                                    <label for="username">اسم المستخدم *</label>
                                                                    <input type="text" id="username" name="username"
                                                                           value="{{ old('username') }}"
                                                                           class="form-control form-app" required="">

                                                                    @if ($errors->has('username'))
                                                                        <span class="help-block">
                                                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                                            </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                    <label for="email">البريد الالكترونى *</label>
                                                                    <input type="email" id="email" name="email"
                                                                           value="{{ old('email') }}"
                                                                           class="form-control form-app" required="">
                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                                            </span>
                                                                    @endif
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="client_type">نوع الحساب *</label>
                                                                    <select name="client_type" class="form-control"
                                                                        id="client_type"    onchange="select(this);">
                                                                        <option value="0">اختر الحساب</option>
                                                                        @foreach($client_types as $client_type)
                                                                            <option value="{{$client_type->id}}"
                                                                                    @if(old('client_type') == $client_type->id) ?
                                                                                    {{'selected="selected"' }}: {{  null }} @endif>{{$client_type->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group" id="doc"
                                                                     style="display: none;">
                                                                    <label for="home_clinc">هل تريد ان تنضمن معنا
                                                                        العيادة؟ *</label>
                                                                    <label class="container">لا
                                                                        <input type="radio" name="home_clinc" value="0"
                                                                               onclick="yes(this);">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    <label class="container">نعم
                                                                        <input type="radio" name="home_clinc" value="1"
                                                                               onclick="yes(this);">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    @if ($errors->has('home_clinc') || $errors->has('doc_type'))

                                                                        <script>

                                                                            document.getElementById("doc").style.display = "block";

                                                                        </script>
                                                                    @endif


                                                                    @if ($errors->has('home_clinc'))
                                                                        <span class="help-block">
                                                                <small style="color:red">{{$errors->first('home_clinc')}}</small>
                                                            </span>
                                                                    @endif
                                                                </div>


                                                                <div class="form-group" id="ifYes"
                                                                     style="display: none;" {{ $errors->has('doc_type') ? ' has-error' : '' }}>
                                                                    <label for="doc_type">التخصص *</label>
                                                                    <select name="doc_type" class="form-control" id="doc_type">
                                                                        <option value=""> اختر تخصصك</option>
                                                                        @foreach($doc_types as $doc_type)
                                                                            <option value="{{$doc_type->id}}"
                                                                                    @if(old('doc_type') == $doc_type->id) ?
                                                                                    {{'selected="selected"' }}: {{  null }} @endif>{{$doc_type->doc_type}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('doc_type'))
                                                                        <script>
                                                                            document.getElementById("ifYes").style.display = "block";
                                                                        </script>
                                                                        <span class="help-block">
                                                                <small style="color:red">{{$errors->first('doc_type')}}</small>
                                                            </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                                    <label for="phone">رقم التليفون *</label>
                                                                    <input type="text" id="phone" name="phone"
                                                                           value="{{ old('phone') }}"
                                                                           class="form-control form-app" required="">
                                                                    @if ($errors->has('phone'))
                                                                        <span class="help-block">
                                                                <small>{{ $errors->first('phone') }}</small>
                                                            </span>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="mobile">االموبايل *</label>
                                                                    <input type="text" id="mobile" name="mobile"
                                                                           value="{{ old('mobile') }}"
                                                                           class="form-control form-app" required="">
                                                                </div>

                                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                                    <label for="address">العنوان *</label>
                                                                    <input type="text" id="address" name="address"
                                                                           value="{{ old('address') }}"
                                                                           class="form-control form-app" required="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="country">الدولة *</label>
                                                                    <select name="country" class="form-control">
                                                                        <option value="0">اختر الدولة</option>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{$country->id}}"
                                                                                    @if(old('country') == $country->id) ?
                                                                                    {{'selected="selected"'}} : {{ null }} @endif >{{$country->country_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="governorate">المحافظة *</label>
                                                                    <select name="governorate" class="form-control">
                                                                        <option value="0">اختر المحافظة</option>
                                                                        @foreach($governorates as $governorate)
                                                                            <option value="{{$governorate->id}}"
                                                                                    @if(old('governorate') == $governorate->id) ?
                                                                                    {{'selected="selected"'}} : {{ null }} @endif >{{$governorate->g_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="city">المنطقة *</label>
                                                                    <select name="city" class="form-control">
                                                                        <option value="0">اختر المنطقة</option>
                                                                        @foreach($cities as $city)
                                                                            <option value="{{$city->id}}"
                                                                                    @if(old('city') == $city->id) ?
                                                                                    {{ 'selected="selected"' }} : {{ null }} @endif >{{$city->c_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                    <label for="password">كلمة المرور *</label>
                                                                    <input type="password" id="password" name="password"
                                                                           class="form-control form-app" required="">
                                                                    @if ($errors->has('password'))
                                                                        <span class="help-block">
                                                                <small>{{ $errors->first('password') }}</small>
                                                            </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                                    <label for="password"> تاكيد كلمة المرور *</label>
                                                                    <input id="password-confirm" type="password"
                                                                           class="form-control"
                                                                           name="password_confirmation" required="">
                                                                    @if ($errors->has('password_confirmation'))
                                                                        <span class="help-block">
                                                                <small>{{ $errors->first('password_confirmation') }}</small>
                                                            </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group text-center">
                                                                    <button type="submit" class="btn btn-info">تسجيل
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div><!-- /.wprt-content-box -->
                                            </div>
                                        </div><!-- /.wprt-content-box -->

                                        <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60"
                                             data-smobi="60"></div>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- /.wprt-container -->
                        </div><!-- /.row-welcome -->

                    </div><!-- /.page-content -->
                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </main> <!-- /#main-content -->

    <script>
        function select(that) {
            if (that.value == 3 || that.value== 4) {
                //   alert("check");
                document.getElementById("doc").style.display = "block";
                $("#home_clinc").prop('required', true);
            } else if (that.value != 1) {
                //   alert("check");
                document.getElementById("doc").style.display = "none";
                $("#home_clinc").prop('required', false);

            } else {
                document.getElementById("doc").style.display = "none";
                $("#home_clinc").prop('required', false);
            }
        }
    </script>
    <script>
        function yes(that) {
            if (that.value == 1 &&  document.getElementById('client_type').value==3 ) {
              alert("check");
                document.getElementById("ifYes").style.display = "block";
              //  $("#doc_type").prop('required', true);
            } else {
                document.getElementById("ifYes").style.display = "none";
                $("#doc_type").prop('required', false);
            }
        }
    </script>
@stop