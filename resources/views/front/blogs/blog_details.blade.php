@extends('layouts.front')
@section('pageTitle', $blog->title)


@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Blog</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Blog</div>
            </div>
        </div>
    </div>
    <section class="ptb8050">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 offset-lg-1">
                    <div class="shadowblog">
                        <img src="{{$blog->image_url}}" class="img-fluid d-block" alt="blog image" />
                        <div class="details_pad">
                            <div class="welcome">{{$blog->title}}</div>
                            <p class="blog_pera">{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection