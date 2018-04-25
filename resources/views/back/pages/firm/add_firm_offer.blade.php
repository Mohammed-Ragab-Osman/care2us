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
                                @if(isset($offer))
                                    <i class="icon-pencil5"> </i> تعديل العرض
                                @else
                                    <i class="icon-plus-circle2"> </i>
                                    اضافة عرض جديد
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">

                                <form method="post" @if(isset($offer))  action="{{url('/update-firm-offer')}}"
                                      @else action="{{url('/store-firm-offer')}}"@endif >


                                    {{ csrf_field() }}
                                    @if(isset($offer))
                                        <input type="hidden" id="offer_id" name="offer_id"
                                               value="{{ $offer->id }}"> @endif
                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('offer_name') ? ' has-error' : '' }}">
                                            <label for="offer_name">اسم العرض *</label>
                                            <input type="text" id="offer_name" name="offer_name"
                                                   @if(isset($offer)) value="{{ $offer->offer_name }}"
                                                   @else value="{{ old('offer_name') }}"
                                                   @endif  class="form-control form-app" required="">

                                            @if ($errors->has('offer_name'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('offer_name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('medicine_name') ? ' has-error' : '' }}">
                                            <label for="medicine_name">اسم الدواء *</label>
                                            <input type="text" id="medicine_name" name="medicine_name"
                                                   @if(isset($offer)) value="{{ $offer->medicine_name }}"
                                                   @else   value="{{ old('medicine_name') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('medicine_name'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('medicine_name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>تاريخ انتهاء العرض </label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="expiry_date"
                                                       class="form-control daterange-single"
                                                       @if(isset($offer)) value="{{ $offer->expiry_date }}"@endif >
                                                <span class="input-group-addon"><i class="icon-calendar52"></i></span>
                                            </div>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('expiry_date') }}</small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--  editor -->
                                            <div class="form-group">
                                                <span>التفاصيل </span>
                                                <small class="text-danger">{{ $errors->first('offer_desc') }}</small>
                                                <textarea name="offer_desc" cols="18" rows="4"
                                                          class="wysihtml5 wysihtml5-min form-control"
                                                          placeholder="اكتب الوصف">  @if(isset($offer))
                                                        {{ $offer->offer_desc }}
                                                    @else{{ old('offer_desc') }} @endif  </textarea>
                                            </div>
                                            <!-- / editor -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($offer))
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