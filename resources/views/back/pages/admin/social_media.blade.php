@extends('back.layout')
@section('script')
    <!-- Theme JS files -->
    {{Html::script('back/assets/js/plugins/visualization/d3/d3.min.js') }}
    {{Html::script('back/assets/js/plugins/visualization/d3/d3_tooltip.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/switchery.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
    {{Html::script('back/assets/js/plugins/ui/moment/moment.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/daterangepicker.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/datatables.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/select2.min.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/datatables_basic.js') }}
    {{Html::script('back/assets/js/plugins/ui/ripple.min.js') }}
    {{Html::script('back/assets/js/pages/dashboard.js') }}
    <!-- /theme JS files -->
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
                            <h6 class="panel-title"><i class="icon-facebook2"> </i> Social Links Edit</h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="{{ url('/social-links-edit') }}" method="post" enctype="multipart/form-data" rol="form">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Facebook Link</span>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="text" name="facebook" @if(isset($facebook)) value="{{$facebook->link}}" @else value="{{old('facebook')}}" @endif class="form-control input-sm">
                                                <div class="form-control-feedback">
                                                    <i class="icon-facebook2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Twitter Link</span>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="text" name="twitter" @if(isset($twitter)) value="{{$twitter->link}}" @else value="{{old('twitter')}}" @endif class="form-control input-sm">
                                                <div class="form-control-feedback">
                                                    <i class="icon-twitter"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Linkedin Link</span>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="text" name="linkedin" @if(isset($linkedin)) value="{{$linkedin->link}}" @else value="{{old('linkedin')}}" @endif class="form-control input-sm">
                                                <div class="form-control-feedback">
                                                    <i class="icon-linkedin"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Google Plus Link</span>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="text" name="google_plus" @if(isset($google_plus)) value="{{$google_plus->link}}" @else value="{{old('google_plus')}}" @endif class="form-control input-sm">
                                                <div class="form-control-feedback">
                                                    <i class=" icon-google-plus2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button  type="submit" name="submit"  class="btn  btn-info"> Update </button>
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