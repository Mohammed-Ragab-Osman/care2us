@extends('back.layout')
@section('script')
    <!-- text Editor   -->
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/wysihtml5.min.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/toolbar.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/parsers.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js') }}

    <!-- datepicker   -->
    {{Html::script('back/assets/js/plugins/ui/moment/moment.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/daterangepicker.js') }}
    {{Html::script('back/assets/js/plugins/pickers/anytime.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.date.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.time.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/legacy.js') }}

    <!-- Checkbox -->
    {{Html::script('back/assets/js/plugins/forms/styling/switchery.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/switch.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/inputs/touchspin.min.js') }}

    {{Html::script('back/assets/js/plugins/notifications/jgrowl.min.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/editor_wysihtml5.js') }}
    {{Html::script('back/assets/js/pages/form_inputs.js') }}
    {{Html::script('back/assets/js/pages/form_input_groups.js') }}

    {{Html::script('back/assets/js/pages/picker_date.js') }}
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
                            <h6 class="panel-title" style="font-size: large">

                                <i class="icon-plus-circle2"> </i>
                                طلب دواء الفائض

                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(isset($excessMedicines))
                                    <form method="post"
                                          action="{{url('/add-requset-excess-medicines/'.$excessMedicines->id)}}">


                                        {{ csrf_field() }}

                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="medicine_name" style="font-size: large">اسم الدواء :

                                                    @if(isset($excessMedicines))
                                                        {{ $excessMedicines->medicine_name }}
                                                    @endif
                                                </label>

                                            </div>
                                        </div>

                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="quantity" style="font-size: large">اسم الصيدلية :

                                                    @if(isset($excessMedicines)) {{ $excessMedicines->pharm_name }}

                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="quantity" style="font-size: large">الكمية المحددة :

                                                    @if(isset($excessMedicines)) {{ $excessMedicines->quantity }}

                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group ">
                                                <label for="quantity" style="font-size: large">الكمية المطلوبة *</label>
                                                <input type="number" id="quantity" name="quantity"

                                                       max="{{ $excessMedicines->quantity }}" min="1"
                                                       class="form-control form-app" required="">

                                                @if(session()->has('errors'))
                                                    <span class="help-block" style="color: red">
                                                    <small>{{session()->get('errors') }}</small>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class=" col-md-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-info" style="font-size: large">

                                                    اطلب


                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
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