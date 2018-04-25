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
  <div class="content-wrapper">
      <div class="content">
            <div class="row">
              <div class="col-md-12">

                        <!-- Blog layout #1 with image -->
                        <div class="panel panel-flat">
                          <div class="panel-heading">
                            <h5 class="panel-title text-semibold"><a href="#">التفاصيل</a></h5>
                          </div>

                          <div class="panel-body">
                            <div class="thumb content-group">

                            </div>

                        <div class="col-md-12">
                          <div class="col-md-6">
                              <h4> <label>اسم :</label> {{$details->username}} </h4>
                              <h4><label> اسم الدكتور :</label> {{$details->name}} </h4>
                              <h4><label>التخصص :</label> {{$details->doc_type}} </h4>
                              <h4> <label>نوع الاستشارة  :</label> {{$details->question}} </h4>
                          </div>
                          <div class="col-md-6">
                               <h4><label>الاعراض :</label>  {{$details->detials}} </h4>

                          </div>
                        </div>

                          </div>
                          @if(isset($comments))
                          @foreach ($comments as $comment)
                          <blockquote class="no-margin panel panel-body border-left-lg border-left-warning">
                                            {{$comment->comment}}
                                            <br>
                                            @if($comment->attach_file != null)
                                              <label>أرفق ملف :</label>    <a href="{{url('images/comments/'.$comment->attach_file)}}">{{$comment->attach_file}}</a>
                                            @endif
                                              <footer>   {{$comment->username}}</footer>

                            </blockquote>
                          @endforeach
                          @else
                          <footer>   لاالا</footer>

                          @endif

                          <div class="panel-footer panel-footer-transparent">
                            <form method="post" action="{{url('/store-comments/'.$details->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <div class="col-md-12">
                                    <label class="control-label col-lg-2" style="font-size:21px;">اضف تعليق</label>
                                    <div class="col-lg-8">
                                      <input type="text"  name="comment" style="background-color:#E5E7E9;border-color: #E5E7E9;"
                                             value="{{old('comment') }}" class="form-control form-app"
                                             required>
                                             <br>
                                     <input type="file" id="img1" accept="image/*" name="attach_file"
                                                    class="form-control form-app"/>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-info">

                                                اضف

                                        </button>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                              </form>

                          </div>
                        </div>
                        <!-- /blog layout #1 with image -->
                      </div>
            </div>
      </div>
  </div>
@stop
