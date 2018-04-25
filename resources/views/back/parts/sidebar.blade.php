<!-- <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script>
$(document).ready(function(){
  alert("Hello! I am an alert box!!");
});
</script> -->
<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{url('back/assets/images/placeholder.jpg')}}"
                                                        class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->username }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    @if(Auth::guard('admin')->user()->super_admin==1)
                    <li {{{ (Request::is('admin') ? ' class=active' : '') }}}><a href="{{url('/admin')}}"><i
                                    class="icon-home4"></i> <span><b>لوحة التحكم</b></span></a></li>
                    <li {{{ (Request::is('about-us-setting') ? ' class=active' : '') }}}><a
                                href="{{url('/about-us-setting')}}"><i class=" icon-list3"></i> <span><b>من نحن</b></span></a>
                    </li>
                    <li {{{ (Request::is('contact-us-setting') ? ' class=active' : '') }}}><a
                                href="{{url('/contact-us-setting')}}"><i class=" icon-phone-outgoing"></i> <span><b>اتصل بنا</b></span></a>
                    </li>
                    <li {{{ (Request::is('messages') ? ' class=active' : '') }}}><a href="{{url('/messages')}}"><i
                                    class=" icon-comment"></i> <span><b>الرسائل</b></span></a></li>
                    <li {{{ (Request::is('social-links-setting') ? ' class=active' : '') }}}><a
                                href="{{url('/social-links-setting')}}"><i class="icon-facebook2"></i> <span>Social Links</span></a>
                    </li>
                    <li {{{ (Request::is('/add-admin') ? ' class=active' : '') }}}><a
                                href="{{url('/add-admin')}}"><i class="icon-home4"></i> <span><b> أدمن </b></span></a>
                    </li>
                    @elseif(Auth::user()->admin == 1 && (Auth::user()->u_type == 1 || Auth::user()->u_type == 2 ))
                        <li {{{ (Request::is('admin') ? ' class=active' : '') }}}><a href="{{url('/admin')}}"><i
                                        class="icon-home4"></i> <span><b>لوحة التحكم</b></span></a></li>
                        <li {{{ (Request::is('about-us-setting') ? ' class=active' : '') }}}><a
                                    href="{{url('/about-us-setting')}}"><i class=" icon-list3"></i> <span><b>من نحن</b></span></a>
                        </li>
                        <li {{{ (Request::is('contact-us-setting') ? ' class=active' : '') }}}><a
                                    href="{{url('/contact-us-setting')}}"><i class=" icon-phone-outgoing"></i> <span><b>اتصل بنا</b></span></a>
                        </li>
                        <li {{{ (Request::is('messages') ? ' class=active' : '') }}}><a href="{{url('/messages')}}"><i
                                        class=" icon-comment"></i> <span><b>الرسائل</b></span></a></li>
                        <li {{{ (Request::is('social-links-setting') ? ' class=active' : '') }}}><a
                                    href="{{url('/social-links-setting')}}"><i class="icon-facebook2"></i> <span>Social Links</span></a>
                        </li>
                        <li {{{ (Request::is('/add-admin') ? ' class=active' : '') }}}><a
                                    href="{{url('/add-admin')}}"><i class="icon-home4"></i> <span><b> أدمن </b></span></a>
                        </li>

                      @elseif(Auth::user()->admin == 0)
                        @if(Auth::user()->u_type == 3)
                            <li {{{ (Request::is('client-account') ? ' class=active' : '') }}}><a
                                        href="{{url('/client-account')}}"><i class="icon-home4"></i> <span><b>حسابى </b></span></a>
                            </li>
                            <li {{{ (Request::is('client-account-setting/') ? ' class=active' : '') }}}><a
                                        href="{{url('/client-account-setting/')}}"><i class="icon-cogs"></i> <span><b>اعدادات الحساب </b></span></a>
                            </li>

                            @if(Auth::user()->client_type==1)
                          <li {{{ (Request::is('ask-doctor') ? ' class=active' : '') }}}>
                           <a href="{{url('/ask-doctor' )}}">
                             <i class="icon-question4"></i>
                            <span><b>اسال طبيب </b></span>
                           </a>
                          </li>
                          <li {{{ (Request::is('medical-file') ? ' class=active' : '') }}}>
                              <a href="{{url('/medical-file' )}}">
                                  <i class="icon-clipboard6"></i>
                                  <span><b>الملف الطبى </b></span>
                              </a>
                          </li>
                            <li {{{ (Request::is('ask-home-clinic') ? ' class=active' : '') }}}>
                                <a href="{{url('/ask-home-clinic' )}}">
                                    <i class="icon-clipboard6"></i>
                                    <span><b>Home Clinic </b></span>
                                </a>
                            </li>

                            @elseif(Auth::user()->client_type==3)
                            <li {{{ (Request::is('medical-consulation') ? ' class=active' : '') }}}><a
                                        href="{{url('/medical-consulation' )}}"><i class="icon-question4"></i>
                                    <span><b>استشارة الطبيية </b></span></a></li>
                            <li {{{ (Request::is('home-clinic') ? ' class=active' : '') }}}><a
                                                href="{{url('/home-clinic' )}}"><i class="icon-question4"></i>
                                            <span><b> home clinic </b></span></a></li>
                              @else
                              <li {{{ (Request::is('home-clinic') ? ' class=active' : '') }}}><a
                                    href="{{url('/home-clinic')}}"><i class="icon-question4"></i>
                                              <span><b> home clinic </b></span></a></li>
                          @endif
                            <li {{{ (Request::is('client-request-medicine') ? ' class=active' : '') }}}><a
                                        href="{{url('/client-request-medicine')}}"><i class="icon-cart-add"></i>
                                    <span><b>اطلب دواء </b></span></a></li>
                        @endif

                        @if(Auth::user()->u_type == 4)
                            <li {{{ (Request::is('pharmacy-account') ? ' class=active' : '') }}}><a
                                        href="{{url('/pharmacy-account')}}"><i
                                            class="icon-home4"></i><span><b>حسابى </b></span></a></li>
                            <li {{{ (Request::is('pharmacy-account-setting/') ? ' class=active' : '') }}}><a
                                        href="{{url('/pharmacy-account-setting/')}}"><i class="icon-cogs"></i> <span><b>اعدادات الحساب </b></span></a>
                            </li>
                            <li {{{ (Request::is('firms-offers') ? ' class=active' : '') }}}><a
                                        href="{{url('/firms-offers')}}"><i class="icon-gift"></i>
                                    <span><b>عروض الشركات </b></span></a></li>
                            <li {{{ (Request::is('pharmacy-request-medicine') ? ' class=active' : '') }}}><a
                                        href="{{url('/pharmacy-request-medicine')}}"><i class="icon-truck"></i><span><b>طلب دواء </b></span></a>
                            </li>
                            <li {{{ (Request::is('jobs') ? ' class=active' : '') }}}><a href="{{url('/jobs')}}"><i
                                            class="icon-user-tie"></i> <span><b>وظائف خالية </b></span></a></li>
                            <li {{{ (Request::is('sell-buy-places') ? ' class=active' : '') }}}><a
                                        href="{{url('/sell-buy-places')}}"><i
                                            class="icon-cash2"></i><span><b>بيع وشراء</b></span></a></li>
                            <li {{{ (Request::is('cure2us-offers') ? ' class=active' : '') }}}><a
                                        href="{{url('/cure2us-offers')}}"><i class="icon-trophy4"></i> <span><b>عروض Cure2Us</b></span></a>
                            </li>
                            @if(Auth::user()->paid == 1)
                                <li {{{ (Request::is('excess-medicines') ? ' class=active' : '') }}}><a
                                            href="{{url('/excess-medicines')}}"><i class="icon-lab"></i> <span><b>الادوية الفائضة</b></span></a>
                                </li>
                                <li {{{ (Request::is('surplus-medicines') ? ' class=active' : '') }}}><a
                                            href="{{url('/surplus-medicines')}}"><i class="icon-lab"></i> <span><b>ادويتك الفائضة</b></span></a>
                                </li>
                            @endif
                        @endif

                        @if(Auth::user()->u_type == 5)
                            <li {{{ (Request::is('firm-account') ? ' class=active' : '') }}}><a
                                        href="{{url('/firm-account')}}"><i class="icon-home4"></i>
                                    <span><b>حسابى </b></span></a></li>
                            <li {{{ (Request::is('firm-account-setting/') ? ' class=active' : '') }}}><a
                                        href="{{url('/firm-account-setting/')}}"><i class="icon-cogs"></i> <span><b>اعدادات الحساب </b></span></a>
                            </li>
                            <li {{{ (Request::is('firm-offers') ? ' class=active' : '') }}}><a
                                        href="{{url('/firm-offers')}}"><i class="icon-gift"></i>
                                    <span><b>العروض </b></span></a></li>
                            <li {{{ (Request::is('[firm-medicines') ? ' class=active' : '') }}}><a
                                        href="{{url('/firm-medicines')}}"><i class="icon-lab"></i> <span><b>الادوية </b></span></a>
                            </li>
                            <li {{{ (Request::is('jobs') ? ' class=active' : '') }}}><a href="{{url('/jobs')}}"><i
                                            class="icon-user-tie"></i> <span><b>وظائف خالية </b></span></a></li>
                            <li {{{ (Request::is('sell-buy-places') ? ' class=active' : '') }}}><a
                                        href="{{url('/sell-buy-places')}}"><i class="icon-cash2"></i>
                                    <span><b>بيع وشراء</b></span></a></li>
                            <li {{{ (Request::is('cure2us-offers') ? ' class=active' : '') }}}><a
                                        href="{{url('/cure2us-offers')}}"><i class="icon-trophy4"></i> <span><b>عروض Cure2Us</b></span></a>
                            </li>
                            <!-- //****17-4 HW ****///// -->
                            <li {{{ (Request::is('request-medicine-pharm') ? ' class=active' : '') }}}><a
                                        href="{{url('/request-medicine-pharm')}}"><i class="icon-lab"></i> <span><b> طلبات الصيدليات</b></span></a>
                            </li>
		                      <!-- //**************/////// -->
                            <li {{{ (Request::is('preview-statistics') ? ' class=active' : '') }}}><a
                                        href="{{url('/preview-statistics')}}"><i class="icon-stats-growth"></i>
                                    <span><b>معاينة الاحصائيات</b></span></a></li>
                    @endif
                @endif
                <!-- /main -->
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->
