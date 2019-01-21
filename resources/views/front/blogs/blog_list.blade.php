@extends('layouts.front')
@section('pageTitle', 'Blog')


@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Blog</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Blog</div>
            </div>
        </div>
    </div>
    <section class="ptb80">
        <div class="container">
            @foreach($blogs as $blog)
            <div class="shadowblog">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <img src="{{$blog->image_url}}" class="img-fluid d-block" alt="blog image" /> </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog_text">
                            <div class="welcome"><a href="/blog/{{$blog->slug_name}}" style="color:#383838;">{{$blog->title}}</a></div>
                            <div class="post_meta">
                                <span><a href="#"><i class="fa fa-calendar"></i> {{date('d-M-Y',strtotime($blog->created_at))}} </a></span>
                                <span><i class="fa fa-archive"></i> {{$blog->category->name}}</span></div>
                            <p class="blog_pera">{!! str_limit($blog->description,350,'...')  !!}</p>
                            <p><a href="/blog/{{$blog->slug_name}}" class="btn_black">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <div style="text-align: center">{{ $blogs->links() }}</div>
    </section>

@endsection