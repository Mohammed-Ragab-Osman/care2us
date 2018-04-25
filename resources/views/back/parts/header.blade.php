<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/admin')}}"><img src="{{url('back/assets/images/logo_light.png')}}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        @if(Auth::guard('admin')->user())
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('back/assets/images/placeholder.jpg')}}" alt="">
                    <span>{{ Auth::guard('admin')->user()->username }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ url('/logout-admin') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form2').submit();">
                                     <i class="icon-switch2"></i> Logout
                        </a>
                        <form id="logout-form2" action="{{ url('/logout-admin') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @else
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('back/assets/images/placeholder.jpg')}}" alt="">
                    <span>{{ Auth::user()->username }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ url('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                     <i class="icon-switch2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endif


    </div>
</div>
<!-- /main navbar -->
