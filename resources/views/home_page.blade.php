@extends('layouts.front')
@section('pageTitle', $setting->site_name)
@section('metaTitle', $setting->meta_title)
@section('metaDescription', $setting->meta_description)

@section('content')

<div class="bnr_slider">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            @foreach($banners as $bk1 => $banner)
            <li data-target="#demo" data-slide-to="{{$bk1}}" @if($bk1 == 0)class="active" @endif></li>
            @endforeach

        </ul>
        <div class="carousel-inner">
            @foreach($banners as $bk => $banner)
            <div class="carousel-item @if($bk == 0) active @endif">
                <img src="{{$banner->image_url}}" alt="{!! $banner->title  !!}" class="d-block">
                <div class="carousel-caption">
                    <p>{!! $banner->title  !!}</p>
                    <h1>{!! $banner->sub_title  !!}</h1>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> </a> </div>
</div>
<section class="ptb8050">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title_mrg">
                    <h2 class="title">Our Services</h2>
                    <p class="title_p">We Provide Services</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden_4"> <img src="/images/globimg.png" class="img-fluid d-block img_mb30" alt="glob image" /> </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                @foreach($services as $s_key1=> $service1)
                    @if($s_key1 % 2 == 0)
                    <div class="service_box">
                        <div class="icon_left"><div class="icon_rd"><img src="{!! $service1->image !!}" class="d-block" alt="icon" /></div></div>
                        <div class="icon_right">
                            <h4 class="title_4">{!! $service1->name !!}</h4>
                            <p>{!! $service1->description !!}</p>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden_1"> <img src="/images/globe_spinning.gif" class="img-fluid d-block img_mb30" alt="glob image" /> </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                @foreach($services as $s_key2=> $service2)
                    @if($s_key2 % 2 != 0)
                        <div class="service_box">
                            <div class="icon_left"><div class="icon_rd"><img src="{!! $service2->image !!}" class="d-block" alt="icon" /></div></div>
                            <div class="icon_right">
                                <h4 class="title_4">{!! $service2->name !!}</h4>
                                <p>{!! $service2->description !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</section>
<section class="why_us res_top">
    <div class="col-lg-6 col-md-6 col-sm-12 bg_flex">
        <div class="flex_holder"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="title_mrg">
                    <h2 class="title text-left"> {!! $page_content->name !!}</h2>
                </div>
                {{--<div class="">--}}
                    {{--<div class="welcome">Welcome to Blackstone</div>--}}
                    {{--<p class="pera">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly</p>--}}
                {{--</div>--}}
                {{--<div class="">--}}
                    {{--<div class="welcome">We Provide Faster Service</div>--}}
                    {{--<p class="pera">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly</p>--}}
                {{--</div>--}}
                {{--<div class="">--}}
                    {{--<div class="welcome">We Provide Faster Service</div>--}}
                    {{--<p class="pera">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly</p>--}}
                    {{--<p class="btn_mt"><a class="btn_black">Read more</a></p>--}}
                {{--</div>--}}
                {!! $page_content->content !!}
            </div>
        </div>
    </div>
</section>
<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title_mrg">
                    <h2 class="title white"><a href="#" style="color: #FFFFFF">We Serve Clients Around The World</a></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad">
                @foreach($clients as $client)
                    <div class="client_box"> <img src="{{$client->country_flag}}" class="img-fluid" alt="{{$client->name}}" />
                    <p class="country">{{$client->country_name}}</p>
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
                    <h2 class="title">Our Process</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ourprocess">
                    <img src="/images/process-1.svg" class="svg img-fluid" alt="process"/>
                    <div class="process_box">
                        <h4>HOUSE</h4>
                        <div class="pc_line">
                            <img src="/images/pro_line.png" class="show_line" alt="process-line"/>
                            <img src="/images/dark-line.png" class="show_line2" alt="process-line"/>
                        </div>
                        <div class="pc_icon">
                            <img src="/images/home-icon2.png" class="show_line" alt="home icon"/>
                            <img src="/images/pro-icon1.png" class="show_line2" alt="home icon"/>
                        </div>
                    </div>
                </div>
                <div class="ourprocess">
                    <img src="/images/process-2.svg" class="svg img-fluid" alt="process"/>
                    <div class="process_box">
                        <h4>SELL</h4>
                        <div class="pc_line">
                            <img src="/images/pro_line.png" class="show_line" alt="process-line"/>
                            <img src="/images/dark-line.png" class="show_line2" alt="process-line"/>
                        </div>
                        <div class="pc_icon">
                            <img src="/images/sell-icon2.png" class="show_line" alt="home icon"/>
                            <img src="/images/sell-icon.png" class="show_line2" alt="home icon"/>
                        </div>
                    </div>
                </div>
                <div class="ourprocess">
                    <img src="/images/process-3.svg" class="svg img-fluid" alt="process"/>
                    <div class="process_box">
                        <h4>DEAL</h4>
                        <div class="pc_line">
                            <img src="/images/pro_line.png" class="show_line" alt="process-line"/>
                            <img src="/images/dark-line.png" class="show_line2" alt="process-line"/>
                        </div>
                        <div class="pc_icon">
                            <img src="/images/deal-icon2.png" class="show_line" alt="home icon"/>
                            <img src="/images/deal-icon.png" class="show_line2" alt="home icon"/>
                        </div>
                    </div>
                </div>
                <div class="ourprocess">
                    <img src="/images/process-4.svg" class="svg img-fluid" alt="process"/>
                    <div class="process_box">
                        <h4>CONFIRM</h4>
                        <div class="pc_line">
                            <img src="/images/pro_line.png" class="show_line" alt="process-line"/>
                            <img src="/images/dark-line.png" class="show_line2" alt="process-line"/>
                        </div>
                        <div class="pc_icon">
                            <img src="/images/conform-icon2.png" class="show_line" alt="home icon"/>
                            <img src="/images/conform-icon.png" class="show_line2" alt="home icon"/>
                        </div>
                    </div>
                </div>
                <div class="ourprocess">
                    <img src="/images/process-1.svg" class="svg img-fluid" alt="process"/>
                    <div class="process_box">
                        <h4>DONE</h4>
                        <div class="pc_line">
                            <img src="/images/pro_line.png" class="show_line" alt="process-line"/>
                            <img src="/images/dark-line.png" class="show_line2" alt="process-line"/>
                        </div>
                        <div class="pc_icon">
                            <img src="/images/done-icon2.png" class="show_line" alt="home icon"/>
                            <img src="/images/done-icon.png" class="show_line2" alt="home icon"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gray_bg ptb8050">
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