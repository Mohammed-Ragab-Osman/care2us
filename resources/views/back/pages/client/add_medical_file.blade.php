@extends('back.layout')
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
                            <h6 class="panel-title">@if(isset($medical_file))<i class="icon-pencil5"> </i> تعديل@else <i
                                        class="icon-cogs"> </i>
                                الملف الطبى
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" @if(isset($medical_file))action="{{url('/edit-medical-file/'.$medical_file->id)}}"
                                      @else action="{{url('/store-medical/')}}" @endif>
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="name"> اسم المريض *</label>
                                            <input type="text" id="username" name="name"
                                                   @if(isset($medical_file)) value="{{$medical_file->patient_name}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('name'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> العلاقة *</label>
                                            <input type="text" id="username" name="relation"
                                                   @if(isset($medical_file)) value="{{$medical_file->relationship}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('relation'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('relation') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> الجنس *</label>
                                            <select name="gender" class="form-control form-app">

                                                @if(isset($medical_file))
                                                    @if($medical_file->patient_gendar=="ذكر")
                                                        <option selected="selected" value="ذكر">ذكر
                                                        </option>
                                                        <option value="انثى">انثى</option>
                                                    @else
                                                        <option value="ذكر">ذكر</option>
                                                        <option selected="selected" value="انثى">انثى</option>
                                                    @endif
                                                @else

                                                    <option value="ذكر">ذكر</option>
                                                    <option value="انثى">انثى</option>
                                                @endif
                                            </select>
                                            @if($errors->has('gender'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('gender') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> التاريخ *</label>
                                            <input type="date" id="username" name="date"
                                                   @if(isset($medical_file)) value="{{$medical_file->date}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('date'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('date') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> اسم الطبيب المعالج *</label>
                                            <input type="text" id="username" name="doctorName"
                                                   @if(isset($medical_file)) value="{{$medical_file->doctor_name}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('doctorName'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctorName') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> عنوان الطبيب *</label>
                                            <input type="text" id="username" name="address"
                                                   @if(isset($medical_file)) value="{{$medical_file->doctor_address}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('address'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('address') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> تلفون الطبيب *</label>
                                            <input type="text" id="username" name="doctorPhone"
                                                   @if(isset($medical_file)) value="{{$medical_file->doctor_phone}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('doctorPhone'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctorPhone') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> الادويه الموصوفه *</label>
                                            <input type="text" id="username" name="medical"
                                                   @if(isset($medical_file)) value="{{$medical_file->medical_list}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('medical'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('medical') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> مده العلاج *</label>
                                            <input type="text" id="username" name="during"
                                                   @if(isset($medical_file)) value="{{$medical_file->duration_treatment}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('during'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('during') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> التحاليل المطلوبه *</label>
                                            <input type="text" id="username" name="analyz"
                                                   @if(isset($medical_file)) value="{{$medical_file->analyzes_required}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('analyz'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('analyz') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> نتيجه التحاليل *</label>
                                            <input type="text" id="username" name="anlayzreslut"
                                                   @if(isset($medical_file)) value="{{$medical_file->analyzes_result}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('anlayzreslut'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('anlayzreslut') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> الإشعات المطلوبه *</label>
                                            <input type="text" id="username" name="ray"
                                                   @if(isset($medical_file)) value="{{$medical_file->required_radiations}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('ray'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('ray') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> نتيجه الاشعه *</label>
                                            <input type="text" id="username" name="rayresult"
                                                   @if(isset($medical_file)) value="{{$medical_file->radiations_result}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('rayresult'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('rayresult') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> المريض يعاني من حساسية من أدوية *</label>
                                            <input type="text" id="username" name="hasasya"
                                                   @if(isset($medical_file)) value="{{$medical_file->sensitivity_medical}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('hasasya'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('hasasya') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> المريض يعاني من حساسية من أكلات *</label>
                                            <input type="text" id="username" name="hasasyaeat"
                                                   @if(isset($medical_file)) value="{{$medical_file->sensitivity_eats}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('hasasyaeat'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('hasasyaeat') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> فصيلة الدم *</label>
                                            <input type="text" id="username" name="blood"
                                                   @if(isset($medical_file)) value="{{$medical_file->blood_type}}"
                                                   @else value="" @endif
                                                   class="form-control form-app" required="">
                                            @if($errors->has('blood'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('blood') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="Relation"> هل انت مدخن *</label>
                                            <select name="smoke" class="form-control form-app">
                                                @if(isset($medical_file))
                                                    @if($medical_file->smoke=="نعم")
                                                        <option selected="selected" value="نعم">نعم
                                                        </option>
                                                        <option value="لا">لا</option>
                                                    @else
                                                        <option value="نعم">نعم</option>
                                                        <option selected="selected" value="لا">لا</option>
                                                    @endif
                                                @else
                                                    <option value="نعم">نعم</option>
                                                    <option value="لا">لا</option>
                                                @endif
                                            </select>
                                            @if($errors->has('smoke'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('smoke') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($medical_file))
                                                    نعديل
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
        </div>
    </div>
    <!-- /main content -->
@stop