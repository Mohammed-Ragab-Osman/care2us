@extends('back.layout')
@section('script')
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<!-- /theme JS files -->
<script>
    $(document).on('change', '#doc_type', function () {
        var doc_type = $(this).val();
        var div = $(this).parent();
        var op = "";
        console.log(doc_type);
        $.ajax({
            type: 'get',
            url: '{!! \Illuminate\Support\Facades\URL::to('/getdoctors/')!!}',
            data: {'id': doc_type},
            success: function (data) {
                console.log('success');
                console.log(data);
                op += '<option value="0" selected disabled>من فضلك اختر الطبيب</option>';
                for (var i = 0; i < data.length; i++) {
                    op += '<option value="' + data[i].user_id + '">' + data[i].c_fname+ " "+ data[i].c_lname + '</option>';
                }
                $('#doctor').html("");
                $('#doctor').append(op);
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

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <a href="{{url('/ask-file')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>عرض الأسئله</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-cogs"> </i> إسال طبيب</h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" action="{{url('/store-ask-doctor/')}}">
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username">الاسم *</label>
                                            <input type="text" id="username" name="username"
                                                   value="{{ old('username') }}" class="form-control form-app"
                                                   required="">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('username') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">البريد الالكترونى *</label>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                   class="form-control form-app" required="">
                                            @if($errors->has('email'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('email') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('doc_type') ? ' has-error' : '' }}">
                                            <label for="doc_type">إختر التخصص *</label>
                                            <select name="doc_type" class="form-control" id="doc_type">
                                                <option value="{{ old('doc_type') }}">من فضلك اختر التخصص</option>
                                                @foreach($doc_types as $doc_type)
                                                    <option value="{{$doc_type->id}}">{{$doc_type->doc_type}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('doctor'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctor') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('doctor') ? ' has-error' : '' }}">
                                            <label for="Doctor_types">إختر طبيب *</label>
                                            <select name="doctor" class="form-control" id="doctor">
                                                <option value="{{ old('doctor') }}"> من فضلك اختر الطبيب </option>
                                            </select>
                                            @if($errors->has('doctor'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctor') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('sickness') ? ' has-error' : '' }}">
                                            <label for="sickness_Types">نوع الاستشارة *</label>
                                            <select name="sickness" class="form-control">
                                                <option value="{{ old('sickness') }}">من فضلك اختر نوع الاستشارة
                                                </option>

                                                @foreach($sicknessTypes as $sickness)
                                                    <option value="{{$sickness->sickness_title}}">{{$sickness->sickness_title}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('sickness'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('sickness') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
                                            <label for="description">الاعراض *</label>
                                            <textarea id="description" name="details" value="{{ old('details') }}"
                                                      class="form-control" ></textarea>

                                            @if($errors->has('details'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('details') }}</small>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="form-group">

                                            <input id="submit" name="submit" type="submit"
                                                   class="form-control btn btn-primary"/>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
@stop
