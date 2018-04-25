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
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                                <i class="icon-plus-circle2"> </i>
                        </h6>
                        <hr>
                    </div>
                    <div class="container-fluid">
                        <div class="content">
<!-- your code here -->


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
