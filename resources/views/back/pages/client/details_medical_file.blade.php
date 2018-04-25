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
    {{Html::script('https://code.jquery.com/jquery-3.3.1.min.js') }}
@stop
@section('content')
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title"><i class="icon-eye"> </i> تفاصيل عن الملف</h6>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <div class="col-md-6">
                                    <h3 style="font-size: 18px"> اسم المريض:
                                        <span> {{ $medical_file->patient_name}} </span></h3>
                                    <h3 style="font-size: 18px"> العلاقة:
                                        <span> {{ $medical_file->relationship}}</span></h3>
                                    <h3 style="font-size: 18px">الجنس :
                                        <span> {{ $medical_file->patient_gendar}}</span></h3>
                                    <h3 style="font-size:18px"> التاريخ:
                                        <span> {{ $medical_file->date}}</span></h3>
                                    <h3 style="font-size: 18px"> اسم الطبيب المعالج:
                                        <span> {{ $medical_file->doctor_name}}</span></h3>
                                    <h3 style="font-size: 18px"> عنوان الطبيب:
                                        <span>{{ $medical_file->doctor_address}}</span></h3>
                                    <h3 style="font-size: 18px"> تلفون الطبيب: <span>{{$medical_file->doctor_phone }}</span>
                                    </h3>
                                    <h3 style="font-size: 18px"> الادويه الموصوفه: <span>{{ $medical_file->medical_list}}</span>
                                    </h3>
                                    <h3 style="font-size: 18px"> مده العلاج: <span>{{ $medical_file->duration_treatment}}</span>
                                    </h3>
                                </div>

                                <div class="col-md-6">
                                    <h3 style="font-size: 18px"> التحاليل المطلوبه:
                                        <span> {{ $medical_file->analyzes_required}} </span></h3>
                                    <h3 style="font-size: 18px"> نتيجه التحاليل :
                                        <span> {{ $medical_file->analyzes_result}}</span></h3>
                                    <h3 style="font-size: 18px">الإشعات المطلوبه :
                                        <span> {{ $medical_file->required_radiations}}</span></h3>
                                    <h3 style="font-size:18px"> نتيجه الاشعه:
                                        <span> {{ $medical_file->radiations_result}}</span></h3>
                                    <h3 style="font-size: 18px"> المريض يعاني من حساسية من أدوية:
                                        <span> {{ $medical_file->sensitivity_medical}}</span></h3>
                                    <h3 style="font-size: 18px"> المريض يعاني من حساسية من أكلات:
                                        <span>{{ $medical_file->sensitivity_eats}}</span></h3>
                                    <h3 style="font-size: 18px">  مدخن: <span>{{$medical_file->smoke }}</span>
                                    </h3>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

