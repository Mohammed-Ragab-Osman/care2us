@extends('back.layout')
@section('script')
    <!-- Theme JS files -->
    {{Html::script('back/assets/js/plugins/visualization/d3/d3.min.js') }}
    {{Html::script('back/assets/js/plugins/visualization/d3/d3_tooltip.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/switchery.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
    {{Html::script('back/assets/js/plugins/ui/moment/moment.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/daterangepicker.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/datatables.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/select2.min.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/datatables_basic.js') }}
    {{Html::script('back/assets/js/plugins/ui/ripple.min.js') }}
    {{Html::script('back/assets/js/pages/dashboard.js') }}
    <!-- /theme JS files -->
@stop
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title"><i class="icon-cogs"> </i> تعديل البيانات </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if($user->u_type == 3)
                                    <form method="post" action="{{url('/update-client/'.$user->id)}}">
                                        {{ csrf_field() }}
                                        <div class=" col-md-6">
                                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label for="username">اسم المستخدم *</label>
                                                <input type="text" id="username" name="username"
                                                       @if(isset($user)) value="{{$user->username}}"
                                                       @else value="{{ old('username') }}"
                                                       @endif class="form-control form-app" required="">

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                                <small>{{ $errors->first('username') }}</small>
                                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">البريد الالكترونى *</label>
                                                <input type="email" id="email" name="email"
                                                       @if(isset($user)) value="{{$user->email}}"
                                                       @else  value="{{ old('email') }}"
                                                       @endif class="form-control form-app" required="">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                                <small>{{ $errors->first('email') }}</small>
                                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="client_type">نوع الحساب *</label>
                                                <select name="client_type" class="form-control">
                                                    @foreach($client_types as $client_type)
                                                        <option value="{{$client_type->id}}"
                                                                @if(isset($client) && $client->client_type == $client_type->id ) selected="selected"
                                                                @elseif(old('client_type') == $client_type->id)  ?
                                                                {{ 'selected="selected"' }} : {{ null }} @endif>{{$client_type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="phone">رقم التليفون *</label>
                                                <input type="text" id="phone" name="phone"
                                                       @if(isset($user)) value="{{$user->phone}}"
                                                       @else  value="{{ old('phone') }}"
                                                       @endif class="form-control form-app" required="">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                                <small>{{ $errors->first('phone') }}</small>
                                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group ">
                                                <label for="mobile">االموبايل *</label>
                                                <input type="text" id="mobile" name="mobile"
                                                       @if(isset($user)) value="{{$user->mobile}}"
                                                       @else  value="{{ old('mobile') }}"
                                                       @endif class="form-control form-app" required="">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address">العنوان *</label>
                                                <input type="text" id="address" name="address"
                                                       @if(isset($user)) value="{{$user->u_address}}"
                                                       @else  value="{{ old('address') }}"
                                                       @endif class="form-control form-app" required="">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="country">الدولة *</label>
                                                <select name="country" class="form-control">
                                                    <option value="0">اختر الدولة</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}"
                                                                @if(isset($user) && $user->u_country == $country->id) selected="selected"
                                                                @elseif(old('country') == $country->id)  ?
                                                                {{ 'selected="selected"' }} : {{ null }} @endif >{{$country->country_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="governorate">المحافظة *</label>
                                                <select name="governorate" class="form-control">
                                                    <option value="0">اختر المحافظة</option>
                                                    @foreach($governorates as $governorate)
                                                        <option value="{{$governorate->id}}"
                                                                @if(isset($user) && $user->u_governorate == $governorate->id) selected="selected"
                                                                @elseif(old('governorate') == $governorate->id) ?
                                                                {{ 'selected="selected"' }} : {{ null }} @endif >{{$governorate->g_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="city">المنطقة *</label>
                                                <select name="city" class="form-control">
                                                    <option value="0">اختر المنطقة</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}"
                                                                @if(isset($user) && $user->u_city == $city->id) selected="selected"
                                                                @elseif(old('city') == $city->id) ?
                                                                {{ 'selected="selected"' }} : {{ null }} @endif >{{$city->c_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-info">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main charts -->
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@stop