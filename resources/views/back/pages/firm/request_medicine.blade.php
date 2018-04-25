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
                            <h6 class="panel-title"><i class="icon-truck"> </i> أطلب  دواء </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                    <form method="post" action="{{url('/request-medicine-search')}}" >
                                        {{ csrf_field() }}
                                        <div class=" col-md-4">
                                            <div class="form-group">
                                                <label for="firm_type">نوع الشركة  *</label>
                                                <select name="firm_type" class="form-control">
                                                    @foreach($f_types as $f_type)
                                                        <option value="{{$f_type->id}}"  @if(old('firm_type') == $f_type->id) ? {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-4">
                                            <div class="form-group">
                                                <label for="deal_type">نوع التعامل *</label>
                                                <select name="deal_type" class="form-control">
                                                    @foreach($deals_types as $deal_type)
                                                        <option value="{{$deal_type->id}}"  {{ (old('deal_type') == $deal_type->id) ? 'selected="selected"' : null }}  >{{$deal_type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-4">
                                            <div class="form-group">
                                                <label for="firm">اسم الشركة *</label>
                                                <select name="firm" class="form-control">
                                                    @foreach($firms as $firm)
                                                        <option value="{{$firm->id}}" {{ (old('firm') == $firm->id) ? 'selected="selected"' : null }}   >{{$firm->f_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-info">بحث</button>
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