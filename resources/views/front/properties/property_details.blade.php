@extends('layouts.front')
@section('pageTitle', $property->name)
@section('metaTitle', $property->meta_title)
@section('metaDescription', $property->meta_description)

@section('content')

    <div class="property_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>PROPERTIES DETAIL</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Properties Details</div>
            </div>
            <div class="peoperty_name">{!! $property->name !!}
                <p class="pro_loctation"><i class="fa fa-map-marker" aria-hidden="true"></i>{!! $property->address !!}</p>
            </div>
        </div>
    </div>

    <section class="ptb80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" id="carousel-bounding-box">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide">
                        <div class="carousel-inner">
                            @foreach($property->property_images  as $key=> $pi)
                            <div class="item carousel-item @if($key == 0) active @endif" data-slide-number="{{$key}}">
                                <img src="{{$pi->image_path}}" class="img-fluid"  alt="slider-properties">
                            </div>
                            @endforeach

                            <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                            @foreach($property->property_images  as $key1=> $pi2)
                            <li class="list-inline-item @if($key == 1) active @endif">
                                <a id="carousel-selector-{{$key1}}" class="selected" data-slide-to="{{$key1}}" data-target="#propertiesDetailsSlider">
                                    <img src="{{$pi2->image_path}}" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            @endforeach

                        </ul>
                        <!-- main slider carousel items -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg res_des">
                        <h2 class="title text-left">Description</h2>
                    </div>
                    {!! $property->description !!}
                </div>
            </div>
        </div>
    </section>
    @if(!empty($property->pdf_url))
    <section class="dwnlod">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <img src="/images/PDF-ICON.png" class="img-fluid d-block pdficon" alt="pdf icon" />
                        <h2 class="title">You Can Download The Plan Of PDF</h2>
                    </div>
                    <p class="btn_mt text-center"><a class="btn_black" href="/property/download_pdf/{{$property->id}}">Download</a></p>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(!empty($property->video_url))
    <section class="why_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <h2 class="title">Property View</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pro_vedio">
                    <iframe src="{{$property->video_url}}" allowfullscreen=""></iframe>
                    <!--<video autoplay controls controlslist="nodownload" height="auto" poster="image/video-poster.jpg" loop muted="" playsinline="" width="100%">
                      <source src="https://www.youtube.com/embed/5e0LxrLSzok" type="video/mp4" />
                    </video>-->
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($similar_properties->count() >0)
    <section class="ptb8050">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <h2 class="title">Similar Properties</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($similar_properties as $sp)
                    <?php $property_image =$sp->property_images->first();

                    ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="property-box"> <a href="/property/{{$sp->id}}" class="property-img" >
                            <div class="property-thumbnail"> <img class="d-block w-100" style="height:215px;" src="{{$property_image->image_path}}" alt="properties"> </div>
                            <div class="property_detail">
                                <h3 class="pro_name">{{$sp->name}}</h3>
                                <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$sp->address}}</div>
                                <p>{{$sp->country->name}}</p>
                            </div>
                        </a> </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif
    <section class="ptb080">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <h2 class="title">Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 offset-lg-2 col-sm-12 col-xs-12">
                    <div class="row contact-2">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn_black">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection