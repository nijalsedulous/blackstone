<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Black Stone</title>
    <meta name="keywords" content="Black Stone" />
    <meta name="description" content="Black Stone">
    <meta name="author" content="okler.net">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->


{!! Html::style("/admin/vendor/bootstrap/css/bootstrap.css") !!}
{!! Html::style("/admin/vendor/font-awesome/css/font-awesome.css") !!}
{!! Html::style("/admin/vendor/magnific-popup/magnific-popup.css") !!}

{!! Html::style("/admin/vendor/bootstrap-datepicker/css/datepicker3.css") !!}

 {!! Html::style("/admin/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css") !!}

    {!! Html::style("/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css") !!}


    {!! Html::style("/admin/vendor/summernote/summernote.css") !!}

    {!! Html::style("/admin/vendor/summernote/summernote-bs3.css") !!}


<!-- Theme CSS -->

{!! Html::style("/admin/stylesheets/theme.css") !!}

<!-- Skin CSS -->
{!! Html::style("/admin/stylesheets/skins/default.css") !!}

<!-- Theme Custom CSS -->
{!! Html::style("/admin/stylesheets/theme-custom.css") !!}
    <style>
        button.delete-row {
            background: none;
            border: none;
            float: right;
            color: red;
        }
        .unread{
            font-weight: bold;
            cursor: pointer;
        }
        .capital{
            text-transform: capitalize;
        }
        .phone_typeahead div{
            width: 340px !important;
        }

        .mfp-content {
            width:500px;
            height:300px;
        }
    </style>

@yield('styles')

<!-- Head Libs -->

    {!! Html::script("/admin/vendor/modernizr/modernizr.js") !!}

</head>
<body >
<section class="body">

    <!-- start: header -->
        @include('admin._includes.header')
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
             @include('admin._includes.left_side')
        <!-- end: sidebar -->
        <section role="main" class="content-body" id="app">
            @yield('content')
        </section>
    </div>

    <!-- Vendor -->
{!! Html::script("/admin/vendor/jquery/jquery.js") !!}
{!! Html::script("/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js") !!}
{!! Html::script("/admin/vendor/bootstrap/js/bootstrap.js") !!}
{!! Html::script("/admin/vendor/nanoscroller/nanoscroller.js") !!}
{!! Html::script("/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js") !!}
{!! Html::script("/admin/vendor/magnific-popup/magnific-popup.js") !!}
{!! Html::script("/admin/vendor/jquery-placeholder/jquery.placeholder.js") !!}
{!! Html::script("/admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js") !!}
{!! Html::script("/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js") !!}

    {!! Html::script("/admin/vendor/summernote/summernote.js") !!}



    {{--{!! Html::script("/assets/vendor/select2/select2.js") !!}--}}




    <!-- Specific Page Vendor -->

    <!-- Theme Base, Components and Settings -->
{!! Html::script("/admin/javascripts/theme.js") !!}

<!-- Theme Custom -->

{!! Html::script("/admin/javascripts/theme.custom.js") !!}

<!-- Theme Initialization Files -->

{!! Html::script("/admin/javascripts/theme.init.js") !!}

    {!! Html::script("/admin/javascripts/ui-elements/examples.lightbox.js") !!}


    @yield('scripts')

  </section>
</body>
</html>