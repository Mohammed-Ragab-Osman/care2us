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
                            <h6 class="panel-title">@if(isset($job)) <i class="icon-pencil5"> </i> تعديل الوظيفة@else <i class="icon-plus-circle2"> </i> اضافة وظيفة جديدة @endif </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                <form method="post" @if(isset($job)) action="{{url('/update-job/'.$job->id)}}" @else  action="{{url('/store-job')}}" @endif >
                                    {{ csrf_field() }}
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('job_title') ? ' has-error' : '' }}">
                                            <label for="job_title">اسم الوظيفة *</label>
                                            <input type="text" id="job_title" name="job_title"  @if(isset($job)) value="{{$job->job_title}}" @else value="{{ old('job_title') }}" @endif class="form-control form-app" required="">

                                            @if ($errors->has('job_title'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('job_title') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group {{ $errors->has('job_address') ? ' has-error' : '' }}">
                                            <label for="job_address">عنوان مكان العمل *</label>
                                            <input type="text" id="job_address" name="job_address"  @if(isset($job)) value="{{$job->job_address}}" @else value="{{ old('job_address') }}" @endif class="form-control form-app" required="">

                                            @if ($errors->has('job_address'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('job_address') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="job_type">نوع مكان العمل *</label>
                                            <select name="job_type" class="form-control">
                                                @foreach($job_types as $job_type)
                                                    <option value="{{$job_type->id}}"  @if(old('job_type') == $job_type->id) ? {{'selected="selected"' }}: {{  null }} @endif>{{$job_type->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label >تاريخ انتهاء الاعلان</label >
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="expiry_date"  class="form-control daterange-single">
                                                <span class="input-group-addon"><i class="icon-calendar52"></i></span>
                                            </div>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('expiry_date') }}</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--  editor -->
                                            <div class="form-group">
                                                <span>تفاصيل الوظيفة </span>
                                                <small class="text-danger">{{ $errors->first('job_desc') }}</small>
                                                <textarea name="job_desc" cols="18" rows="4" class="wysihtml5 wysihtml5-min form-control" placeholder="اكتب الوصف"> @if(isset($job)) {!!  $job->job_desc  !!} @else {{ old('job_desc') }} @endif  </textarea>
                                            </div>
                                            <!-- / editor -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">  @if(isset($job)) تعديل @else اضف @endif  </button>
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