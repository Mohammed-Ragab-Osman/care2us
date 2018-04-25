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
                            <h6 class="panel-title"><i class="icon-eye"> </i> تفاصيل عن الدواء</h6>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <div class="col-md-6">
                                    <h3 style="font-size: 18px"> الصنف بالانجليزية:
                                        <span> {{ $medicines_details->medicine_name_en}} </span></h3>
                                    <h3 style="font-size: 18px"> الصنف بالعربية:
                                        <span> {{ $medicines_details->medicine_name_ar}}</span></h3>
                                    <h3 style="font-size: 18px"> نوع الصنف:
                                        <span> {{ $medicines_type->title}}</span></h3>
                                    <h3 style="font-size:18px"> المجموعة الفعالة:
                                        <span> {{ $medicines_details->active_substance}}</span></h3>
                                </div>
                                <div class="col-md-6">
                                    <h3 style="font-size: 18px"> المادة الفعالة بالانجليزية :
                                        <span> {{ $medicines_details->active_substance_en}}</span></h3>
                                    <h3 style="font-size: 18px"> المادة الفعالة بالعربية:
                                        <span>{{ $medicines_details->active_substance_ar}}</span></h3>
                                    <h3 style="font-size: 18px"> السعر: <span>{{$medicines_details->price }}</span>
                                    </h3>
                                    <h3 style="font-size: 18px"> الخصم: <span>{{ $medicines_details->discount}}</span>
                                    </h3>
                                </div>
                                <div class="col-md-4">
                                    <h3 style="font-size: 18px"> صورة الدواء: <span><img
                                                    @if($medicines_details->medicine_img !=null )  src="{{url('images/medicines/'.$medicines_details->medicine_img)}}"
                                                    @else src="http://placehold.it/180" @endif alt="your image"
                                                    width="180" height="180"/></span></h3>
                                </div>
                                <div class="col-md-4">
                                    <h3 style="font-size: 18px"> صورة الروشتة بالانجليزية: <span><img
                                                    @if($medicines_details->prescription_img_en !=null )  src="{{url('images/medicines/'.$medicines_details->prescription_img_en)}}"
                                                    @else src="http://placehold.it/180" @endif alt="your image"
                                                    width="180" height="180"/></span></h3>
                                </div>
                                <div class="col-md-4">
                                    <h3 style="font-size: 18px"> صورة الروشتة بالعربية: <span><img
                                                    @if($medicines_details->prescription_img_ar !=null )  src="{{url('images/medicines/'.$medicines_details->prescription_img_ar)}}"
                                                    @else src="http://placehold.it/180" @endif alt="your image"
                                                    width="180" height="180"/></span></h3>
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

