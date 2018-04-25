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
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>   طلب دواء </p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-gift"> </i> العروض </h6>
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
                                    <table class="table datatable-basic">
                                        <thead>
                                        <tr>
                                            <th> الدوله</th>
                                            <th>المحافظه</th>
                                            <th>المنطقه</th>
                                            <th>اسم الصيدليه</th>
                                            <th>الادويه الموصوفه</th>
                                            <th> تفاصيل العنوان مع رقم التلفون</th>
                                            <th>حاله الطلب</th>
                                            <th> تعديل / حذف</th>
                                        </tr>
                                        {{--Full texts	id	username	user_id	doctor_id	email	question
                                        detials	created_at	updated_at--}}
                                        </thead>
                                        <tbody>
                                        @if(isset($requstFile))

                                            @foreach($requstFile as $req )
                                                <tr>
                                                    <th> {{$req->country_title}}</th>
                                                    <th> {{$req->g_title}}</th>
                                                    <th> {{$req->c_title}}</th>
                                                    <th> {{$req->username}}</th>
                                                    <th> {{$req->medicin}}</th>
                                                    <th> {{$req->detils}}</th>
                                                    <th> {{$req->requst_client_status}}</th>

                                                    @if($req->requst_client_status == 'accept')
                                                        <th> جارى تنفيذ الطلب</th>
                                                    @elseif($req->requst_client_status == 'rejected')
                                                        <th> جارى تنفيذ الطلب</th>
                                                    @else
                                                        <th><a href="{{url('/edite-request/'.$req->id)}}">تعديل</a> / <a href="{{url('/delete-request/'.$req->id)}}">حذف</a></th>
                                                    @endif
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