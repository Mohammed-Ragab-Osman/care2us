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
                            <a href="{{url('/add-job')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>  اضف وظيفة جديدة</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-user-tie"> </i> وظائف خالية  </h6>
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
                                            <th>اسم الوظيفة</th>
                                            <th>نوع مكان العمل</th>
                                            <th>عنوان مكان العمل</th>
                                            <th>تفاضيل الوظيفة</th>
                                            <th>تاريخ انتهاء الاعلان</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$job->job_title}}</td>
                                                <td>
                                                    @foreach($job_types as $job_type)
                                                        @if($job->job_type == $job_type->id )
                                                            {{$job_type->title}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$job->job_address}}</td>
                                                <td>{!! $job->job_desc!!}</td>
                                                <td>{{$job->expiry_date }}</td>
                                                <td><a href="{{url('/edit-job/'.$job->id)}}"><i class="icon-pencil5"></i> تعديل</a></td>
                                                <td><a href="{{url('/delete-job/'.$job->id)}}" onclick="return confirm('هل تريد حذف هذه الوظيفة ؟');"><i class="icon-trash"></i> حذف </a></td>
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