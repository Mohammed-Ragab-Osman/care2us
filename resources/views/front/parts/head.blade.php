<!DOCTYPE html>
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Cure2Us @yield('title')</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {{Html::style('https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i')}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.min.css">
    {{Html::style('front/assets/css/bootstrap.css')}}
    {{Html::style('front/assets/css/animate.css')}}
    {{Html::style('front/assets/css/animsition.css')}}
    {{Html::style('front/assets/css/magnific-popup.css')}}
    {{Html::style('front/assets/css/font-awesome.css')}}
    {{Html::style('front/assets/css/flexslider.css')}}
    {{Html::style('front/assets/css/owl.carousel.min.css')}}
    {{Html::style('front/includes/rev-slider/css/settings.css')}}
    {{Html::style('front/includes/rev-slider/css/layers.css')}}
    {{Html::style('front/includes/rev-slider/css/navigation.css')}}
    {{Html::style('front/assets/css/shortcodes.css')}}

    <!-- Theme Style -->
    {{Html::style('front/css/style.css')}}
    {{Html::style('front/css/custom_style.css')}}

    <!-- Favicon and touch icons  -->
    <link rel="shortcut icon" href="{{url('front/assets/icon/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url('front/assets/icon/apple-touch-icon-158-precomposed.png')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="header-style-1 menu-has-search no-sidebar no-padding-content header-fixed">