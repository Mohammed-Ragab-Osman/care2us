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
                <th>الحالة </th>
                <th class="text-center">تفاصيل</th>
                <th class="text-center">  حذف </th>
              </tr>
              </thead>
              <tbody>
            @if(isset($homeclinics))
                @foreach($homeclinics as $homeclinic )
                 <tr>
                  <td>{{$homeclinic->username}}</td>
                  <td>{{$homeclinic->status}}</td>
                  <td><a href="{{url('/details-home-clinic/'.$homeclinic->id)}}"><i class="icon-eye"></i> تفاصيل</a></td>
                  @if($homeclinic->status=='pending')
                  <td><a href="{{url('/delete-home-clinic/'.$homeclinic->id)}}" onclick="return confirm('هل تريد حذف هذا العرض ؟');"><i class="icon-trash"></i> حذف </a></td>
                    @else
                    <td> لن يمكنك الحذف الطلب </td>
                  @endif
                 </tr>
                </tr>
               @endforeach
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
