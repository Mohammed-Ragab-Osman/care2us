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
                            <a href="{{url('/add-firm-medicine')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>  اضف صنف جديد</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-lab"> </i> الادوية  </h6>
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
                                            <th>الصنف بالانجليزية</th>
                                            <th>نوع الصنف</th>
                                            <th>المادة الفعالة</th>
                                            <th>السعر</th>
                                            <th class="text-center">التفاصيل</th>
                                            <th class="text-center">تعديل</th>
                                            <th class="text-center">حذف </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($medicines as $medicine)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$medicine->medicine_name_en}}</td>
                                                <td>
                                                    @foreach($medicine_types as $medicine_type)
                                                        @if($medicine->medicine_type == $medicine_type->id )
                                                            {{$medicine_type->title}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$medicine->active_substance}}</td>
                                                <td>{{$medicine->price }}</td>
                                                <td><a href="{{url('/details-firm-medicine/'.$medicine->id)}}"><i class="icon-eye"> </i> التفاصيل</a></td>
                                                <td><a href="{{url('/edit-firm-medicine/'.$medicine->id)}}"><i class="icon-pencil5"></i> تعديل</a></td>
                                                <td><a href="{{url('/delete-firm-medicine/'.$medicine->id)}}" onclick="return confirm('هل تريد حذف هذا العرض ؟');"><i class="icon-trash"></i> حذف </a></td>

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