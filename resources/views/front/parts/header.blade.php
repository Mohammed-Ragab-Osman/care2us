<!-- Site Header Wrap -->
<div id="site-header-wrap">
    <!-- Top Bar -->
    <div id="top-bar" class="style-1">
        <div id="top-bar-inner" class="wprt-container">
            <div class="top-bar-inner-wrap">
                <div class="top-bar-menu">
                    <ul class="top-bar-nav">
                       <li class="phone">
                            <i class="fa fa-phone"></i>
                            <b><span> اتصل بنا : 0123456789+</span></b>
                        </li>
                    </ul>
                </div><!-- /.top-bar-content -->

                <div class="top-bar-socials">
                    <div class="icons">
                        <a href="#" title="fa fa-twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                        <a href="#" title="Facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                        <a href="#" title="Linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                        <a href="#" title="Google+"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                    </div>
                </div><!-- /.top-bar-socials -->
            </div>
        </div>
    </div>
    <!-- #top-bar -->
    <!-- Header -->
    <header id="site-header">
        <div id="site-header-inner" class="wprt-container">
            <div class="wrap-inner">
                <div id="site-logo" class="clearfix">
                    <div id="site-logo-inner">
                        <a href="{{url('/')}}" title="Pharmacy" rel="home" class="main-logo">
                            <img src="{{url('front/assets/img/logo-dark.png')}}" alt="Pharmacy" data-retina="{{url('front/assets/img/logo-dark@2x.png')}}" width="167" height="44" data-width="167" data-height="44">
                        </a>
                    </div>
                </div><!-- /#site-logo -->

                <div class="mobile-button"><span></span></div><!-- //mobile menu button -->

                <nav id="main-nav" class="main-nav">
                    <ul class="menu">
                        <li><a href="{{url('/')}}">الرئيسية</a></li>

                        <li class="menu-item-has-children"><a href="#">الادوية</a>
                            <ul class="sub-menu">
                                <li><a href="#"><b>خطوات العلاج</b></a></li>
                                <li><a href="#"><b>تفاعلات الادوية</b></a></li>
                                <li><a href="#"><b>اطلب دواء</b></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">خدمات</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/places')}}"><b>منشأت طبية</b></a></li>
                                <li><a href="{{url('/all-jobs')}}"><b>وظائف خالية</b></a></li>
                            </ul>
                        </li>

                        <li><a href="#">مكتبة الفيديو</a></li>


                        <li><a href="{{url('/about-us')}}">من نحن</a></li>
                        @if(Auth::guard('admin')->user())
                          <li  class="menu-item-has-children"><a href="#">{{Auth::guard('admin')->user()->username }} </a>
                            <ul class="sub-menu">
                                <li><a href="#"><b>الصفحة الشخصية</b></a></li>

                                  <li><a href="{{url('/admin-account')}}"><b>حسابى</b></a></li>
                                  <li>
                                      <a href="{{ url('/logout-admin') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form2').submit();">
                                                   <b>تسجيل الخروج</b>
                                      </a>
                                      <form id="logout-form2" action="{{ url('/logout-admin') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>

                        @elseif(Auth::guest() || Auth::user()->u_type == 1 || Auth::user()->u_type == 2)
                        <li  class="menu-item-has-children"><a href="#">التسجيل</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/client-register')}}"><b>تسجيل مستخدم</b></a></li>
                                <li><a href="{{url('/pharmacy-register')}}"><b>تسجيل صيدلية</b></a></li>
                                <li><a href="{{url('/firm-register')}}"><b>تسجيل شركة ادوية</b></a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                        @else
                        <li  class="menu-item-has-children"><a href="#">{{ Auth::user()->username }} </a>
                            <ul class="sub-menu">
                                <li><a href="#"><b>الصفحة الشخصية</b></a></li>
                                @if(Auth::user()->u_type ==  3)
                                <li><a href="{{url('/client-account')}}"><b>حسابى</b></a></li>
                                @elseif(Auth::user()->u_type ==  4)
                                    <li><a href="{{url('/pharmacy-account')}}"><b>حسابى</b></a></li>
                                @elseif(Auth::user()->u_type ==  5)
                                    <li><a href="{{url('/firm-account')}}"><b>حسابى</b></a></li>
                                @endif
                                <li>
                                    <a href="{{ url('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <b>تسجيل الخروج</b>
                                    </a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li
                        @endif
                    </ul>
                </nav>
                <!-- /#main-nav -->

                <!-- <div id="header-search">
                    <a class="header-search-icon" href="#"><span class="fa fa-search"></span></a>
                    <form role="search" method="get" class="header-search-form" action="#">
                        <label class="screen-reader-text">Search for:</label>
                        <input type="text" value="" name="s" class="header-search-field" placeholder="Type and hit enter...">
                        <button type="submit" class="header-search-submit" title="Search">Search</button>
                    </form>
                </div> -->
                <!-- /#header-search -->

            </div>
        </div><!-- /#site-header-inner -->
    </header><!-- /#site-header -->
</div><!-- /#site-header-wrap -->
