<?php

 $current_routename =\Route::currentRouteName();

?>
<header class="StickyHeader">
    <div class="container">
        <nav id='cssmenu'>
            <div class="logo"><a href="/">
                {!! HTML::image($setting->logo, 'logo') !!}

                </a></div>
            <div id="head-mobile"></div>
            <div class="button"></div>
            <ul class="menu_float">
                @foreach($header_menus as $hm)
                    <?php if($hm->url == 'home'){
                        $menu_url ="/";
                    }else{
                        $menu_url ="/".$hm->url;
                    } ?>
                    <li @if($current_routename == $hm->url)class='active' @endif><a href="{{$menu_url}}">{{$hm->name}}</a></li>

                @endforeach

            </ul>
        </nav>
    </div>
</header>