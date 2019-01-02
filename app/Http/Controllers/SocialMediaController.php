<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social_media;
use Validator;



class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_media= Social_media::all();

        $data['social_media']=$social_media;

        return view('admin.social_media.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('social_media.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Social_media::create($input);

        $request->session()->flash('message', 'Social Media has been added successfully!');
        return redirect()->route('social_media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['social_media']=Social_media::find($id);
        return view('admin.social_media.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('social_media.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $sm = Social_media::find($id);
        $sm->name=$input['name'];
        $sm->icon=$input['icon'];
        $sm->url=$input['url'];
        $sm->save();

        $request->session()->flash('message', 'Social Media has been updated successfully!');
        return redirect()->route('social_media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Social_media::where('id',$id)->delete();

        \Session::flash('message', 'Icon has been deleted successfully!');
        return redirect()->route('social_media.index');
    }
}
