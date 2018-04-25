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

        <!-- Main content -->
        <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
        <!-- Main charts -->
        <div class="row">
        <div class="col-md-12">
        <div class="panel panel-flat">
        <div class="panel-heading">
          <a href="{{url('/ask-doctor')}}">
              <span class="pull-right">
                  <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>  اسال طبيب </p>
              </span>
          </a>
          <h6 class="panel-title"><i class="icon-gift"> </i> العروض </h6>
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
              <div class="panel panel-flat">
                  <table class="table datatable-basic">
                      <thead>
                      <tr>
                          <th> الاسم</th>
                          <th>البريد الالكترونى</th>
                          <th>السؤال</th>
                          <th>التفاصيل</th>
                          <th>الطبيب</th>
                          <th class="text-center">تفاصيل</th>

                          <th class="text-center"> حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(isset($myask))

                          @foreach($myask as $ask )
                              <tr>
                                  <td>{{$ask->username}}</td>
                                  <td>{{$ask->email}}</td>
                                  <td>{{$ask->question}}</td>
                                  <td>{{$ask->doctor_id}}</td>
                                  <td>{{$ask->detials}}</td>
                                  <td><a href="{{url('/askDoctors-details/'.$ask->id)}}"><i class="icon-eye"></i> تفاصيل</a></td>
                                  <td><a href="{{url('/delete-ask-doctor/'.$ask->id)}}" onclick="return confirm('هل تريد حذف هذا العرض ؟');"><i class="icon-trash"></i> حذف </a></td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                              <p>no data</p>
                          </tr>

                          @endif

                      </tbody>
                  </table>
              </div>

            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
</div>
        <!-- /main content -->
        @stop
