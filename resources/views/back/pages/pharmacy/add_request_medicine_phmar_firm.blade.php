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
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <!-- /theme JS files -->
    <script>
        $(document).on('change', '#firm_type', function () {
            var firm_type = $(this).val();
            var div = $(this).parent();
            var op = "";
            console.log(firm_type);
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/getFirms/')!!}',
                data: {'id': firm_type},
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    op += '<option value="0" selected disabled>من فضلك اختر الشركة</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].f_name + '</option>';
                    }
                    $('#firm').html("");
                    $('#firm').append(op);
                },
                error: function () {
                    console.log('error');

                }
            });
        });
        $(document).ready(function () {
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
                            <h6 class="panel-title">
                                @if(isset($request_firm_phrma))
                                    <i class="icon-pencil5"> </i>  تعديل طلب دواء </h6>
                            @else
                                <i class="icon-truck"> </i> أطلب دواء </h6>
                            @endif
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
                                <form method="post"
                                      @if(isset($request_firm_phrma))
                                      action="{{url('/update-request-pharm-medicine/'.$request_firm_phrma->id)}}"
                                      @else
                                      action="{{url('/store-request-pharm-medicine')}}"
                                        @endif
                                >
                                    {{ csrf_field() }}
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="firm_type">نوع الشركة *</label>
                                            <select name="firm_type" class="form-control" id="firm_type">
                                                @if(isset($request_firm_phrma))
                                                    <option value="0" selected disabled>من فضلك اختر الشركة</option>
                                                    @foreach($f_types as $f_type)
                                                        <option value="{{$f_type->id}}"
                                                                @if($request_firm_phrma->firm_type_id == $f_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="0" selected disabled>من فضلك اختر الشركة</option>
                                                    @foreach($f_types as $f_type)
                                                        <option value="{{$f_type->id}}"
                                                                @if(old('firm_type') == $f_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('firm_type'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('firm_type') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="deal_type">نوع التعامل *</label>
                                            <select name="deal_type" class="form-control">
                                                <option value="0" selected disabled>من فضلك نوع التعامل</option>
                                                @if(isset($request_firm_phrma))
                                                @foreach($deals_types as $deal_type)
                                                    <option value="{{$deal_type->id}}" @if($request_firm_phrma->deal_type_id == $deal_type->id) ?
                                                            {{'selected="selected"' }}: {{  null }} @endif>{{$deal_type->title}}</option>
                                                @endforeach
                                                    @else
                                                    @foreach($deals_types as $deal_type)
                                                        <option value="{{$deal_type->id}}" {{ (old('deal_type') == $deal_type->id) ? 'selected="selected"' : null }} >{{$deal_type->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('deal_type'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('deal_type') }}</small>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="firm">اسم الشركة *</label>
                                            <select name="firm" id="firm" class="form-control">
                                                @if(isset($request_firm_phrma))
                                                    <option value="0" selected disabled> من فضلك اختر الشركة</option>
                                                    @foreach($firms as $firm)
                                                        <option value="{{$firm->id}}" @if($request_firm_phrma->firm_id == $firm->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$firm->f_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="0" selected disabled> من فضلك اختر الشركة</option>
                                                @endif
                                                {{--@foreach($firms as $firm)--}}

                                                {{--@endforeach--}}
                                            </select>
                                            @if($errors->has('firm'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('firm') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="form-group ">
                                            <label for="details">التفاصيل *</label>
                                            <textarea id="details" name="details" value="{{ old('details') }}"
                                                      class="form-control"
                                                      required="">  @if(isset($request_firm_phrma))
                                                    {{$request_firm_phrma->detils}}
                                                @endif </textarea>

                                            @if($errors->has('details'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('details') }}</small>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            @if(isset($request_firm_phrma))
                                            <button type="submit" class="btn btn-info">تعديل</button>
                                                @else
                                                <button type="submit" class="btn btn-info">اطلب</button>
                                            @endif

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
