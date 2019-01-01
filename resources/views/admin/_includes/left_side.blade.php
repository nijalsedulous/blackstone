<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">

            <?php
                $current_routename =\Route::currentRouteName();
                $route_arr = explode('.',$current_routename);
                $controller_name = $route_arr[0];

                 $action_name = $route_arr[1];


            ?>
            @if(Auth::user()->user_type == 'admin')

            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li @if($action_name == 'dashboard')class="nav-active nav-expanded" @endif>
                        <a href="/admin/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if($controller_name == 'banners')class="nav-active nav-expanded" @endif>
                        <a href="/admin/banners">

                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            <span>Banners</span>
                        </a>
                    </li>

                    <li @if($controller_name == 'blogs')class="nav-active nav-expanded" @endif>
                        <a href="/admin/blogs">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Blogs</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'contacts')class="nav-active nav-expanded" @endif>
                        <a href="/admin/contacts">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Contacts</span>
                        </a>

                    </li>
                    <li @if($controller_name == 'navigations')class="nav-active nav-expanded" @endif>
                        <a href="/admin/navigations">
                            <i class="fa fa-align-left" aria-hidden="true"></i>
                            <span>Navigations</span>
                        </a>

                    </li>
                    <li @if($action_name == 'clients')class="nav-active nav-expanded" @endif>
                        <a href="/admin/clients">

                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span>Our Clients</span>
                        </a>

                    </li>
                    <li @if($controller_name == 'services')class="nav-active nav-expanded" @endif>
                        <a href="/admin/services">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            <span>Our Services</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'pages')class="nav-active nav-expanded" @endif>
                        <a href="/admin/pages">
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Pages</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'properties')class="nav-active nav-expanded" @endif>
                        <a href="/admin/properties">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span>Properties</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'properties' && $action_name =='contacts')class="nav-active nav-expanded" @endif>
                        <a href="/admin/properties/contacts">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span>Property Contacts</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'settings')class="nav-active nav-expanded" @endif>
                        <a href="/admin/settings">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                            <span>Settings</span>
                        </a>

                    </li>

                    <li @if($controller_name == 'social_media')class="nav-active nav-expanded" @endif>
                        <a href="/admin/social_media">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            <span>Social Media</span>
                        </a>

                    </li>
                    <?php $nav_array = ['categories','countries']; ?>

                    <li class="nav-parent @if(in_array($controller_name, $nav_array))nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>Masters</span>
                        </a>
                        <ul class="nav nav-children">

                            <li @if($controller_name == 'categories')class="nav-active" @endif>
                                <a href="/admin/categories">
                                    Categories
                                </a>
                            </li>

                            <li @if($controller_name == 'countries')class="nav-active" @endif>
                                <a href="/admin/countries">
                                    Country
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>
            @endif


        </div>

    </div>

</aside>