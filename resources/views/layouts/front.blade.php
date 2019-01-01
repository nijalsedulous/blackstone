<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>
    <meta name="title" content="@yield('metaTitle')">
    <meta name="description" content="@yield('metaDescription')">
    <link href="/images/favicon.png" rel="shortcut icon"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {!! Html::style("/css/bootstrap.min.css") !!}
    {!! Html::style("/css/style.css") !!}
    {!! Html::style("/css/responsive.css") !!}
    @yield('styles')

</head>

<body>
<div class="banner_bg">
    @include('front._includes.header')
</div>

@yield('content')

@include('front._includes.footer')

<script src="https://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
{!! Html::script("/js/bootstrap.min.js") !!}
{!! Html::script("/js/custom.js") !!}
@yield('scripts')

</body>
</html>