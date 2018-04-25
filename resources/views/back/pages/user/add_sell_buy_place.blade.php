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
                                @if(isset($place))
                                    <i class="icon-plus-circle2"> </i> تعديل مكان جديد </h6>
                            @else
                                <i class="icon-plus-circle2"> </i> اضافة مكان جديد  </h6>
                            @endif

                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">

                                <form method="post"
                                      @if(isset($place))
                                      action="{{url('/update-sell-buy-place/'.$place->id)}}"
                                      @else
                                      action="{{url('/store-sell-buy-place')}}"
                                        @endif>
                                    {{ csrf_field() }}
                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('place_name') ? ' has-error' : '' }}">
                                            <label for="place_name">اسم المكان *</label>
                                            <input type="text" id="place_name" name="place_name"
                                                   @if(isset($place))
                                                   value="{{$place->place_name}}"
                                                   @else
                                                   value="{{ old('place_name') }}"
                                                   @endif
                                                   class="form-control form-app"
                                                   required="">

                                            @if ($errors->has('place_name'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('place_name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('place_address') ? ' has-error' : '' }}">
                                            <label for="place_address">عنوان المكان *</label>
                                            <input type="text" id="place_address" name="place_address"
                                                   @if(isset($place))
                                                   value="{{$place->place_address}}"
                                                   @else
                                                   value="{{ old('place_address') }}"
                                                   @endif class="form-control form-app"
                                                   required="">

                                            @if ($errors->has('place_address'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('place_address') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="place_type">نوع المكان *</label>
                                            <select name="place_type" class="form-control">
                                                @foreach($place_types as $place_type)
                                                    @if(isset($place))
                                                        <option @if($place->place_type==$place_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif
                                                                value="{{$place_type->id}}">{{$place_type->title}}</option>
                                                    @else
                                                        value="{{ old('place_address') }}"
                                                        <option value="{{$place_type->id}}"
                                                                @if(old('place_type') == $place_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$place_type->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--  editor -->
                                            <div class="form-group">
                                                <span>التفاصيل </span>
                                                <small class="text-danger">{{ $errors->first('place_desc') }}</small>
                                                <textarea name="place_desc" cols="18" rows="4"
                                                          class="wysihtml5 wysihtml5-min form-control"
                                                          placeholder="اكتب الوصف">
                                                      @if(isset($place))
                                                        {{$place->place_desc}}
                                                    @else
                                                        {{ old('place_desc') }}
                                                    @endif </textarea>
                                            </div>
                                            <!-- / editor -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($place))
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