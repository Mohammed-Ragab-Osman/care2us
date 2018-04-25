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
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Traffic sources</h6>
                            @if(session()->has('success'))
                                <div class="alert alert-success text-center">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                        </li>
                                        <li class="text-left">
                                            <div class="text-semibold">New visitors</div>
                                            <div class="text-muted">2,349 avg</div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="new-visitors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                        </li>
                                        <li class="text-left">
                                            <div class="text-semibold">New sessions</div>
                                            <div class="text-muted">08:20 avg</div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="new-sessions"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                        </li>
                                        <li class="text-left">
                                            <div class="text-semibold">Total online</div>
                                            <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="total-online"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="position-relative" id="traffic-sources"></div>
                    </div>
                    <!-- /traffic sources -->

                </div>

                
            </div>
            <!-- /main charts -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

@stop