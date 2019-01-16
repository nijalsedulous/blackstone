@extends('layouts.front')
@section('pageTitle', 'Thank You')

@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Thank You</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Thank You</div>
            </div>
        </div>
    </div>
    <section class="notfound ptb80">
        <div class="container">
            <div class="top-headings">
                <h3 class="text-center">Thank You</h3>
                <p class="text-center">{!! $page_content->content !!}</p>
            </div>
            <div class="text-center">
                <a href="/" class="btn_black">Bck To Home</a>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>

@endsection