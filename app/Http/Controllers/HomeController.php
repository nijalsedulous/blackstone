<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Client;
use App\Models\Property;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners= Banner::where('is_active',1)->get();
        $services= Service::get()->take(6);
        $clients= Client::all();
        $properties= Property::where('is_active',1)
                                ->orderBy('created_at','desc')
                               ->get()->take(3);

        $data['properties']=$properties;
        $data['clients']=$clients;
        $data['services']=$services;
        $data['banners']=$banners;
        return view('home_page',$data);
    }
}
