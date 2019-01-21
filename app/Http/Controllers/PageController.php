<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Page;
use App\Models\Team;



class PageController extends Controller
{

    public function contact_us(){

        return view('front.pages.contact_us');
    }

    public function about_us(){

        $properties= Property::where('is_active',1)
            ->orderBy('created_at','desc')
            ->get()->take(3);
        $page_content = Page::where('name','About Us')->first();
        $teams= Team::all();
        $data['teams']=$teams;
        $data['page_content']=$page_content;
        $data['why_us_content']=Page::where('name','Why Us')->first();
        $data['properties']=$properties;

        return view('front.pages.about_us',$data);
    }

    public function thank_you(){
        $page_content = Page::where('name','Thank You')->first();
        $data['page_content']=$page_content;
        return view('front.pages.thank_you',$data);
    }
}
