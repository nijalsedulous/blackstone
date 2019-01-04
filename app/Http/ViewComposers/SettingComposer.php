<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Setting;
use App\Models\Social_media;
use App\Models\Navigation;



class SettingComposer {

    /**
     * Author: plenartech
     *
     * Configuration file.
     * It contains variables used in the template as well as the
     * primary navigation arrayfrom which the navigation is created
     *
     */



    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('setting', Setting::get()->first());
        $view->with('social_icons', Social_media::all());
        $header_menus = Navigation::where('nav_type','header')
                                    ->where('is_active',1)
                                    ->orderBy('sort_order','asc')
                                    ->get();
        $footer_menus = Navigation::where('nav_type','footer')
                                    ->where('is_active',1)
                                    ->orderBy('sort_order','asc')
                                    ->get();
        $view->with('header_menus', $header_menus);
        $view->with('footer_menus', $footer_menus);

    }
}