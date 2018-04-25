@include('front.parts.head')
<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">

        @include('front.parts.header')


            @yield('content')

        @include('front.parts.footer')

    </div>
</div>

@include('front.parts.foot')