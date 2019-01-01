<?php

 $current_routename =\Route::currentRouteName();

?>
<header class="StickyHeader">
    <div class="container">
        <nav id='cssmenu'>
            <div class="logo"><a href="/">
                {!! HTML::image('/images/blackstone-logo.png', 'logo') !!}

                </a></div>
            <div id="head-mobile"></div>
            <div class="button"></div>
            <ul class="menu_float">
                <li @if($current_routename == 'home')class='active' @endif><a href="/">HOME</a></li>
                <li @if($current_routename == 'properties' || $current_routename == 'property_details')class='active' @endif><a href="/properties">PROPERTIES</a></li>
                {{--<li><a href='#'>AGENTS <span class="plus">+</span></a>--}}
                    {{--<ul>--}}
                        {{--<li><a href='#'>Product 1</a> </li>--}}
                        {{--<li><a href='#'>Product 2</a> </li>--}}
                        {{--<li><a href='#'>Product 3</a> </li>--}}
                        {{--<li><a href='#'>Product 4</a> </li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href='#'>BLOG</a></li>
                <li><a href='#'>MY ACCOUNT</a></li>
                <li><a href='#'>SUBMIT PROPERTY</a></li>
                <li><a href="contact-us.html">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>