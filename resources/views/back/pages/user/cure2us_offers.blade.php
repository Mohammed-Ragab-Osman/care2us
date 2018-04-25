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
                            <h6 class="panel-title"><i class="icon-trophy4"> </i> عروض Cure2Us  </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">

                            <div class="content">

                                <h3>عرض موقع صحتين لهذا الشهر</h3>
                                <p> عند قيامك بعمل خمسة عشرة طلبية من خلال الموقع سيقوم الموقع مجانا بنقل صيدليتك الي الاماكن المتميزة في منطقتك مما يتيح لك الكثير من الامتيازات</p>
                               <p>1-   ظهور صيدليتك اولا عند دخول الزائرين الي منطقتك</p>
                                <p>2-   إضافة صورة للصيدلية في الصفحة المخصصة للصيدلية</p>
                                <p>3-   توفير مساحة للصيدلية لكتابة اية عروض علي كل الإكسسوارات</p>
                                <p>4-   توفير مساحة أخري للصيدلية لكتابة تاريخ و خدمات الصيدلية</p>

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