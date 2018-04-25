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
    {{Html::script('back/assets/js/pages/form_select2.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/datatables_basic.js') }}
    {{Html::script('back/assets/js/plugins/ui/ripple.min.js') }}
    {{Html::script('back/assets/js/pages/dashboard .js') }}


    <script>
        $(document).ready(function () {
            $(document).on('change', '#country', function () {
                var Coun_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                //console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getpackages')!!}',
                    data: {'id': Coun_id},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر المحافظه</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].g_title + '</option>';
                        }
                        $('#city').html("");
                        $('#city').append(op);
                    },
                    error: function () {
                        console.log('error');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '#city', function () {
                var gov_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                //console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getcity')!!}',
                    data: {'id': gov_id},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر المنطقه</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].c_title + '</option>';
                        }
                        $('#gov-city').html("");
                        $('#gov-city').append(op);
                    },
                    error: function () {
                        console.log('error');

                    }
                });
            });
        });
    </script>
    <script>
        $(document).on('change', '#gov-city', function () {
            var city_id = $(this).val();
            var div = $(this).parent();
            var op = "";
            //console.log(city_id);
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('getpharm')!!}',
                data: {'id': city_id},
                success: function (data) {
                    /* console.log('success');
                     console.log(data);*/
                    op += '<option value="0" selected disabled>من فضلك اختر الصيدليه</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].username + '</option>';
                    }
                    $('#pharm').html("");
                    $('#pharm').append(op);
                },
                error: function () {
                    console.log('error');

                }
            });
        });
        $(document).ready(function () {
        });
    </script>

    <!-- /theme JS files --
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
                            <a href="{{url('/request-file')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>عرض الطلبات</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-truck"> </i> أطلب دواء </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div calss="col-md-6 col-md-offset-3">
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                @endif
                                <form method="post" action="@if(isset($requestfileback)){{url('/edite-done/'.$requestfileback->id)}}@else{{url('/request-medicine-search')}}@endif">
                                    {{ csrf_field() }}
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="country">الدولة *</label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option value="0">اختر الدولة</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}"
                                                            @if(isset($requestfileback) && $requestfileback->country == $country->id) selected="selected"
                                                            @endif >
                                                        {{$country->country_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="governorate">المحافظة *</label>
                                            <select name="governorate" class="form-control" id="city" required>
                                                @if(isset($requestfileback))
                                                    @foreach($governorates as $governorates )

                                                        <option value="{{$governorates->id}}
                                                                "
                                                                @if(isset($requestfileback) && $requestfileback->government == $governorates->id)
                                                                selected="selected"
                                                                @endif >
                                                            {{$governorates->g_title}}</option>


                                                    @endforeach
                                                @else
                                                    <option value="">اختر المحافظه</option>

                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">

                                        <div class="form-group">

                                            <label for="city">المنطقة *</label>
                                            <select name="city" class="form-control" id="gov-city" required>
                                                @if(isset($requestfileback))
                                                    @foreach($cities as $ci)

                                                        <option value="{{$ci->id}}"
                                                                @if(isset($requestfileback) && $requestfileback->city == $ci->id) selected="selected"
                                                                @endif >
                                                            {{$ci->c_title}}</option>

                                                    @endforeach
                                                @else
                                                    <option value="">من فضلك اختر المدينه</option>
                                                    {{--   @foreach($cities as $city)
               <option value="{{$city->id}}" {{ (old('city') == $city->id) ? 'selected="selected"' : null }}   >{{$city->c_title}}</option>
           @endforeach--}}
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">

                                        <div class="form-group">
                                            <label for="city">الصيدليه *</label>
                                            <select class="select-search form-control" name="pharm">
                                                <optgroup label="" id="pharm">
                                                    @if(isset($requestfileback))
                                                        @foreach($users as $pharm)

                                                            <option value="{{$pharm->id}}"
                                                                    @if(isset($requestfileback) && $requestfileback->pharm_id == $pharm->id) selected="selected"
                                                                    @endif >
                                                                {{$pharm->username}}</option>

                                                        @endforeach
                                                        @else

                                                        <option value="">من فضلك اختر الصدليه</option>
                                                        @endif
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city">الادويه الموصوفه *</label>
                                        <textarea name="medicin" class="form-control form-group"
                                                  required> @if(isset($requestfileback)) {{$requestfileback->medicin}} @endif</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city">تفاصيل العنوان مع رقم التلفون*</label>
                                        <textarea name="detial"

                                                  class="form-control form-group"
                                                  required>@if(isset($requestfileback)) {{$requestfileback->detils}}

                                            @endif</textarea>
                                    </div>
                                    <div class=" col-md-12 row text-center container">
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                    class="btn btn-info form-control">@if(isset($requestfileback)){{'تعديل الطلب'}}@else{{'طلب الدواء'}}@endif</button>
                                        </div>
                                    </div>
                                </form>
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