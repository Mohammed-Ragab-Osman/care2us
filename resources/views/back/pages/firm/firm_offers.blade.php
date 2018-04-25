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
                            <h6 class="panel-title"><i class="icon-gift"> </i> العروض  </h6>
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
                                            <th>العرض</th>
                                            <th>اسم الدواء</th>
                                            <th>تفاصيل العرض</th>
                                            <th>تاريخ انتهاء العرض</th>
                                            <th class="text-center">تعديل </th>
                                            <th class="text-center">حذف </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($offers as $offer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{$offer->offer_name}}</td>
                                            <td>{{$offer->medicine_name}}</td>
                                            <td>{{$offer->offer_desc }}</td>
                                            <td>{{$offer->expiry_date}}</td>
                                            <td><a href="{{url('/modify-firm-offer/'.$offer->id)}}"><i class="icon-pencil5"></i> تعديل </a></td>
                                            <td><a href="{{url('/delete-firm-offer/'.$offer->id)}}" onclick="return confirm('هل تريد حذف هذا العرض ؟');"><i class="icon-trash"></i> حذف </a></td>

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