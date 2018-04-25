@extends('front.layout')
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
    <!-- /theme JS files -->
@stop
@section('content')
    <!-- Main content -->
    <!-- Featured Title -->
    <div id="featured-title" class="text-center"
         style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading ">وظائف خالية</h1>
                </div>
            </div>
        </div>
    </div><!-- /#featured-title -->
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <a href="{{url('/client-request-medicine')}}">

                            </a>
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
                                <div class="panel panel-flat">
                                    <table class="table datatable-basic container">
                                        <thead>
                                        <tr>
                                            <th> المقر</th>
                                            <th>المكان</th>
                                            <th>وصف</th>
                                            <th>العنوان</th>
                                            <th>وصف الاعلان  </th>
                                        </tr>
                                        {{--Full texts	id	username	user_id	doctor_id	email	question
                                        detials	created_at	updated_at--}}
                                        </thead>
                                        <tbody>
                                        @if(isset($sell_buy_places))
                                            @foreach($sell_buy_places as $resq )
                                                <tr>
                                                    <th> {{$resq->username}}</th>
                                                    <th> {{$resq->title}}</th>
                                                    <th> {{$resq->place_name}}</th>
                                                    <th> {{$resq->place_address}}</th>
                                                    <th> {{$resq->place_desc}}</th>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <p>no data</p>
                                            </tr>

                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
@stop