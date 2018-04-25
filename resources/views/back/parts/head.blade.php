<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy Admin</title>

    <link rel="shortcut icon" href="{{url('front/assets/icon/favicon.png')}}">
    <!-- Global stylesheets -->
    {{Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') }}
    {{Html::style('back/assets/css/icons/icomoon/styles.css') }}
    {{Html::style('back/assets/css/bootstrap.css') }}
    {{Html::style('back/assets/css/core.css') }}
    {{Html::style('back/assets/css/components.css') }}
    {{Html::style('back/assets/css/colors.css') }}
    <!-- /global stylesheets -->
    @yield('style')
    <!-- Core JS files -->
    {{Html::script('back/assets/js/plugins/loaders/pace.min.js') }}
    {{Html::script('back/assets/js/core/libraries/jquery.min.js') }}
    {{Html::script('back/assets/js/core/libraries/bootstrap.min.js') }}
    {{Html::script('back/assets/js/plugins/loaders/blockui.min.js') }}
    <!-- /core JS files -->
    @yield('script')


</head>
