<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    {!! HTML::image($setting->logo, 'logo', array('class'=>'f-logo')) !!}
                    <div class="text">
                        <p>{!! $setting->site_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li> <i class="fa fa-map-marker" aria-hidden="true"></i>{!! $setting->address !!}</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@blackstone.com">{!! $setting->busniess_email !!}</a> </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+971526282552">+ {!! $setting->phone1 !!}</a> </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+971526282552">+ {!! $setting->phone2 !!}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4> Useful Links </h4>
                    <div class="f-border"></div>
                    <ul class="links">
                        <?php

                        $current_routename =\Route::currentRouteName();

                        ?>

                        @foreach($footer_menus as $hm)
                            <?php if($hm->url == 'home'){
                                $menu_url ="/";
                            }else{
                                $menu_url ="/".$hm->url;
                            } ?>
                            <li @if($current_routename == $hm->url)class='active' @endif><a href="{{$menu_url}}">{{$hm->name}}</a></li>

                        @endforeach
                        {{--<li> <a href="/">Home</a> </li>--}}
                        {{--<li> <a href="about.html">About Us</a> </li>--}}
                        {{--<li> <a href="services.html">Services</a> </li>--}}
                        {{--<li> <a href="contact-us.html">Contact Us</a> </li>--}}
                        {{--<li> <a href="dashboard.html">Dashboard</a> </li>--}}
                        {{--<li> <a href="properties-details.html">Properties Details</a> </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="f-border"></div>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        <form class="form-inline" action="#" method="GET">
                            <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                            <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="sub_footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <p class="copy">{!! $setting->copyrights !!}</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-list clearfix">
                    @foreach($social_icons as $icon)
                    <li><a href="{{$icon->url}}" class="">{!! $icon->icon !!}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>