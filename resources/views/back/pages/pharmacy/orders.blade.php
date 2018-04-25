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
                            <a href="{{url('/add-firm-offer')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>  اضف عرض جديدة</p>
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
                                            <th>#</th>
                                            <th>اسم</th>
                                            <th>تليفون</th>
                                            <th>الايميل</th>
                                            <th>أسم الدواء</th>
                                            <th class="text-center">الحالة</th>
                                            <th class="text-center">التفاصيل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$order->username}}</td>
                                                <td>{{$order->mobile}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->medicin}}</td>

                                                <td>
                                                    @if($order->requst_client_status=="panding")
                                                        <div class="btn btn-warning">  {{$order->requst_client_status}} </div>
                                                    @elseif($order->requst_client_status=="accept")
                                                        <div class="btn btn-success">  {{$order->requst_client_status}} </div>
                                                        @else
                                                        <div class="btn btn-danger">  {{$order->requst_client_status}} </div>
                                                    @endif
                                                </td>
                                                <td><a href="{{url('/details-request-medicine/'.$order->id)}}"><i class="icon-eye"> </i> التفاصيل</a></td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

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