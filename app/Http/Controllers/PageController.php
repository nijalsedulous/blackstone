<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function contact_us(){

        return view('front.pages.contact_us');
    }
}
