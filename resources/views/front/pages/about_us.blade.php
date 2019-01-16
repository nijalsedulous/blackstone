@extends('layouts.front')
@section('pageTitle', 'About Us')

@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>ABOUT US</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>About Us</div>
            </div>
        </div>
    </div>
    <section class="ptb80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <img class="d-block w-100" src="{!! $page_content->image_url !!}" alt="First slide">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-text">
                        <h2 class="title text-left">Welcome to Blackstone</h2>
                        <p class="about_pera mrg_t_20">
                            {!! $page_content->content !!}
                        </p>
                        <p class="btn_mt"><a href="#" class="btn_black">Read More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ptb80 gray_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-text">
                        <h2 class="title">Our Team</h2>
                        <p class="about_pera mrg_t_20 text-center">We Have Professional Teams</p>
                    </div>
                </div>
            </div>
            <div class="row team-all">
                @foreach($teams as $team)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{$team->image_url}}" alt="team member">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>{{$team->name}}</h3>
                                <p>{{$team->position}}</p>
                                {{--<span><a href="#">View Profile</a></span>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="ptb8050">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <h2 class="title">Search Property By Country</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($properties as $property)
                    <?php $property_image =$property->property_images->first();

                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="property-box"> <a href="/property/{{$property->slug_name}}" class="property-img" >
                                <div class="property-thumbnail"> <img class="d-block w-100" style="height:215px;" src="{{$property_image->image_path}}" alt="properties"> </div>
                                <div class="property_detail">
                                    <h3 class="pro_name">{{$property->name}}</h3>
                                    <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$property->address}}</div>
                                    <p>{{$property->country->name}}</p>
                                </div>
                            </a> </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>

@endsection