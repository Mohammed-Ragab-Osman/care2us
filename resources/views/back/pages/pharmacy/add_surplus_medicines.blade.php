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
                            <h6 class="panel-title">
                                @if(isset($surplus))
                                    <i class="icon-pencil5"> </i> تعديل دواء الفائض
                                @else
                                    <i class="icon-plus-circle2"> </i>
                                    اضافة دواء الفائض
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post"
                                      @if(isset($surplus))action="{{url('/update-surplus-medicines/'.$surplus->id)}}"
                                      @else action="{{url('/store-surplus-medicines')}}"@endif >

                                    {{ csrf_field() }}

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('offer_name') ? ' has-error' : '' }}">
                                            <label for="medicine_name">اسم الدواء *</label>
                                            <input type="text" id="medicine_name" name="medicine_name"
                                                   @if(isset($surplus)) value="{{ $surplus->medicine_name }}"
                                                   @else value="{{ old('medicine_name') }}"
                                                   @endif  class="form-control form-app" required="">

                                            @if ($errors->has('medicine_name'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('medicine_name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                            <label for="quantity">الكمية *</label>
                                            <input type="number" id="quantity" name="quantity"
                                                   @if(isset($surplus)) value="{{ $surplus->quantity }}"
                                                   @else   value="{{ old('quantity') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('quantity'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('quantity') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($surplus))
                                                    تعديل
                                                @else
                                                    اضف
                                                @endif
                                            </button>
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
