@include('back.parts.head')
    <body>
    @include('back.parts.header')
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            @include('back.parts.sidebar')

            @yield('content')

            @include('back.parts.footer')

        </div>
        <!-- /page content -->

    </div>
<!-- /page container -->


@include('back.parts.foot')