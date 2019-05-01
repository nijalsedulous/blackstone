<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Validator;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners= Banner::all();
        $data['banners']=$banners;
        return view('admin.banners.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'banner_image'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('banners.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if(isset($input['banner_image'])){
            $banner_data = $this->saveBannerImage($request);
            $input['image_name'] = $banner_data['banner_name'];
            $input['image_url'] = $banner_data['banner_path'];
        }
        $input['is_active'] = isset($input['is_active'])?1:0;
        Banner::create($input);

        $request->session()->flash('message', 'Banner has been added successfully!');
        return redirect()->route('banners.index');
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
        $data['banner']=Banner::find($id);
        return view('admin.banners.edit',$data);
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
            'title' => 'required',
            'sub_title' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('banners.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $banner = Banner::find($id);
        $old_banner_image =$banner->image_url;
        $banner->title=$input['title'];
        $banner->sub_title=$input['sub_title'];
        $banner->banner_type=$input['banner_type'];
        $banner->is_active = isset($input['is_active'])?1:0;


        if(isset($input['banner_image'])){
            $banner_data = $this->saveBannerImage($request);

            //unlink previous image
            $banner_image_path = $old_banner_image;

            if(File::exists(public_path().$banner_image_path)) {
                File::delete(public_path().$banner_image_path);
            }
            $banner->image_name = $banner_data['banner_name'];
            $banner->image_url = $banner_data['banner_path'];
        }


        $banner->save();

        $request->session()->flash('message', 'Banner has been updated successfully!');
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::where('id',$id);
        $banner_image_path = $banner->first()->image_url;
        if(File::exists(public_path().$banner_image_path)) {
            File::delete(public_path().$banner_image_path);
        }
        $banner->delete();
        \Session::flash('message', 'Banner has been deleted successfully!');
        return redirect()->route('banners.index');
    }

    public function saveBannerImage($request){

        $banner_path = 'uploads/banners/';
        if(!File::exists($banner_path)) {
            File::makeDirectory($banner_path, 0777, true, true);
        }
        $file_name = $request->file('banner_image')->getClientOriginalName();
        $file_extension = $request->file('banner_image')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('banner_image')->move($banner_path, $new_file_name);
        $data['banner_path']="/".$banner_path.$new_file_name;
        $data['banner_name']=$new_file_name;
        return $data;

    }
}
