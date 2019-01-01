<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Black Stone" />
    <meta name="description" content="Black Stone">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">



{!! Html::style("/admin/vendor/bootstrap/css/bootstrap.css") !!}
{!! Html::style("/admin/vendor/font-awesome/css/font-awesome.css") !!}
{!! Html::style("/admin/vendor/magnific-popup/magnific-popup.css") !!}
{!! Html::style("/admin/vendor/bootstrap-datepicker/css/datepicker3.css") !!}


<!-- Theme CSS -->

{!! Html::style("/admin/stylesheets/theme.css") !!}

<!-- Skin CSS -->
{!! Html::style("/admin/stylesheets/skins/default.css") !!}

<!-- Theme Custom CSS -->
{!! Html::style("/admin/stylesheets/theme-custom.css") !!}

@yield('styles')


<!-- Head Libs -->
    {!! Html::script("/admin/vendor/modernizr/modernizr.js") !!}

</head>
<body>
<!-- start: page -->
@yield('content')
<!-- end: page -->

<!-- Vendor -->

{!! Html::script("/admin/vendor/jquery/jquery.js") !!}
{!! Html::script("/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js") !!}
{!! Html::script("/admin/vendor/bootstrap/js/bootstrap.js") !!}
{!! Html::script("/admin/vendor/nanoscroller/nanoscroller.js") !!}
{!! Html::script("/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js") !!}
{!! Html::script("/admin/vendor/magnific-popup/magnific-popup.js") !!}
{!! Html::script("/admin/vendor/jquery-placeholder/jquery.placeholder.js") !!}


<!-- Specific Page Vendor -->

<!-- Theme Base, Components and Settings -->
{!! Html::script("/admin/javascripts/theme.js") !!}

<!-- Theme Custom -->

{!! Html::script("/admin/javascripts/theme.custom.js") !!}

<!-- Theme Initialization Files -->

{!! Html::script("/admin/javascripts/theme.init.js") !!}
@yield('scripts')

</body>
</html>