@extends('back.layout')

@section('script')
{{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
{{Html::script('back/assets/js/plugins/notifications/pnotify.min.js') }}
{{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
{{Html::script('back/assets/js/core/app.js') }}
{{Html::script('back/assets/js/pages/form_multiselect.js') }}
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
                            <h6 class="panel-title">@if(isset($medical_file))<i class="icon-pencil5"> </i> تعديل@else <i
                                        class="icon-cogs"> </i>
                                        تعين ادمن
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                              <form method="post" action="{{url('/admin-store')}}">
                                  {{ csrf_field() }}
                                    <div class=" col-md-6">

                                      <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                          <label for="username"> اسم الادمن *</label>
                                          <input type="text" id="username" name="username"
                                                 value="{{ old('username') }}"
                                                 class="form-control form-app" required="">

                                          @if ($errors->has('username'))
                                              <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label for="email">البريد الالكترونى *</label>
                                          <input type="email" id="email" name="email"
                                                 value="{{ old('email') }}"
                                                 class="form-control form-app" required="">
                                          @if ($errors->has('email'))
                                              <span class="help-block">
                                               <small class="text-danger">{{ $errors->first('email') }}</small>
                                             </span>
                                          @endif
                                      </div>

                                      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                          <label for="phone">رقم التليفون *</label>
                                          <input type="text" id="phone" name="phone"
                                                 value="{{ old('phone') }}"
                                                 class="form-control form-app" required="">
                                          @if ($errors->has('phone'))
                                              <span class="help-block">
                                               <small>{{ $errors->first('phone') }}</small>
                                              </span>
                                          @endif
                                      </div>
                                      <div class="form-group ">
                                          <label for="mobile">االموبايل *</label>
                                          <input type="text" id="mobile" name="mobile"
                                                 value="{{ old('mobile') }}"
                                                 class="form-control form-app" required="">
                                      </div>

                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                          <label for="password">كلمة المرور *</label>
                                          <input type="password" id="password" name="password"
                                                 class="form-control form-app" required="">
                                          @if ($errors->has('password'))
                                              <span class="help-block">
                                                <small>{{ $errors->first('password') }}</small>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                          <label for="password"> تاكيد كلمة المرور *</label>
                                          <input id="password-confirm" type="password"
                                                 class="form-control"
                                                 name="password_confirmation" required="">
                                          @if ($errors->has('password_confirmation'))
                                              <span class="help-block">
                                                <small>{{ $errors->first('password_confirmation') }}</small>
                                              </span>
                                          @endif
                                      </div>
                                    </div>


                                          <div class="form-group{{ $errors->has('admin_type') ? ' has-error' : '' }}">
                                              <label for="admin_type"> أختيار صلاحيات الادمن *</label>
                                              <br>
                                                <input type="checkbox" class="control-primary" name="website_admin" value="6">websites
                                                  <br>
                                                <input type="checkbox" class="control-primary" name="ads_admin" value="2">advertising
                                                  <br>
                                                <input type="checkbox" class="control-primary" name="superadmin"value="1">super admin
                                            </div>
                                              @if ($errors->has('admin_type'))
                                                  <span class="help-block">
                                                     <small>{{ $errors->first('admin_type') }}</small>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                  <div class="form-group text-center">
                                      <button type="submit" class="btn btn-info">تسجيل
                                      </button>
                                  </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
@stop
