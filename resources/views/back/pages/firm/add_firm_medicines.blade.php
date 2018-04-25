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

    {{--
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"--}}
    {{Html::script('back/assets/js/pages/form_input_groups.js') }}

    {{Html::script('back/assets/js/pages/picker_date.js') }}
    {{Html::script('https://code.jquery.com/jquery-3.3.1.min.js') }}
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).next('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".first").change(function () { //set up a common class
                readURL(this);
            });
        });
    </script>

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
                            <h6 class="panel-title">@if(isset($medicines)) <i class="icon-pencil5"> </i> تعديل
                                الصنف @else <i class="icon-plus-circle2"> </i> اضافة صنف جديد @endif </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                <form method="post"
                                      @if(isset($medicines)) action="{{url('/update-firm-medicine/'.$medicines->id)}}"
                                      @else  action="{{url('/store-firm-medicine')}}"
                                      @endif enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('medicine_name_en') ? ' has-error' : '' }}">
                                            <label for="medicine_name_en">الصنف بالانجليزية *</label>
                                            <input type="text" id="medicine_name_en" name="medicine_name_en"
                                                   @if(isset($medicines)) value="{{$medicines->medicine_name_en}}"
                                                   @else value="{{ old('medicine_name_en') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('medicine_name_en'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('medicine_name_en') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('medicine_name_ar') ? ' has-error' : '' }}">
                                            <label for="medicine_name_ar">الصنف بالعربية *</label>
                                            <input type="text" id="medicine_name_ar" name="medicine_name_ar"
                                                   @if(isset($medicines)) value="{{$medicines->medicine_name_ar}}"
                                                   @else value="{{ old('medicine_name_ar') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('medicine_name_ar'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('medicine_name_ar') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="medicine_type">نوع الصنف *</label>
                                            <select name="medicine_type" class="form-control">
                                                @foreach($medicine_types as $medicine_type)
                                                    <option value="{{$medicine_type->id}}"
                                                            @if(isset($medicines) && $medicines->medicine_type == $medicine_type->id)
                                                            {{'selected="selected"' }}> {{$medicine_type->title}}
                                                            @else
                                                            @if(old('medicine_type') == $medicine_type->id ) ?
                                                            {{'selected="selected"' }}: {{  null }} @endif>{{$medicine_type->title}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('active_substance') ? ' has-error' : '' }}">
                                            <label for="active_substance">المجموعة الفعالة *</label>
                                            <input type="text" id="active_substance" name="active_substance"
                                                   @if(isset($medicines)) value="{{$medicines->active_substance}}"
                                                   @else value="{{ old('active_substance') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('active_substance'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('active_substance') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('active_substance_en') ? ' has-error' : '' }}">
                                            <label for="active_substance_en">المادة الفعالة بالانجليزية *</label>
                                            <input type="text" id="active_substance_en" name="active_substance_en"
                                                   @if(isset($medicines)) value="{{$medicines->active_substance_en}}"
                                                   @else value="{{ old('active_substance_en') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('active_substance_en'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('active_substance_en') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('active_substance_ar') ? ' has-error' : '' }}">
                                            <label for="active_substance_ar">المادة الفعالة بالعربية *</label>
                                            <input type="text" id="active_substance_ar" name="active_substance_ar"
                                                   @if(isset($medicines)) value="{{$medicines->active_substance_ar}}"
                                                   @else value="{{ old('active_substance_ar') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('active_substance_ar'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('active_substance_ar') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                            <label for="price">السعر *</label>
                                            <input type="text" id="price" name="price"
                                                   @if(isset($medicines)) value="{{$medicines->price}}"
                                                   @else value="{{ old('price') }}" @endif class="form-control form-app"
                                                   required="">

                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('price') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
                                            <label for="discount">الخصم *</label>
                                            <input type="text" id="discount" name="discount"
                                                   @if(isset($medicines)) value="{{$medicines->discount}}"
                                                   @else value="{{ old('discount') }}"
                                                   @endif class="form-control form-app" required="">

                                            @if ($errors->has('discount'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('discount') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('medicine_img') ? ' has-error' : '' }}">
                                            <label for="discount">صورة الدواء*</label>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="file" id="img1" accept="file_extension|image/*" name="medicine_img"
                                                       class="file-styled" onchange="readURL(this);"/>
                                                <img id="first"
                                                     @if(isset($medicines) &&$medicines->medicine_img !=null )  src="{{url('images/medicines/'.$medicines->medicine_img)}}"
                                                     @else src="http://placehold.it/180" @endif alt="your image"
                                                     width="180" height="180"/>
                                            </div>

                                            @if ($errors->has('medicine_img '))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('medicine_img') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('prescription_img_en') ? ' has-error' : '' }}">
                                            <label for="discount">صورة الروشتة بالانجليزية*</label>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="file" id="img1" accept="image/*" name="prescription_img_en"
                                                       class="file-styled" onchange="readURL(this);"
                                                       placeholder="choose image"/>
                                                <img id="first"
                                                     @if(isset($medicines) &&$medicines->prescription_img_en !=null )  src="{{url('images/medicines/'.$medicines->prescription_img_en)}}"
                                                     @else src="http://placehold.it/180" @endif alt="your image"
                                                     width="180" height="180"/>
                                            </div>

                                            @if ($errors->has('prescription_img_en '))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('prescription_img_en') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group {{ $errors->has('prescription_img_ar') ? ' has-error' : '' }}">
                                            <label for="discount">صورة الروشتة بالعربية*</label>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="file" id="img1" accept="image/*" name="prescription_img_ar"
                                                       class="file-styled" placeholder="choose image"
                                                       onchange="readURL(this);"/>
                                                <img id="first"
                                                     @if(isset($medicines) &&$medicines->prescription_img_ar !=null )  src="{{url('images/medicines/'.$medicines->prescription_img_ar)}}"
                                                     @else src="http://placehold.it/180" @endif alt="your image"
                                                     width="180" height="180"/>
                                            </div>

                                            @if ($errors->has('prescription_img_ar '))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('prescription_img_ar') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">  @if(isset($medicines))
                                                    تعديل @else اضف @endif  </button>
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
